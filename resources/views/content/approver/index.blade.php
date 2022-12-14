@extends('layouts.master')

@section('style')
<style>
#chartPieBerkas {
    width: 100%;
    height: 300px;
}

#chartLinePPAT {
    width: 100%;
    height: 300px;
}

#chartColBerkas {
    width: 100%;
    height: 300px;
}

#chartDonutBerkas {
    width: 100%;
    height: 300px;
}
</style>
@endsection

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1" style="height: 100px">
                <div class="card-body">
                    <span class="float-right display-4 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    <h3 class="card-title text-white">Jumlah Permohonan - <?php echo date('Y'); ?></h3>
                    <div class="d-inline-block">
                        <h4 class="text-white">0</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2" style="height: 100px">
                <div class="card-body">
                    <span class="float-right display-4 opacity-5"><i class="fa fa-money"></i></span>
                    <h3 class="card-title text-white">Berkas Selesai - <?php echo date('Y'); ?></h3>
                    <div class="d-inline-block">
                        <h4 class="text-white">0</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3" style="height: 100px">
                <div class="card-body">
                    <span class="float-right display-4 opacity-5"><i class="fa fa-users"></i></span>
                    <h3 class="card-title text-white">Jumlah Pemohon - <?php echo date('Y'); ?></h3>
                    <div class="d-inline-block">
                        <h4 class="text-white">4565</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4" style="height: 100px">
                <div class="card-body">
                    <span class="float-right display-4 opacity-5"><i class="fa fa-heart"></i></span>
                    <h3 class="card-title text-white">Total Trasansaksi - <?php echo date('Y'); ?></h3>
                    <div class="d-inline-block">
                        <h4 class="text-white">99%</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div id="chartLinePPAT"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div id="chartPieBerkas"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div id="chartColBerkas"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div id="chartDonutBerkas"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">


            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<script>
