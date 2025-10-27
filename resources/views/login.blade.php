@extends('app')

@section('content')
    <section id="login" class="section light-background">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-sm border-0 rounded-4 p-4" data-aos="fade-up">
                        <h2 class="text-center mb-4">Bejelentkezés</h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Felhasználónév</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Jelszó</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Bejelentkezés</button>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <p class="text-center mt-3">
                                Még nincs fiókod? <a href="{{ route('register') }}">Regisztrálj</a>.
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection