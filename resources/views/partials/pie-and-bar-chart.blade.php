<?php
$dataPoints = array(
    array("label" => "Sales", "y" => 780000),
    array("label" => "Purchases", "y" => 540000),
    array("label" => "Expenses", "y" => 215000)
);

$dataPointsBar = array(
    array("label" => "Jan", "y" => 345000),
    array("label" => "Feb", "y" => 289000),
    array("label" => "Mar", "y" => 198000),
    array("label" => "Apr", "y" => 97000),
    array("label" => "May", "y" => 45000),
    array("label" => "Jun", "y" => 175000),
    array("label" => "Jul", "y" => 260000),
    array("label" => "Aug", "y" => 310000),
    array("label" => "Sep", "y" => 220000),
    array("label" => "Oct", "y" => 275000),
    array("label" => "Nov", "y" => 195000),
    array("label" => "Dec", "y" => 410000)
);
?>

<!-- Chart Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">

    <!-- Pie Chart -->
    <div class="bg-white p-4 rounded-xl shadow">
        <div class="font-semibold mb-2">Sales Distribution</div>
        <div id="chartContainer" class="w-full h-64"></div>
    </div>

    <!-- Bar Chart -->
    <div class="bg-white p-4 rounded-xl shadow">
        <div class="font-semibold mb-2">Monthly Performance</div>
        <div id="chartBarContainer" class="w-full h-64"></div>
    </div>

</div>
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Sales, Purchases and Expenses"
        },

        data: [{
            type: "pie",
            yValueFormatString: "#,##0.00\"%\"",
            indexLabel: "{label} ({y})",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

   var chartBar = new CanvasJS.Chart("chartBarContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "POS Sales Summary"
	},
	axisY: {
		title: "Sales (in UGX)"
	},
	data: [{
		type: "column",
		yValueFormatString: "UGX#,##0",
		dataPoints: <?php echo json_encode($dataPointsBar, JSON_NUMERIC_CHECK); ?>
	}]
});
chartBar.render();
}




</script>
