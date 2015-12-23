<html lang="en">
<?php include("head.html"); ?>
<link id="bsdp-css" href="../assets/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">
<style type="text/css">
#info{
        margin-top: 5%;
        font-size: 
    }
.btn-file {
    position: relative;
    overflow: hidden;
    
}
.btn-file p{
    margin-top: 30px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
    
}

</style>
<body>
    <?php include("backbtn.html"); ?>
    <div class="row search">
        <div id="info" class="col-md-8 col-md-offset-2" align="middle">
            <div class="row">
                <div class="col-md-3">
                    <select class="form-control">
                        <option>网点列表</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-md-9">
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="input-sm form-control" name="start" />
                        <span class="input-group-addon">到</span>
                        <input type="text" class="input-sm form-control" name="end" />
                    </div>
                </div>
            </div>
        </div>
    </div>
	
        <center>
		<div class="content" style="margin-top:150px">
<span class="btn btn-super btn-info btn-file">
    <p>系统员导入</p> <input type="file">
</span>
			<button type="button"  class="btn btn-info btn-super" onclick="show()">查询</button>
		</div>
       <!--  <div style="margin-top:30px">
            <a href="#" style="font-size:20px;color:grey">
                模板示例下载
            </a>
        </div> -->


        </center>
	

	<script type="text/javascript" src="../assets/echarts/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var global_active = "#nav9";
            $(global_active).addClass("active");
        });
        function show () {
			window.location.href = "table2.html";
		}
	/*	function warn(){
			window.alert("功能暂未开放");
		}*/
        function imp(){
            console.log(10);
           // window.location.href = "table3.html";
        }
    
    </script>
    <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.input-daterange').datepicker({language: "zh-CN"});
</script>
</body>
</html>