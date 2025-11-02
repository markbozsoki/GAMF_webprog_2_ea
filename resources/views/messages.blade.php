@extends ('app')

@section('content')

    <section id="messages" class="messages section dark-background">
        <h1>Üzenetek</h1>
        <div class="table-container">
            <div class="table-responsive" style="max-height:2500px; margin:0 auto; max-width:1400px; ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Érkezett</th>
                            <th>Feladó</th>
                            <th>Tárgy</th>
                            <th>Üzenet</th>
                        </tr>
                    </thead>
                    <tbody id="messages-table-body">
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->timestamp }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
