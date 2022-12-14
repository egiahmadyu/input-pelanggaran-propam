@extends('layouts.master')

@section('style')
    <style>
        #chartPieBerkas {
            width: 100%;
            height: 220px;
        }

        #chartLine1 {
            width: 100%;
            height: 530px;
        }

        #chartDokumen {
            width: 100%;
            height: 220px;
        }

        #mapOPNotaris {
            height: 250px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tanggal : </label>
                                    <input type="text" class="form-control daterange-basic" id="rangeDate"
                                        value="01/01/2021 - <?php echo $tanggalMax; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Jenis Transaksi : </label>
                                    <select name="jenisID" id="jenisID" class="form-control">

                                        <option value="all">Semua</option>
                                        <?php
                                        $resultJenis = DB::select("select *from ref_jenis_transaksi");
                                        foreach ($resultJenis as $result) : ?>
                                        <option value="<?php echo $result->rjt_id; ?>"><?php echo $result->rjt_nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Status : </label>
                                    <select name="dokumenID" id="dokumenID" class="form-control">

                                        <option value="all">Semua</option>
                                        <?php foreach ($listStatus as $result) : ?>
                                        <option value="<?php echo $result->rsd_id; ?>"><?php echo $result->rsd_nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label for="">&nbsp;</label>
                                <button class="btn btn-primary btn-sm" id="filterData" style="width: 100%;">Cari
                                    Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <div class="card gradient-1">
                    <div class="card-body px-2">
                        <div class="media">
                            {{-- <span class="card-widget__icon"><i class="icon-home" style="width:5px"></i></span> --}}
                            <div class="media-body">
                                <h4 class="card-widget__title"><?php echo $summaryRiwayatPendaftaran[0] . ' / ' . $summaryRiwayatPendaftaran[4]; ?></h4>
                                <h5 class="card-widget__subtitle">Dokumen Pengajuan / Direvisi</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card gradient-1">
                    <div class="card-body px-2">
                        <div class="media">
                            {{-- <span class="float-right display-4"><i class="icon-home"></i></span> --}}
                            <div class="media-body">
                                <h4 class="card-widget__title"><?php echo $summaryRiwayatPendaftaran[1]; ?></h4>
                                <h5 class="card-widget__subtitle">Dokumen Diperiksa</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card gradient-1">
                    <div class="card-body px-2">
                        <div class="media">
                            {{-- <span class="float-right display-4"><i class="icon-home"></i></span> --}}
                            <div class="media-body">
                                <h4 class="card-widget__title"><?php echo $summaryRiwayatPendaftaran[2]; ?></h4>
                                <h5 class="card-widget__subtitle">Dokumen Disetujui</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card gradient-1">
                    <div class="card-body px-2">
                        <div class="media">
                            {{-- <span class="float-right display-4"><i class="icon-home"></i></span> --}}
                            <div class="media-body">
                                <h4 class="card-widget__title"><?php echo $summaryRiwayatPendaftaran[3]; ?></h4>
                                <h5 class="card-widget__subtitle">Dokumen Ditolak</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card gradient-1">
                    <div class="card-body px-2">
                        <div class="media">
                            {{-- <span class="float-right display-4"><i class="icon-home"></i></span> --}}
                            <div class="media-body">
                                <h4 class="card-widget__title"><?php echo $summaryRiwayatPendaftaran[6]; ?></h4>
                                <h5 class="card-widget__subtitle">Dokumen Dibatalkan</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card gradient-1">
                    <div class="card-body px-2">
                        <div class="media">
                            {{-- <span class="float-right display-4"><i class="icon-home"></i></span> --}}
                            <div class="media-body">
                                <h4 class="card-widget__title"><?php echo $summaryRiwayatPendaftaran[5]; ?></h4>
                                <h5 class="card-widget__subtitle">Dokumen Selesai</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="chartLine1"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="chartPieBerkas"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="chartDokumen"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-bordered" style="padding:1em" id="buzz">
                            <table class="table table-bordered" id="tablePendaftaran">
                                <thead>
                                    <tr style="color:white;background-color: #424d63;color:white;text-align:center">
                                        <th style="width:3%;">No. Dok</th>
                                        <th style="width:7%;">Tanggal Pengajuan</th>
                                        <th style="width:7%;">Tanggal Rekam</th>
                                        <th style="width:7%;">Jenis Transaksi</th>
                                        <th style="width:10%;">NIK</th>
                                        <th style="width:10%;">Nama WP</th>
                                        <th style="width:10%;">Nilai Transaksi</th>
                                        <th style="width:10%;">Nilai BPHTB</th>
                                        <th style="width:10%;">Status</th>
                                        <th style="width:10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="isiTable">
                                    <?php foreach ($listDokumen['Data'] as $result) : ?>
                                    <tr>
                                        <td><?php echo $result['tahun'] . '.' . $result['nomor']; ?></td>
                                        <td><?php echo $result['tanggalPengajuan']; ?></td>
                                        <td><?php echo $result['tanggalRekam']; ?></td>
                                        <td><?php echo $result['jenisTransaksi']; ?></td>
                                        <td><?php echo $result['NIK']; ?></td>
                                        <td><?php echo $result['namaWP']; ?></td>
                                        <td><?php echo 'Rp.' . number_format($result['hargaTransaksi']); ?></td>
                                        <td><?php echo 'Rp.' . number_format($result['BPHTB']); ?></td>
                                        <td><?php echo $result['statusDokumen']; ?></td>
                                        <td><button class="btn btn-primary btn-sm"
                                                onclick="detailModal('<?php echo $result['tahun']; ?>','<?php echo $result['nomor']; ?>')">Detail</button>
                                            <a class="btn btn-success btn-sm"
                                                href="/Admin/cetakPDF?tahun=<?php echo $result['tahun']; ?>&nomor=<?php echo $result['nomor']; ?>">Cetak</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        // chartLinePPAT
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chartData = {!! json_encode($dataPengajuanAllUser) !!};
            var chart = am4core.create("chartLine1", am4charts.XYChart);
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
    </script>

    <script>
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chartDokumen", am4charts.XYChart);
            chart.padding(40, 40, 40, 40);

            var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.dataFields.category = "status";
            categoryAxis.renderer.minGridDistance = 1;
            categoryAxis.renderer.inversed = true;
            categoryAxis.renderer.grid.template.disabled = true;

            var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.min = 0;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.categoryY = "status";
            series.dataFields.valueX = "count";
            series.tooltipText = "{valueX.value}"
            series.columns.template.strokeOpacity = 0;
            series.columns.template.column.cornerRadiusBottomRight = 5;
            series.columns.template.column.cornerRadiusTopRight = 5;
            series.columns.template.fill = "color"; // green fill
            var labelBullet = series.bullets.push(new am4charts.LabelBullet())
            labelBullet.label.horizontalCenter = "left";
            labelBullet.label.dx = 10;
            labelBullet.label.text = "{values.valueX.workingValue}";
            labelBullet.locationX = 1;

            // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
            series.columns.template.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            categoryAxis.sortBySeries = series;
            chart.data = {!! json_encode($dataPerbandinganBerkas) !!};




        });
    </script>

    <script>
        // chartPieBerkas
        am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end
            colors = [
                am4core.color("#214151"),
                am4core.color("#A2D0C1"),
                am4core.color("#EFF7E1"),
                am4core.color("#F8DC81"),
                am4core.color("#F4F5DB"),
                am4core.color("#D9DAB0"),

                am4core.color("#487E95"),
                am4core.color("#23689B")
            ];

            // Create chart instance
            chart = am4core.create("chartPieBerkas", am4charts.PieChart);
            chart.startAngle = 160;
            chart.endAngle = 380;

            // Let's cut a hole in our Pie chart the size of 40% the radius
            chart.innerRadius = am4core.percent(40);

            // Add data
            chart.data = {!! json_encode($summaryRiwayatChartPendaftaran) !!};


            // Chart title
            var title = chart.titles.create();
            title.text = "Perbandingan proses Berkas pengajuan.";
            title.fontSize = 16;
            title.paddingBottom = 10;

            // Add second series
            var pieSeries2 = chart.series.push(new am4charts.PieSeries());

            pieSeries2.dataFields.value = "count";
            pieSeries2.dataFields.category = "status";
            // pieSeries2.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
            pieSeries2.slices.template.strokeWidth = 1;
            pieSeries2.slices.template.strokeOpacity = 1;
            pieSeries2.slices.template.states.getKey("hover").properties.shiftRadius = 0.05;
            pieSeries2.slices.template.states.getKey("hover").properties.scale = 1;
            pieSeries2.slices.template.propertyFields.fill = colors;
            pieSeries2.labels.template.disabled = true;
            pieSeries2.ticks.template.disabled = true;


            var label = chart.seriesContainer.createChild(am4core.Label);
            label.textAlign = "middle";
            label.horizontalCenter = "middle";
            label.verticalCenter = "middle";
            label.adapter.add("text", function(text, target) {
                return "[font-size:12px]Total berkas[/]:\n[bold font-size:18px]" + pieSeries2.dataItem
                    .values.value.sum + "[/]";
            })
            chart.legend = new am4charts.Legend();
            chart.legend.position = "right";
            chart.legend.scrollable = true;

        }); // end am4core.ready()
    </script>
@endsection
