<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Verifikasi Data</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Register<br>Kategori</th>
                                <th>Tanggal Permohonan<br>Nomer Surat Permohonan</th>
                                <th>Nama Ormas</th>
                                <th>Alamat</th>
                                <th>Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($dataList as $Nomer => $varList)
                                <tr>

                                    <td>{{ $Nomer + 1 }}</td>
                                    <td>{{ $varList->no_register }}<br>
                                        <span
                                            class="badge bg-light-success text-success font-medium">{{ $varList->kategori->kategori }}</span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($varList->persyaratan->tgl_surat_permohonan_ormaspol)->isoFormat('DD-MM-YYYY') }}<br>{{ $varList->persyaratan->no_surat_permohonan_ormaspol }}
                                    </td>
                                    <td>{{ $varList->persyaratan->nama_ormaspol }}</td>
                                    <td width="130px">
                                        {{ $varList->persyaratan->alamat_kantor_ormaspol }}, Kelurahan&nbsp;
                                        @foreach ($dataKelurahan as $kel)
                                            @if ($kel->id == $varList->persyaratan->kelurahan)
                                                {{ $kel->nama_kelurahan }}
                                            @endif
                                        @endforeach
                                        , Kecamatan&nbsp;
                                        @foreach ($dataKecamatan as $kec)
                                            @if ($kec->id == $varList->persyaratan->kecamatan)
                                                {{ $kec->nama_kecamatan }}
                                            @endif
                                        @endforeach
                                        &nbsp;
                                        @foreach ($dataKota as $kota)
                                            @if ($kota->id == $varList->persyaratan->kota)
                                                {{ $kota->kota }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- Persyaratan --}}
                                        @if ($varList->feedback_persyaratan == 'Y' && $varList->status_persyaratan == 'N')
                                            <i class="bi-bell" style="color: rgb(253, 11, 11)"></i>
                                        @endif
                                        <button type="button" wire:loading.remove
                                            wire:target="ShowPersyaratan('{{ $varList->no_register }}')"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="ShowPersyaratan('{{ $varList->no_register }}')">
                                            <span
                                                class="badge bg-light-success text-success font-medium">Persyaratan</span>
                                        </button>
                                        <div wire:loading wire:target="ShowPersyaratan('{{ $varList->no_register }}')">
                                            <button class="btn btn-sm px-40 fs-40 font-small me-1" type="button"
                                                disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div><br>

                                        {{-- Pengurus --}}
                                        @if ($varList->feedback_pengurus == 'Y' && $varList->status_pengurus == 'N')
                                            <i class="bi-bell" style="color: rgb(253, 11, 11)"></i>
                                        @endif
                                        <button type="button" wire:loading.remove
                                            wire:target="ShowPengurus('{{ $varList->no_register }}')"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="ShowPengurus('{{ $varList->no_register }}')">
                                            <span
                                                class="badge bg-light-warning text-warning font-medium">Kepengurusan</span>
                                        </button>

                                        <div wire:loading wire:target="ShowPengurus('{{ $varList->no_register }}')">
                                            <button class="btn btn-sm px-40 fs-40 font-small me-1" type="button"
                                                disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div><br>

                                        {{-- Dokumen --}}
                                        @if ($varList->feedback_dokumen == 'Y' && $varList->status_dokumen == 'N')
                                            <i class="bi-bell" style="color: rgb(253, 11, 11)"></i>
                                        @endif
                                        <button type="button" wire:loading.remove
                                            wire:target="ShowDokumen('{{ $varList->no_register }}')"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="ShowDokumen('{{ $varList->no_register }}')">
                                            <span class="badge bg-light-info text-info font-medium">Dokumen</span>
                                        </button>

                                        <div wire:loading wire:target="ShowDokumen('{{ $varList->no_register }}')">
                                            <button class="btn btn-sm px-40 fs-40 font-small me-1" type="button"
                                                disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($varList->status_persyaratan == 'Y' && $varList->status_pengurus == 'Y' && $varList->status_dokumen == 'Y')
                                            <button type="button" wire:loading.remove
                                                wire:target="LanjutSurvey('{{ $varList->no_register }}')"
                                                class="btn btn-sm px-40 fs-40 font-small me-1"
                                                wire:click="LanjutSurvey('{{ $varList->no_register }}')">
                                                <span class="badge bg-light-success text-success font-medium">Lanjut
                                                    Survey</span>
                                            </button>

                                            <div wire:loading
                                                wire:target="LanjutSurvey('{{ $varList->no_register }}')">
                                                <button class="btn btn-sm px-40 fs-40 font-small me-1" type="button"
                                                    disabled>
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                        @endif

                                        @if (empty($varList->status_persyaratan) || empty($varList->status_pengurus) || empty($varList->status_dokumen))
                                        @elseif ($varList->status_persyaratan == 'N' || $varList->status_pengurus == 'N' || $varList->status_dokumen == 'N')
                                            <button type="button" wire:loading.remove
                                                wire:target="KirimNotif('{{ $varList->no_register }}')"
                                                class="btn btn-sm px-40 fs-40 font-small me-1"
                                                wire:click="KirimNotif('{{ $varList->no_register }}')">
                                                <span class="badge bg-light-danger text-danger font-medium">Kirim
                                                    Notif</span>
                                            </button>

                                            <div wire:loading wire:target="KirimNotif('{{ $varList->no_register }}')">
                                                <button class="btn btn-sm px-40 fs-40 font-small me-1" type="button"
                                                    disabled>
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="text-align: center"><b>Belum Ada Data</b></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            $(document).ready(function() {
                $('#tujuanormas').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('tujuanormas', e);
                        },
                    }
                });
            });

            window.addEventListener('OpenPersyaratan', event => {
                $('#tujuanormas').summernote('code', $('#tujuanormas').val());
                $('#tujuanormas').summernote('disable');
                $("#ModalPersyaratan").modal('show');
            })

            window.addEventListener('ClosePersyaratan', event => {
                $("#ModalPersyaratan").modal('hide');
            })

            window.addEventListener('openVerifikasiPengurus', event => {
                $("#ModalPengurus").modal('show');
            })
            window.addEventListener('closeVerifikasiPengurus', event => {
                $("#ModalPengurus").modal('hide');
            })

            window.addEventListener('openVerifikasiDokumen', event => {
                $("#ModalDokumen").modal('show');
            })
            window.addEventListener('closeVerifikasiDokumen', event => {
                $("#ModalDokumen").modal('hide');
            })

            window.addEventListener('openViewFile', event => {
                $("#ModalView").modal('show');
            })
            window.addEventListener('closeViewFile', event => {
                $("#ModalView").modal('hide');
            })

            window.addEventListener('swal:success', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type,
                    toast: event.detail.toast,
                    position: event.detail.position,
                    showConfirmButton: false,
                    timer: 2000
                });
            });

            window.addEventListener('swal:cek', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type,
                    confirmButtonColor: '#3085d6'
                });
            });
        </script>
    @endpush

    {{-- Modal Pesyaratan --}}
    <div wire:ignore.self class="modal fade" id="ModalPersyaratan" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Persyaratan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">No Register</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="noreg" name="noreg"
                                                wire:model.defer="noreg" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kategori"
                                                name="kategori" wire:model.defer="kategori" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nama ORMAS<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('namaormas') is-invalid @enderror"
                                                id="namaormas" name="namaormas" wire:model.defer="namaormas"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Singkatan ORMAS<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="singormas"
                                                name="singormas" wire:model.defer="singormas" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Jenis Akta Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="akta" name="akta"
                                                wire:model.defer="akta" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nama Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="namanotaris"
                                                name="namanotaris" wire:model.defer="namanotaris" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nomor Akta Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="noakta" name="noakta"
                                                placeholder="Masukkan Nomor Akta Notaris" wire:model.defer="noakta"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal Akta Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div wire:ignore>
                                                <span class="input-group-text">
                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="tglnotaris"
                                                name="tglnotaris" data-dtp="dtp_vDWAw" wire:model.defer="tglnotaris"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nomor Surat Permohonan<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nopermohonan"
                                                name="nopermohonan" placeholder="Masukkan Nomor Surat Permohonan"
                                                wire:model.defer="nopermohonan" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal Permohonan<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div wire:ignore>
                                                <span class="input-group-text">
                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="tglpermohonan"
                                                name="tglpermohonan" data-dtp="dtp_vDWAw"
                                                wire:model.defer="tglpermohonan" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Bidang Kegiatan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select class="form-control custom-select"
                                                style="width: 100%; height:36px;" id="bidang" name="bidang"
                                                wire:model="bidang" disabled>
                                                <option>{{ $bidang }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Sub Bidang Kegiatan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select class="form-control custom-select"
                                                style="width: 100%; height:36px;" name="subbidang" id="subbidang"
                                                wire:model.defer="subbidang" disabled>
                                                <option>{{ $subbidang }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Alamat Kantor<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea class="form-control" name="alamatktr" id="alamatktr" wire:model.defer="alamatktr"
                                                aria-label="With textarea" style="height: 56px; resize: none" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kelurahan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kelurahan"
                                            name="kelurahan" wire:model.defer="kelurahan" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kecamatan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kecamatan"
                                                name="kecamatan" wire:model.defer="kecamatan" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kota<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kota"
                                            name="kota" wire:model.defer="kota" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tempat Pendirian<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea class="form-control" name="tempatpendirian" wire:model.defer="tempatpendirian" id="tempatpendirian"
                                                aria-label="With textarea" style="height: 56px; resize: none" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal Pendirian<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div wire:ignore>
                                                <span class="input-group-text">
                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control id="tglpendirian"
                                                name="tglpendirian" data-dtp="dtp_vDWAw"
                                                wire:model.defer="tglpendirian" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nomor SK Kepengurusan<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="skpengurus"
                                                name="skpengurus" wire:model.defer="skpengurus" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Keputusan Tertinggi<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea class="form-control" name="keputusan" id="keputusan" wire:model.defer="keputusan"
                                                aria-label="With textarea" style="height: 56px; resize: none" disabled>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kepengurusan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select class="form-control custom-select"
                                                style="width: 100%; height:36px;" name="kepengurusan"
                                                id="kepengurusan" wire:model.defer="kepengurusan" disabled>
                                                <option>{{ $kepengurusan }}</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">NPWP</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control id="npwp" name="npwp"
                                                wire:model.defer="npwp" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Sumber Dana<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="sumberdana"
                                                name="sumberdana" wire:model.defer="sumberdana" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tujuan ORMAS<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-12">
                                        <div wire:ignore>
                                            <textarea class="summernote" id="tujuanormas" name="tujuanormas" wire:model.defer="tujuanormas"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">No. SK KEMENKUMHAM/KEMENDAGRI<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="skahu" name="skahu"
                                                wire:model.defer="skahu" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal SK<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div wire:ignore>
                                                <span class="input-group-text">
                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="tglskahu"
                                                name="tglskahu" data-dtp="dtp_vDWAw" wire:model.defer="tglskahu"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tahun<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tahunahu"
                                                name="tahunahu" wire:model.defer="tahunahu" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom"></div><br>

                        <form class="form-horizontal" method="post" wire:submit.prevent="store_persyaratan"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" class="form-control" id="noreg" name="noreg"
                                    wire:model.defer="noreg">
                                <div class="mb-2 row">
                                    <span class="badge bg-light-success text-success font-medium">
                                        <h4 class="card-title mb-0"> Form Verifikasi</h4>
                                    </span>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-md-3 control-label">Verifikasi</label>
                                    <div class="col-md-3">
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_verifikasiSyarat"
                                                    name="st_verifikasiSyarat" id="st_verifikasiSyarat"
                                                    type="checkbox" role="switch"
                                                    @if ($st_verifikasiSyarat) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Keterangan Verifikasi<span
                                            style="color:red">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control @error('ket_verifikasiSyarat') is-invalid @enderror" name="ket_verifikasiSyarat"
                                            id="ket_verifikasiSyarat" aria-label="With textarea" style="height: 56px"
                                            wire:model.defer="ket_verifikasiSyarat">
                                    </textarea>
                                        @error('ket_verifikasiSyarat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="p-3 border-top">
                                    <div class="d-flex">
                                        {{-- submit --}}
                                        <div wire:loading.remove wire:target="store_persyaratan">
                                            <button type="submit"
                                                class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                        </div>
                                        <div wire:loading wire:target="store_persyaratan">
                                            <button
                                                class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>

                                        {{-- reset --}}
                                        <div wire:loading.remove wire:target="resetVerifikasi">
                                            <button type="button" wire:click="resetVerifikasi"
                                                class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                        </div>
                                        <div wire:loading wire:target="resetVerifikasi">
                                            <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pengurus --}}
    <div wire:ignore.self class="modal fade" id="ModalPengurus" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Pengurus</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" wire:submit.prevent="store_pengurus" enctype="multipart/form-data">
                        @csrf
                        <div class="row border-bottom title-part-padding">
                            <label class="col-sm-2 control-label">No. Register
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="noreg" name="noreg"
                                    wire:model.defer="noreg" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- KETUA --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-bottom title-part-padding">
                                            <button type="button"
                                                class="btn d-flex btn-light-info w-100 d-block text-info font-medium">
                                                Ketua
                                                <span class="badge ms-auto bg-info">V</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-3 control-label">Nama
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group"><input type="text"
                                                            class="form-control" id="namaketua" name="namaketua"
                                                            wire:model.defer="namaketua" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">NIK
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="nikketua"
                                                            name="nikketua" wire:model.defer="nikketua" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">Masa Bakti
                                                </label>
                                                <div class="col-lg-9">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control" id="awalketua"
                                                                name="awalketua" data-dtp="dtp_vDWAw"
                                                                wire:model.defer="awalketua" disabled>
                                                            <span
                                                                style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="akhirketua" name="akhirketua"
                                                                data-dtp="dtp_vDWAw" wire:model.defer="akhirketua"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Verifikasi Ketua Section 1 --}}
                                            <div class="mb-2 row">
                                                <span class="badge bg-light-warning text-warning font-smal">
                                                    <h6 class="card-title mb-0"> Lembar Verifikasi
                                                    </h6>
                                                </span>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-6 control-label">
                                                    <h6 class="card-title mb-0"> Nama, NIK, Masa
                                                        Bakti
                                                    </h6>
                                                </label>

                                                <div class="col-md-4 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_verifikasi_ketua"
                                                            name="st_verifikasi_ketua" id="st_verifikasi_ketua"
                                                            type="checkbox" role="switch"
                                                            @if ($st_verifikasi_ketua) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Upload KTP
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($ktpketua)
                                                            @php
                                                                $path = explode('/', $ktpketua);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" wire:model.lazy="st_ktp_ketua"
                                                            name="st_ktp_ketua" id="st_ktp_ketua" type="checkbox"
                                                            role="switch"
                                                            @if ($st_ktp_ketua) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Upload Foto
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($fotoketua)
                                                            @php
                                                                $path = explode('/', $fotoketua);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_foto_ketua" name="st_foto_ketua"
                                                            id="st_foto_ketua" type="checkbox" role="switch"
                                                            @if ($st_foto_ketua) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Daftar Riwayat Hidup
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($cvketua)
                                                            @php
                                                                $path = explode('/', $cvketua);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" wire:model.lazy="st_cv_ketua"
                                                            name="st_cv_ketua" id="st_cv_ketua" type="checkbox"
                                                            role="switch"
                                                            @if ($st_cv_ketua) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-8 control-label mb-2">
                                                    <span class="badge bg-light-warning text-warning font-smal">
                                                        <h6 class="card-title mb-1"> Catatan Verifikasi :
                                                        </h6>
                                                    </span>
                                                </label>
                                                <textarea class="form-control @error('ket_verifikasi_ketua') is-invalid @enderror" name="ket_verifikasi_ketua"
                                                    id="ket_verifikasi_ketua" aria-label="With textarea" style="height: 56px"
                                                    wire:model.defer="ket_verifikasi_ketua">
                                                    </textarea>
                                                @error('ket_verifikasi_ketua')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- SEKRETARIS --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-bottom title-part-padding">
                                            <button type="button"
                                                class="btn d-flex btn-light-info w-100 d-block text-info font-medium">
                                                Sekretaris
                                                <span class="badge ms-auto bg-info">V</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-3 control-label">Nama
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group"><input type="text"
                                                            class="form-control" id="namasekretaris"
                                                            name="namasekretaris" wire:model.defer="namasekretaris"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">NIK
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="niksekretaris"
                                                            name="niksekretaris" wire:model.defer="niksekretaris"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">Masa Bakti
                                                </label>
                                                <div class="col-lg-9">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="awalsekretaris" name="awalsekretaris"
                                                                data-dtp="dtp_vDWAw" wire:model.defer="awalsekretaris"
                                                                disabled>
                                                            <span
                                                                style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="akhirsekretaris" name="akhirsekretaris"
                                                                data-dtp="dtp_vDWAw"
                                                                wire:model.defer="akhirsekretaris" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Verifikasi Sekretaris Section 1 --}}
                                            <div class="mb-2 row">
                                                <span class="badge bg-light-warning text-warning font-smal">
                                                    <h6 class="card-title mb-0"> Lembar Verifikasi
                                                    </h6>
                                                </span>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-6 control-label">
                                                    <h6 class="card-title mb-0"> Nama, NIK, Masa
                                                        Bakti
                                                    </h6>
                                                </label>

                                                <div class="col-md-4 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_verifikasi_sekretaris"
                                                            name="st_verifikasi_sekretaris"
                                                            id="st_verifikasi_sekretaris" type="checkbox"
                                                            role="switch"
                                                            @if ($st_verifikasi_sekretaris) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Upload KTP
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($ktpsekretaris)
                                                            @php
                                                                $path = explode('/', $ktpsekretaris);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_ktp_sekretaris"
                                                            name="st_ktp_sekretaris" id="st_ktp_sekretaris"
                                                            type="checkbox" role="switch"
                                                            @if ($st_ktp_sekretaris) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Upload Foto
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($fotosekretaris)
                                                            @php
                                                                $path = explode('/', $fotosekretaris);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_foto_sekretaris"
                                                            name="st_foto_sekretaris" id="st_foto_sekretaris"
                                                            type="checkbox" role="switch"
                                                            @if ($st_foto_sekretaris) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Daftar Riwayat Hidup
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($cvsekretaris)
                                                            @php
                                                                $path = explode('/', $cvsekretaris);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_cv_sekretaris" name="st_cv_sekretaris"
                                                            id="st_cv_sekretaris" type="checkbox" role="switch"
                                                            @if ($st_cv_sekretaris) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>

                                                <div class="mb-2 row">
                                                    <label class="col-md-8 control-label mb-2">
                                                        <span class="badge bg-light-warning text-warning font-smal">
                                                            <h6 class="card-title mb-1"> Catatan Verifikasi :
                                                            </h6>
                                                        </span>
                                                    </label>
                                                    <textarea class="form-control @error('ket_verifikasi_sekretaris') is-invalid @enderror"
                                                        name="ket_verifikasi_sekretaris" id="ket_verifikasi_sekretaris" aria-label="With textarea" style="height: 56px"
                                                        wire:model.defer="ket_verifikasi_sekretaris">
                                                        </textarea>
                                                    @error('ket_verifikasi_sekretaris')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- BENDAHARA --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-bottom title-part-padding">
                                            <button type="button"
                                                class="btn d-flex btn-light-info w-100 d-block text-info font-medium">
                                                Bendahara
                                                <span class="badge ms-auto bg-info">V</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-3 control-label">Nama
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group"><input type="text"
                                                            class="form-control" id="namabendahara"
                                                            name="namabendahara" wire:model.defer="namabendahara"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">NIK
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="nikbendahara"
                                                            name="nikbendahara" wire:model.defer="nikbendahara"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">Masa Bakti
                                                </label>
                                                <div class="col-lg-9">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="awalbendahara" name="awalbendahara"
                                                                data-dtp="dtp_vDWAw" wire:model.defer="awalbendahara"
                                                                disabled>
                                                            <span
                                                                style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="akhirbendahara" name="akhirbendahara"
                                                                data-dtp="dtp_vDWAw" wire:model.defer="akhirbendahara"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Verifikasi Bendahara Section 1 --}}
                                            <div class="mb-2 row">
                                                <span class="badge bg-light-warning text-warning font-smal">
                                                    <h6 class="card-title mb-0"> Lembar Verifikasi
                                                    </h6>
                                                </span>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-6 control-label">
                                                    <h6 class="card-title mb-0"> Nama, NIK, Masa
                                                        Bakti
                                                    </h6>
                                                </label>

                                                <div class="col-md-4 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_verifikasi_bendahara"
                                                            name="st_verifikasi_bendahara"
                                                            id="st_verifikasi_bendahara" type="checkbox"
                                                            role="switch"
                                                            @if ($st_verifikasi_bendahara) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Upload KTP
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($ktpbendahara)
                                                            @php
                                                                $path = explode('/', $ktpbendahara);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_ktp_bendahara" name="st_ktp_bendahara"
                                                            id="st_ktp_bendahara" type="checkbox" role="switch"
                                                            @if ($st_ktp_bendahara) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Upload Foto
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($fotobendahara)
                                                            @php
                                                                $path = explode('/', $fotobendahara);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_foto_bendahara"
                                                            name="st_foto_bendahara" id="st_foto_bendahara"
                                                            type="checkbox" role="switch"
                                                            @if ($st_foto_bendahara) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-sm-4 control-label">Daftar Riwayat Hidup
                                                </label>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        @if ($cvbendahara)
                                                            @php
                                                                $path = explode('/', $cvbendahara);
                                                            @endphp
                                                            <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                                target="_BLANK">
                                                                <i class="fas fa-eye" style="color: red"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_cv_bendahara" name="st_cv_bendahara"
                                                            id="st_cv_bendahara" type="checkbox" role="switch"
                                                            @if ($st_cv_bendahara) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-8 control-label mb-2">
                                                    <span class="badge bg-light-warning text-warning font-smal">
                                                        <h6 class="card-title mb-1"> Catatan Verifikasi :
                                                        </h6>
                                                    </span>
                                                </label>
                                                <textarea class="form-control @error('ket_verifikasi_bendahara') is-invalid @enderror"
                                                    name="ket_verifikasi_bendahara" id="ket_verifikasi_bendahara" aria-label="With textarea" style="height: 56px"
                                                    wire:model.defer="ket_verifikasi_bendahara">
                                                    </textarea>
                                                @error('ket_verifikasi_bendahara')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- PENDIRI --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-bottom title-part-padding">
                                            <button type="button"
                                                class="btn d-flex btn-light-info w-100 d-block text-info font-medium">
                                                Pendiri
                                                <span class="badge ms-auto bg-info">V</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-3 control-label">Nama
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="namapendiri" id="namapendiri" aria-label="With textarea" style="height: 56px"
                                                            wire:model.defer="namapendiri" disabled>
                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">NIK
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="nikpendiri"
                                                            name="nikpendiri" wire:model.defer="nikpendiri" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Verifikasi Ketua Section 1 --}}
                                            <div class="mb-2 row">
                                                <label class="col-md-3 control-label">
                                                    <span class="badge bg-light-warning text-warning font-smal">
                                                        <h6 class="card-title mb-0"> Verifikasi
                                                        </h6>
                                                    </span>
                                                </label>

                                                <div class="col-md-4 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_verifikasi_pendiri"
                                                            name="st_verifikasi_pendiri" id="st_verifikasi_pendiri"
                                                            type="checkbox" role="switch"
                                                            @if ($st_verifikasi_pendiri) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                                <div class="mb-2 mt-2 row">
                                                    <label class="col-md-8 control-label mb-2">
                                                        <span class="badge bg-light-warning text-warning font-smal">
                                                            <h6 class="card-title mb-1"> Catatan Verifikasi :
                                                            </h6>
                                                        </span>
                                                    </label>
                                                    <textarea class="form-control @error('ket_verifikasi_pendiri') is-invalid @enderror" name="ket_verifikasi_pendiri"
                                                        id="ket_verifikasi_pendiri" aria-label="With textarea" style="height: 56px"
                                                        wire:model.defer="ket_verifikasi_pendiri">
                                                        </textarea>
                                                    @error('ket_verifikasi_pendiri')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- PEMBINA --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-bottom title-part-padding">
                                            <button type="button"
                                                class="btn d-flex btn-light-info w-100 d-block text-info font-medium">
                                                Pembina
                                                <span class="badge ms-auto bg-info">V</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-3 control-label">Nama
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="namapembina" id="namapembina" aria-label="With textarea" style="height: 56px"
                                                            wire:model.defer="namapembina" disabled>
                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">NIK
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="nikpembina"
                                                            name="nikpembina" wire:model.defer="nikpembina" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Verifikasi Ketua Section 1 --}}
                                            <div class="mb-2 row">
                                                <label class="col-md-3 control-label">
                                                    <span class="badge bg-light-warning text-warning font-smal">
                                                        <h6 class="card-title mb-0"> Verifikasi
                                                        </h6>
                                                    </span>
                                                </label>

                                                <div class="col-md-4 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_verifikasi_pembina"
                                                            name="st_verifikasi_pembina" id="st_verifikasi_pembina"
                                                            type="checkbox" role="switch"
                                                            @if ($st_verifikasi_pembina) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                                <div class="mb-2 mt-2 row">
                                                    <label class="col-md-8 control-label mb-2">
                                                        <span class="badge bg-light-warning text-warning font-smal">
                                                            <h6 class="card-title mb-1"> Catatan Verifikasi :
                                                            </h6>
                                                        </span>
                                                    </label>
                                                    <textarea class="form-control @error('ket_verifikasi_pembina') is-invalid @enderror" name="ket_verifikasi_pembina"
                                                        id="ket_verifikasi_pembina" aria-label="With textarea" style="height: 56px"
                                                        wire:model.defer="ket_verifikasi_pembina">
                                                        </textarea>
                                                    @error('ket_verifikasi_pembina')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- PENASIHAT --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-bottom title-part-padding">
                                            <button type="button"
                                                class="btn d-flex btn-light-info w-100 d-block text-info font-medium">
                                                Penasihat
                                                <span class="badge ms-auto bg-info">V</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-3 control-label">Nama
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="namapenasihat" id="namapenasihat" aria-label="With textarea"
                                                            style="height: 56px" wire:model.defer="namapenasihat" disabled>
                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 control-label">NIK
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="nikpenasihat"
                                                            name="nikpenasihat" wire:model.defer="nikpenasihat"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Verifikasi Ketua Section 1 --}}
                                            <div class="mb-2 row">
                                                <label class="col-md-3 control-label">
                                                    <span class="badge bg-light-warning text-warning font-smal">
                                                        <h6 class="card-title mb-0"> Verifikasi
                                                        </h6>
                                                    </span>
                                                </label>

                                                <div class="col-md-4 d-flex align-items-stretch">
                                                    <span>
                                                        <label class="form-check-label">Tolak</label>
                                                    </span>&nbsp;
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            wire:model.lazy="st_verifikasi_penasihat"
                                                            name="st_verifikasi_penasihat"
                                                            id="st_verifikasi_penasihat" type="checkbox"
                                                            role="switch"
                                                            @if ($st_verifikasi_penasihat) checked @endif>
                                                        <label class="form-check-label">Setuju</label>
                                                    </div>
                                                </div>
                                                <div class="mb-2 mt-2 row">
                                                    <label class="col-md-8 control-label mb-2">
                                                        <span class="badge bg-light-warning text-warning font-smal">
                                                            <h6 class="card-title mb-1"> Catatan Verifikasi :
                                                            </h6>
                                                        </span>
                                                    </label>
                                                    <textarea class="form-control @error('ket_verifikasi_penasihat') is-invalid @enderror"
                                                        name="ket_verifikasi_penasihat" id="ket_verifikasi_penasihat" aria-label="With textarea" style="height: 56px"
                                                        wire:model.defer="ket_verifikasi_penasihat">
                                                        </textarea>
                                                    @error('ket_verifikasi_penasihat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="title-part-padding">
                            <div class="p-2 border-top">
                                <div class="d-flex">
                                    {{-- submit --}}
                                    <div wire:loading.remove wire:target="store_pengurus">
                                        <button type="submit"
                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                    </div>
                                    <div wire:loading wire:target="store_pengurus">
                                        <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>

                                    {{-- reset --}}
                                    <div wire:loading.remove wire:target="resetVerifikasi">
                                        <button type="button" wire:click="resetVerifikasi"
                                            class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                    </div>
                                    <div wire:loading wire:target="resetVerifikasi">
                                        <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Dokumen --}}
    <div wire:ignore.self class="modal fade" id="ModalDokumen" tabindex="-1"
        aria-labelledby="bs-example-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Dokumen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" wire:submit.prevent="store_dokumen" enctype="multipart/form-data">
                        @csrf
                        <div class="row title-part-padding">
                            <label class="col-sm-2 control-label">No. Register
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="noreg" name="noreg"
                                    wire:model.defer="noreg" disabled>
                            </div>
                            <label class="col-sm-2 control-label">Alamat
                            </label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="alamatktr" id="alamatktr" aria-label="With textarea" style="height: 56px"
                                    wire:model.defer="alamatktr" disabled>
                        </textarea>
                            </div>
                        </div>
                        <div class="row border-bottom title-part-padding">
                            <label class="col-sm-2 control-label">Nama ORMAS
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="namaormas" name="namaormas"
                                    wire:model.defer="namaormas" disabled>
                            </div>
                            <label class="col-sm-2 control-label">Singkatan ORMAS
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="singormas" name="singormas"
                                    wire:model.defer="singormas" disabled>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 mt-2 row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-lg-2 d-flex align-items-stretch"></div>
                                        <div class="col-lg-6 d-flex align-items-stretch">
                                            <span class="badge bg-light-warning text-warning font-smal">
                                                <h6 class="card-title mb-1"> Catatan Verifikasi :
                                                </h6>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="srtpermohonan" class="col-sm-3 form-label">Surat Permohonan
                                            Walikota</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($srtpermohonan)
                                                    @php
                                                        $path = explode('/', $srtpermohonan);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($srtpermohonan)
                                                @php
                                                    $tempUrl = explode('/', $srtpermohonan);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_srtpermohonan"
                                                    name="st_srtpermohonan" id="st_srtpermohonan" type="checkbox"
                                                    role="switch" @if ($st_srtpermohonan) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_srtpermohonan') is-invalid @enderror" name="ket_srtpermohonan"
                                                id="ket_srtpermohonan" aria-label="With textarea" style="height: 56px" wire:model.defer="ket_srtpermohonan">
                                        </textarea>
                                            @error('ket_srtpermohonan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="lambang" class="col-sm-3 form-label">Lambang</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($lambang)
                                                    @php
                                                        $path = explode('/', $lambang);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($lambang)
                                                @php
                                                    $tempUrl = explode('/', $lambang);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_lambang"
                                                    name="st_lambang" id="st_lambang" type="checkbox"
                                                    role="switch" @if ($st_lambang) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_lambang') is-invalid @enderror" name="ket_lambang" id="ket_lambang"
                                                aria-label="With textarea" style="height: 56px" wire:model.defer="ket_lambang">
                                        </textarea>
                                            @error('ket_lambang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="stempel" class="col-sm-3 form-label">Stempel</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($stempel)
                                                    @php
                                                        $path = explode('/', $stempel);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($stempel)
                                                @php
                                                    $tempUrl = explode('/', $stempel);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_stempel"
                                                    name="st_stempel" id="st_stempel" type="checkbox"
                                                    role="switch" @if ($st_stempel) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_stempel') is-invalid @enderror" name="ket_stempel" id="ket_stempel"
                                                aria-label="With textarea" style="height: 56px" wire:model.defer="ket_stempel">
                                        </textarea>
                                            @error('ket_stempel')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="aktanotaris" class="col-sm-3 form-label">Akta
                                            Notaris</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($aktanotaris)
                                                    @php
                                                        $path = explode('/', $aktanotaris);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($aktanotaris)
                                                @php
                                                    $tempUrl = explode('/', $aktanotaris);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_aktanotaris"
                                                    name="st_aktanotaris" id="st_aktanotaris" type="checkbox"
                                                    role="switch" @if ($st_aktanotaris) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_aktanotaris') is-invalid @enderror" name="ket_aktanotaris"
                                                id="ket_aktanotaris" aria-label="With textarea" style="height: 56px" wire:model.defer="ket_aktanotaris">
                                        </textarea>
                                            @error('ket_aktanotaris')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="adart" class="col-sm-3 form-label">AD ART</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($adart)
                                                    @php
                                                        $path = explode('/', $adart);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($adart)
                                                @php
                                                    $tempUrl = explode('/', $adart);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_adart"
                                                    name="st_adart" id="st_adart" type="checkbox"
                                                    role="switch" @if ($st_adart) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_adart') is-invalid @enderror" name="ket_adart" id="ket_adart"
                                                aria-label="With textarea" style="height: 56px" wire:model.defer="ket_adart">
                                        </textarea>
                                            @error('ket_adart')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="srtkepengurusan" class="col-sm-3 form-label">Surat Keputusan
                                            Kepengurusan</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($srtkepengurusan)
                                                    @php
                                                        $path = explode('/', $srtkepengurusan);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($srtkepengurusan)
                                                @php
                                                    $tempUrl = explode('/', $srtkepengurusan);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_srtkepengurusan"
                                                    name="st_srtkepengurusan" id="st_srtkepengurusan"
                                                    type="checkbox" role="switch"
                                                    @if ($st_srtkepengurusan) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_srtkepengurusan') is-invalid @enderror" name="ket_srtkepengurusan"
                                                id="ket_srtkepengurusan" aria-label="With textarea" style="height: 56px"
                                                wire:model.defer="ket_srtkepengurusan">
                                        </textarea>
                                            @error('ket_srtkepengurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="srtpernyataan" class="col-sm-3 form-label">Surat
                                            Pernyataan</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($srtpernyataan)
                                                    @php
                                                        $path = explode('/', $srtpernyataan);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($srtpernyataan)
                                                @php
                                                    $tempUrl = explode('/', $srtpernyataan);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_srtpernyataan"
                                                    name="st_srtpernyataan" id="st_srtpernyataan" type="checkbox"
                                                    role="switch" @if ($st_srtpernyataan) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_srtpernyataan') is-invalid @enderror" name="ket_srtpernyataan"
                                                id="ket_srtpernyataan" aria-label="With textarea" style="height: 56px" wire:model.defer="ket_srtpernyataan">
                                        </textarea>
                                            @error('ket_srtpernyataan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="kerjaormas" class="col-sm-3 form-label">Program Kerja
                                            Ormas</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($kerjaormas)
                                                    @php
                                                        $path = explode('/', $kerjaormas);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($kerjaormas)
                                                @php
                                                    $tempUrl = explode('/', $kerjaormas);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_kerjaormas"
                                                    name="st_kerjaormas" id="st_kerjaormas" type="checkbox"
                                                    role="switch" @if ($st_kerjaormas) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_kerjaormas') is-invalid @enderror" name="ket_kerjaormas"
                                                id="ket_kerjaormas" aria-label="With textarea" style="height: 56px" wire:model.defer="ket_kerjaormas">
                                        </textarea>
                                            @error('ket_kerjaormas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="srtdomisili" class="col-sm-3 form-label">Surat Keterangan
                                            Domisili Kantor</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($srtdomisili)
                                                    @php
                                                        $path = explode('/', $srtdomisili);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($srtdomisili)
                                                @php
                                                    $tempUrl = explode('/', $srtdomisili);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_srtdomisili"
                                                    name="st_srtdomisili" id="st_srtdomisili" type="checkbox"
                                                    role="switch" @if ($st_srtdomisili) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_srtdomisili') is-invalid @enderror" name="ket_srtdomisili"
                                                id="ket_srtdomisili" aria-label="With textarea" style="height: 56px" wire:model.defer="ket_srtdomisili">
                                        </textarea>
                                            @error('ket_srtdomisili')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="srtkepemilikan" class="col-sm-3 form-label">Surat
                                            Kepemilikan
                                            Kantor</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($srtkepemilikan)
                                                    @php
                                                        $path = explode('/', $srtkepemilikan);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($srtkepemilikan)
                                                @php
                                                    $tempUrl = explode('/', $srtkepemilikan);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_srtkepemilikan"
                                                    name="st_srtkepemilikan" id="st_srtkepemilikan"
                                                    type="checkbox" role="switch"
                                                    @if ($st_srtkepemilikan) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_srtkepemilikan') is-invalid @enderror" name="ket_srtkepemilikan"
                                                id="ket_srtkepemilikan" aria-label="With textarea" style="height: 56px"
                                                wire:model.defer="ket_srtkepemilikan">
                                        </textarea>
                                            @error('ket_srtkepemilikan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="fotokantor" class="col-sm-3 form-label">Foto Kantor Tampak
                                            Depan
                                            Dengan Plakat</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($fotokantor)
                                                    @php
                                                        $path = explode('/', $fotokantor);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($fotokantor)
                                                @php
                                                    $tempUrl = explode('/', $fotokantor);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_fotokantor"
                                                    name="st_fotokantor" id="st_fotokantor" type="checkbox"
                                                    role="switch" @if ($st_fotokantor) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_fotokantor') is-invalid @enderror" name="ket_fotokantor"
                                                id="ket_fotokantor" aria-label="With textarea" style="height: 56px" wire:model.defer="ket_fotokantor">
                                        </textarea>
                                            @error('ket_fotokantor')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="skuha" class="col-sm-3 form-label">SK KEMENKUMHAM/KEMENDAGRI</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group">
                                                @if ($skuha)
                                                    @php
                                                        $path = explode('/', $skuha);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif
                                            </div> --}}
                                            @if ($skuha)
                                                @php
                                                    $tempUrl = explode('/', $skuha);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_skuha"
                                                    name="st_skuha" id="st_skuha" type="checkbox"
                                                    role="switch" @if ($st_skuha) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_skuha') is-invalid @enderror" name="ket_skuha" id="ket_skuha"
                                                aria-label="With textarea" style="height: 56px" wire:model.defer="ket_skuha">
                                        </textarea>
                                            @error('ket_skuha')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="rekom" class="col-sm-3 form-label">Surat
                                            Rekomendasi</label>
                                        <div class="col-sm-1">
                                            {{-- <div class="form-group"> --}}
                                            {{-- @if ($rekom)
                                                    @php
                                                        $path = explode('/', $rekom);
                                                    @endphp
                                                    <a href="{{ route('display', ['path' => $path[0], 'filename' => $path[1]]) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye" style="color: red"></i>
                                                    </a>
                                                @endif --}}
                                            {{-- </div> --}}
                                            @if ($rekom)
                                                @php
                                                    $tempUrl = explode('/', $rekom);
                                                    $folder = $tempUrl[0];
                                                    $namefile = $tempUrl[1];
                                                @endphp

                                                <a wire:loading.remove
                                                    wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                    wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                    <i class="fas fa-eye" style="color: red"></i>
                                                </a>
                                                <a class="waves-effect">
                                                    <div wire:loading
                                                        wire:target="viewFile('{{ $folder }}' , '{{ $namefile }}')">
                                                        <span class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-stretch">
                                            <span>
                                                <label class="form-check-label">Tolak</label>
                                            </span>&nbsp;
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model.lazy="st_rekom"
                                                    name="st_rekom" id="st_rekom" type="checkbox"
                                                    role="switch" @if ($st_rekom) checked @endif>
                                                <label class="form-check-label">Setuju</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('ket_rekom') is-invalid @enderror" name="ket_rekom" id="ket_rekom"
                                                aria-label="With textarea" style="height: 56px" wire:model.defer="ket_rekom">
                                        </textarea>
                                            @error('ket_rekom')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 border-top">
                            <div class="d-flex">
                                {{-- submit --}}
                                <div wire:loading.remove wire:target="store_dokumen">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                </div>
                                <div wire:loading wire:target="store_dokumen">
                                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>

                                {{-- reset --}}
                                <div wire:loading.remove wire:target="resetVerifikasi">
                                    <button type="button" wire:click="resetVerifikasi"
                                        class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                </div>
                                <div wire:loading wire:target="resetVerifikasi">
                                    <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- IFRAME VIEW --}}
    <div wire:ignore.self class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">View Dokumen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeView"></button>
                </div>
                <div class="modal-body" style="background: rgb(56, 56, 61)">
                    @if ($url)
                        {{-- @php
                            $path = explode('/', $url);
                        @endphp --}}

                        {{-- {{ $url }} --}}

                        <object data="{{ asset('display/' . $url) }}" type="application/pdf"
                            class="modal-content" style="width: 100%; height:800px">
                        </object>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
