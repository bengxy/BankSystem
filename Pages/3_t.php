<html lang="en">
<?php include("head.html"); ?>
<body>
    <div align="center" style="margin-top:100px">
        <h1 style="height:100px">日客等指数与客流人数对比表</h1>

   <!--     <div id="main" style="width:1200px;height:600px;border:1px solid #ccc;padding:10px;"></div> -->
		<table id="example" class="display" cellspacing="0" width="75%" style="display:none">
            <thead>
                <tr>
                    <th>日期</th>
                    <th>等候人数</th>
                    <th>客等指数</th>
                </tr>
            </thead>
			<tfoot>
				<tr>
					<th>日期</th>
                    <th>等候人数</th>
                    <th>客等指数</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script type="text/javascript" src="../assets/echarts/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/echarts/echarts.js"></script>
    <script type="text/javascript" src="../assets/js/glDatePicker.min.js"></script>
    
    <script type="text/javascript">
        var global_Month=new Array();
        var global_WaitingNumber=new Array(); // 客等人数
        var global_WaitingValue=new Array();  // 客等指数
        var global_WaitingPercent0to10=new Array(); //客等时间占比
        var global_WaitingPercent10to20=new Array();
        var global_WaitingPercent20to30=new Array();
        var global_WaitingPercentOver30=new Array();
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
                    var dataNew = new Array();
                    for(var i = 0;i<data[0].length;i++){
                        dataNew[i] = new Array();
                        dataNew[i][0] = data[0][i];
                        dataNew[i][1] = data[1][i];
                        dataNew[i][2] = data[2][i];
                        dataNew[i][3] = data[3][i];
                        dataNew[i][4] = data[4][i];
                        dataNew[i][5] = data[5][i];
                        dataNew[i][6] = data[6][i];
                    }
                        //document.getElementById('main3');
                    document.getElementById("example").style.display = "block";
                    var tabnew =  $('#example').DataTable( {
                        data: dataNew,
                        rows: [
							{ title: "月份" },
							{ title: "等候人数" },
							{ title: "客等指数" }],
						searching: false,
                        processing: true,
                        paging: false,
                        info: false

                    } );
					//configSortedTable(monthData);
                }
			},
            error: function (errorMsg) {
                console.log(global_Month);
            }
        });
    </script>
</body>
</html>