@extends ('app')

@section('content')

    <section id="contact" class="contact section dark-background">
        <h1>Kapcsolat</h1>
        
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-sm border-0 rounded-4 p-4" data-aos="fade-up">
                        <form method="POST" action="/contact">
                            @csrf

                            <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" maxlength="50" placeholder="Email cím">
                            </div>

                            <div class="form-group">
                            <input type="text" class="form-control my-1" id="subject" name="subject" maxlength="50"
                                placeholder="Tárgy">
                            </div>

                            <div class="form-group">
                            <textarea class="form-control" id="body" name="body" placeholder="Üzenet..." maxlength="500"
                                rows="12"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Küldés</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
