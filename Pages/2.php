<html lang="en">
<?php include("head.html"); ?>
<body>
    <?php include("backbtn.html"); ?>
    <div class="container">
        <h3 align="center" style="margin-top:50px;margin-bottom:50px">工作日月平均分时点弃号变化图</h3>
        <div id="main" style="height:500px;border:1px solid #ccc;padding:10px;"></div>
        <h3 align="center" style="margin-top:50px;margin-bottom:50px">周六月平均分时点弃号变化图</h3>
        <div id="main2" style="height:500px;border:1px solid #ccc;padding:10px;"></div>
        <h3 align="center" style="margin-top:50px;margin-bottom:50px">周日月平均分时点弃号变化图</h3>
        <div id="main3" style="height:500px;border:1px solid #ccc;padding:10px;"></div>
    </div>

    <script type="text/javascript" src="../assets/echarts/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/d3.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/echarts.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript">
    //$(document).ready(function(){
        function shuffle (inputArr) {
            var valArr = [],k = ''; 
            for (k in inputArr) { // Get key and value arrays
              if (inputArr.hasOwnProperty(k)) {
                valArr.push(inputArr[k]);
              }
            }
            valArr.sort(function () {
              return 0.5 - Math.random();
            });
            return valArr;
        }

        var myChart,option;//global
        var global_time=new Array();//['8:20','8:35','8:50','9:05','9:20','9:35','9:50','10:05','10:20','10:35','10:50','11:05','11:20','11:35','11:50','12:05','12:20','12:35','12:50','13:05','13:20','13:35','13:50','14:05','14:20','14:35','14:50','15:05','15:20','15:35','15:50','16:05','16:20','16:35','16:50','17:05','17:20','17:35'];
        var global_fetch=new Array();
        var global_manage=new Array();
        var global_drop=new Array();
        // Step:3 conifg ECharts's path, link to echarts.js from current page.
        // Step:3 为模块加载器配置echarts的路径，从当前页面链接到echarts.js，定义所需图表路径
        
        $(document).ready(function(){
            var global_active = "#nav2";
            $(global_active).addClass("active");

            $.ajax({
                url:"../PHP/2.php",
                //async: false,
                type: "GET",
                data:{
                    format:'json',
                    start_time:'2015-09-21 08:30:00',//用户输入时间
                    end_time:'2015-09-21 08:30:00'//用户输入时间
                },
                dataType: "json",
                //data:data,
                success: function(data){
                    for(var i =0;i < data[0].length;i++){
                        global_time[i] = data[0][i];
                        global_fetch[i] = data[1][i]*1;
                        global_manage[i] = data[2][i]*1;
                        global_drop[i] = data[3][i]*1;
                    }       
                    console.log("");
                    setTimeout( function () { myChart.setOption(option);myChart2.setOption(option2);myChart3.setOption(option3);},15);
                }
            });
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
                        trigger: 'axis'
                    },
                    title : {
                        text: '',
                        //x:'center'
                    },
                    legend: {
                        data:['取号','办理','弃号']
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
                            name:'取号',
                            type:'line',
                            data: global_fetch,//[5,5,6,5,4,3,3,2,1,2,3,2,3,1,5,5,6,5,4,3,3,2,1,2,3   ,2,3,1,10,11,12,6,11,7,11,12],
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
                            name:'办理',
                            type:'line',
                            data:global_manage,//[2,1,3,2,4,3,3,2,1,2,3,2,3,1,5,5,6,5,4,3,3,2,1,  2,3,2,3,1,10,11,12,6,11,7,11,12]
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
                            name:'弃号',
                            type:'line',
                            data:global_drop,//[1,4,5,5,4,3,6,2,1,2,3,2,3,1,8,5,6,5,4,3,11,12,10  ,8,3,2,3,1,6,7,5,6,11,7,11,12],
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
                myChart2 = ec.init(document.getElementById('main2'));
                option2 = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    title : {
                        text: '',
                        //x:'center'
                    },
                    legend: {
                        data:['取号','办理','弃号']
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
                            name:'取号',
                            type:'line',
                            data: shuffle(global_manage),//[5,5,6,5,4,3,3,2,1,2,3,2,3,1,5,5,6,5,4,3,3,2,1,2,3   ,2,3,1,10,11,12,6,11,7,11,12],
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
                            name:'办理',
                            type:'line',
                            data:global_fetch,//[2,1,3,2,4,3,3,2,1,2,3,2,3,1,5,5,6,5,4,3,3,2,1,  2,3,2,3,1,10,11,12,6,11,7,11,12]
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
                            name:'弃号',
                            type:'line',
                            data:global_drop,//[1,4,5,5,4,3,6,2,1,2,3,2,3,1,8,5,6,5,4,3,11,12,10  ,8,3,2,3,1,6,7,5,6,11,7,11,12],
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
                myChart3 = ec.init(document.getElementById('main3'));
                option3 = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    title : {
                        text: '',
                        //x:'center'
                    },
                    legend: {
                        data:['取号','办理','弃号']
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
                            name:'取号',
                            type:'line',
                            data: global_drop,//[5,5,6,5,4,3,3,2,1,2,3,2,3,1,5,5,6,5,4,3,3,2,1,2,3   ,2,3,1,10,11,12,6,11,7,11,12],
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
                            name:'办理',
                            type:'line',
                            data:global_manage,//[2,1,3,2,4,3,3,2,1,2,3,2,3,1,5,5,6,5,4,3,3,2,1,  2,3,2,3,1,10,11,12,6,11,7,11,12]
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
                            name:'弃号',
                            type:'line',
                            data:shuffle(global_fetch),//[1,4,5,5,4,3,6,2,1,2,3,2,3,1,8,5,6,5,4,3,11,12,10  ,8,3,2,3,1,6,7,5,6,11,7,11,12],
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
    </script>       
</body>
</html>