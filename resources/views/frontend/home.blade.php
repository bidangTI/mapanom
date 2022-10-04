@extends('frontend.app')
@section('slider')
    <rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery">
        <rs-module id="rev_slider_1_1" data-version="6.0.1" class="rev_slider_1_1_height">
            <rs-slides>
                <!-- rs-slide -->

                @foreach ($slider as $res)
                    <rs-slide data-key="rs-{{ $res->id }}" data-title="Slide"
                        data-thumb="{{ asset('storage/app/' . $res->gambar) }}"
                        data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">

                        <img src="{{ asset('storage/app/' . $res->gambar) }}" title="slider-mainbg-003" width="auto"
                            height="auto" class="rev-slidebg" data-no-retina>

                        <rs-layer id="slider-1-slide-2-layer-7 " class="tm-img-bounce" data-type="image" data-rsp_ch="on"
                            data-xy="xo:30px,30px,30px,30px;yo:206px,94px,66px,36px;"
                            data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                            data-dim="w:1200px,1200px,1200px,1200px;h:678px,678px,678px,678px;" data-vbility="t,t,t,f"
                            data-frame_0="sX:0.9;sY:0.9;" data-frame_1="e:Linear.easeNone;st:100;sp:400;sR:100;"
                            data-frame_999="o:0;st:w;sR:8500;" style="z-index:8;font-family:Roboto;">

                            <img src="{{ Storage::url($res->gambar) }}" class="d-flex" data-no-retina
                                alt="{{ $res->gambar }}">
                        </rs-layer>
                    </rs-slide>
                @endforeach

                <!-- rs-slide -->
            </rs-slides>
        </rs-module><!-- rs-module -->
    </rs-module-wrap>
@endsection
@section('content')
    <section class="ttm-row tab-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- section title -->
                    <div class="section-title text-center with-desc clearfix">
                        <div class="title-header">
                            <h2>Apa Sih ....???</h2>
                            <h2 class="title">Persyaratan Administrasi Keberadaan <br>
                                <span>Organisasi Kemasyarakatan dan Partai Politik</span>
                            </h2>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
            <!-- row end -->
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ttm-tabs text-center ttm-tab-style-classic style1">
                        <ul class="tabs mb-20">
                            <!-- tabs -->
                            @foreach ($persyaratan as $res => $item)
                                <li class="tab {{ $loop->first ? 'active' : '' }}">
                                    <a href="#">
                                        <i class="flaticon flaticon-report"></i> {{ $item->kategori->kategori }}
                                    </a>
                                </li>
                            @endforeach
                        </ul><!-- tabs end-->
                        <div class="content-tab width-100 box-shadow">
                            <!--content-tabs -->
                            <!-- content-inner -->

                            @foreach ($persyaratan as $Nomor => $res)
                                <div class="content-inner">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-justify">
                                                <h3 class="title fs-30">Syarat Administrasi Keberadaan
                                                    {{ $res->kategori->kategori }}</h3>

                                                <div class="ttm-list ttm-list-textsize-medium pt-15">

                                                    <i class="fa fa-arrow-circle-right ttm-textcolor-skincolor"></i>
                                                    <b> Dasar Hukum :</b>

                                                    {{-- {{ htmlentities($res->dasar_hukum) }} --}}
                                                    <div id="dhView">
                                                        {!! $res->dasar_hukum !!}
                                                    </div>

                                                </div>

                                                <div class="ttm-list ttm-list-textsize-medium pt-15">

                                                    <i class="fa fa-arrow-circle-right ttm-textcolor-skincolor"></i>
                                                    <b>Persyaratan :</b>
                                                    <div class="syaratView">
                                                        {!! $res->syarat !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
<<<<<<< Updated upstream
=======
    
        (+dhView.innerHTML)
        var dhView = document.getElementById('dhView');
        dhView.innerHTML = '';
>>>>>>> Stashed changes

        (+syaratView.innerHTML)
        var syaratView = document.getElementById('syaratView');
        syaratView.innerHTML = '';
<<<<<<< Updated upstream
=======
 
>>>>>>> Stashed changes
    </script>
@endpush