// chartPieBerkas
am4core.ready(function() {
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartPieBerkas", am4charts.PieChart);
    chart.startAngle = 160;
    chart.endAngle = 380;

    // Let's cut a hole in our Pie chart the size of 40% the radius
    chart.innerRadius = am4core.percent(40);

    // Add data
    chart.data = [{
        "status": "Pengajuan",
        "count": 1500
    }, {
        "status": "Verifikasi",
        "count": 990
    }, {
        "status": "Disetujui",
        "count": 785
    }, {
        "status": "Dibatalkan",
        "count": 255
    }, {
        "status": "Dibayar / Selesai",
        "count": 452
    }];

    chart.data = <?php echo json_encode($dataPerbandinganBerkas); ?>;

    // Chart title
    var title = chart.titles.create();
    title.text = "Perbandingan proses Berkas pengajuan.";
    title.fontSize = 16;
    title.paddingBottom = 10;

    // Add second series
    var pieSeries2 = chart.series.push(new am4charts.PieSeries());
    pieSeries2.dataFields.value = "count";
    pieSeries2.dataFields.category = "status";
    pieSeries2.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
    pieSeries2.slices.template.strokeWidth = 1;
    pieSeries2.slices.template.strokeOpacity = 1;
    pieSeries2.slices.template.states.getKey("hover").properties.shiftRadius = 0.05;
    pieSeries2.slices.template.states.getKey("hover").properties.scale = 1;

    pieSeries2.labels.template.disabled = true;
    pieSeries2.ticks.template.disabled = true;


    var label = chart.seriesContainer.createChild(am4core.Label);
    label.textAlign = "middle";
    label.horizontalCenter = "middle";
    label.verticalCenter = "middle";
    label.adapter.add("text", function(text, target) {
        return "[font-size:18px]Total berkas[/]:\n[bold font-size:30px]" + pieSeries2.dataItem
            .values.value.sum + "[/]";
    })
    chart.legend = new am4charts.Legend();
    chart.legend.position = "right";

}); // end am4core.ready()
// chartLinePPAT
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chartData = <?php echo json_encode($dataPengajuanAllUser); ?>;
    var chart = am4core.create("chartLinePPAT", am4charts.XYChart);
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0.5;
    dateAxis.dateFormatter.inputDateFormat = "yyyyMMdd";
    dateAxis.renderer.inside = true;
    dateAxis.renderer.labels.template.rotation = 270;
    dateAxis.renderer.minGridDistance = 0;
    if (chartData.Period == "monthly") {
        dateAxis.tooltipDateFormat = "MMM, yyyy";
        dateAxis.dateFormats.setKey("month", "MMM");
    } else {
        dateAxis.tooltipDateFormat = "dd MMM, yyyy";
    }

    chart.data = chartData.Data;


    // Chart title
    var title = chart.titles.create();
    title.text = "Jumlah Pengajuan berdasarkan User.";
    title.fontSize = 14;
    title.paddingBottom = 5;
    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());


    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.cursorTooltipEnabled = false;

    function createLineSeries(value, name) {
        // Create series
        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = value;
        series.dataFields.dateX = "date";

        series.strokeWidth = 2;
        series.minBulletDistance = 10;
        series.tooltipText = "{dateX}:[/] {valueY}";
        series.tooltip.pointerOrientation = "vertical";
        series.name = name;
        var bullet = series.bullets.push(new am4charts.CircleBullet());
    }

    var i = 0;
    while (i < chartData.Keys.length) {
        createLineSeries(chartData.Keys[i].key, chartData.Keys[i].name);
        i++;
    }

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.xAxis = dateAxis;

    chart.legend = new am4charts.Legend();
    chart.legend.position = "right";
    chart.legend.scrollable = true;
    chart.legend.itemContainers.template.paddingLeft = 0;
    chart.legend.itemContainers.template.paddingTop = 0;
});
// chartColBerkas
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartColBerkas", am4charts.XYChart);

    // Export
    chart.exporting.menu = new am4core.ExportMenu();

    // Data for both series
    var data = [{
        "date": "2009",
        "value": 23.5,
        "movement": 21.1
    }, {
        "date": "2010",
        "value": 26.2,
        "movement": 30.5
    }, {
        "date": "2011",
        "value": 30.1,
        "movement": 34.9
    }, {
        "date": "2012",
        "value": 29.5,
        "movement": 31.1
    }];

    chart.data = {
        !!json_encode($dataPergerakanPendapatan['Data']) !!
    };

    // Chart title
    var title = chart.titles.create();
    title.text = "Pergerakan jumlah pendapatan.";
    title.fontSize = 14;
    title.paddingBottom = 5;

    /* Create axes */
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "date";
    categoryAxis.renderer.minGridDistance = 0;
    categoryAxis.renderer.labels.template.rotation = 270;

    /* Create value axis */
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    /* Create series */
    var columnSeries = chart.series.push(new am4charts.ColumnSeries());
    columnSeries.name = "Pendapatan";
    columnSeries.dataFields.valueY = "value";
    columnSeries.dataFields.categoryX = "date";

    columnSeries.columns.template.tooltipText =
        "[#fff font-size: 14px]{name} in {categoryX.formatDate('yyyy-mm')}:\n[/][#fff font-size: 14px]{valueY}[/] [#fff]{additional}[/]"
    columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
    columnSeries.columns.template.propertyFields.stroke = "stroke";
    columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
    columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
    columnSeries.tooltip.label.textAlign = "middle";

    // Pareto axes
    var paretoValueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    paretoValueAxis.renderer.opposite = true;
    paretoValueAxis.min = -100;
    paretoValueAxis.max = 100;
    paretoValueAxis.strictMinMax = true;
    paretoValueAxis.renderer.grid.template.disabled = true;
    paretoValueAxis.numberFormatter = new am4core.NumberFormatter();
    paretoValueAxis.numberFormatter.numberFormat = "#'%'"
    paretoValueAxis.cursorTooltipEnabled = false;

    var lineSeries = chart.series.push(new am4charts.LineSeries());
    lineSeries.name = "Perubahan";
    lineSeries.dataFields.valueY = "movement";
    lineSeries.dataFields.categoryX = "date";
    lineSeries.yAxis = paretoValueAxis;
    lineSeries.stroke = am4core.color("#fdd400");
    lineSeries.strokeWidth = 3;
    lineSeries.propertyFields.strokeDasharray = "lineDash";
    lineSeries.tooltip.label.textAlign = "middle";

    var bullet = lineSeries.bullets.push(new am4charts.Bullet());
    bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
    bullet.tooltipText =
        "[#fff font-size: 15px]{name} in {categoryX.formatDate('yyyy-mm')}:\n[/][#fff font-size: 14px]{valueY}[/] [#fff]{additional}[/]"
    var circle = bullet.createChild(am4core.Circle);
    circle.radius = 4;
    circle.fill = am4core.color("#fff");
    circle.strokeWidth = 3;

    //chart.data = data;

});

// Chart donut berkas
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartDonutBerkas", am4charts.PieChart);

    // Add data
    chart.data = [{
        "country": "Lithuania",
        "litres": 501.9
    }, {
        "country": "Czech Republic",
        "litres": 301.9
    }, {
        "country": "Ireland",
        "litres": 201.1
    }, {
        "country": "Germany",
        "litres": 165.8
    }, {
        "country": "Australia",
        "litres": 139.9
    }, {
        "country": "Austria",
        "litres": 128.3
    }, {
        "country": "UK",
        "litres": 99
    }, {
        "country": "Belgium",
        "litres": 60
    }, {
        "country": "The Netherlands",
        "litres": 50
    }];

    chart.data = {
        !!json_encode($dataListJenisTrx['Data']) !!
    };

    // Chart title
    var title = chart.titles.create();
    title.text = "Jenis Transaksi Pengajuan";
    title.fontSize = 14;
    title.paddingBottom = 5;

    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "value";
    pieSeries.dataFields.category = "type";
    pieSeries.innerRadius = am4core.percent(50);
    pieSeries.ticks.template.disabled = true;
    pieSeries.labels.template.disabled = true;

    var rgm = new am4core.RadialGradientModifier();
    rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, -0.5);
    pieSeries.slices.template.fillModifier = rgm;
    pieSeries.slices.template.strokeModifier = rgm;
    pieSeries.slices.template.strokeOpacity = 0.4;
    pieSeries.slices.template.strokeWidth = 0;

    chart.legend = new am4charts.Legend();
    chart.legend.position = "right";
    chart.legend.scrollable = true;

}); // end am4core.ready()
</script>
@endsection