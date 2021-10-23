@extends('layouts.layout')
@section('title', 'Manajemen Data Alumni')
@section('login_as', 'Operator')
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
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Manajemen Data Alumni
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block" id="berhasil">
                            
                            <strong><i class="fa fa-info-circle"></i>&nbsp;Berhasil: </strong> {{ $message }}
                        </div>
                    @endif
                    <div class="alert alert-primary alert-block" id="keterangan">
                        <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut adalah semua data alumni!!
                    </div>
                </div>
                <div class="col-md-12" id="tambahalumni">
                    <form action="{{ route('operator.alumni.post') }}" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama alumni</label>
                                <input type="text" name="namaAlumni" value="{{ old('namaAlumni') }}" id="namaAlumni" class="form-control @error('nm_periode') is-invalid @enderror" placeholder="masukan nama alumni">
                                <div>
                                    @if ($errors->has('namaAlumni'))
                                        <small class="form-text text-danger">{{ $errors->first('namaAlumni') }}</small>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jurusan</label>
                                <select name="jurusanId" class="form-control @error('jurusanId') is-invalid @enderror" id="jurusanId">
                                    <option disabled selected>-- pilih jurusan --</option>
                                    @foreach ($jurusans as $jurusan)
                                        <option {{ $jurusan->id == old('jurusanId') ? 'selected' : '' }} value="{{ $jurusan->id }}">{{ $jurusan->namaJurusan }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @if ($errors->has('jurusanId'))
                                        <small class="form-text text-danger">{{ $errors->first('jurusanId') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror" id="jenisKelamin">
                                    <option disabled selected>-- pilih jenis kelamin --</option>
                                    <option {{ old('jenisKelamin') == "L" ? 'selected' : '' }} value="L">Laki - Laki</option>
                                    <option {{ old('jenisKelamin') == "P" ? 'selected' : '' }} value="P">Perempuan</option>
                                </select>
                                <div>
                                    @if ($errors->has('jenisKelamin'))
                                        <small class="form-text text-danger">{{ $errors->first('jenisKelamin') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tahun Masuk</label>
                                <select name="tahunMasuk" id="tahunMasuk" class="form-control @error('tahunMasuk') is-invalid @enderror"></select>
                                <div>
                                    @if ($errors->has('tahunMasuk'))
                                        <small class="form-text text-danger">{{ $errors->first('tahunMasuk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tahun Lulus</label>
                                <select name="tahunLulus" id="tahunLulus" class="form-control @error('tahunLulus') is-invalid @enderror"></select>
                                <div>
                                    @if ($errors->has('tahunLulus'))
                                        <small class="form-text text-danger">{{ $errors->first('tahunLulus') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="tempatLahir" value="{{ old('tempatLahir') }}" id="tempatLahir" class="form-control @error('nm_periode') is-invalid @enderror" placeholder="masukan tempat lahir">
                                <div>
                                    @if ($errors->has('tempatLahir'))
                                        <small class="form-text text-danger">{{ $errors->first('tempatLahir') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" name="tanggalLahir" value="{{ old('tanggalLahir') }}" id="tanggalLahir" class="form-control @error('nm_periode') is-invalid @enderror" placeholder="masukan email">
                                <div>
                                    @if ($errors->has('tanggalLahir'))
                                        <small class="form-text text-danger">{{ $errors->first('tanggalLahir') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Telephone</label>
                                <input type="date" name="tanggalLahir" value="{{ old('tanggalLahir') }}" id="tanggalLahir" class="form-control @error('nm_periode') is-invalid @enderror" placeholder="masukan email">
                                <div>
                                    @if ($errors->has('tanggalLahir'))
                                        <small class="form-text text-danger">{{ $errors->first('tanggalLahir') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control @error('nm_periode') is-invalid @enderror" placeholder="masukan nama alumni">
                                <div>
                                    @if ($errors->has('email'))
                                        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 mt-2" style="text-align:center;">
                                <a href="{{ route('operator.alumni') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                                <button type="reset" class="btn btn-warning btn-sm" style="color: white;"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
  <script>
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

    $('#tahunLulus').each(function() {
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
