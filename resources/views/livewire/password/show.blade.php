<div>
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="d-flex border-bottom title-part-padding align-items-center">
                <div>
                    <h4 class="card-title mb-0">Reset Password</h4>
                </div>
            </div>
            <div class="card-body">
                {{-- {{ json_encode($pass) }} --}}
                <form class="mt-2" method="post" wire:submit.prevent="store_password">
                    @csrf

                    <input type="hidden" class="form-control" id="idUser" name="idUser" wire:model.defer="idUser">

                    <div class="form-group">
                        <input class="form-control @error('passwordReset') is-invalid @enderror" type="password"
                            id="passwordReset" name="passwordReset" autocomplete="off" wire:model.defer="passwordReset">
                        <div class="invalid-feedback">
                            @error('passwordReset')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="p-3 border-top">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="store_password">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                            </div>
                            <div wire:loading wire:target="store_password">
                                <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                    type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>

                            {{-- reset --}}
                            {{-- <div wire:loading.remove wire:target="resetVerifikasi">
                                <button type="button" wire:click="resetVerifikasi"
                                    class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                            </div>
                            <div wire:loading wire:target="resetVerifikasi">
                                <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light" type="button"
                                    disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
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

            window.addEventListener('swal:error', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type,
                    toast: event.detail.toast,
                    position: event.detail.position,
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endpush
</div>
