@extends('layouts.app')

@section('main-content')
<div class="container my-5">
    <a href="{{route('comics.index')}}" class="btn btn-success">
        Torna alla lista
    </a>
    <a href="{{route('comics.edit', $comic)}}" class="btn btn-warning ms-2">
        Modifica
    </a>
    <h1 class="mt-5">{{ $comic->title }}</h1>
    <div class="row g-4">
        
        <div class="col-3">
            <img src="{{ $comic->thumb }}" alt="">
        </div>
        
        <div class="col-3">
            <strong>Prezzo:</strong> {{ $comic->price }}
        </div>
        
        <div class="col-3">
            <strong>Serie:</strong> {{ $comic->series }}
        </div>
        
        <div class="col-3">
            <strong>Data di uscita::</strong> {{ $comic->sale_date }}
        </div>
        
        <div class="col-3">
            <strong>Genere:</strong> {{ $comic->type }}
        </div>

        <div class="col-12">
            <strong>Descrizione:</strong> {{ $comic->description }}
        </div>
    </div>
</div>
@endsection