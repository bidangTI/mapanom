<div>
    <div class="col-md-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Kirim Data</h4>
                <p>
                    Silahkan Melakukan Proses Kirim Data Agar Dapat dilakukan Proses Verifikasi Oleh Administrator
                </p>
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
                                    Data Belum Lengkap, Silahkan Lakukan Pengisian Terlebih Dahulu. <br>
                                    @if (!empty($val->persyaratan->no_register))
                                        <li>Input Data : <b>Sudah</b></li>
                                    @else
                                        <li>Input Data : <b>Belum</b></li>
                                    @endif

                                    <li>Kepengurusan :<br>
                                        @if (!empty($val->ketua->no_register))
                                            1. Data Ketua : <b>Sudah</b><br>
                                        @else
                                            1. Data Ketua : <b>Belum</b><br>
                                        @endif
                                        @if (!empty($val->sekretaris->no_register))
                                            2. Data Sekretaris : <b>Sudah</b><br>
                                        @else
                                            2. Data Sekretaris : <b>Belum</b><br>
                                        @endif
                                        @if (!empty($val->bendahara->no_register))
                                            3. Data Bendahara : <b>Sudah</b><br>
                                        @else
                                            3. Data Bendahara : <b>Belum</b><br>
                                        @endif
                                        @if (!empty($val->pendiri->no_register))
                                            4. Data Pendiri : <b>Sudah</b><br>
                                        @else
                                            4. Data Pendiri : <b>Belum</b><br>
                                        @endif
                                        @if (!empty($val->pembina->no_register))
                                            5. Data Pembina : <b>Sudah</b><br>
                                        @else
                                            5. Data Pembina : <b>Belum</b><br>
                                        @endif
                                        @if (!empty($val->penasihat->no_register))
                                            6. Data Penasihat : <b>Sudah</b><br>
                                        @else
                                            6. Data Penasihat : <b>Belum</b><br>
                                        @endif
                                    </li>
                                    @if (!empty($val->dokumen->no_register))
                                        <li>Upload Dokumen : <b>Sudah</b></li>
                                    @else
                                        <li>Upload Dokumen : <b>Belum</b></li>
                                    @endif
                                @endif
                            </div>
                        @else
                            <p>
                            <h5 class="card-title mb-0">Data Sudah Terkirim dan Dalam Proses Verifikasi</h5><br>
                            Silahkan Lakukan Pemantaun Secara berkala pada aplikasi ini untuk update progress pengajuan Surat Permohonan keberadaan.
                            </p>
                        @endif
                    @endforeach
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
        </script>
    @endpush
</div>
