<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tes</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            margin-left: 30px;
            margin-right: 20px;
            margin-top: 20px;
            margin-bottom: 20px
        }
    </style>
</head>

<body>
    <div class="row" style="text-align: center">
        <img src="{{ asset('backafs/assets/images/app/icon_pemkot.png') }}" alt="user" class="rounded-circle"
            width="90" style="float: left">
        <div style="font-size: 14">
            <b>PEMERINTAH KOTA SURAKARTA<br>BADAN KESATUAN BANGSA DAN POLITIK</b>
        </div>
        <div class="row">
            <p>Jl. Jendral Sudirman No.2 Gedung Tawang Praja Lt. 4<br>
                Telp. & Fax. (0271) 636564<br>
                e-Mail : bakesbangpol@surakarta.go.id<br>
                <b>SURAKARTA</b><br>
                57111
            </p>
        </div>
    </div>
    <div class="row">
        <p>
            <img src="{{ asset('backafs/assets/images/app/line_kop.png') }}" alt="user" class="rounded-circle"
                width="660">
        </p>
    </div><br>

    <div class="row" style="text-align: center; font-size: 12">
        <p>
            <b>
                <u>TANDA BUKTI PEMBERITAHUAN KEBERADAAN ORMAS</u><br>
                Nomor Reg :
                {{ $perubahan->nomor_surat }}
            </b>
        </p>
    </div>
    <div class="row" style="text-align: justify; line-height: 2em">
        <p>
            Yang bertanda tangan dibawah ini menerangkan pada hari {{ $perubahan->hari }}
            tanggal {{ \Carbon\Carbon::parse($perubahan->tanggal_surat)->isoFormat('DD MMMM YYYY') }}
            telah diterima pemberitahuan keberadaan ormas
            sebagai berikut :
        </p>
    </div>

    <div class="row">
        <p>
        <table>
            <tr>
                <td width="50"></td>
                <td>Nama Organisasi</td>
                <td></td>
                <td>:</td>
                <td>{{ $dataForPDF->persyaratan->nama_ormaspol }}</td>
            </tr>
            <tr></tr>
            <tr>
                <td width="50"></td>
                <td>Alamat Sekretariat</td>
                <td></td>
                <td>:</td>
                <td>
                    {{ $dataForPDF->persyaratan->alamat_kantor_ormaspol }},
                    &nbsp; {{ $kelurahan->nama_kelurahan }},
                    &nbsp; {{ $kecamatan->nama_kecamatan }},
                    &nbsp; {{ $kota->kota }}
                </td>
            </tr>
        </table>
        </p>
    </div>

    <div class="row" style="text-align: justify; text-indent: 20px; line-height: 2em">
        <p>
            Dengan melampirkan Dokumen berupa Salinan Surat Keputusan Pengesahan status Badan Hukum Kemenkum HAM RI
            Nomor AHU-{{ $dataForPDF->persyaratan->no_sk_ahu }} Tahun {{ $dataForPDF->persyaratan->tahun_ahu }}
            Tanggal
            {{ \Carbon\Carbon::parse($dataForPDF->persyaratan->tgl_ahu)->isoFormat('DD MMMM YYYY') }} dan Keputusan
            Kepengurusan Daerah sesuai dengan
            Peraturan Pemerintah Nomor 58 Tahun 2016 Tentang Pelaksanaan Undang-undang No. 17 Tahun 2013 Tentang
            Organisasi Kemasyarakatan.
        </p>
    </div>

    <div class="row" style="text-align: justify; text-indent: 20px">
        <p>
            Sehubungan dengan hal itu, maka keberadaan Ormas tersebut sudah kami catat di data registrasi.
        </p>
    </div>

    <div class="row">
        <table width="500">
            <tr>
                <td width="220"></td>
                <td>
                    Surakarta,
                    {{ \Carbon\Carbon::parse($perubahan->tanggal_surat)->isoFormat('DD MMMM YYYY') }}<br>
                </td>
            </tr>
        </table>
        <table width="500">
            <tr>
                <td width="200"></td>
                <td style="text-align: center">
                    <b>
                        a.n. KEPALA BADAN KESATUAN BANGSA DAN POLITIK<br>
                        KOTA SURAKARTA<br>
                        {{ $pejabatTtd->jabatan }}
                    </b>
                </td>
            </tr>
        </table>
        <table width="500">
            <tr>
                <td width="150"></td>
                <td style="text-align: center">
                    @if ($url)
                        <img src="{{ public_path('storage/' . $url) }}" width="200"><br>
                    @endif
                </td>
            </tr>
        </table>
        <table width="500">
            <tr>
                <td width="200"></td>
                <td style="text-align: center">
                    <b>
                        <u>{{ $pejabatTtd->name }}</u><br>
                        NIP. {{ $pejabatTtd->nip }}
                    </b>
                </td>
            </tr>
        </table>

        <div class="row">
            <u><b>Tembusan :</b></u>
            <ol style="margin-left: -25px">
                <li>Walikota Surakarta (Sebagai Laporan);</li>
                <li>Komandan Kodim 0735/Surakarta;</li>
                <li>Kapolresta Surakarta;</li>
                <li>Kepala Kejaksaan Negeri Surakarta;</li>
                <li>Arsip.</li>
            </ol>
        </div>
    </div>
</body>

</html>
