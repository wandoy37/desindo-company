@extends('home.layouts.app')
@section('title', 'Beranda')
@section('content')
    <!-- Hero Section -->
    <section id="banner">
        <div class="container pt-4 mt-4">
            <div class="row align-items-center py-4 mt-4">
                <div class="col-md-6 my-4">
                    <img src="assets/img/hero.png" class="img-fluid" width="90%">
                </div>
                <div class="col-md-6 my-4 text-start">
                    <span class="font-text-second">FORESTRY CONSULTANT</span>
                    <h1 class="font-text-primary">PT DESINDO AGRI MANDIRI</h1>
                    <p style="text-align: justify;" class="text-description">
                        Kami adalah sebuah perusahaan kontraktor yang berkomitmen untuk memberikan solusi konstruksi
                        berkualitas tinggi dan inovatif dalam industri ini. Dengan pengalaman yang luas dan tim
                        profesional yang terampil, kami siap untuk menghadirkan proyek-proyek baja yang kokoh, efisien,
                        dan memenuhi standar tertinggi.
                    </p>
                    <a href="https://api.whatsapp.com/send/?phone=62 82148722747&text=Halo" class="btn-contact">
                        <img src="https://salam.net.id/assets/img/social/phone.png" class="img-fluid" width="32px">
                        Call Me
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Second -->
    <section id="second" class="py-4">
        <div class="container pt-4 my-4">
            <div class="row">
                <div class="col-lg-12">
                    <span class="font-text-second">SEJARAH PERUSAHAAN</span>
                    <p style="text-align: justify;" class="text-description">
                        Kami adalah sebuah perusahaan kontraktor yang berkomitmen untuk memberikan solusi konstruksi
                        berkualitas tinggi dan inovatif dalam industri ini. Dengan pengalaman yang luas dan tim
                        profesional yang terampil, kami siap untuk menghadirkan proyek-proyek baja yang kokoh, efisien,
                        dan memenuhi standar tertinggi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Layanan -->
    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="font-text-second">BIDANG USAHA</span>
                    <h1 class="font-text-primary">LAYANAN BERKUALITAS</h1>
                </div>
            </div>
            <div class="row justify-content-between mt-4">
                <div class="col-md-3 text-center my-3">
                    <img src="assets/img/layanan-1.png" class="img-fluid" width="90%">
                    <div class="mt-3">
                        <span class="font-title-layanan">Rehabilitasi Daerah Aliran Sungai</span>
                    </div>
                </div>
                <div class="col-md-3 text-center my-3">
                    <img src="assets/img/layanan-2.png" class="img-fluid" width="90%">
                    <div class="mt-3">
                        <span class="font-title-layanan">Rehabilitasi Hutan dan Lahan</span>
                    </div>
                </div>
                <div class="col-md-3 text-center my-3">
                    <img src="assets/img/layanan-3.png" class="img-fluid" width="90%">
                    <div class="mt-3">
                        <span class="font-title-layanan">Revegetasi dan Reklamasi Pasca Tambang</span>
                    </div>
                </div>
                <div class="col-md-3 text-center my-3">
                    <img src="assets/img/layanan-4.png" class="img-fluid" width="90%">
                    <div class="mt-3">
                        <span class="font-title-layanan">Pengadaan berbagai macam bibit</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Sustainability -->
    <Section style="padding-top: 60px; padding-bottom: 60px; margin-top: 60px;" id="split-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 split-top">
                    <span class="font-text-second">SUSTAINABILITY</span>
                    <h1 class="font-text-primary">Berkomitmen Menjaga Kesehatan Dan Keselamatan</h1>
                    <p style="text-align: justify;" class="text-description">
                        Kami memprioritaskan aspek kesehatan dan keselamatan dalam semua aktivitas dan proyek yang
                        mereka lakukan.
                    </p>
                </div>
                <div class="col-lg-6 text-white split-bottom">
                    <span class="font-text-thried">KAMI MENGIKUTI PRAKTIK TERBAIK</span>
                    <p style="text-align: justify; font-size: 18px;" class="text-white">
                        Metode atau pendekatan yang telah terbukti efektif dalam mencapai hasil yang diinginkan atau
                        mencapai standar yang tinggi.
                    </p>
                    <ul>
                        <li>Sustainablility</li>
                        <li>Project On Time</li>
                        <li>Modern Technology</li>
                        <li>Latest Designs</li>
                    </ul>
                </div>
            </div>
        </div>
    </Section>

    <!-- Section Bottom -->
    <section style="margin-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-warning" style="background-color: #dea206;">
                        <div class="card-body">
                            <div class="pt-4">
                                <span class="font-text-thried">MINTA PENAWARAN</span>
                                <p style="text-align: justify; font-size: 18px;" class="text-white">
                                    Siap Bekerja Sama?, Bangun Proyek Bersama Kami
                                </p>
                            </div>
                            <form action="/" method="post">
                                <div class="mb-3">
                                    <label class="form-label text-white">Nama</label>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-white">Email</label>
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-white">Pesan</label>
                                    <textarea class="form-control" placeholder="Pesan" rows="3"></textarea>
                                </div>

                                <div class="mb-3 float-end">
                                    <button type="submit" class="btn btn-dark">KIRIM</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="font-text-second">PELAJARI LEBIH LANJUT DARI</span>
                    <h1 class="font-text-primary">PERTANYAAN YANG SERING DI AJUKAN</h1>
                    <div class="pt-4">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Apa jenis layanan yang ditawarkan oleh perusahaan kontraktor Anda?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Kami menyediakan layanan kontraktor yang mencakup konstruksi bangunan, renovasi,
                                        pemeliharaan, dan manajemen proyek.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Apakah perusahaan Anda memiliki lisensi dan sertifikasi yang valid?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Ya, perusahaan kami sepenuhnya dilisensikan dan kami memiliki sertifikasi yang
                                        sesuai dengan persyaratan industri konstruksi.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Bagaimana perusahaan Anda mengelola jadwal proyek?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Accordion Content
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
