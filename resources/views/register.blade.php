@extends('app')

@section('content')
    <section id="register" class="section light-background">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-sm border-0 rounded-4 p-4" data-aos="fade-up">
                        <h2 class="text-center mb-4">Regisztráció</h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Név</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email cím</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Jelszó</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Regisztráció</button>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <p class="text-center mt-3">
                                Már van fiókod? <a href="{{ route('login') }}">Jelentkezz be</a>.
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection