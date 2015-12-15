//绘制hetamap的配置
/*function changeData(){
	
}*/
//heatmap的配置工厂

var conf_factory= {
	//index:0,
	itemSelector: null,	//#week-day
	data: null,	
	start: null,		//new Date(y, m, d) warning: month start from 0

	domain: "month",
	subDomain: "x_day",
	cellSize: 40,
	cellPadding: 5,			//cell距离
	domainGutter: 20,		//两个日历表的距离
	range: 1,				//月数
	domainDynamicDimension: false,	//域自动扩展
	verticalOrientation: true,		//垂直显示
	subDomainTextFormat: "%d",
	domainLabelFormat: "%Y-%m",		//domain的数据格式
	//onClick: changeData(this.date), 
	legendVerticalPosition: "center",
	legendHorizontalPosition: "right",
	legendOrientation: "vertical",
	legend: [60, 70, 80, 90, 100]		
}
//hist map的配置工厂
var option_factory = {
    title : {
        text: ""
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:[]
    },
    toolbox: {
        show : true,
        feature : {
            //dataView : {show: true, readOnly: true},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : false,
    xAxis : [
        {
            type : 'category',
            data : ['周一','周二','周三','周四','周五','周六','周日']//global_axis_date
        }
    ],
    yAxis : [
        {
            type : 'value',
        }
    ],
    series : [
        {},{},{},{}
            
    ]
};


//从日历选项卡  button click里面获取的结果 
var monthId = 9;		//1-12月
var yearId = 2015;
var bankId = 0;		//银行id
var searchType = 0;
//得到的最终结果


function loadData(monthNum, yearId, bankId, searchType ){
	var result;
	$.ajax({
		type:'POST',
		url:'../PHP/monthData.php',
		async:false,
		data:{
			format:'json',		//default json
			monthNum: monthId,
			year: yearId,
			bankId: bankId,
			type: searchType
		},
		error:function(data){
			console.log("error");
		},
		dataType: 'json',
		success: function(data){
			console.log("success");
			result = data;
		}
	});
	return result;
}


function extend(target) {
    var sources = [].slice.call(arguments, 1);
    sources.forEach(function (source) {
        for (var prop in source) {
            target[prop] = source[prop];
        }
    });
    return target;
}

function configHeatMap(monthData, cal){
	conf_factory['itemSelector'] = ".heatmap";
	conf_factory['start'] = new Date(yearId, monthId-1, 1);
	//data['data'] is multi array
	o = monthData['data'];
	if(monthData['length'] == 4){
		alldata = extend({}, o[0],o[1],o[2],o[3]);
	}
	else if(monthData['length'] == 5){
		alldata = extend({}, o[0],o[1],o[2],o[3],o[4]);
	}
	else{
		alldata = extend({}, o[0],o[1],o[2],o[3],o[4],o[5]);
	}
	conf_factory['data'] = alldata;
}

function configHist(monthData){
	option_factory['title']['text'] = '每周等待人数峰值';
	option_factory['legend']['data'] = ['第一周','第二周','第三周','第四周'];
	if(monthData['length']==5){
		option_factory['legend']['data'].push('第五周');
		option_factory['series'].push({});
	}
	else if(monthData['length']==6){
		option_factory['legend']['data'].push('第五周');
		option_factory['legend']['data'].push('第六周');
		option_factory['series'].push({});
		option_factory['series'].push({});
	}
	console.log(monthData['length']);
	for (var i = 0; i < monthData['length']; i++) {
		//console.log(i);
		option_factory['series'][i]['name'] = option_factory['legend']['data'][i];
		option_factory['series'][i]['type'] = "line";
		option_factory['series'][i]['data'] = $.map( monthData['data'][i] ,function(el){
			return el;
		});
		option_factory['yAxis'][0]['min'] = monthData['min'];
		option_factory['yAxis'][0]['max'] = monthData['max'];
		option_factory['series'][i]['markPoint']  = {
			data : [
				{type : 'max', name: '最大值'},
				{type : 'min', name: '最小值'}
			]
		};
		/*option_factory['series'][i]['markLine'] = {
			data : [
				{type : 'average', name: '平均值'}
			]
		};*/
	}
}
var myChart = 5;
function requireEchart(){
	require.config({
		paths:{
			echarts: '../assets/echarts'
		}
	});
	require(
		[
			'echarts',
			'echarts/chart/bar',
			'echarts/chart/line'
		],
		function (ec){
			myChart = ec.init(document.getElementById('hist'));
			myChart.setOption(option_factory);
		}
	);
}

function configTable(monthData){
	$("thead.weekhead").append("<td>#</td>");
	$("thead.weekhead").append("<td>周一</td>");
	$("thead.weekhead").append("<td>周二</td>");
	$("thead.weekhead").append("<td>周三</td>");
	$("thead.weekhead").append("<td>周四</td>");
	$("thead.weekhead").append("<td>周五</td>");
	$("thead.weekhead").append("<td>周六</td>");
	$("thead.weekhead").append("<td>周日</td>");
	for (var i = 0; i < monthData['length']; i++) {
		$("tbody").append("<tr id='w"+i+"'></tr>");
		$("#w"+i).append("<td>第"+(i+1)+"周</td");
		for (var j = 0; j < 7; j++) {
			var tmp = option_factory['series'][i]['data'][j];
			var xx = ( tmp < 0)?" ":tmp;
			$("#w"+i).append("<td>"+xx+"</td");
		};
	};
}

var Eng2Zh = ['周日','周一','周二','周三',	'周四','周五','周六'];
var mm ;
function configSortedTable(monthData){
	mm = monthData;
	var row = 0;
	var dataNew = Array();
	for (var i = 0; i < monthData['length']; i++) {
		var ref = monthData['data'][i];
		for( j in ref){
			if( ref[j] > 0){
				var x = new Date(parseInt(j)*1000);
				dataNew[row] = new Array();
				dataNew[row][0] = x.toISOString().substr(0,10);//(x.getMonth()+1)+"."+x.getDate();
				dataNew[row][1] = Eng2Zh[x.getDay()];
				dataNew[row][2] = ref[j];
				row++;
			}
		}
	};

	$("#example").DataTable({
		data: dataNew,
		rows:[
			{title: "日期"},
			{title: "星期"},
			{title: "人数"}
		],
		searching: false,
		processing: true,
		paging: false,
		info: false
	});
}

function initialize(){
	document.getElementById("onemHeat").innerHTML = "";
	document.getElementById("onewTable").innerHTML = "";
	document.getElementById("sortedTable").innerHTML = "";

	$("#onewTable").append("<table class='table table-striped'><thead class='weekhead'></thead><tbody></tbody></table>");
	$("#sortedTable").append("<table id='example' class='display' cellspacing='0' width='100%' ><thead><tr><th>日期</th><th>星期</th><th>人数</th></tr></thead><tfoot><tr><th>日期</th><th>星期</th><th>人数</th></tr></tfoot></table>");
}

 //直方图handle
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

