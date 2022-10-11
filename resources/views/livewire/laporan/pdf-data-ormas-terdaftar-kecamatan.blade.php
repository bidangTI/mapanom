<style>
    .table {
        border-collapse: collapse;
    }

    td,
    th {
        font-size: 10pt;
        border: 1px solid black;
        padding: 5px;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<table width="100%" style="margin-bottom: 20px">
    <tr>
        <p>
            <img src="{{ asset('backafs/assets/images/app/icon_pemkot.png') }}" alt=""
                style="float:left;width:auto;height:50px">
            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12pt; padding-left: 5pt">
                Badan Kesatuan Bangsa dan Politik</span><br>
            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12pt; padding-left: 5pt">
                Kota Surakarta
            </span>
        </p>
    </tr>
    <tr></tr>
    <tr>
        <p>
            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12pt">
                @foreach ($dataOrmas as $valOrmas)
                    @foreach ($kecamatan as $valKecamatan)
                        @if ($valKecamatan->id == $valOrmas->persyaratan->kecamatan)
                            <b>DATA ORMAS TERDAFTAR DI KECAMATAN {{ Str::upper($valKecamatan->nama_kecamatan) }} <br>KOTA SURAKARTA</b>
                        @endif
                    @endforeach
                @endforeach
                
            </span>
        </p>
    </tr>
</table>
<table class="table" style="border-collapse: collapse">
    <thead>
        <tr>
            <th rowspan="2"><b>No</b></th>
            <th rowspan="2"><b>Nama ORMAS</b></th>
            <th rowspan="2"><b>Alamat ORMAS</b></th>
            <th rowspan="2"><b>Bidang Kekhususan<br>Sub Bidang</b></th>
            <th rowspan="2"><b>SKT/AHU</b></th>
            <th rowspan="2"><b>Nomor Pendaftaran<br>Nomor Registrasi<br>Tanggal Register</b></th>
            <th colspan="3" style="text-align: center"><b>Pengurus</b></th>
            <th rowspan="2">Telp</th>
            {{-- <th></th> --}}
        </tr>
        <tr>
            <th><b>Ketua</b></th>
            <th><b>Sekretaris</b></th>
            <th><b>Bendahara</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataOrmas as $valOrmas)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $valOrmas->persyaratan->nama_ormaspol }}</td>
                <td>{{ $valOrmas->persyaratan->alamat_kantor_ormaspol }},
                    @foreach ($kelurahan as $valKelurahan)
                        @if ($valKelurahan->id == $valOrmas->persyaratan->kelurahan)
                            Kelurahan {{ $valKelurahan->nama_kelurahan }},
                        @endif
                    @endforeach
                    @foreach ($kecamatan as $valKecamatan)
                        @if ($valKecamatan->id == $valOrmas->persyaratan->kecamatan)
                            Kecamatan {{ $valKecamatan->nama_kecamatan }},
                        @endif
                    @endforeach
                    @foreach ($kota as $valKota)
                        @if ($valKota->id == $valOrmas->persyaratan->kota)
                            {{ $valKota->kota }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($bidang as $valBidang)
                        @if ($valBidang->id == $valOrmas->persyaratan->bidang_id_ormas)
                            {{ $valBidang->bidang }}
                        @endif
                    @endforeach
                    <br>
                    @foreach ($subbidang as $valSubbidang)
                        @if ($valSubbidang->id == $valOrmas->persyaratan->subbidang_id_ormas)
                            {{ $valSubbidang->subbidang }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $valOrmas->persyaratan->no_sk_ahu }}</td>
                <td>
                    @foreach ($keberadaan as $valKeberadaan)
                        @if ($valKeberadaan->no_register == $valOrmas->no_register)
                            {{ $valKeberadaan->no_register }}<br>
                            {{ $valKeberadaan->nomor_surat }}<br>
                            {{ \Carbon\Carbon::parse($valKeberadaan->tanggal_surat)->isoFormat('DD-MM-YYYY') }}
                        @endif
                    @endforeach

                </td>
                <td>{{ $valOrmas->ketua->nama }}</td>
                <td>{{ $valOrmas->sekretaris->nama }}</td>
                <td>{{ $valOrmas->bendahara->nama }}</td>
                <td>{{ $valOrmas->no_hp }}</td>
                {{-- <td></td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
