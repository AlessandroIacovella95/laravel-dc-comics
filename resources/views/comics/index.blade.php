@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('main-content')
  <section class="container mt-5">
      <div class="container">  
        <a href="{{route('comics.create')}}" class="btn btn-success">
            Crea nuovo fumetto
        </a>
        <h1 class="my-3">Comics</h1>
        <div class="row">
          @foreach ($comics as $comic)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <p class="card-text">
                    <img src="{{ $comic->thumb }}" alt=""><br>
                    <strong>Titolo:</strong> {{ $comic->title }}<br>
                    <strong>Descrizione:</strong> {{ $comic->description }}<br>
                    <strong>Prezzo:</strong> {{ $comic->price }} <br>
                    <strong>Serie:</strong> {{ $comic->series }} <br>
                    <strong>Data di uscita:</strong> {{ $comic->sale_date }} <br>
                    <strong>Genere:</strong> {{ $comic->type }} <br>
                    <div class="d-flex justify-content-center mt-5">
                      <a href="{{ route('comics.show', $comic)}}">
                          <i class="fa-solid fa-eye"></i>
                      </a>
                      <a href="{{ route('comics.edit', $comic)}}">
                        <i class="fa-solid fa-pencil"></i>              
                      </a>

                      <a href="#" type="button" class="" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$comic->id}}">
                        <i class="fa-solid fa-trash text-danger"></i>
                      </a>

                      <div class="modal fade" id="delete-modal-{{$comic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina elemento</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Vuoi davvero eliminare il fumetto {{$comic->title}}?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annulla</button>
                              <form action="{{route('comics.destroy', $comic)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                  <button class="btn btn-danger">Elimina</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
  </section>
@endsection