@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
    <a href="{{route('comics.index')}}" class="btn btn-success">
        Torna alla lista
    </a>
    <a href="{{route('comics.show', $comic)}}" class="btn btn-success">
        Dettagli fumetto
    </a>
    <h1 class="my-5">Modifica fumetto</h1>

    <form action="{{ route('comics.update', $comic)}}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-4">
            <img class="img-fluid" src="{{ $comic->thumb}}" alt="" id="preview-image">
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-3">
                    <label for="title">Titolo:</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $comic->title}}"></div>
                <div class="col-3">
                    <label for="price">Prezzo:</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ $comic->price}}"></div>
                <div class="col-3">
                    <label for="series">Serie:</label>
                    <input type="text" id="series" name="series" class="form-control" value="{{ $comic->series}}"></div>
                <div class="col-3">
                    <label for="sale_date">Data di uscita:</label>
                    <input type="text" id="sale_date" name="sale_date" class="form-control" value="{{ $comic->sale_date}}"></div>
                <div class="col-3">
                    <label for="type">Genere:</label>
                    <input type="text" name="type" id="type" class="form-control" value="{{ $comic->type}}"></div>
                <div class="col-12">
                    <label for="thumb">Immagine:</label>
                    <input type="url" id="thumb" name="thumb" class="form-control" value="{{ $comic->thumb}}"></div>
                <div class="col-12">
                    <label for="description">Descrizione:</label>
                    <input type="textarea" id="description" name="description" class="form-control" value="{{ $comic->description}}"></div>
                <div class="col-3 mt-3">
                    <button class="btn btn-primary">Salva</button>
                </div>    
            </div>
        </div>
    </form>

</div>

@endsection

@section('scripts')
<script>
    const previewImageEl = document.getElementById('preview-image');
    const thumbInput = document.getElementById('thumb');

    thumbInput.addEventListener('change', function(){
        previewImageEl.src = this.value;
    })
</script>

@endsection