@extends('app')

@section('content')

    <section id="homepage" class="section light-background">

        <div class="hero">
            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Könyvtári másolás<br>Ösztöndíjas diákoknak</h1>
                        <p data-aos="fade-up" data-aos-delay="100">
                            Támogatjuk az egyetemi hallgatókat: ingyenes másolási lehetőség a könyvtárban
                        </p>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{ asset('img/hero-img.png') }}" class="img-fluid animated" alt="copymachine">
                    </div>
                </div>
            </div>
        </div>

        <div id="about" class="about section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Információk</h2>
                <p><span>Tudj meg többet</span> <span class="description-title">a könyvtári másolásról</span></p>
            </div>

            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('img/about.jpg') }}" class="img-fluid mb-4" alt="Másolás a könyvtárban">

                        <div class="book-a-table">
                            <h3>Nyitvatartási időben</h3>
                            <p>Minden nap 20:00-ig vehetők át az elkészült másolatok.</p>
                        </div>
                    </div>

                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                                Ösztöndíjas hallgatók részére az egyetemi könyvtárban a megállapított kvóta erejéig a
                                fénymásolás ingyenesen biztosított.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <span>A kvóta kartól függően kerül
                                        megállapításra.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>A másolt oldalak száma alapján számoljuk a
                                        felhasználást.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Kétoldalas nyomtatás esetén két oldal
                                        kerül elszámolásra.</span></li>
                            </ul>
                            <p>
                                A hallgatók a másolandó oldalakat napközben bármikor leadhatják, azonban az elkészült
                                példányokat kizárólag aznap, pontosan 20 óráig vehetik át a könyvtárban.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

@endsection