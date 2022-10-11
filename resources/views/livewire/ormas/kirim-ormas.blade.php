<div>
    <div class="col-md-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Form Kirim Data</h4>
            </div>
            <form class="form-horizontal" method="post" wire:submit.prevent="confirm_kirim">
                @csrf
                <div class="card-body">
                    @foreach ($cekData as $val)
                        @if ($val->permohonan_id == 1)
                            <div class="button-group">
                                @if (empty($val->ketua->no_register) == false &&
                                    empty($val->bendahara->no_register) == false &&
                                    empty($val->sekretaris->no_register) == false &&
                                    empty($val->pendiri->no_register) == false &&
                                    empty($val->pembina->no_register) == false &&
                                    empty($val->penasihat->no_register) == false &&
                                    empty($val->dokumen->no_register) == false &&
                                    empty($val->persyaratan->no_register == false))
                                    <p>
                                    <h5 class="card-title mb-0">Data Sudah Lengkap Silahkan Lakukan Kirim Data</h5>
                                    </p>

                                    {{-- Tombol Kirim Data --}}
                                    <button type="button" wire:loading.remove wire:target="confirm_kirim"
                                        class="btn btn-light-info text-info  btn-lg px-4 fs-4 font-medium"
                                        data-bs-toggle="tooltip" title="Kirim Data" wire:click="confirm_kirim">Kirim
                                        Data Dengan Nomor Register : {{ $val->no_register }}</button>
                                    <div wire:loading wire:target="confirm_kirim">
                                        <button class="btn btn-light-info text-info  btn-lg px-4 fs-4 font-medium"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                @else
                                    <h4><b>Data Belum Lengkap, Silahkan Lakukan Pengisian Terlebih Dahulu</b></h4>
                                    <div class="border-bottom title-part-padding">
                                        @if (!empty($val->persyaratan->no_register))
                                            <li>Input Data : <span style="color: green"><b>Sudah</b></span></li>
                                        @else
                                            <li>Input Data : <span style="color: red"><b>Belum</b></span></li>
                                        @endif


                                        <li>Kepengurusan :<br>
                                            @if (!empty($val->ketua->no_register))
                                                1. Data Ketua : <span style="color: green"><b>Sudah</b></span><br>
                                            @else
                                                1. Data Ketua : <span style="color: red"><b>Belum</b></span><br>
                                            @endif
                                            @if (!empty($val->sekretaris->no_register))
                                                2. Data Sekretaris : <span style="color: green"><b>Sudah</b></span><br>
                                            @else
                                                2. Data Sekretaris : <span style="color: red"><b>Belum</b></span><br>
                                            @endif
                                            @if (!empty($val->bendahara->no_register))
                                                3. Data Bendahara : <span style="color: green"><b>Sudah</b></span><br>
                                            @else
                                                3. Data Bendahara : <span style="color: red"><b>Belum</b></span><br>
                                            @endif
                                            @if (!empty($val->pendiri->no_register))
                                                4. Data Pendiri : <span style="color: green"><b>Sudah</b></span><br>
                                            @else
                                                4. Data Pendiri : <span style="color: red"><b>Belum</b></span><br>
                                            @endif
                                            @if (!empty($val->pembina->no_register))
                                                5. Data Pembina : <span style="color: green"><b>Sudah</b></span><br>
                                            @else
                                                5. Data Pembina : <span style="color: red"><b>Belum</b></span><br>
                                            @endif
                                            @if (!empty($val->penasihat->no_register))
                                                6. Data Penasihat : <span style="color: green"><b>Sudah</b></span><br>
                                            @else
                                                6. Data Penasihat : <span style="color: red"><b>Belum</b></span><br>
                                            @endif
                                        </li>
                                        @if (!empty($val->dokumen->no_register))
                                            <li>Upload Dokumen : <span style="color: green"><b>Sudah</b></span></li>
                                        @else
                                            <li>Upload Dokumen : <span style="color: red"><b>Belum</b></span></li>
                                        @endif
                                    </div>

                                    <div class="p-3 border-top">
                                        <div class="d-flex">
                                            {{-- Tombol Kirim Data --}}
                                            <button type="button" wire:loading.remove wire:target="confirm_kirim"
                                                class="btn btn-light-info text-info  btn-lg px-4 fs-4 font-medium"
                                                data-bs-toggle="tooltip" title="Kirim Data" wire:click="confirm_kirim"
                                                disabled>Kirim
                                                Data Dengan Nomor Register : {{ $val->no_register }}
                                            </button>
                                            <div wire:loading wire:target="confirm_kirim">
                                                <button
                                                    class="btn btn-light-info text-info  btn-lg px-4 fs-4 font-medium"
                                                    type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="card-body border-bottom">
                                <h5>Data Sudah Terkirim</h5><br>
                                Silahkan Lakukan Pemantaun Secara berkala pada aplikasi ini untuk update progress
                                pengajuan
                                Surat Permohonan keberadaan.
                            </div>
                        @endif
                    @endforeach

                    {{-- PROGRESS HISTORY PERMOHONAN --}}
                    <p>
                    <h4>
                        <span>
                            Progres Permohonan Surat Keberadaan Nomer Register
                            @foreach ($cekData as $vnoreg)
                                {{ $vnoreg->no_register }}
                            @endforeach
                        </span>
                    </h4>
                    </p>
                    <p>
                    <div class="card border-bottom title-part-padding">
                        <div class="card-body">
                            <ul class="timeline timeline-left">
                                <li class="timeline-inverted timeline-item">
                                    <div class="timeline-badge success">
                                        <i class=" fas fa-user-circle"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><b>Pendaftaran Akun</b></h4>
                                        </div>
                                        <div class="timeline-body">
                                            @foreach ($cekData as $valres)
                                                @if ($valres->permohonan_id >= 1)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-success">Selesai</button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted timeline-item">
                                    <div class="timeline-badge warning">
                                        <i class="far fa-edit"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><b>Verifikasi Data</b></h4>
                                        </div>
                                        <div class="timeline-body">
                                            @foreach ($cekData as $valres)
                                                @if ($valres->permohonan_id > 1 && $valres->permohonan_id <= 2)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-warning">Progress</button>
                                                @elseif($valres->permohonan_id > 2 ||
                                                    $valres->permohonan_id == 3 ||
                                                    $valres->permohonan_id == 4 ||
                                                    $valres->permohonan_id == 5)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-success">Selesai</button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted timeline-item">
                                    <div class="timeline-badge info">
                                        <span class="fs-2"><i class="fas fa-car"></i>
                                        </span>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><b>Verifikasi Lapangan</b></h4>
                                        </div>
                                        <div class="timeline-body">
                                            @foreach ($cekData as $valres)
                                                @if ($valres->permohonan_id > 2 && $valres->permohonan_id <= 3)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-warning">Progress</button>
                                                @elseif($valres->permohonan_id > 3 || $valres->permohonan_id == 4 || $valres->permohonan_id == 5)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-success">Selesai</button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted timeline-item">
                                    <div class="timeline-badge danger">
                                        <i class=" fas fa-print"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><b>Penerbitan Surat Keberadaan</b></h4>
                                        </div>
                                        <div class="timeline-body">
                                            @foreach ($cekData as $valres)
                                                @if ($valres->permohonan_id > 3 && $valres->permohonan_id <= 5)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-warning">Progress</button>
                                                @elseif($valres->permohonan_id > 5 || $valres->permohonan_id == 6)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-success">Selesai</button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted timeline-item">
                                    <div class="timeline-badge success">
                                        <i class=" far fa-check-circle"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><b>Selesai</b></h4>
                                        </div>
                                        <div class="timeline-body">
                                            @foreach ($cekData as $valres)
                                                @if ($valres->permohonan_id == 6)
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-success">Selesai</button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <br>
                            <div class="row">
                                <b>Surat Tanda Keberadaan :</b>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="zero_config"
                                            class="table table-striped table-bordered text-nowrap">
                                            <thead style="text-align: center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Surat<br>Tanggal</th>
                                                    <th>Surat Ke 1</th>
                                                    <th>Status</th>
                                                    <th>Lihat</th>
                                                    <th>Jumlah Dilihat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($dataSurat as $Nomor => $valSurat)
                                                    @if ($valSurat->id_ttd != 0)
                                                        <tr>
                                                            <td>{{ $Nomor + 1 }}</td>
                                                            <td>
                                                                {{ $valSurat->nomor_surat }}<br>
                                                                {{ \Carbon\Carbon::parse($valSurat->tanggal_surat)->isoFormat('DD-MM-YYYY') }}
                                                            </td>
                                                            <td>{{ $valSurat->cetak }}</td>
                                                            <td>
                                                                @if ($valSurat->status == 'Y')
                                                                    <span
                                                                        class="badge bg-light-success text-success font-medium">Berlaku</span>
                                                                @elseif($valSurat->status == 'N')
                                                                    <span
                                                                        class="badge bg-light-danger text-danger font-medium">Tidak
                                                                        Berlaku</span>
                                                                    <br>
                                                                    Mulai Tanggal :
                                                                    {{ \Carbon\Carbon::parse($valSurat->tanggal_exp)->isoFormat('DD-MM-YYYY') }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($valSurat->status == 'Y')
                                                                    <a wire:loading.remove
                                                                        wire:target="viewFile({{ $valSurat->id }})"
                                                                        wire:click="viewFile({{ $valSurat->id }})">
                                                                        <i class="fas fa-eye" style="color: red"></i>
                                                                    </a>
                                                                    <a class="waves-effect">
                                                                        <div wire:loading
                                                                            wire:target="viewFile({{ $valSurat->id }})">
                                                                            <span
                                                                                class="spinner-border spinner-border-sm"
                                                                                role="status"
                                                                                aria-hidden="true"></span>
                                                                            Loading...
                                                                        </div>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>{{ $valSurat->jml_view }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td colspan="6" style="text-align: center"><b>Belum Ada
                                                                    Data</b></td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <tr>
                                                        <td colspan="6" style="text-align: center"><b>Belum Ada
                                                                Data</b></td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </form>
        </div>
    </div>
    @push('script')
        <script>
            window.addEventListener('swal:confirm_krm', event => {
                Swal.fire({
                        title: event.detail.message,
                        icon: event.detail.type,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Kirim',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('kirim_data', event.detail.no_register);
                        }
                    });
            });

            window.addEventListener('openViewFile', event => {
                $("#ModalView").modal('show');
            })
            window.addEventListener('closeViewFile', event => {
                $("#ModalView").modal('hide');
                location.reload();
            })
        </script>
    @endpush

    {{-- IFRAME VIEW --}}
    <div wire:ignore.self class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">View Surat</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeView"></button>
                </div>
                <div class="modal-body" style="background: rgb(56, 56, 61)">
                    @if ($url)
                        <object data="{{ asset('display/' . $url) }}" type="application/pdf" class="modal-content"
                            style="width: 100%; height:800px">
                        </object>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
