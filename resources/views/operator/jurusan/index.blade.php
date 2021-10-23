@extends('layouts.layout')
@section('title', 'Manajemen Jurusan')
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
            <i class="fa fa-home"></i>&nbsp;Manajemen Jurusan
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
                        <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut adalah semua jurusan anda yang tersedia, silahkan tambahkan jurusan beserta tahun berlakunya jika diperlukan !!
                    </div>
                </div>
                <div class="col-md-12" id="tambahJurusan">
                    <form action="" method="POST" action=" {{ route('operator.jurusan.add') }} ">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Nama jurusan</label>
                            <input type="text" name="namaJurusan" id="namaJurusan" class="form-control @error('nm_periode') is-invalid @enderror" placeholder="masukan nama jurusan">
                            <div>
                                @if ($errors->has('namaJurusan'))
                                    <small class="form-text text-danger">{{ $errors->first('namaJurusan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="text-align:center;">
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
                        </div>
                    </form>
                    <hr style="width:50%;">
                </div>

                <div class="col-md-12" id="ubahJurusan" style="display: none;">
                    <form action="" method="POST" action=" {{ route('operator.jurusan.update') }} ">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group ">
                            <input type="hidden" name="id" id="id">
                            <label for="exampleInputEmail1">Nama jurusan</label>
                            <input type="text" name="namaJurusan" id="namaJurusanEdit" class="form-control @error('nm_periode') is-invalid @enderror" placeholder="masukan nama jurusan">
                            <div>
                                @if ($errors->has('namaJurusan'))
                                    <small class="form-text text-danger">{{ $errors->first('namaJurusan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="text-align:center;">
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Ubah Data</button>
                        </div>
                    </form>
                    <hr style="width:50%;">
                </div>

                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($jurusans as $jurusan)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $jurusan->namaJurusan }} </td>
                                    <td>
                                        <a onclick="editJurusan( {{ $jurusan->id }} )" style="color:white; cursor:pointer;" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="hapusjurusan( {{ $jurusan->id }} )" style="color:white; cursor:pointer;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal Hapus -->
                    <div class="modal modal-danger fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header modal-header-danger">
                                <p style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Konfirmasi Hapus Data jurusan</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            Apakah anda yakin akan menghapus data jurusan ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light btn-sm " style="color:white;" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                                <form method="POST" action="{{ route('operator.jurusan.delete') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" id="id_hapus">
                                    <button type="submit" class="btn btn-outline-light btn-sm" style="color:white;"><i class="fa fa-check-circle"></i>&nbsp; Ya, Hapus Data !</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive: true,
            });
        } );

        function editJurusan(id){
            $.ajax({
                url: "{{ url('operator/manajemen_jurusan') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id').val(data.id);
                    $('#namaJurusanEdit').val(data.namaJurusan);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });

            $('#tambahJurusan').hide();
            $('#ubahJurusan').show();
            $('#ubahJurusan').val();
        }

        function hapusjurusan(id){
            $('#modalhapus').modal('show');
            $('#id_hapus').val(id);
        }
    </script>
@endpush
