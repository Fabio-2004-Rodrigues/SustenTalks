@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-12 col-12 justify-contente-center my-4">
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
            <form action="/events/publication/create" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group">
                <label for="image">Imagem da Publicação:</label>
                <input type="file" id="media" name="media" class="from-control-file">
            </div> --}}

            <div class="form-group">
                <textarea name="description" id="description" class="form-control" style="height: 200px;" placeholder="Alguma novidade?"></textarea>
            </div>            
                <button type="submit" class="btn btn-custom my-3 d-block ms-auto">Publicar</button>
            </form>
        </div>
    </div>
@endsection
