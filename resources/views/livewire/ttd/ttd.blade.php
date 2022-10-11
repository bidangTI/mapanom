<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Tanda Tangan</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Register<br>Kategori</th>
                                <th>Tanggal Permohonan<br>Nomer Surat Permohonan</th>
                                <th>Nama Ormas</th>
                                <th>Data Dukung</th>
                                <th>Aksi</th>
                                <th>Status Tanda Tangan</th>
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
                                    <td style="text-align: center">
                                        @if ($varList->srtkeberadaan->isNotEmpty())
                                            {{-- @if ($varList->srtkeberadaan[0]->status != 'Y') --}}
                                                @if ($varList->status_persyaratan == 'Y' && $varList->status_pengurus == 'Y' && $varList->status_dokumen == 'Y')
                                                    @if ($varList->srtkeberadaan[0]->id_ttd == 0 && $varList->srtkeberadaan[0]->status != 'Y')
                                                        <button type="button" wire:loading.remove
                                                            wire:target="TandaTangan('{{ $varList->no_register }}')"
                                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                                            wire:click="TandaTangan('{{ $varList->no_register }}')">
                                                            <span
                                                                class="badge bg-light-danger text-danger font-medium">Tanda
                                                                Tangan</span>
                                                        </button>
                                                        <div wire:loading
                                                            wire:target="TandaTangan('{{ $varList->no_register }}')">
                                                            <button class="btn btn-sm px-40 fs-40 font-small me-1"
                                                                type="button" disabled>
                                                                <span class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                Loading...
                                                            </button>
                                                        </div>
                                                    @else
                                                        @if ($varList->srtkeberadaan[0]->file_surat)
                                                            @php
                                                                $tempUrl = explode('/', $varList->srtkeberadaan[0]->file_surat);
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
                                                    @endif
                                                @endif
                                            {{-- @endif --}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($varList->srtkeberadaan->isNotEmpty())
                                            @if ($varList->srtkeberadaan[0]->id_ttd == 0)
                                                <span class="badge bg-light-danger text-danger font-medium">Belum</span>
                                                <br>
                                                Nomer Surat : {{ $varList->srtkeberadaan[0]->nomor_surat }}<br>
                                                Tanggal Surat :
                                                {{ \Carbon\Carbon::parse($varList->srtkeberadaan[0]->tanggal_surat)->isoFormat('DD-MM-YYYY') }}
                                            @elseif ($varList->srtkeberadaan[0]->id_ttd != 0)
                                                <span class="badge bg-light-success text-success font-medium">Sudah
                                                    Tandangan</span>
                                                <br>
                                                Nomer Surat : {{ $varList->srtkeberadaan[0]->nomor_surat }}<br>
                                                Tanggal Surat :
                                                {{ \Carbon\Carbon::parse($varList->srtkeberadaan[0]->tanggal_surat)->isoFormat('DD-MM-YYYY') }}
                                                <p>
                                                    Ditandatangani Tanggal :
                                                    {{ \Carbon\Carbon::parse($varList->srtkeberadaan[0]->updated_at)->isoFormat('DD-MM-YYYY, H:m:s') }}
                                                    WIB
                                                    <br>
                                                    Oleh :
                                                    @foreach ($dataUser as $valUser)
                                                        @if ($valUser->id == $varList->srtkeberadaan[0]->id_ttd)
                                                            {{ $valUser->name }}
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                    NIP :
                                                    @foreach ($dataUser as $valUser)
                                                        @if ($valUser->id == $varList->srtkeberadaan[0]->id_ttd)
                                                            {{ $valUser->nip }}
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                    Jabatan :
                                                    @foreach ($dataUser as $valUser)
                                                        @if ($valUser->id == $varList->srtkeberadaan[0]->id_ttd)
                                                            {{ $valUser->jabatan }}
                                                        @endif
                                                    @endforeach
                                                </p>
                                            @endif
                                        @else
                                            <span class="badge bg-light-danger text-danger font-medium">Belum Ambil
                                                Nomer</span>
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
                init();
            });
            $('#tglsurat').on('change', function(e) {
                @this.set('tglsurat', e.target.value);
            });
            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            function init() {
                $('#tglsurat').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
            }


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
                // location.reload();
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

            window.addEventListener('swal:confirmTTD', event => {
                Swal.fire({
                        title: event.detail.message,
                        icon: event.detail.type,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('flagttd', event.detail.id);
                        }
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
                                            <input type="text" class="form-control" id="bidang" name="bidang"
                                                wire:model.defer="bidang" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Sub Bidang Kegiatan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="subbidang"
                                                name="subbidang" wire:model.defer="subbidang" disabled>
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
                                    <label class="col-md-3 control-label">Kota<span style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kota" name="kota"
                                                wire:model.defer="kota" disabled>
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
                                                aria-label="With textarea" style="height: 56px; resize: none" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kepengurusan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kepengurusan"
                                                name="kepengurusan" wire:model.defer="kepengurusan" disabled>
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
                        <div class="row border-bottom">
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
                                        </div>
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
    <div wire:ignore.self class="modal fade" id="ModalDokumen" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Dokumen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <div class="row border-bottom">
                                <div class="col-lg-12">
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 row">
                                        <label for="skuha" class="col-sm-3 form-label">SK
                                            KEMENKUMHAM/KEMENDAGRI</label>
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
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
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
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
                    <h4 class="modal-title" id="myLargeModalLabel">View Surat Keberadaan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeView"></button>
                </div>
                <div class="modal-body" style="background: rgb(56, 56, 61)">
                    @if ($url)
                        <iframe src="{{ asset('display/' . $url) }}" style="width: 100%; height:800px"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
