@extends('layouts.master')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/" method="get">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kesatuan / Polda</label>
                                    <select class="form-control" id="polda" name="polda">
                                        <option value="">Semua</option>
                                        @foreach ($poldas as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Pangkat</label>
                                    <select class="form-control" id="pangkat" name="pangkat">
                                        <option value="">Semua</option>
                                        @foreach ($pangkats as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">.</label>
                                    <button class="btn btn-primary form-control">Filter</button>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Pelanggaran</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ count($pelanggarans) }}</h2>
                            {{-- <p class="text-white mb-0">{{ date('Y') }}</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-child"></i></span>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pelanggaran Narkoba</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $totalPelanggarNarkoba }}</h2>
                            <p class="text-white mb-0">
                                {{ number_format(($totalPelanggarNarkoba / count($pelanggarans)) * 100, 2) }}%</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-exclamation-circle"></i></span>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pelanggaran Disiplin</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $disiplin }}</h2>
                            <p class="text-white mb-0">
                                {{ $disiplin == 0 ? 0 : number_format(($disiplin / count($pelanggarans)) * 100, 2) }}%</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pelanggaran Kode Etik</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $kodeEtik }}</h2>
                            <p class="text-white mb-0">
                                {{ $kodeEtik == 0 ? 0 : number_format(($kodeEtik / count($pelanggarans)) * 100, 2) }}%</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-anchor"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Jenis Kelamin</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chartGender"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Data Pelanggaran Pidana</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chartWpp"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Pangkat Pelanggar</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chartPangkatPelanggaran"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <div class="card" style="height: 300px">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Jenis Narkoba</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chartJenisNarkoba"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="height: 300px">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Jumlah Pelanggaran Anggota Polri terhadap penyalahgunaan Narkoba</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Peran</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyalahGunaanNarkoba as $index => $value)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><b>{{ $penyalahGunaanNarkoba->sum('total') }}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <div id="chartWujudPerbuatan"></div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="height: 300px">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Data keterlibatan anggota Polri pada kasus pungli dan korupsi</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chartPungli"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Wujud Perbuatan Pelanggaran</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jenis Pelanggaran</th>
                                    <th scope="col">Wujud Perbuatan</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataWujudPerbuatan as $index => $value)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $value->type }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><b>{{ $dataWujudPerbuatan->sum('total') }}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <div id="chartWujudPerbuatan"></div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Data Pelanggar Berdasarkan Wilayah</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="bar_chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        #bar_chart {
            width: 100%;
            height: 500px;
        }

        #chartWujudPerbuatan {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script>
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end
            var dataChart = {!! json_encode($chartPolda, true) !!}
            // Create chart instance
            var chart = am4core.create("bar_chart", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            // Add data
            chart.data = dataChart

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "name";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "total";
            series.dataFields.categoryX = "name";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            // on hover, make corner radiuses bigger
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;

            series.columns.template.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            // Cursor
            chart.cursor = new am4charts.XYCursor();

        }); // end am4core.ready()

        am4core.ready(function() {
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartGender", am4charts.PieChart);
            var dataChart = {!! json_encode($dataByGender, true) !!}

            // Add data
            chart.data = dataChart

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "total";
            pieSeries.dataFields.category = "gender";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            // This creates initial animation
            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

        })

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart
            var dataChart = {!! json_encode($dataByWpp, true) !!}
            var chart = am4core.create("chartWpp", am4charts.PieChart);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

            chart.data = dataChart

            var series = chart.series.push(new am4charts.PieSeries());
            series.dataFields.value = "total";
            series.dataFields.radiusValue = "total";
            series.dataFields.category = "name";
            series.slices.template.cornerRadius = 6;
            series.colors.step = 3;

            series.hiddenState.properties.endAngle = -90;

            // chart.legend = new am4charts.Legend();

        });


        am4core.ready(function() {


            var dataChart = {!! json_encode($dataWujudPerbuatan, true) !!}
            // chart.data = dataChart

            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartWujudPerbuatan", am4charts.XYChart3D);
            chart.paddingBottom = 30;
            chart.angle = 35;

            // Add data
            chart.data = dataChart

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "name";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.inside = true;
            categoryAxis.renderer.grid.template.disabled = true;

            let labelTemplate = categoryAxis.renderer.labels.template;
            labelTemplate.rotation = -90;
            labelTemplate.horizontalCenter = "left";
            labelTemplate.verticalCenter = "middle";
            labelTemplate.dy = 10; // moves it a bit down;
            labelTemplate.inside =
                false; // this is done to avoid settings which are not suitable when label is rotated

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.grid.template.disabled = true;

            // Create series
            var series = chart.series.push(new am4charts.ConeSeries());
            series.dataFields.valueY = "total";
            series.dataFields.categoryX = "name";

            var columnTemplate = series.columns.template;
            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })
        })

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartPangkatPelanggaran", am4charts.PieChart);

            // Set data
            var dataChart = {!! json_encode($dataPangkatPelanggar, true) !!}
            var selected;
            var types = dataChart
            // var types = [{
            //     type: "Fossil Energy",
            //     percent: 70,
            //     color: chart.colors.getIndex(0),
            //     subs: [{
            //         type: "Oil",
            //         percent: 15
            //     }, {
            //         type: "Coal",
            //         percent: 35
            //     }, {
            //         type: "Nuclear",
            //         percent: 20
            //     }]
            // }, {
            //     type: "Green Energy",
            //     percent: 30,
            //     color: chart.colors.getIndex(1),
            //     subs: [{
            //         type: "Hydro",
            //         percent: 15
            //     }, {
            //         type: "Wind",
            //         percent: 10
            //     }, {
            //         type: "Other",
            //         percent: 5
            //     }]
            // }];

            // Add data
            chart.data = generateChartData();

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "percent";
            pieSeries.dataFields.category = "type";
            pieSeries.slices.template.propertyFields.fill = "color";
            pieSeries.slices.template.propertyFields.isActive = "pulled";
            pieSeries.slices.template.strokeWidth = 0;

            function generateChartData() {
                var chartData = [];
                for (var i = 0; i < types.length; i++) {
                    if (i == selected) {
                        for (var x = 0; x < types[i].subs.length; x++) {
                            chartData.push({
                                type: types[i].subs[x].type,
                                percent: types[i].subs[x].percent,
                                color: chart.colors.getIndex(i + 1),
                                pulled: true
                            });
                        }
                    } else {
                        chartData.push({
                            type: types[i].type,
                            percent: types[i].percent,
                            color: chart.colors.getIndex(i + 1),
                            id: i
                        });
                    }
                }
                return chartData;
            }

            pieSeries.slices.template.events.on("hit", function(event) {
                if (event.target.dataItem.dataContext.id != undefined) {
                    selected = event.target.dataItem.dataContext.id;
                } else {
                    selected = undefined;
                }
                chart.data = generateChartData();
            });

        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chartPungli", am4charts.PieChart);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
            var dataChart = {!! json_encode($dataPungli, true) !!}
            chart.data = dataChart

            chart.radius = am4core.percent(70);
            chart.innerRadius = am4core.percent(40);
            chart.startAngle = 180;
            chart.endAngle = 360;

            var series = chart.series.push(new am4charts.PieSeries());
            series.dataFields.value = "total";
            series.dataFields.category = "name";

            series.slices.template.cornerRadius = 10;
            series.slices.template.innerCornerRadius = 2;
            series.slices.template.draggable = true;
            series.slices.template.inert = true;
            series.alignLabels = false;

            series.hiddenState.properties.startAngle = 90;
            series.hiddenState.properties.endAngle = 90;

            // chart.legend = new am4charts.Legend();

        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartJenisNarkoba", am4charts.PieChart);

            // Add data
            var dataChart = {!! json_encode($jenisNarkoba, true) !!}
            chart.data = dataChart

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "total";
            pieSeries.dataFields.category = "name";
            pieSeries.innerRadius = am4core.percent(50);
            pieSeries.ticks.template.disabled = true;
            pieSeries.labels.template.disabled = true;

            var rgm = new am4core.RadialGradientModifier();
            rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, -0.5);
            pieSeries.slices.template.fillModifier = rgm;
            pieSeries.slices.template.strokeModifier = rgm;
            pieSeries.slices.template.strokeOpacity = 0.4;
            pieSeries.slices.template.strokeWidth = 0;

            // chart.legend = new am4charts.Legend();
            // chart.legend.position = "right";

        });
    </script>
@endpush
