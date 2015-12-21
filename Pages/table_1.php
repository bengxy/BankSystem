<html lang="en">
<?php include("head.html"); ?>
<body>
<div class="container" style="width:800px;margin-top:50px" align="center">
    <?php include("backbtn.html"); ?>
    <h1 style="height:100px">日平均分时点客流量表</h1>
    <h3 id="title_org" style="display:none">统计机构：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**支行</h3>
    <h3 id="title_date" style="display:none">统计日期：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20150901——20150930</h3>
    <table id="example" class="display" cellspacing="0" width="100%" style="display:none">
        <thread>
            <tr>
                <th>统计机构</th>
                <th>**支行</th>
            </tr>
        </thread>
        <thead>
            <tr>
                <th>时段</th>
                <th>等候人数</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>时段</th>
                <th>等候人数</th>
            </tr>
        </tfoot>
    </table>
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

        $(document).ready(function(){
            console.log("2");
            $.ajax({
                url:"../PHP/1.php",
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
                        ],
                        searching: false,
                        processing: true,
                        paging: false,
                        info: false
                    });
                }
            });
        });
    </script>
</body>
</html>