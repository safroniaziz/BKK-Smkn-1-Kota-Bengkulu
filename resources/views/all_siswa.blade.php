<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Semua Siswa</title>
</head>
<body>
    <table class="table table-bordered table-hover" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>
                    Nama Alumni
                </th>
                <th>
                    Tahun Masuk
                </th>
                <th>Tahun Lulus</th>
                <th>
                    Jurusan
                </th>
                <th>
                    Tempat Lahir
                </th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>Telephone</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $siswa->namaAlumni }}</td>
                    <td>{{ $siswa->tahunMasuk }}</td>
                    <td>{{ $siswa->tahunLulus }}</td>
                    <td>{{ $siswa->jurusanId }}</td>
                    <td>{{ $siswa->tempatLahir }}</td>
                    <td>{{ $siswa->tanggalLahir }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->telephone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>