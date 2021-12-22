@extends('layouts.layout')
@section('title', 'Manajemen Data Pekerjaan')
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
                            <form action="{{ route('alumni.pekerjaan.post') }}" method="POST">
                                {{ csrf_field() }} {{ method_field('POST') }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-primary alert-block text-center" id="keterangan">
                                            <h6><strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong></h6>
                                            <h6>Silahkan inputkan pekerjaan jika anda sedang atau pernah anda lakukan setelah lulus dari SMKN 1 Kota Bengkulu:</h6>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tempat Kerja</label>
                                        <input type="text" name="tempatKerja" value="{{ Auth::user()->tempatKerja }}" id="tempatKerja" class="form-control @error('tempatKerja') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('tempatKerja'))
                                                <small class="form-text text-danger">{{ $errors->first('tempatKerja') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Jabatan</label>
                                        <input type="text" name="jabatan" value="{{ Auth::user()->jabatan }}" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('jabatan'))
                                                <small class="form-text text-danger">{{ $errors->first('jabatan') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Penghasilan</label>
                                        <select name="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror" id="">
                                            <option disabled selected>-- pilih penghasilan --</option>
                                            <option value="bawah_umr">Dibawah UMR</option>
                                            <option value="umr">UMR</option>
                                            <option value="atas_umr">Diatas UMR</option>
                                        </select>
                                        <div>
                                            @if ($errors->has('penghasilan'))
                                                <small class="form-text text-danger">{{ $errors->first('penghasilan') }}</small>
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

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tahun Keluar</label>
                                        <select name="tahunKeluar" id="tahunKeluar" class="form-control @error('tahunKeluar') is-invalid @enderror"></select>
                                        <div>
                                            @if ($errors->has('tahunKeluar'))
                                                <small class="form-text text-danger">{{ $errors->first('tahunKeluar') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Jenis Pekerjaan</label>
                                        <select name="jenisPekerjaan" class="form-control @error('jenisPekerjaan') is-invalid @enderror" id="">
                                            <option disabled selected>-- pilih jenis pekerjaan --</option>
                                            <option value="kontrak">Kontrak</option>
                                            <option value="tetap">Tetap</option>
                                            <option value="magang">Magang</option>
                                            <option value="freelance">Freelance</option>
                                        </select>
                                        <div>
                                            @if ($errors->has('jenisPekerjaan'))
                                                <small class="form-text text-danger">{{ $errors->first('jenisPekerjaan') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Alamat Tempat Bekerja</label>
                                        <textarea name="alamatKerja" class="form-control @error('alamatKerja') is-invalid @enderror" id="" cols="30" rows="3"></textarea>
                                        <div>
                                            @if ($errors->has('alamatKerja'))
                                                <small class="form-text text-danger">{{ $errors->first('alamatKerja') }}</small>
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
                                        <th>Tempat Bekerja</th>
                                        <th>Jabatan</th>
                                        <th>Penghasilan</th>
                                        <th>Tahun Masuk</th>
                                        <th>Tahun Keluar</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Alamat Tempat Bekerja</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($pekerjaans as $pekerjaan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pekerjaan->tempatKerja }}</td>
                                            <td>{{ $pekerjaan->jabatan }}</td>
                                            <td>{{ $pekerjaan->penghasilan }}</td>
                                            <td>{{ $pekerjaan->tahunMasuk }}</td>
                                            <td>
                                                @if ($pekerjaan->tahunKeluar == null || $pekerjaan->tahunKeluar == "")
                                                    -
                                                @else
                                                    {{ $pekerjaan->tahunKeluar }}
                                                @endif
                                            </td>
                                            <td>{{ $pekerjaan->jenisPekerjaan }}</td>
                                            <td>{{ $pekerjaan->alamatKerja }}</td>
                                            <td>
                                                <form action="{{ route('alumni.pekerjaan.delete',[$pekerjaan->id]) }}" method="POST">
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

        $('#tahunKeluar').each(function() {
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