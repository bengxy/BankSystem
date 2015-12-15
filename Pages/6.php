<html lang="en">
<?php include("head.html") ?>
<body>
    <div class="container-fluid">
        <div class="row">
 

        
            <div class="row col-md-9">
                <!-- 

                add pages.

                 -->
                <h1 style="padding-left:200px">XX银行XX网点月排队人数图</h1>

                <div class="col-xs-8">
                    <!-- 热度图 -->
                    <div class="heatmap" id="onemHeat">
                    </div>
                </div>
                <!-- 每周的直方图 -->
                <!-- <div class="col-xs-8">
                    <div id="hist" style="height:400px; width:800px;">
                    </div>
                </div> -->

                <div class="col-xs-8 needdisp" style="display:none">
                    <!-- 表 -->
                    <h4>周分布详细数据表</h4>
                    <div class="week-table" id="onewTable" >
                            
                    </div>
                </div>
                <div class="col-xs-8 needdisp" id = "sorted" style="display:none">
                    <h4>日期排序表</h4>
                    <div class="sort-table" id="sortedTable">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("footer.html") ?>
</body>
</html>