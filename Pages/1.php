<html lang="en">
<?php include("head.html"); ?>
<body>
    <?php include("backbtn.html"); ?>
    <div align="center" style="margin-top:100px">
        <h1 style="height:100px">月平均分时点等候人数变化图</h1>

        <div id="main" style="width:1200px;height:600px;border:1px solid #ccc;padding:10px;"></div>
    </div>
    <script type="text/javascript" src="../assets/echarts/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/d3.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/echarts.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        console.log(1);
        var myChart;
        var option;
        var global_time = new Array();
        var global_weekday = new Array();
        var global_sunday = new Array();
        var global_saturday = new Array(); 
        require.config({
            paths: {
                echarts: '../assets/echarts'
            }
        });
        require(
            [
                'echarts',
                'echarts/chart/line',
                'echarts/chart/bar'
            ],
            function (ec) {
            
                myChart = ec.init(document.getElementById('main'));
                option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    title : {
                        text: '',
                        //x:'center'
                    },
                    legend: {
                        data:['工作日','周六','周日']
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : {show: true},
                            //dataView : {show: true, readOnly: false},
                            //magicType : {show: true, type: ['line', 'bar']},
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            boundaryGap : false,
                            data : global_time
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'工作日',
                            type:'line',
                            data: global_weekday,
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
                        },
                        {
                            name:'周六',
                            type:'line',
                            data:global_saturday,
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
                        },
                        {
                            name:'周日',
                            type:'line',
                            data:global_sunday,
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
            }
        );
        $(document).ready(function(){
            console.log("2");
            $.ajax({
                url:"../PHP/1.php",
                //async: false,
                type: "POST",
                data:{
                    format: "json",
                    start_time: "2015-09-21 08:30:00",
                    end_time: "2015-09-21 08:30:00"
                },
                dataType: "json",
            
                success: function(data){
                    global_weekday[0] = 0;
                    global_saturday[0] = 0;
                    global_sunday[0] = 0;
                    global_weekday[1] = 7;
                    global_saturday[1] = 4;
                    global_sunday[1] = 1;
                    global_time[0]="08:15:00";
                    global_time[1]="08:25:00";
                    for(var i =0;i < data[0].length;i++){
                        global_weekday[i+2] = data[0][i]*1;
                        global_saturday[i+2] = data[1][i]*1;
                        global_sunday[i+2] = data[2][i]*1;
                        global_time[i+2] = data[3][i];
                    }
                    setTimeout( function () { myChart.setOption(option);},10);
                    //myChart.setOption(option);
                    var dataNew = new Array();
                    for(var i =2;i < global_time.length-1;i++){
                        dataNew[i-2] = new Array();
                        dataNew[i-2][0] = global_time[i]+"至"+global_time[i+1];
                        dataNew[i-2][1] = global_weekday[i];
                    }
                    document.getElementById("example").style.display = "block";
                    document.getElementById("title_date").style.display = "block";
                    document.getElementById("title_org").style.display = "block";
                    var tabnew =  $('#example').DataTable( {
                        data: dataNew,
                        rows: [
                        { title: "时段" },
                        { title: "等候人数" },
                        ]
                    });
                }
            });
        });
    </script>
</body>
</html>