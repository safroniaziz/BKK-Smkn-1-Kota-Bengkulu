@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Operator SMK')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->nm_user }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->nm_user }}
    @endif
@endsection
@section('sidebar-menu')
    @include('operator/sidebar')
@endsection
@push('styles')
    <!-- Styles -->
    <style>
        #chartdiv, #chartdiv2 {
            width: 100%;
            height: 200px;
        }

        #chartdiv3, #chartdiv4 {
            width: 100%;
            height: 300px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Data Aplikasi
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>  </h3>

                                <p>Jumlah Alumni</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-red" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Alumni Bekerja</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-yellow" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Alumni Kuliah</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-wpforms"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-green" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Alumni Berwirausaha</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-check-circle"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>  </h3>

                                <p>Alumni Menganggur</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-red" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Jumlah Kerja Sama</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-yellow" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Jumlah Lowongan Tersedia</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-wpforms"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-green" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Jumlah Jurusan</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-check-circle"></i>
                                </div>
                                <a href="#" class="small-box-footer">Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row" style="margin-bottom:10px; margin-top:10px;">
        <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Diagram Lingkaran Status Alumni
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
                            @section('charts')
                                chart.data = [
                                    {{-- @foreach ($penelitians as $data)
                                        {
                                            "country": "{{ substr($data['nm_skim'],11) }}",
                                            "litres": {{ $data['jumlah'] }}
                                        },
                                    @endforeach --}}
                                ];
                            @endsection
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Diagram Batang Status Alumni
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
                            @section('charts2')
                                chart.data = [
                                    {{-- @foreach ($pengabdians as $data)
                                        {
                                            "country2": "{{ $data['nm_skim'] }}",
                                            "litres2": {{ $data['jumlah'] }}
                                        },
                                    @endforeach --}}
                                ];
                            @endsection
                            <div id="chartdiv2"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.PieChart);

        // Add data
        @yield('charts')

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        }); // end am4core.ready()
    </script>
    <script>
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv2", am4charts.PieChart);

        // Add data
        @yield('charts2')

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres2";
        pieSeries.dataFields.category = "country2";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        }); // end am4core.ready()
    </script>
@endpush
