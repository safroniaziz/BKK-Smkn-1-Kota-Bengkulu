@extends('layouts.layout')
@section('title', 'Manajemen Data Pendidikan')
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
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block" id="berhasil">
                    
                    <strong><i class="fa fa-info-circle"></i>&nbsp;Berhasil: </strong> {{ $message }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <section class="panel" style="margin-bottom:20px;">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-home"></i>&nbsp;Manajemen Data Alumni
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row" style="margin-right:-15px; margin-left:-15px;">
                   
                        <div class="col-md-12" id="tambahalumni">
                            <form action="{{ route('alumni.pendidikan.post') }}" method="POST">
                                {{ csrf_field() }} {{ method_field('POST') }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-primary alert-block text-center" id="keterangan">
                                            <h6><strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong></h6>
                                            <h6>Silahkan inputkan pendidikan jika anda sedang atau pernah anda lakukan setelah lulus dari SMKN 1 Kota Bengkulu:</h6>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tempat Kuliah</label>
                                        <input type="text" name="tempatKuliah" value="{{ Auth::user()->tempatKuliah }}" id="tempatKuliah" class="form-control @error('tempatKuliah') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('tempatKuliah'))
                                                <small class="form-text text-danger">{{ $errors->first('tempatKuliah') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Jurusan</label>
                                        <input type="text" name="jurusan" value="{{ Auth::user()->jurusan }}" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('jurusan'))
                                                <small class="form-text text-danger">{{ $errors->first('jurusan') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tahun Masuk</label>
                                        <select name="tahunMasuk" id="tahunMasuk" class="form-control @error('tahunMasuk') is-invalid @enderror"></select>
                                        <div>
                                            @if ($errors->has('tahunMasuk'))
                                                <small class="form-text text-danger">{{ $errors->first('tahunMasuk') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Alamat Tempat Pendidikan</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="" cols="30" rows="3"></textarea>
                                        <div>
                                            @if ($errors->has('alamat'))
                                                <small class="form-text text-danger">{{ $errors->first('alamat') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12 mt-2">
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tempat Kuliah</th>
                                        <th>Jurusan</th>
                                        <th>Tahun Masuk</th>
                                        <th>Alamat</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($pendidikans as $pendidikan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pendidikan->tempatKuliah }}</td>
                                            <td>{{ $pendidikan->jurusan }}</td>
                                            <td>{{ $pendidikan->tahunMasuk }}</td>
                                            <td>{{ $pendidikan->alamat }}</td>
                                            <td>
                                                <form action="{{ route('alumni.pendidikan.delete',[$pendidikan->id]) }}" method="POST">
                                                    {{ csrf_field() }} {{ method_field("DELETE") }}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );

        $('#tahunMasuk').each(function() {
            var year = (new Date()).getFullYear();
            var current = year;
            year -= 20;
            for (var i = 0; i <= 20; i++) {
                if ((year+i) == current)
                    $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
                else
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
            }
        });
    </script>
@endpush