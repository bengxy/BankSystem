<html lang="en">
<?php include("head.html"); ?>
<body>
    <?php include("backbtn.html"); ?>
	<div align="center" style="margin-top:100px">
        <h1 style="height:100px">月客等指数与客流人数对比图</h1>

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
                //--- 折柱 ---
                myChart = ec.init(document.getElementById('main'));

               // console.log(global_Month);
                option = {
                    tooltip : {
                        trigger: 'axis'
                    },
					/*
                    title : {
                        text: '月客等指数与客流人数对比图',
                        //x:'center'
                    },
					*/
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
                    calculable : false,
                    legend: {
                        data:['排队人数','客等指数'],
                        //x:'left'
                    },
                    datazoom:{
                        show:true
                    },
                    xAxis : [
                        {
                            type : 'category',
                            //splitNumber:5,
                            
                            data : global_Month,
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            name : '排队人数',
                            axisLabel : {
                                formatter: '{value} 人'
                            },
                            splitArea : {show : true}
                        },
                        {
                            type : 'value',
                            name : '客等指数',
                            axisLabel : {
                                formatter: '{value} '
                            }
                        }
                    ],
                    series : [
                        {
                            name:'排队人数',
                            type:'bar',
                            data:global_WaitingNumber,
                            itemStyle: {
                                normal: {
                                    color:'#87cefa'
                                },
                                label:{
                                    show: true, 
                                    position: 'insideRight',
                                    textStyle:{
                                        color:"#FFFFFF"
                                    }
                                }
                            },
                            //data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                        },
                        {
                            name:'客等指数',
                            type:'line',
                            yAxisIndex: 1,
                            z:2,
                            data:global_WaitingValue,
                            itemStyle: {
                                normal: {
                                    lineStyle: {
                                        shadowcolor:'rgba(0.5,0,0,0.4)',
                                        width:2
                                        //shadowcolor:'rgba(0.2,0.3,0.4,0.4)'
                                    },
                                    label : {
                                        show: true, 
                                        position: 'insideRight',
                                        textStyle:{
                                            color:"#FFFFFF"
                                        }
                                    }
                                }
                            },
                            //data:[2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
                        }
                    ]
                };
            }
        );
    </script>
    <script type="text/javascript">
        $.ajax({
            type: "GET",
            //async: false, //同步执行
            url: "../PHP/5.php",
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