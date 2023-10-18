@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
    <a href="{{route('comics.index')}}" class="btn btn-success">
        Torna alla lista
    </a>
    <h1 class="my-5">Crea fumetto</h1>

    <form action="{{ route('comics.store')}}" method="POST" class="row g-3">
        @csrf
            <div class="col-3">
                <label for="title">Titolo:</label>
                <input type="text" id="title" name="title" class="form-control"></div>
            <div class="col-3">
                <label for="price">Prezzo:</label>
                <input type="number" id="price" name="price" class="form-control"></div>
            <div class="col-3">
                <label for="series">Serie:</label>
                <input type="text" id="series" name="series" class="form-control"></div>
            <div class="col-3">
                <label for="sale_date">Data di uscita:</label>
                <input type="text" id="sale_date" name="sale_date" class="form-control"></div>
            <div class="col-3">
                <label for="type">Genere:</label>
                <input type="text" name="type" id="type" class="form-control"></div>
            <div class="col-12">
                <label for="thumb">Immagine:</label>
                <input type="url" id="thumb" name="thumb" class="form-control"></div>
            <div class="col-12">
                <label for="description">Descrizione:</label>
                <input type="textarea" id="description" name="description" class="form-control"></div>
            <div class="col-3">
                <button class="btn btn-primary">Salva</button>
            </div>    
    </form>

</div>

@endsection