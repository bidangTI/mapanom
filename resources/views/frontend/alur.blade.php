@extends('frontend.app')
@section('content')
    <br><br>
    <section class="ttm-row history-section bg-img3 ttm-bgcolor-grey ttm-bg ttm-bgimage-yes clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row">
                <!-- row -->
                <div class="col-lg-8 offset-lg-2">
                    <!-- section title -->
                    <div class="section-title with-desc text-center clearfix">
                        <div class="title-header">
                            <br>
                            {{-- <h5>Our Services</h5> --}}
                            <h2 class="title">Alur Pendaftaran Keberadaan <span><br>
                                    Organisasi Kemasyarakatan</span></h2>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
            <!-- row end -->
            <!-- row -->

            <div class="row">
                <div class="history-slide owl-carousel" data-item="4" data-nav="false" data-dots="false" data-auto="false">
                    @foreach ($alur as $alurs)
                        <div class="ttm-history-box-wrapper">
                            <!-- ttm-history-box-wrapper  -->
                            <div class="ttm-history-box-icon-wrapper">
                                <!-- ttm-history-box-icon-wrapper  -->
                                <!--  featured-icon-box -->
                                <div class="featured-icon-box">
                                    <div class="featured-icon">
                                        <!--  featured-icon -->
                                        <div class="ttm-icon ttm-icon_element-bgcolor-white ttm-icon_element-size-md">
                                            <i class="flaticon flaticon-business-and-finance"></i><!--  ttm-icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ttm-history-box-border"></div><!-- ttm-history-box-border  -->
                            <div class="servicebox-number">
                                <h3>{{ $alurs->id }}</h3>
                            </div>
                            <div class="ttm-history-box-details">
                                <div class="ttm-historybox-title" style="text-align: centre">
                                    <h5>{{ $alurs->status }}</h5>
                                </div>
                                <!-- historybox-title  -->
                                {{-- <div class="ttm-historybox-description" style="text-align: left">
                                    <!-- description  -->
                                    <div id=ketView>
                                        {!! $alurs->keterangan !!}
                                    </div>

                                    {{-- <li>

                                    </li>
                                </div> --}}
                                {{-- <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20"
                                href="#">Read More <i class="ti ti-angle-double-right"></i></a> --}}
                            </div>
                        </div><!-- ttm-history-box-wrapper  END-->
                    @endforeach
                </div>
            </div><!-- row end-->
            {{-- <div class="row">
                <div class="col-md-12 text-center mt-45 res-991-mt-30">
                    <p class="mb-0">Don’t hesitate, contact us for better help and services. <strong><u><a href="#"
                                    class="ttm-textcolor-darkgrey"> View more
                                    Services</a></u></strong></p>
                </div>
            </div> --}}
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

        (+ketView.innerHTML)
        var ketView = document.getElementById('ketView');
        ketView.innerHTML = '';
    </script>
@endpush
