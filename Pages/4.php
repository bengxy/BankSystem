<html lang="en">
<?php include("head.html"); ?>
<body>
    <?php include("backbtn.html"); ?>
    <div align="center" style="margin-top:100px">
        <h1 style="height:100px">周实时队列变化图</h1>
        <div id="main" style="width:1200px;height:600px;border:1px solid #ccc;padding:10px;"></div>
    </div>


    <script type="text/javascript" src="../assets/echarts/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/d3.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/echarts.js"></script>
    <script type="text/javascript" src="../assets/js/glDatePicker.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript">
    //$(document).ready(function(){
        
        var myChart,option;//global
        var global_time=new Array();//['8:20','8:35','8:50','9:05','9:20','9:35','9:50','10:05','10:20','10:35','10:50','11:05','11:20','11:35','11:50','12:05','12:20','12:35','12:50','13:05','13:20','13:35','13:50','14:05','14:20','14:35','14:50','15:05','15:20','15:35','15:50','16:05','16:20','16:35','16:50','17:05','17:20','17:35'];
        var global_num=new Array();
        // Step:3 conifg ECharts's path, link to echarts.js from current page.
        // Step:3 为模块加载器配置echarts的路径，从当前页面链接到echarts.js，定义所需图表路径
        
        $(document).ready(function(){
        
            $.ajax({
                url:"../PHP/4.php",
                async: false,
                type: "GET",
                dataType: "json",
                data:{
                    format:'json',
                    start_time:'2015-09-21 08:30:00',//用户输入时间
                    end_time:'2015-09-21 08:30:00'//用户输入时间
                },
                //data:data,
                success: function(data){
                    setTimeout( function () { console.log("wait");},20);
                    for(var i =0;i < data[0].length;i++){
                        global_time[i] = data[0][i];
                        global_num[i] = data[1][i]*1;
                    }   
                    console.log("");    
                    
                    //myChart.setOption(option);
                }
            });
            //setTimeout( function () { myChart.setOption(option);},50);
            
        });

        require.config({
            paths: {
                echarts: '../assets/echarts'
            }
        });
        
    // Step:4 require echarts and use it in the callback.
    // Step:4 动态加载echarts然后在回调函数中开始使用，注意保持按需加载结构定义图表路径
        require(
            [
                'echarts',
                'echarts/chart/line',
                'echarts/chart/bar'
            ],
            function (ec) {
                //--- 折柱 ---
                myChart = ec.init(document.getElementById('main'));
                option = {
                   
                    tooltip : {
                        trigger: 'item',
                        formatter : function (params) {
                            console.log(params);
                            console.log("# ");
                            var date = new Date(params);
                            data = date.getFullYear() + '-'
                                   + (date.getMonth() + 1) + '-'
                                   + date.getDate() + ' '
                                   + date.getHours() + ':'
                                   + date.getMinutes();
                            return data + '<br/>'
                                   + params.value[1] + ', ' 
                                   + params.value[2];
                        }
                    },

                    legend: {
                        data:['实时等候人数']
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : {show: true},
                            //dataView : {show: true, readOnly: true},
                            //magicType : {show: true, type: ['line', 'bar']},
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                      dataZoom: {
                       show: true,
                       start : 0
                     },
                    xAxis : [
                        {
                            type : 'time',
                            splitNumber:10
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                           // splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'实时等候人数',
                            type:'line',
                            data : (function () {
                                var a=[]
                                for(var i=0;i<global_time.length;i++){
                                    var t = new Date(global_time[i]);
                                    if(t.getHours()=="8"&&t.getMinutes()=="30"){
                                        global_num[i] = 0;
                                    }
                                    a.push([t,global_num[i]]);
                                }
                                
                                return a;
                            })(),//[5,5,6,5,4,3,3,2,1,2,3,2,3,1,5,5,6,5,4,3,3,2,1,2,3   ,2,3,1,10,11,12,6,11,7,11,12],
                            markPoint : {
                                data : [
                                    {type : 'max', name: '最大值'},
                                    {type : 'min', name: '最小值'}
                                ]
                            },
                            markLine : {
                                data : [
                                    {type : 'average', name: '平均值'}
                                ]
                            }
                        }
                    ]
                };
                //myChart.setOption(option);
                
            }
        );

setTimeout( function () { myChart.setOption(option);},200);
    </script>       
</body>
</html>