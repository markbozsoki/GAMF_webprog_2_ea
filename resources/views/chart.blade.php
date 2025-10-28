@extends ('app')

@section('content')

    <section class="container my-5">
        <header class="mb-4 text-center">
            <h1>Fénymásolás statisztika karonként</h1>
            <h3 class="text-muted">2012/2013-as tanév adatai alapján</h3>
        </header>

        <div class="card p-4 shadow-sm chart-section">
            <canvas id="copyChart" height="350"></canvas>
        </div>
    </section>

@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        window.chartData = {
            labels: {!! json_encode($labels) !!},
            freeCopy: {!! json_encode($freePage) !!},
            paidCopy: {!! json_encode($paidPage) !!}
        };
    </script>

    <script src="{{ asset('js/chart.js') }}"></script>
@endpush