@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">

    @forelse($comics as $comic)
      <p>
        <strong>Titolo</strong>: {{ $comic->title }} <br>
        <strong>Descrizione</strong>: {{ $comic->description }} <br>
        <strong>Immagine</strong>: {{ $comic->thumb }}
        <strong>Prezzo</strong>: {{ $comic->price }}
        <strong>Serie</strong>: {{ $comic->series }}
        <strong>Data di uscita</strong>: {{ $comic->sale_date }}
        <strong>Genere</strong>: {{ $comic->type }}
      </p>
      <hr>
    @empty
      <h2>Non ci sono risultati</h2>
    @endforelse
  </section>
@endsection