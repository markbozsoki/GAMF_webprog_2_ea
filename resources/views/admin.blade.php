@extends('app')

@section('content')
    <section class="admin-dashboard d-flex flex-column justify-content-center align-items-center py-5"
        style="min-height: 80vh; text-align: center;">
        <h1 class="mb-4">Admin Felület</h1>
        <p class="mb-2">Üdvözöllek az admin felületen, <strong>{{ auth()->user()->name }}</strong>!</p>
        <p>Összes felhasználó: <strong>{{ \App\Models\User::count() }}</strong></p>
    </section>
@endsection