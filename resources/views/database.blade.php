@extends ('app')

@section('content')

    <section id="database" class="database section dark-background">
        <h1>Adatbázis</h1>
        <div class="table-container">
            <div class="table-responsive" style="max-height:2500px; margin:0 auto; max-width:1400px; ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        @foreach($header as $title)
                            <th>{{ $title }}</th>
                        @endforeach
                        </tr>
                    </thead>
                    <tbody id="database-table-body">
                        @foreach($content as $row)
                            <tr>
                                <td>{{ $row }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
