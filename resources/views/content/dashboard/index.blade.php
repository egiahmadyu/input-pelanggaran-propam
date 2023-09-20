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
                                        <label
                                            for="exampleFormControlInput1">{{ auth()->user()->getRoleNames()[0] == 'polda'? 'Polres / Satker/ Fungsi': 'Kesatuan / Polda' }}</label>

                                        @if (auth()->user()->getRoleNames()[0] == 'polda')
                                            <select class="form-control" id="polres" name="polres">
                                                <option value="">Polres / Satker/ Fungsi</option>
                                                @foreach ($list_polres as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="form-control" id="polda" name="polda">
                                                <option value="">Polda</option>
                                                @foreach ($poldas as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif


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
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Jenis Kelamin</label>
                                        <select class="form-control" id="pangkat" name="jenis_kelamin">
                                            <option value="">Semua</option>
                                            <option value="1">Laki - Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tangal Mulai</label>
                                        <input type="date" name="tangal_mulai" id="tanggal_mulai" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tanggal Akhir</label>
                                        <input type="date" name="tangal_akhir" id="tanggal_akhir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">.</label>
                                        <button class="btn btn-primary form-control" type="submit" value="filter"
                                            name="submit">Filter</button>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Pelanggaran</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ count($pelanggarans) }}</h2>
                                    {{-- <p class="text-white mb-0">{{ date('Y') }}</p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-exclamation-circle"
                                        aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Penyelesaian Pelanggaran
                                    {{ count($disiplin_selesai) + count($kepp_selesai) }}</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        {{ count($disiplin_selesai) + count($kepp_selesai) == 0 ? 0 : number_format(((count($disiplin_selesai) + count($kepp_selesai)) / count($pelanggarans)) * 100, 1) }}%
                                    </h2>
                                    {{-- <p class="text-white mb-0">{{ date('Y') }}</p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-exclamation-circle"
                                        aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pelanggaran Disiplin {{ $disiplin }}</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        {{ $disiplin == 0 ? 0 : number_format(($disiplin / count($pelanggarans)) * 100) }}%
                                    </h2>
                                    {{-- <p class="text-white mb-0">

                                    </p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Penyelesaian Disiplin {{ count($disiplin_selesai) }}</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        {{ $disiplin == 0 ? 0 : number_format(count($disiplin_selesai) / $disiplin, 2) * 100 }}%
                                    </h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pelanggaran Kode Etik {{ $kodeEtik }}</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        {{ $kodeEtik == 0 ? 0 : number_format(($kodeEtik / count($pelanggarans)) * 100, 2) }}%
                                    </h2>
                                    {{-- <p class="text-white mb-0">

                                    </p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-anchor"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Penyelesaian Kode Etik {{ count($kepp_selesai) }}</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        {{ count($kepp_selesai) == 0 ? 0 : number_format((count($kepp_selesai) / $kodeEtik) * 100, 2) }}%
                                    </h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-anchor"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
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

            <div class="col-lg-6">
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

            <div class="col-lg-6">
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
            <div class="col-lg-6">
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
        </div>

        <div class="row">
            <div class="col-lg-12">
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
            {{-- <div class="col-lg-6">
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
            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Putusan Disiplin</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Putusan</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($putusans_disiplin as $index => $value)
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
                                    <td><b>{{ $putusans_disiplin->sum('total') }}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <div id="chartWujudPerbuatan"></div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">Putusan KEPP</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Putusan</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($putusans_kepp as $index => $value)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div id="chartWujudPerbuatan"></div> --}}
                    </div>
                </div>
            </div>
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
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">5 Wujud Perbuatan Pelanggaran Disiplin</h4><a href="/export/disiplin"
                                class="btn btn-sm btn-info">Export</a>
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
                                @foreach ($dataWujudPerbuatanDisiplin as $index => $value)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $value->type }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div id="chartWujudPerbuatan"></div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">5 Wujud Perbuatan Pelanggaran KEPP</h4> <a href="/export/kepp"
                                class="btn btn-sm btn-info">Export</a>
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
                                @foreach ($dataWujudPerbuatanKepp as $index => $value)
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
                                    <td><b>{{ $dataWujudPerbuatanKepp->sum('total') }}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <div id="chartWujudPerbuatan"></div> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
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
        </div> --}}
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
                                <div id="chart_new"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->getRoleNames()[0] != 'admin')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pb-0 d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-1">Data Pelanggar Berdasarkan Wilayah Polres</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="chart_new_polres"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('style')
    <style>
        #bar_chart {
            width: 100%;
            height: 500px;
        }

        #chart_new {
            width: 100%;
            height: 500px;
        }

        #chart_new_polres {
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
        $(document).ready(function() {
            const dayText = {
                en: "Su,Mo,Tu,We,Th,Fr,Sa".split(","),
                id: "Mi,Se,Sl,Ra,Ka,Ju,Sa".split(","),
            };

            const monthText = {
                en: "January,February,March,April,May,June,July,Augustus,September,October,November,December"
                    .split(
                        ","
                    ),
                id: "Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember"
                    .split(
                        ","
                    ),
            };

            const todayText = {
                en: "Today",
                id: "Hari ini",
            };

            $("#tanggal_akhir").pDatePicker({
                lang: "id"
            });
            $("#tanggal_mulai").pDatePicker({
                lang: "id"
            });
        })

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

            // // Themes begin
            // am4core.useTheme(am4themes_animated);
            // // Themes end

            // // Create chart
            // var dataChart = {!! json_encode($dataByWpp, true) !!}
            // var chart = am4core.create("chartWpp", am4charts.PieChart);
            // chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

            // chart.data = dataChart

            // var series = chart.series.push(new am4charts.PieSeries());
            // series.dataFields.value = "total";
            // series.dataFields.radiusValue = "total";
            // series.dataFields.category = "name";
            // series.slices.template.cornerRadius = 6;
            // series.colors.step = 3;

            // series.hiddenState.properties.endAngle = -90;

            // chart.legend = new am4charts.Legend();
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartWpp", am4charts.PieChart);
            var dataChart = {!! json_encode($dataByWpp, true) !!}

            // Add data
            chart.data = dataChart

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "total";
            pieSeries.dataFields.category = "name";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            // This creates initial animation
            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

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

        /**
         * ---------------------------------------
         * This demo was created using amCharts 4.
         *
         * For more information visit:
         * https://www.amcharts.com/
         *
         * Documentation is available at:
         * https://www.amcharts.com/docs/v4/
         * ---------------------------------------
         */

        am4core.ready(function() {
            /**
             * ---------------------------------------
             * This demo was created using amCharts 4.
             *
             * For more information visit:
             * https://www.amcharts.com/
             *
             * Documentation is available at:
             * https://www.amcharts.com/docs/v4/
             * ---------------------------------------
             */

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end


            var chart = am4core.create('chart_new', am4charts.XYChart)
            chart.colors.step = 2;

            chart.legend = new am4charts.Legend()
            chart.legend.position = 'top'
            chart.legend.paddingBottom = 20
            chart.legend.labels.template.maxWidth = 95

            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
            xAxis.dataFields.category = 'name'
            xAxis.renderer.cellStartLocation = 0.1
            xAxis.renderer.cellEndLocation = 0.9
            xAxis.renderer.grid.template.location = 0;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries())
                series.dataFields.valueY = value
                series.dataFields.categoryX = 'name'
                series.name = name

                series.events.on("hidden", arrangeColumns);
                series.events.on("shown", arrangeColumns);

                var bullet = series.bullets.push(new am4charts.LabelBullet())
                bullet.interactionsEnabled = false
                bullet.dy = 30;
                bullet.label.text = '{valueY}'
                bullet.label.fill = am4core.color('#ffffff')

                return series;
            }
            var dataChart = {!! json_encode($chartPoldaNew, true) !!}

            chart.data = dataChart


            createSeries('total', 'Total Pelanggaran');
            createSeries('selesai', 'Total Pelanggaran Selesai');

            function arrangeColumns() {

                var series = chart.series.getIndex(0);

                var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
                if (series.dataItems.length > 1) {
                    var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                    var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                    var delta = ((x1 - x0) / chart.series.length) * w;
                    if (am4core.isNumber(delta)) {
                        var middle = chart.series.length / 2;

                        var newIndex = 0;
                        chart.series.each(function(series) {
                            if (!series.isHidden && !series.isHiding) {
                                series.dummyData = newIndex;
                                newIndex++;
                            } else {
                                series.dummyData = chart.series.indexOf(series);
                            }
                        })
                        var visibleCount = newIndex;
                        var newMiddle = visibleCount / 2;

                        chart.series.each(function(series) {
                            var trueIndex = chart.series.indexOf(series);
                            var newIndex = series.dummyData;

                            var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                            series.animate({
                                property: "dx",
                                to: dx
                            }, series.interpolationDuration, series.interpolationEasing);
                            series.bulletsContainer.animate({
                                property: "dx",
                                to: dx
                            }, series.interpolationDuration, series.interpolationEasing);
                        })
                    }
                }
            }
        })

        @if (auth()->user()->getRoleNames()[0] != 'admin')
            am4core.ready(function() {
                /**
                 * ---------------------------------------
                 * This demo was created using amCharts 4.
                 *
                 * For more information visit:
                 * https://www.amcharts.com/
                 *
                 * Documentation is available at:
                 * https://www.amcharts.com/docs/v4/
                 * ---------------------------------------
                 */

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end


                var chart = am4core.create('chart_new_polres', am4charts.XYChart)
                chart.colors.step = 2;

                chart.legend = new am4charts.Legend()
                chart.legend.position = 'top'
                chart.legend.paddingBottom = 20
                chart.legend.labels.template.maxWidth = 95

                var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
                xAxis.dataFields.category = 'name'
                xAxis.renderer.cellStartLocation = 0.1
                xAxis.renderer.cellEndLocation = 0.9
                xAxis.renderer.grid.template.location = 0;

                var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
                yAxis.min = 0;

                function createSeries(value, name) {
                    var series = chart.series.push(new am4charts.ColumnSeries())
                    series.dataFields.valueY = value
                    series.dataFields.categoryX = 'name'
                    series.name = name

                    series.events.on("hidden", arrangeColumns);
                    series.events.on("shown", arrangeColumns);

                    var bullet = series.bullets.push(new am4charts.LabelBullet())
                    bullet.interactionsEnabled = false
                    bullet.dy = 30;
                    bullet.label.text = '{valueY}'
                    bullet.label.fill = am4core.color('#ffffff')

                    return series;
                }
                var dataChart = {!! json_encode($chart_polres, true) !!}

                chart.data = dataChart


                createSeries('total', 'Total Pelanggaran');
                createSeries('selesai', 'Total Pelanggaran Selesai');

                function arrangeColumns() {

                    var series = chart.series.getIndex(0);

                    var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
                    if (series.dataItems.length > 1) {
                        var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                        var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                        var delta = ((x1 - x0) / chart.series.length) * w;
                        if (am4core.isNumber(delta)) {
                            var middle = chart.series.length / 2;

                            var newIndex = 0;
                            chart.series.each(function(series) {
                                if (!series.isHidden && !series.isHiding) {
                                    series.dummyData = newIndex;
                                    newIndex++;
                                } else {
                                    series.dummyData = chart.series.indexOf(series);
                                }
                            })
                            var visibleCount = newIndex;
                            var newMiddle = visibleCount / 2;

                            chart.series.each(function(series) {
                                var trueIndex = chart.series.indexOf(series);
                                var newIndex = series.dummyData;

                                var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                                series.animate({
                                    property: "dx",
                                    to: dx
                                }, series.interpolationDuration, series.interpolationEasing);
                                series.bulletsContainer.animate({
                                    property: "dx",
                                    to: dx
                                }, series.interpolationDuration, series.interpolationEasing);
                            })
                        }
                    }
                }
            })
        @endif
    </script>
@endpush
