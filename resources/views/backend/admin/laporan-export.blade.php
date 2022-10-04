<style>
    .table {
    border-collapse: collapse;
    }

    td, th {
        font-size: 10.5pt;
        border: 1px solid black;
        padding: 5px;
    }
</style>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>No Register</th>
            <th>Nama Ormas</th>
            <th>Jenis Kegiatan</th>
            <th>Deskripsi Kegiatan</th>
            <th>Semester</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Dokumentasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dataLap)
        <tr>
            <td class="col-0">{{ $loop->iteration }}</td>
            <td class="col-1">{{ $dataLap->no_register}}</td>
            <td class="col-1">{{ $dataLap->nama_ormas }}</td>
            <td class="col-1">{{ $dataLap->jenis_kegiatan }}</td>
            <td class="col-1">{!! $dataLap->deskripsi_kegiatan !!}</td>
            {{-- <td class="col-2">{{ base64_encode($dataLap->deskripsi_kegiatan) }}</td> --}}
            <td class="col-1">{{ $dataLap->semester }}</td>
            <td class="col-1">{{ $dataLap->tanggal_mulai }}</td>
            <td class="col-1">{{ $dataLap->tanggal_selesai }}</td>
            <td><img src="{{ storage_path("app/".$dataLap->dokumentasi) }}" alt="" style="width: 200px; "></td>
        </tr>
        @endforeach
    </tbody>
</table>