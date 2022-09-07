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
                                    Organisasi Kemasyarakatan & Partai Politik</span></h2>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
            <!-- row end -->
            <!-- row -->
            <div class="row">
                <div class="history-slide owl-carousel" data-item="5" data-nav="false" data-dots="false" data-auto="false">
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
                            <h3>1</h3>
                        </div>
                        <div class="ttm-history-box-details">
                            <div class="ttm-historybox-title">
                                <h5>Daftar Akun</h5>
                            </div><!-- historybox-title  -->
                            <div class="ttm-historybox-description" style="text-align: left">
                                <!-- description  -->
                                <li>Buat Akun</li>
                                <li>Pilih Menu Buat Akun</li>
                                <li>Verifikasi Akun Diterima akan ada Notifikasi lewat e-Mail</li>
                                <li>Silahkan Login Menggunakan Link yang sudah dikirim</li>
                                <li>Lengkapi Data dan unggah File Pendukung</li>
                            </div>
                            {{-- <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20"
                                href="#">Read More <i class="ti ti-angle-double-right"></i></a> --}}
                        </div>
                    </div><!-- ttm-history-box-wrapper  END-->
                    <div class="ttm-history-box-wrapper">
                        <!-- ttm-history-box-wrapper  -->
                        <div class="ttm-history-box-icon-wrapper">
                            <!-- ttm-history-box-icon-wrapper  -->
                            <!--  featured-icon-box -->
                            <div class="featured-icon-box">
                                <div class="featured-icon">
                                    <!--  featured-icon -->
                                    <div class="ttm-icon ttm-icon_element-bgcolor-white ttm-icon_element-size-md">
                                        <i class="flaticon flaticon-computer"></i><!--  ttm-icon -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ttm-history-box-border"></div><!-- ttm-history-box-border  -->
                        <div class="servicebox-number">
                            <h3>2</h3>
                        </div>
                        <div class="ttm-history-box-details">
                            <div class="ttm-historybox-title">
                                <h5>Verifikasi Data</h5>
                            </div><!-- historybox-title  -->
                            <div class="ttm-historybox-description" style="text-align: left">
                                <!-- description  -->
                                <li>Data dan File Pendukung akan diverifikasi oleh Admin</li>
                                <li>Lakukan pemantauan pada aplikasi ketika proses Verifikasi Data berlangsung</li>
                                <li>Jika terdapat ketidak sesuaian, data akan ditolak</li>
                                <li>Silahkan lakukan perbaikan data dengan Login menggunakan Akun yang sudah diberikan</li>
                            </div>
                            {{-- <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20"
                                href="#">Read More <i class="ti ti-angle-double-right"></i></a> --}}
                        </div>
                    </div><!-- ttm-history-box-wrapper  END-->
                    <div class="ttm-history-box-wrapper">
                        <!-- ttm-history-box-wrapper  -->
                        <div class="ttm-history-box-icon-wrapper">
                            <!-- ttm-history-box-icon-wrapper  -->
                            <!--  featured-icon-box -->
                            <div class="featured-icon-box">
                                <div class="featured-icon">
                                    <!--  featured-icon -->
                                    <div class="ttm-icon ttm-icon_element-bgcolor-white ttm-icon_element-size-md">
                                        <i class="flaticon flaticon-data"></i><!--  ttm-icon -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ttm-history-box-border"></div><!-- ttm-history-box-border  -->
                        <div class="servicebox-number">
                            <h3>3</h3>
                        </div>
                        <div class="ttm-history-box-details">
                            <div class="ttm-historybox-title">
                                <h5>Verifikasi Lapangan</h5>
                            </div><!-- historybox-title  -->
                            <div class="ttm-historybox-description" style="text-align: left">
                                <!-- description  -->
                                <li>Verifikasi Lapangan akan dilakukan apa bila data yang diinputkan sudah sesuai dengan persyaratan</li>
                            </div>
                            {{-- <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20"
                                href="#">Read More <i class="ti ti-angle-double-right"></i></a> --}}
                        </div>
                    </div><!-- ttm-history-box-wrapper  END-->
                    <div class="ttm-history-box-wrapper">
                        <!-- ttm-history-box-wrapper  -->
                        <div class="ttm-history-box-icon-wrapper">
                            <!-- ttm-history-box-icon-wrapper  -->
                            <!--  featured-icon-box -->
                            <div class="featured-icon-box">
                                <div class="featured-icon">
                                    <!--  featured-icon -->
                                    <div class="ttm-icon ttm-icon_element-bgcolor-white ttm-icon_element-size-md">
                                        <i class="flaticon flaticon-global-1"></i><!--  ttm-icon -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ttm-history-box-border"></div><!-- ttm-history-box-border  -->
                        <div class="servicebox-number">
                            <h3>4</h3>
                        </div>
                        <div class="ttm-history-box-details">
                            <div class="ttm-historybox-title">
                                <h5>Penerbitan Surat Keberadaan</h5>
                            </div><!-- historybox-title  -->
                            <div class="ttm-historybox-description" style="text-align: left">
                                <!-- description  -->
                               <li>Penerbitan Surat Keberadaan akan diberikan jika verifikasi data dan verifikasi lapangan sudah sesuai</li>
                                <li>Silahkan Download Surat Keberadaan Lewat Aplikasi</li>
                            </div>
                            {{-- <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20"
                                href="#">Read More <i class="ti ti-angle-double-right"></i></a> --}}
                        </div>
                    </div><!-- ttm-history-box-wrapper  END-->
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
                            <h3>5</h2>
                        </div>
                        <div class="ttm-history-box-details">
                            <div class="ttm-historybox-title">
                                <h5>Selesai</h5>
                            </div><!-- historybox-title  -->
                            <div class="ttm-historybox-description" style="text-align: left">
                                <!-- description  -->
                          <li>Proses Selesai</li>
                            </div>
                            {{-- <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20"
                                href="#">Read More <i class="ti ti-angle-double-right"></i></a> --}}
                        </div>
                    </div><!-- ttm-history-box-wrapper  END-->
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
