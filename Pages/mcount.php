<?php 
    $type = 6;
    $bankName = "XX银行";
    $siteName = "xx区";
    $type = $_GET['pages'];  //6,7,8
    if(is_null($type)){
        $type = 6;
    }
   
    echo '<script>var globalMonth = '.$type.';</script>';

    $specify = array(6=>"等候人数",7=>"排队人数",8=>"工作效率");
?>
<html lang="en">
<?php include("head.html"); ?>
<body>
    <div class="container-fluid">
      <?php include("backbtn.html"); ?>
        <div class="row content">
            <div class="col-md-5">
                <!-- 热度图 -->
                <center>
                    <h3>
                        <?php echo $bankName.$siteName.'月'.$specify[$type].'对比图表'; ?>
                    </h3>
                    <div class="heatmap" id="onemHeat">
                    </div>
                </center>
                
            </div>

            <div class="col-md-7">
                <div class="row col-md-7 needdisp" style="display:none">
                    <center>
                        <h4>周分布详细数据表</h4>
                        <div class="week-table" id="onewTable" >
                        </div>
                    </center>
                </div>
                <div class="row col-md-7 needdisp" id = "sorted" style="display:none">
                    <center>
                        <h4>日期排序表</h4>
                        <div class="sort-table" id="sortedTable">
                            <table id="example" class="display" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>日期</th>
                                        <th>星期</th>
                                        <th>人数</th>
                                    </tr>
                                </thead>
                                 <tfoot>
                                    <tr>
                                        <th>日期</th>
                                        <th>星期</th>
                                        <th>人数</th>
                                    </tr>
                                </tfoot> 
                            </table>
                        </div>
                    </center>
                </div>
            </div>
        </div>   
    </div>
    <?php include("footer.html") ?>
    <script type="text/javascript">
        $(document).ready(function(){
            initialize();
            var monthData = loadData();
            var cal = new CalHeatMap();
            configHeatMap(monthData);
            
            cal.init(conf_factory);
        //format data
            splitedData = configHist(monthData);

            //直方图
            // requireEchart();
            //table
            configTable(monthData);     
            //document.getElementById("graph").style.display = "block";    
            configSortedTable(monthData);

            $(".needdisp").css("display", "block");

        });
    </script>
</body>
</html>