@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Alumni')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->namaAlumni }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->namaAlumni }}
    @endif
@endsection
@section('sidebar-menu')
    @include('alumni/sidebar')
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
                    <i class="fa fa-bar-chart"></i>&nbsp;Informasi Pada Aplikasi
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($personal->tahunMasuk != null || $personal->tahun_masuk != "")
                                        {{ $personal->tahunMasuk }}
                                        @else
                                        -
                                    @endif
                                </h3>

                                <p>Tahun Masuk</p>
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
                                <h3>
                                    @if ($personal->tahunLulus != null || $personal->tahunLulus != "")
                                        {{ $personal->tahunLulus }}
                                        @else
                                        -
                                    @endif
                                </h3>

                                <p>Tahun Lulus</p>
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
                                <h3>
                                    @if ($personal->jenisKelamin != null || $personal->jenisKelamin != "")
                                        @if ($personal->jenisKelamin == "L")
                                            Laki=Laki
                                        @else
                                            Perempuan
                                        @endif
                                        @else
                                        -
                                    @endif
                                </h3>

                                <p>Jenis Kelamin</p>
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
                                <h3>
                                    @if ($personal->telephone != null || $personal->telephone != "")
                                        {{ $personal->telephone }}
                                        @else
                                        -
                                    @endif
                                </h3>

                                <p>Telephone</p>
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

@endsection