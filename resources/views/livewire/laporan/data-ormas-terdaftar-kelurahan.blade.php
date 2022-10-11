<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Tabel ORMAS Terdaftar PerKelurahan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="form-horizontal" method="post" wire:submit.prevent="">
                    @csrf
                    <div class="row">
                        <div class="mb-3 row">
                            <label class="col-md-1 control-label">Kelurahan<span style="color:red">*</span></label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <select class="form-control custom-select @error('kelurahan') is-invalid @enderror"
                                        style="width: 100%; height:36px;" id="kelurahan" name="kelurahan"
                                        wire:model="kelurahan" autocomplete="off">
                                        <option>--- Pilih ---</option>
                                        @foreach ($ResKelurahan as $res)
                                            <option value="{{ $res->id }}">
                                                {{ $res->nama_kelurahan }} - Kecamatan
                                                {{ $res->datakecamatan->nama_kecamatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelurahan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex">
                                    <div wire:loading.remove wire:target="cetakPDF">
                                        <button type="button" wire:click="cetakPDF"
                                            class="btn btn-danger rounded-pill px-4 waves-effect waves-light">
                                            <i class="bi-files"></i> Cetak PDF</button>
                                    </div>
                                    <div wire:loading wire:target="cetakPDF">
                                        <button class="btn btn-danger rounded-pill px-4 waves-effect waves-light"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                    &nbsp;
                                    <div wire:loading.remove wire:target="cetakExcel">
                                        <button type="button" wire:click="cetakExcel"
                                            class="btn btn-success rounded-pill px-4 waves-effect waves-light">
                                            <i class="bi-files"></i> Cetak Excel</button>
                                    </div>
                                    <div wire:loading wire:target="cetakExcel">
                                        <button class="btn btn-success rounded-pill px-4 waves-effect waves-light"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="border-bottom"></div><br>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="ormas-kecamatan" class="table table-striped table-bordered display text-wrap"
                        style="width:100%" wire:ignore.self>
                        <thead style="text-align: center">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama ORMAS</th>
                                <th rowspan="2">Alamat ORMAS</th>
                                <th rowspan="2">Bidang Kekhususan<br>Sub Bidang</th>
                                <th rowspan="2">SKT/AHU</th>
                                <th rowspan="2">Nomor Pendaftaran<br>Nomor Registrasi<br>Tanggal Register</th>
                                <th colspan="3">Pengurus</th>
                                <th rowspan="2">Telp</th>
                                {{-- <th></th> --}}
                            </tr>
                            <tr>
                                <th>Ketua</th>
                                <th>Sekretaris</th>
                                <th>Bendahara</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($dataOrmas))
                                @foreach ($dataOrmas as $number => $valOrmas)
                                    <tr>
                                        <td>{{ $number + 1 }}</td>
                                        <td>{{ $valOrmas->persyaratan->nama_ormaspol }}</td>
                                        <td>{{ $valOrmas->persyaratan->alamat_kantor_ormaspol }},
                                            @foreach ($ResKelurahan as $valKelurahan)
                                                @if ($valKelurahan->id == $valOrmas->persyaratan->kelurahan)
                                                    Kelurahan {{ $valKelurahan->nama_kelurahan }},
                                                @endif
                                            @endforeach
                                            @foreach ($dataKecamatan as $valKecamatan)
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
                            @endif
                        </tbody>
                    </table>
                </div>
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

            init();
            $('#kelurahan').on('change', function(e) {
                @this.set('kelurahan', e.target.value);
            });

        });

        window.livewire.hook('message.processed', (message, component) => {
            init();
        });

        function init() {
            $('#kelurahan').select2({
                placeholder: '--- Pilih ---'
            });

            $('#ormas-kecamatan').dataTable();
        }
    </script>
@endpush
</div>
