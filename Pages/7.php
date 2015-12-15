<html lang="en">
<?php include("head.html") ?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="box col-md-12" id="datePicker" align="center" style="height:200px">
                <p>
                开始时间<input type="text" id="begin" gldp-id="beginDate" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                结束时间<input type="text" id="end" gldp-id="endDate" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="search" id="btn" onclick="btnClick()">检索</button>
                </p>   
                <div gldp-el="beginDate" style="width:400px; height:300px;"></div>
                <div gldp-el="endDate" style="width:400px; height:300px;"></div>
            </div>
            <div class="box col-md-3" id="nav">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" id="nav1"><a class="nav_a" href="1.html">月平均分时点等候人数变化图</a></li>
                    <li role="presentation" id="nav2"><a class="nav_a" href="2.html">月平均分时点弃号变化图</a></li>
                    <li role="presentation" id="nav3"><a class="nav_a" href="3.html">日客流人数、客等指数及时间占比</a></li>
                    <li role="presentation" id="nav4"><a class="nav_a" href="4.html">周实时队列变化图</a></li>
                    <li role="presentation" id="nav5"><a class="nav_a" href="5.html">月客流人数、客等指数及时间占比</a></li>
                    <li role="presentation" id="nav6"><a class="nav_a" href="6.html">客户排队人数对比</a></li>
                    <li role="presentation" id="nav7"><a class="nav_a" href="7.html">客户等候人数对比</a></li>
                    <li role="presentation" id="nav8"><a class="nav_a" href="8.html">月效率对比</a></li>
                    <li role="presentation" id="nav9"><a class="nav_a" href="9.html">渠道业务</a></li>
                </ul>
            </div>
            <div class="row col-md-9">
                <!-- 

                add pages.

                 -->
                <h1 style="padding-left:200px">XX银行XX网点月等待人数图</h1>

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
                </div>
            </div>
        </div>
    </div>

<?php include("footer.html") ?>
</body>
</html>