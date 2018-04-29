<!DOCTYPE HTML>
<html>
<body>

<h1>My Web Page</h1>

<div style ="align:center;" id="piechart"></div>

<script type="text/javascript" src="gstatic/loader.js"></script>


<script type="text/javascript">

//Load google charts

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

//Draw the chart and set the chart values
function drawChart() {
	
	var data = google.visualization.arrayToDataTable([
	['Task', 'Hours per Day'],
	['Severly Wasted', 100],
	['Wasted',20],
	['Normal',4],
	['Overweight',2],
	['Obese',8]
	
]);

//Optional; add a title and set the width and height of chart
	var options = {'title':'Nutrition Status', 'width':1000, 'height':800};

//Display the chart inside the <div> element with id="piechart"
	var chart = new 
google.visualization.PieChart(document.getElementById('piechart'));
	chart.draw(data,options);

}


</script>

</body>
</html>