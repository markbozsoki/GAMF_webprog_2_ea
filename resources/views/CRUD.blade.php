@extends ('app')

@section('content')

    <section id="crud" class="crud section dark-background">
        <h1>CRUD</h1>
        <div class="table-container">
            <div class="table-responsive" style="max-height:2500px; margin:0 auto; max-width:1400px; ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Név</th>
                            <th>Ösztöndíj</th>
                            <th>Kar</th>
                        </tr>
                    </thead>
                    <tbody id="crud-table-body">
                        @foreach($hallgatok as $hallgato)
                            <tr>
                                <td>{{ $hallgato->id }}</td>
                                <td>{{ $hallgato->nev }}</td>
                                <td>{{ $hallgato->osztondijas }}</td>
                                <td>{{ $hallgato->kar_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
