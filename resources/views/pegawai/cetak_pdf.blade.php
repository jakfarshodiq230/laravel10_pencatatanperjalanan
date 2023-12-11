<div class="container">
    <h1 style="text-align: center">DAFTAR PEGAWAI</h1>
    <table border="1" cellpadding="10" width="100%" style="margin-bottom: 100px;">
        <tr>
            <th width="5%">Nomor</th>
            <th width="5%">Nomor</th>
            <th width="20%">Foto</th>
            <th width="5%">Nama</th>
            <th width="5%">NIP</th>
            <th width="5%">NIK</th>
            <th width="20%">Scan KK</th>
            <th width="20%">Scan KTP</th>
            <th width="5%">Tempat_lahir</th>
            <th width="5%">Tanggal Lahir</th>
            <th width="5%">Jenis Kelamin</th>
            <th width="5%">Golongan Darah</th>
            <th width="5%">Alamat</th>
            <th width="5%">Agama</th>
            <th width="5%">Status Perkawinan</th>
            <th width="5%">Pekerjaan</th>
            <th width="5%">NO. HP</th>
            <th width="5%">Kewarganegaraan</th>

        </tr>
        @foreach ($datapegawai as $Pegawai)
            <tr>
                <th>{{ $Pegawai->nama }}</th>
                <th>-</th>
                <th><img src="{{ storage_path('app/public/'.$Pegawai->foto) }}" style="width:200px"></th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th><img src="{{ storage_path('app/public/'.$Pegawai->scan_kk) }}" style="width:200px"></th>
                <th><img src="{{ storage_path('app/public/'.$Pegawai->scan_ktp) }}" style="width:200px"></th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
                <th>{{ $Pegawai->nik }}</th>
            </tr>
        @endforeach
    </table>
</div>