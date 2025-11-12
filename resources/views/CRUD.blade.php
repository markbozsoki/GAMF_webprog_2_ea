@extends ('app')

@section('content')

    <section id="crud" class="crud section dark-background">
        <h1>CRUD</h1>
        
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-sm border-0 rounded-4 p-4" data-aos="fade-up">
                            
                        <h2 style="color:black;" class="text-center mb-4">
                            @if($hallgato)
                            Hallgató módosítása
                            @else
                            Új hallgató hozzáadása
                            @endif
                        </h2>                            
                                            
                        <form method="POST" action="/hallgato/store">
                            @csrf

                            <input type="hidden" id="h_id" name="h_id" 
                            @if($hallgato)
                            value="{{ $hallgato->id }}"
                            @else
                            value="-1"
                            @endif
                            >

                            <div class="mb-3">
                                <label for="name" class="form-label">Név</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                @if($hallgato)
                                value="{{ $hallgato->nev }}"
                                @endif
                                >
                            </div>

                            <div class="mb-3 form-group">
                                <label for="osztondij" class="form-label">Ösztöndíjas</label>
                                <input type="number" class="form-control" id="osztondij" name="osztondij" min="0" max="1" required
                                @if($hallgato)
                                value="{{ $hallgato->osztondijas }}"
                                @endif
                                >
                            </div>

                            <div class="mb-3 form-group">
                                <label for="kar" class="form-label">Kar</label>
                                <input type="number" class="form-control" id="kar" name="kar" min="1" required
                                @if($hallgato)
                                value="{{ $hallgato->kar_id }}"
                                @endif
                                >
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Beküldés</button>
                            <a href="/hallgato"  class="btn btn-primary w-100 mt-3">Mégse</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive" style="max-height:2500px; margin:0 auto; max-width:1400px; ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Ösztöndíjas</th>
                            <th>Kar</th>
                            <th>Módosítás</th>
                            <th>Törlés</th>
                        </tr>
                    </thead>
                    <tbody id="crud-table-body">
                        @foreach($hallgatok as $hallgato)
                            <tr>
                                <td>{{ $hallgato->nev }}</td>
                                @if($hallgato->osztondijas == 1)
                                <td>igen</td>
                                @else
                                <td>nem</td>
                                @endif
                                <td>{{ $hallgato->kar_id }}</td>
                                <td>
                                    <form method="GET" action="{{ route('hallgato.show', $hallgato->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Módosítás</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="GET" action="/hallgato/{{ $hallgato->id }}/destroy">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Törlés</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
