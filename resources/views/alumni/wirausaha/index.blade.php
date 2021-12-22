@extends('layouts.layout')
@section('title', 'Manajemen Data Wirausaha')
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
                            <form action="{{ route('alumni.wirausaha.post') }}" method="POST">
                                {{ csrf_field() }} {{ method_field('POST') }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-primary alert-block text-center" id="keterangan">
                                            <h6><strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong></h6>
                                            <h6>Silahkan inputkan wirausaha jika anda sedang atau pernah anda lakukan setelah lulus dari SMKN 1 Kota Bengkulu:</h6>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Nama Usaha</label>
                                        <input type="text" name="namaUsaha" value="{{ Auth::user()->namaUsaha }}" id="namaUsaha" class="form-control @error('namaUsaha') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('namaUsaha'))
                                                <small class="form-text text-danger">{{ $errors->first('namaUsaha') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Bidang Usaha</label>
                                        <input type="text" name="bidangUsaha" value="{{ Auth::user()->bidangUsaha }}" id="bidangUsaha" class="form-control @error('bidangUsaha') is-invalid @enderror">
                                        <div>
                                            @if ($errors->has('bidangUsaha'))
                                                <small class="form-text text-danger">{{ $errors->first('bidangUsaha') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tahun Mulai</label>
                                        <select name="tahunMulai" id="tahunMulai" class="form-control @error('tahunMulai') is-invalid @enderror"></select>
                                        <div>
                                            @if ($errors->has('tahunMulai'))
                                                <small class="form-text text-danger">{{ $errors->first('tahunMulai') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Alamat</label>
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
                                        <th>Nama Usaha</th>
                                        <th>Bidang Usaha</th>
                                        <th>Tahun Mulai</th>
                                        <th>Alamat</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($wirausahas as $wirausaha)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $wirausaha->namaUsaha }}</td>
                                            <td>{{ $wirausaha->bidangUsaha }}</td>
                                            <td>{{ $wirausaha->tahunMulai }}</td>
                                            <td>{{ $wirausaha->alamat }}</td>
                                            <td>
                                                <form action="{{ route('alumni.wirausaha.delete',[$wirausaha->id]) }}" method="POST">
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

        $('#tahunMulai').each(function() {
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