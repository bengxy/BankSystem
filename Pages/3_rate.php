<html lang="en">
<?php include("head.html"); ?>
<body>
    <?php include("backbtn.html"); ?>
    <div align="center" style="margin-top:100px">
        <h1 style="height:100px">日各时段时间效率占比图</h1>

        <div id="main" style="width:70%;height:70%;border:1px solid #ccc;padding:10px;"></div>
    </div>
    
    <script type="text/javascript" src="../assets/echarts/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/d3.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/echarts.js"></script>
    <script type="text/javascript">
        var myChart, option;//global
        var global_Month=new Array();
        var global_WaitingNumber=new Array(); // 客等人数
        var global_WaitingValue=new Array();  // 客等指数
        var global_WaitingPercent0to10=new Array(); //客等时间占比
        var global_WaitingPercent10to20=new Array();
        var global_WaitingPercent20to30=new Array();
        var global_WaitingPercentOver30=new Array();

        
        // Step:3 conifg ECharts's path, link to echarts.js from current page.
        // Step:3 为模块加载器配置echarts的路径，从当前页面链接到echarts.js，定义所需图表路径
        require.config({
            paths: {
                echarts: '../assets/echarts',
            }
        });
        //console.log(global_Month);
        // Step:4 require echarts and use it in the callback.
        // Step:4 动态加载echarts然后在回调函数中开始使用，注意保持按需加载结构定义图表路径

        /*

        */
        require(
            [
                'echarts',
                'echarts/chart/bar',
                'echarts/chart/line',
                //'echarts/chart/macarons'
                //'echarts/chart/map'
            ],
            function (ec) {
                
                myChart = ec.init(document.getElementById('main'));
                option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : {show: true},
                            //dataView : {show: true, readOnly: false},
                            //magicType: {show: true, type: ['line', 'bar']},
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                    calculable : true,
                    legend: {
                        data:['0~10分钟人数','10~20分钟人数','20~30分钟人数','30分钟以上人数'],
                        //x:'left'
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data : global_Month,
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            name : '等候人数占比',
                            axisLabel : {
                                formatter: '{value} %'
                            },
                            //splitArea : {show : true}
                        },
                    ],
                    series : [
                        {
                            name:'0~10分钟人数',
                            type:'bar',
                            stack:'总量',
                            data:global_WaitingPercent0to10,
                            itemStyle : {
                                normal: {
                                    color:'#76bcc2',
                                    label : {
                                        show: true, 
                                        position: 'insideRight',
                                    }
                                },
                            },
                        },
                        {
                            name:'10~20分钟人数',
                            type:'bar',
                            stack:'总量',
                            data:global_WaitingPercent10to20,
                            itemStyle : {
                                normal: {
                                    color:'#f0b644',
                                    label : {
                                        show: true, 
                                        position: 'insideRight',
                                    }   
                                },
                            },
                        },
                        {
                            name:'20~30分钟人数',
                            type:'bar',
                            stack:'总量',
                            data:global_WaitingPercent20to30,
                            itemStyle : {
                                normal: {
                                    color:'#3fc1ac',
                                    label : {
                                        show: true, 
                                        position: 'insideRight',
                                    }   
                                },
                            },
                        },
                        {
                            name:'30分钟以上人数',
                            type:'bar',
                            stack:'总量',
                            data:global_WaitingPercentOver30,
                            itemStyle : {
                                normal: {
                                    color:'#d97aa0',
                                    label : {
                                        show: true, 
                                        position: 'insideRight',
                                    }   
                                },
                            },
                        },
                    ]
                };
            }
        );
    </script>
	<script type="text/javascript">
        $.ajax({
            type: "GET",
            //async: false, //同步执行
            url: "../PHP/3.php",
            /*data:{
                "from":"2015-08-01",
                "end":"2015-09-01",
            },*/
            dataType: "json", //返回数据形式为json
            success: function (result) {
                var data = result;
                if (data) {
                    for (var i = 0; i <data[0].length; i++) {
                        global_Month[i] = data[0][i];
                        global_WaitingNumber[i]=data[1][i]; // 客等人数
                        global_WaitingValue[i]=data[2][i];  // 客等指数
                        global_WaitingPercent0to10[i]=data[3][i]; //客等时间占比
                        global_WaitingPercent10to20[i]=data[4][i];
                        global_WaitingPercent20to30[i]=data[5][i];
                        global_WaitingPercentOver30[i]=data[6][i];                                
                    };                       
                    console.log("123");
                    setTimeout( function () { myChart.setOption(option); },10);
                }
            },
            error: function (errorMsg) {
                console.log(global_Month);
            }
        });
    </script>
</body>
</html>