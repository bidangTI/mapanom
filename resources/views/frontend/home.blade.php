@extends('frontend.app')
@section('slider')
<rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery">
    <rs-module id="rev_slider_1_1" data-version="6.0.1" class="rev_slider_1_1_height">
        <rs-slides>
            <!-- rs-slide -->
            <rs-slide data-key="rs-3" data-title="Slide"
                data-thumb="{{ asset('frontafs/images/vector_page/vectorpage-banner-01.jpg') }}"
                data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">

                <img src="{{ asset('frontafs/images/vector_page/vectorpage-banner-01.jpg') }}" title="slider-mainbg-003"
                    width="1920" height="790" class="rev-slidebg" data-no-retina>

                <rs-layer id="slider-1-slide-1-layer-0" data-type="text" data-color="#2d4a8a" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,-364px;yo:316px,170px,84px,61px;"
                    data-text="w:normal;s:18,15,15,10;l:25,20,15,9;fw:500;" data-vbility="t,t,t,f"
                    data-frame_0="x:-50,-41,-31,-19;" data-frame_1="e:Linear.easeNone;st:120;sp:400;sR:120;"
                    data-frame_999="o:0;st:w;sR:8480;" style="z-index:21;font-family:Poppins;">Delight your
                    Customers
                </rs-layer>

                <rs-layer id="slider-1-slide-1-layer-1" data-type="shape" data-rsp_ch="on"
                    data-xy="xo:904px,746px,-119px,-73px;yo:329px,181px,136px,83px;"
                    data-text="w:normal;s:20,16,12,7;l:0,20,15,9;" data-dim="w:36px,29px,22px,13px;h:2px,1px,1px,1px;"
                    data-vbility="t,t,f,f" data-frame_0="x:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:190;sp:200;sR:190;" data-frame_999="o:0;st:w;sR:8610;"
                    style="z-index:20;background-color:#2d4a8a;font-family:Roboto;">
                </rs-layer>

                <a id="slider-1-slide-1-layer-2" class="rs-layer" href="#" target="_self" rel="nofollow"
                    data-type="text" data-color="#1c2842"
                    data-xy="x:l,l,c,c;xo:900px,743px,75px,0;yo:598px,403px,320px,233px;"
                    data-text="w:normal;s:15,12,12,12;l:29,23,25,30;fw:600;a:center;"
                    data-padding="t:11,9,7,4;r:35,29,22,14;b:11,9,7,4;l:35,29,22,14;"
                    data-border="bos:solid;boc:#1c2842;bow:1px,1px,1px,1px;" data-frame_0="y:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:760;sp:500;sR:760;" data-frame_999="o:0;st:w;sR:7740;"
                    data-frame_hover="c:#fff;bgc:#1c2842;boc:#1c2842;bos:solid;bow:1px,1px,1px,1px;"
                    style="z-index:15;font-family:Poppins;">Contact Us
                </a>


                <rs-layer id="slider-1-slide-1-layer-3" data-type="text" data-color="#1c2842" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,0;yo:357px,204px,114px,59px;"
                    data-text="w:normal;s:50,41,45,37;l:70,57,50,60;fw:600;" data-frame_0="x:-50,-41,-31,-19;"
                    data-frame_1="e:Linear.easeNone;st:260;sp:800;sR:260;" data-frame_999="o:0;st:w;sR:7940;"
                    style="z-index:19;font-family:Poppins;">Dont’t Listen to What
                </rs-layer>


                <rs-layer id="slider-1-slide-1-layer-4" data-type="text" data-color="#1c2842"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,0;yo:428px,263px,163px,104px;"
                    data-text="w:normal;s:50,41,45,37;l:72,59,60,60;fw:600;" data-frame_0="x:-50,-41,-31,-19;"
                    data-frame_1="st:410;sp:800;sR:410;" data-frame_999="o:0;st:w;sR:7790;"
                    style="z-index:18;font-family:Poppins;">They Say. <strong class="ttm-textcolor-skincolor">Go
                        See</strong>
                </rs-layer>

                <a id="slider-1-slide-1-layer-6" class="rs-layer" href="#" target="_self" rel="nofollow"
                    data-type="text" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,-74px,0;yo:598px,403px,319px,180px;"
                    data-text="w:normal;s:15,12,12,12;l:27,22,25,30;fw:600;a:center;"
                    data-padding="t:12,10,8,5;r:35,29,22,14;b:15,12,9,6;l:35,29,22,14;" data-frame_0="y:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:720;sp:500;sR:720;" data-frame_999="o:0;st:w;sR:7780;"
                    data-frame_hover="c:#fff;bgc:#1c2842;"
                    style="z-index:16;background-color:#2d4a8a;font-family:Poppins;">View More Details
                </a>

                <rs-layer id="slider-1-slide-1-layer-7" class="tm-img-bounce" data-type="image" data-rsp_ch="on"
                    data-xy="xo:-110px,-132px,-523px,-267px;yo:206px,94px,66px,36px;"
                    data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                    data-dim="w:697px,575px,436px,268px;h:537px,443px,336px,207px;" data-vbility="t,t,t,f"
                    data-frame_0="sX:0.9;sY:0.9;" data-frame_1="e:Linear.easeNone;st:100;sp:400;sR:100;"
                    data-frame_999="o:0;st:w;sR:8500;" style="z-index:8;font-family:Roboto;"><img
                        src="{{ asset('frontafs/images/vector_page/vectorpage-banner-single_img1.png') }}"
                        width="807" height="622" data-no-retina alt="banner-single_img1">
                </rs-layer>


                <rs-layer id="slider-1-slide-1-layer-12" data-type="text" data-color="#6e6e6e" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,0;yo:509px,330px,237px,0;"
                    data-text="w:normal;s:15,15,15,9;l:28,23,27,16;fw:400,400,500,500;a:left,left,center;"
                    data-vbility="t,t,t,f" data-frame_0="y:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:630;sp:500;sR:630;" data-frame_999="o:0;st:w;sR:7870;"
                    style="z-index:17;font-family:Poppins;">We are equipped with an updated technical knowledge
                    to serve <br> customers properly. Our method of application industry.
                </rs-layer>

            </rs-slide>
            <!-- rs-slide -->

            <!-- rs-slide -->
            <rs-slide data-key="rs-4" data-title="Slide"
                data-thumb="{{ asset('frontafs/images/vector_page/vectorpage-banner-01.jpg') }}"
                data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">

                <img src="{{ asset('frontafs/images/vector_page/vectorpage-banner-01.jpg') }}"
                    title="slider-mainbg-004" width="1920" height="790" class="rev-slidebg" data-no-retina>

                <rs-layer id="slider-1-slide-3-layer-0" data-type="text" data-color="#2d4a8a" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,-364px;yo:316px,170px,84px,61px;"
                    data-text="w:normal;s:18,15,15,10;l:25,20,15,9;fw:500;" data-vbility="t,t,t,f"
                    data-frame_0="x:-50,-41,-31,-19;" data-frame_1="e:Linear.easeNone;st:120;sp:400;sR:120;"
                    data-frame_999="o:0;st:w;sR:8480;" style="z-index:21;font-family:Poppins;">Trust and
                    Client Focus
                </rs-layer>

                <rs-layer id="slider-1-slide-3-layer-1" data-type="shape" data-rsp_ch="on"
                    data-xy="xo:890px,746px,-119px,-73px;yo:329px,181px,136px,83px;"
                    data-text="w:normal;s:20,16,12,7;l:0,20,15,9;" data-dim="w:36px,29px,22px,13px;h:2px,1px,1px,1px;"
                    data-vbility="t,t,f,f" data-frame_0="x:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:190;sp:200;sR:190;" data-frame_999="o:0;st:w;sR:8610;"
                    style="z-index:20;background-color:#2d4a8a;font-family:Roboto;">
                </rs-layer>

                <a id="slider-1-slide-3-layer-2" class="rs-layer" href="#" target="_self" rel="nofollow"
                    data-type="text" data-color="#1c2842" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:845px,743px,60px,0;yo:598px,403px,320px,233px;"
                    data-text="w:normal;s:15,12,12,12;l:29,23,25,30;fw:600;a:center;"
                    data-padding="t:11,9,7,4;r:35,29,22,14;b:11,9,7,4;l:35,29,22,14;"
                    data-border="bos:solid;boc:#1c2842;bow:1px,1px,1px,1px;" data-frame_0="y:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:760;sp:500;sR:760;" data-frame_999="o:0;st:w;sR:7740;"
                    data-frame_hover="c:#fff;bgc:#1c2842;boc:#1c2842;bos:solid;bow:1px,1px,1px,1px;"
                    style="z-index:15;font-family:Poppins;">Contact Us
                </a>

                <rs-layer id="slider-1-slide-3-layer-3" data-type="text" data-color="#1c2842" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,0;yo:357px,204px,114px,59px;"
                    data-text="w:normal;s:50,41,45,37;l:70,57,50,60;fw:600;" data-frame_0="x:-50,-41,-31,-19;"
                    data-frame_1="e:Linear.easeNone;st:260;sp:800;sR:260;" data-frame_999="o:0;st:w;sR:7940;"
                    style="z-index:19;font-family:Poppins;">Best <strong class="ttm-textcolor-skincolor">Digital
                        Agency</strong>
                </rs-layer>

                <rs-layer id="slider-1-slide-3-layer-4" data-type="text" data-color="#1c2842" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,0;yo:428px,263px,163px,104px;"
                    data-text="w:normal;s:50,41,45,37;l:72,59,60,60;fw:600;" data-frame_0="x:-50,-41,-31,-19;"
                    data-frame_1="st:410;sp:800;sR:410;" data-frame_999="o:0;st:w;sR:7790;"
                    style="z-index:18;font-family:Poppins;">And Business
                </rs-layer>

                <a id="slider-1-slide-3-layer-6" class="rs-layer" href="#" target="_self" rel="nofollow"
                    data-type="text" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,-68px,0;yo:598px,403px,319px,180px;"
                    data-text="w:normal;s:15,12,12,12;l:27,22,25,30;fw:600;a:center;"
                    data-padding="t:12,10,8,5;r:35,29,22,14;b:15,12,9,6;l:35,29,22,14;" data-frame_0="y:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:720;sp:500;sR:720;" data-frame_999="o:0;st:w;sR:7780;"
                    data-frame_hover="c:#fff;bgc:#1c2842;"
                    style="z-index:16;background-color:#2d4a8a;font-family:Poppins;">Read More
                </a>

                <rs-layer id="slider-1-slide-3-layer-7" class="tm-img-bounce" data-type="image" data-rsp_ch="on"
                    data-xy="xo:-10px,-132px,-523px,-267px;yo:206px,94px,66px,36px;"
                    data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                    data-dim="w:579px,478px,363px,223px;h:553px,456px,346px,213px;" data-vbility="t,t,t,f"
                    data-frame_0="x:-50,-41,-31,-19;" data-frame_1="st:100;sp:1000;"
                    data-frame_999="o:0;st:w;sR:8500;" style="z-index:8;font-family:Roboto;"><img
                        src="{{ asset('frontafs/images/vector_page/vectorpage-banner-single_img2.png') }}"
                        width="598" height="571" alt="banner-single_img2" data-no-retina>
                </rs-layer>


                <rs-layer id="slider-1-slide-3-layer-12" data-type="text" data-color="#6e6e6e" data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:680px,561px,0,-409px;yo:509px,330px,227px,132px;"
                    data-text="w:normal;a:left,left,center;s:15,15,15,9;l:28,23,27,16;fw:400,400,500,500;"
                    data-vbility="t,t,t,f" data-frame_0="y:50,41,31,19;"
                    data-frame_1="e:Linear.easeNone;st:630;sp:500;sR:630;" data-frame_999="o:0;st:w;sR:7870;"
                    style="z-index:17;font-family:Poppins;">We are equipped with an updated technical knowledge
                    to serve <br> customers properly. Our method of application industry.
                </rs-layer>

            </rs-slide>
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
                            <span>Organisasi Kemasyarakatan dan Partai Politik </span>
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
                        <li class="tab active">
                            <a href="#">
                                <i class="flaticon flaticon-report"></i> ORMAS
                            </a>
                        </li>
                        <li class="tab">
                            <a href="#">
                                <i class="flaticon flaticon-computer"></i> PARPOL
                            </a>
                        </li>
                    </ul><!-- tabs end-->
                    <div class="content-tab width-100 box-shadow">
                        <!--content-tabs -->
                        <!-- content-inner -->
                        <div class="content-inner active">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-justify">
                                        <h3 class="title fs-30">Syarat Administrasi Keberadaan ORMAS</h3>

                                        <ul class="ttm-list ttm-list-textsize-medium ttm-list-style-icon pt-15">
                                            <li>
                                                <i class="fa fa-arrow-circle-right ttm-textcolor-skincolor"></i>
                                                <b>Dasar Hukum :</b>
                                            </li>
                                            <li>
                                                <i>1.</i>
                                            </li>
                                            <li>
                                                Undang-Undang No 17 Tahun 2013 Tentang Organisasi Kemasyarakatan.
                                            </li>

                                            <li>
                                                <i>2.</i>
                                            </li>
                                            <li>
                                                Peraturan Pemerintah No 58 Tahun 2016 Tentang Pelaksanaan
                                                Undang-undang Nomor 17 Tahun 2013 Tentang Organisasi
                                                Kemasyarakatan.
                                            </li>
                                            <li>
                                                Undang-Undang No. 16 Tahun 2017 tentang Penetapan Peraturan Pemerintah Pengganti Undang-Undang No. 2 Tahun 2017 tentang Perubahan atas Undang-Undang No. 17 Tahun 2013 tentang Organisasi Masyarakat menjadi Undang-Undang
                                            </li>
                                        </ul>

                                        <ul class="ttm-list ttm-list-textsize-medium ttm-list-style-icon pt-15">
                                            <li>
                                                <i class="fa fa-arrow-circle-right ttm-textcolor-skincolor"></i>
                                                <b>Persyaratan :</b>
                                            </li>
                                            <li> <i>1.</i>Surat Permohonan Ditujukan Kepada : Walikota
                                                Surakarta
                                            </li>

                                            <li> c.q. Kepala Badan Kesatuan Bangsa dan Politik Kota
                                                Surakarta
                                            </li>
                                            <li> <b>Perihal :</b> Pemberitahuan keberadaan Ormas di Kota
                                                Surakarta
                                                <a href=""
                                                    style="font-style: italic; color: blue; font-size: 10px"
                                                    target="_BLANK">Download Surat Permohonan</a>
                                            </li>
                                            <li><b>Dilampiri :</b></li>
                                            <li>
                                                - Surat Keputusan dari Kementerian Hukum dan HAM/SKT dari Ditjen
                                                Polpum
                                                Kemendagri;<br>
                                                - Surat keputusan pengurus pusat tentang pembentukan kepengurusan
                                                Ormas
                                                di Kota Surakarta.
                                            </li>

                                            <li> <i>2.</i>
                                                Mengisi Blangko; <a href=""
                                                    style="font-style: italic; color: blue; font-size: 10px"
                                                    target="_BLANK">Download Blangko</a>
                                            </li>
                                            <li> <i>3.</i>
                                                Akte Pendirian Dari Notaris (Salinan/Foto Copy dilegalisir Ketua &
                                                Sekretaris);
                                            </li>
                                            <li> <i>4.</i>
                                                AD/ART (Ditandatangani Ketua dan Sekretaris);
                                            </li>
                                            <li> <i>5.</i>
                                                Program Kerja (Ditandatangani Ketua dan Sekretaris);
                                            </li>

                                            <li> <i>6.</i>
                                                Surat Keterangan Domisili Kantor/Sekretariat dari Kelurahan
                                                setempat;
                                            </li>
                                            <li> <i>7.</i>
                                                Surat Kepemilikan Kantor/Sekretariat (Ditandatangani pemilik rumah)
                                                dan
                                                yang sewa dilampiri bukti sewa;
                                            </li>
                                            <li> <i>8.</i>
                                                Foto Kantor Tampak Depan dengan Plakat Sekretariat;
                                            </li>
                                            <li> <i>9.</i>
                                                Biodata/CV Pengurus
                                                <br>- Ketua
                                                <br>- Sekretaris
                                                <br>- Bendahara
                                            </li>
                                            <li> <i>10.</i>
                                                Pas Photo berwarna ukuran 4 X 6 terbaru
                                                <br>- Ketua
                                                <br>- Sekretaris
                                                <br>- Bendahara
                                            </li>
                                            <li> <i>11.</i>
                                                Foto copy KTP
                                                <br>- Ketua
                                                <br>- Sekretaris
                                                <br>- Bendahara
                                            </li>
                                            <li> <i>12.</i>
                                                NPWP atas nama Organisasi;
                                            </li>
                                            <li> <i>13.</i>
                                                Surat Pernyataan (bermaterai Rp 10.000/ditandatangani Ketua dan
                                                Sekretaris) :
                                                <a href=""
                                                    style="font-style: italic; color: blue; font-size: 10px"
                                                    target="_BLANK">Download Surat Pernyataan</a>
                                                <br>
                                                - Tidak berafiliasi dengan partai politik;
                                                <br>
                                                - Tidak terjadi konflik kepengurusan;
                                                <br>
                                                - Nama, lambang, bendera, tanda gambar, simbol, atribut dan cap
                                                stempel
                                                yang digunakan belum menjadi hak paten dan/atau hak cipta pihak lain
                                                serta bukan milik Pemerintah;
                                                <br>
                                                - Bersedia menertibkan kegiatan, pengurus dan/atau anggota
                                                organisasi;
                                                <br>
                                                - Kesanggupan melaporkan kegiatan setiap 6 bln sekali;
                                                <br>
                                                - Bertanggungjawab terhadap keabsahan dan keseluruhan isi, data dan
                                                informasi dokumen/berkas yang diserahkan; dan
                                                <br>
                                                - Tidak akan melakukan penyalahgunaan Tanda Bukti Keberadaan;
                                            </li>
                                            <li>
                                                <i>14.</i>
                                                Surat rekomendasi dari Kementerian dan/atau perangkat daerah yang
                                                melaksanakan urusan kekhususan bidang keagamaan/kebudayaan kepada
                                                Tuhan
                                                YME.
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- content-inner -->
                        <div class="content-inner">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-justify">
                                        <h3 class="title fs-30">Syarat Administrasi Keberadaan PARPOL</h3>

                                        <ul class="ttm-list ttm-list-textsize-medium ttm-list-style-icon pt-15">
                                            <li>
                                                <i class="fa fa-arrow-circle-right ttm-textcolor-skincolor"></i>
                                                <b>Dasar Hukum :</b>
                                            </li>
                                            <li>
                                                <i>1.</i>
                                            </li>
                                            <li>
                                                Undang-Undang No 17 Tahun 2013 Tentang Organisasi Kemasyarakatan;
                                            </li>

                                            <li>
                                                <i>2.</i>
                                            </li>
                                            <li>
                                                Permendagri RI No 57 Tahun 2017 Tentang Pendaftaran dan Pengelolaan
                                                Sistem Informasi Organisasi Kemasyarakatan.
                                            </li>
                                        </ul>

                                        <ul class="ttm-list ttm-list-textsize-medium ttm-list-style-icon pt-15">
                                            <li>
                                                <i class="fa fa-arrow-circle-right ttm-textcolor-skincolor"></i>
                                                <b>Persyaratan :</b>
                                            </li>
                                            <li> <i>1.</i>Surat Permohonan Ditujukan Kepada : Walikota
                                                Surakarta <a href=""
                                                    style="font-style: italic; color: blue; font-size: 10px"
                                                    target="_BLANK">Download Surat Permohonan</a>
                                            </li>

                                            <li> c.q. Kepala Badan Kesatuan Bangsa dan Politik Kota
                                                Surakarta;
                                            </li>
                                            <li> <i>2.</i>
                                                Akte Pendirian Dari Notaris (Salinan/Foto Copy dilegalisir Ketua &
                                                Sekretaris);
                                            </li>
                                            <li> <i>3.</i>
                                                AD/ART (Ditandatangani Ketua dan Sekretaris);
                                            </li>
                                            <li> <i>4.</i>
                                                Surat Keputusan tentang penetapan Susunan Dewan Pimpinan Pusat,
                                                Susunan
                                                Dewan Pimpinan Wilayah, Susunan Dewan Pimpinan Daerah;
                                            </li>
                                            <li> <i>5.</i>
                                                Surat Keterangan Domisili Kantor/Sekretariat dari Kelurahan
                                                setempat;
                                            </li>
                                            <li> <i>6.</i>
                                                Surat kepemilikan kantor/sekretariat apabila sewa (ditandatangani
                                                pemilik rumah);
                                            </li>
                                            <li> <i>7.</i>
                                                Foto Kantor Tampak Depan dengan Plakat Sekretariat;
                                            </li>
                                            <li> <i>8.</i>
                                                Biodata/CV Pengurus Parpol
                                                <br>- Ketua
                                                <br>- Sekretaris
                                                <br>- Bendahara
                                            </li>
                                            <li> <i>9.</i>
                                                Foto Berwarna 4x6 terbaru
                                                <br>- Ketua
                                                <br>- Sekretaris
                                                <br>- Bendahara
                                            </li>
                                            <li> <i>10.</i>
                                                Foto copy KTP
                                                <br>- Ketua
                                                <br>- Sekretaris
                                                <br>- Bendahara
                                            </li>
                                            <li> <i>11.</i>
                                                NPWP atas nama Partai Politik;
                                            </li>
                                            <li> <i>12.</i>
                                                Menyertakan Foto copy Badan Hukum (kalau sudah memiliki);
                                            </li>
                                            <li> <i>13.</i>
                                                Surat Pernyataan (bermaterai Rp 10.000/ditandatangani Ketua dan
                                                Sekretaris) : <a href=""
                                                    style="font-style: italic; color: blue; font-size: 10px"
                                                    target="_BLANK">Download Surat Pernyataan</a>
                                                <br>
                                                - Tidak berafiliasi dengan partai politik;
                                                <br>
                                                - Tidak terjadi konflik kepengurusan;
                                                <br>
                                                - Nama, lambang, bendera, tanda gambar, simbol, atribut dan cap
                                                stempel
                                                yang digunakan belum menjadi hak paten dan/atau hak cipta pihak lain
                                                serta bukan milik Pemerintah;
                                                <br>
                                                - Surat pernyataan pengurus bahwa tidak merangkap sebagai anggota
                                                partai
                                                politik lain;
                                                <br>
                                                - Bertanggungjawab terhadap keabsahan dan keseluruhan isi, data dan
                                                informasi dokPumen/berkas yang diserahkan.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <img src="{{ asset('frontafs/images/logo2.png') }}" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection