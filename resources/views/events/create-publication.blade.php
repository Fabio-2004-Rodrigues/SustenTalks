@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Qual a sua publicação?</h1>
        <form action="/events/publication/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem da Publicação:</label>
                <input type="file" id="media" name="media" class="from-control-file">
            </div>

            <div class="form-group">
                <label for="title">No que voce esta pensando?:</label>
                <textarea name="description" id="description" class="form-control" placeholder="Sua publicação aqui"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
    </div>

@endsection
