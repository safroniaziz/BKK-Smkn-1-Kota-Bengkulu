@extends('layouts.layout')
@section('title', 'Manajemen Data Alumni')
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
                            <form action="{{ route('alumni.personal.update',[Auth::user()->id]) }}" method="POST">
                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input type="text" name="namaAlumni" value="{{ Auth::user()->namaAlumni }}" id="namaAlumni" class="form-control @error('namaAlumni') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('namaAlumni'))
                                                <small class="form-text text-danger">{{ $errors->first('namaAlumni') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Username Login</label>
                                        <input type="text" name="usernameLogin" value="{{ Auth::user()->usernameLogin }}" id="usernameLogin" class="form-control @error('usernameLogin') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('usernameLogin'))
                                                <small class="form-text text-danger">{{ $errors->first('usernameLogin') }}</small>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Jurusan</label>
                                        <select name="jurusanId" class="form-control @error('jurusanId') is-invalid @enderror" id="jurusanId">
                                            <option disabled selected>-- pilih jurusan --</option>
                                            @foreach ($jurusans as $jurusan)
                                                <option {{ $jurusan->id == Auth::user()->jurusanId ? 'selected' : '' }} value="{{ $jurusan->id }}">{{ $jurusan->namaJurusan }}</option>
                                            @endforeach
                                        </select>
                                        <div>
                                            @if ($errors->has('jurusanId'))
                                                <small class="form-text text-danger">{{ $errors->first('jurusanId') }}</small>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                        <select name="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror" id="jenisKelamin">
                                            <option disabled selected>-- pilih jenis kelamin --</option>
                                            <option {{ Auth::user()->jenisKelamin == "L" ? 'selected' : '' }} value="L">Laki - Laki</option>
                                            <option {{ Auth::user()->jenisKelamin == "P" ? 'selected' : '' }} value="P">Perempuan</option>
                                        </select>
                                        <div>
                                            @if ($errors->has('jenisKelamin'))
                                                <small class="form-text text-danger">{{ $errors->first('jenisKelamin') }}</small>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tahun Masuk</label>
                                        <input type="text" name="tahunMasuk" value="{{ Auth::user()->tahunMasuk }}" id="usernameLogin" class="form-control @error('tahunMasuk') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('tahunMasuk'))
                                                <small class="form-text text-danger">{{ $errors->first('tahunMasuk') }}</small>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tahun Lulus</label>
                                        <input type="text" name="tahunLulus" value="{{ Auth::user()->tahunLulus }}" id="usernameLogin" class="form-control @error('tahunLulus') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('tahunLulus'))
                                                <small class="form-text text-danger">{{ $errors->first('tahunLulus') }}</small>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tempat Lahir</label>
                                        <input type="text" name="tempatLahir" value="{{ Auth::user()->tempatLahir }}" id="tempatLahir" class="form-control @error('tempatLahir') is-invalid @enderror" placeholder="masukan tempat lahir">
                                        <div>
                                            @if ($errors->has('tempatLahir'))
                                                <small class="form-text text-danger">{{ $errors->first('tempatLahir') }}</small>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                        <input type="date" name="tanggalLahir" value="{{ Auth::user()->tanggalLahir }}" id="tanggalLahir" class="form-control @error('tanggalLahir') is-invalid @enderror" placeholder="masukan email">
                                        <div>
                                            @if ($errors->has('tanggalLahir'))
                                                <small class="form-text text-danger">{{ $errors->first('tanggalLahir') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Telephone</label>
                                        <input type="text" name="telephone" value="{{ Auth::user()->telephone}}" id="telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="masukan email">
                                        <div>
                                            @if ($errors->has('telephone'))
                                                <small class="form-text text-danger">{{ $errors->first('telephone') }}</small>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" id="email" class="form-control @error('email') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('email'))
                                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Apakah Saat Ini anda Menganggur</label>
                                        <select name="isPengangguran" class="form-control @error('isPengangguran') is-invalid @enderror">
                                            <option disabled selected>-- pilih status --</option>
                                            <option {{ Auth::user()->isPengangguran == "iya" ? 'selected' : ''}} value="iya">Iya</option>
                                            <option {{ Auth::user()->isPengangguran == "tidak" ? 'selected' : ''}} value="tidak">Tidak</option>
                                        </select>
                                        <div>
                                            @if ($errors->has('isPengangguran'))
                                                <small class="form-text text-danger">{{ $errors->first('isPengangguran') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="" cols="30" rows="3">{{ Auth::user()->alamat }}</textarea>
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
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection