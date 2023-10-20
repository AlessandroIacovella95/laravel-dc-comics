@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
    @if ($errors->any())
<div class="alert alert-danger">
    <h4>Correggi i seguenti errori per proseguire:</h4>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <a href="{{route('comics.index')}}" class="btn btn-success">
        Torna alla lista
    </a>
    <h1 class="my-5">Crea fumetto</h1>

    <form action="{{ route('comics.store')}}" method="POST" class="row g-3">
        @csrf

        <div class="col-4">
            <img class="img-fluid" src="" alt="" id="preview-image">
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-3">
                    <label for="title">Titolo:</label>
                    <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    />
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>             
                <div class="col-3">
                    <label for="price">Prezzo:</label>
                    <input
                    type="text"
                    class="form-control @error('price') is-invalid @enderror"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    />
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="series">Serie:</label>
                    <input
                    type="text"
                    class="form-control @error('series') is-invalid @enderror"
                    id="series"
                    name="series"
                    value="{{ old('series') }}"
                    />
                    @error('series')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 

                <div class="col-3">
                    <label for="sale_date">Data di uscita:</label>
                    <input
                    type="text"
                    class="form-control @error('sale_date') is-invalid @enderror"
                    id="sale_date"
                    name="sale_date"
                    value="{{ old('sale_date') }}"
                    />
                    @error('sale_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="type">Genere:</label>
                    <input
                    type="text"
                    class="form-control @error('type') is-invalid @enderror"
                    id="type"
                    name="type"
                    value="{{ old('type') }}"
                    />
                    @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="thumb">Immagine:</label>
                    <input
                    type="text"
                    class="form-control @error('thumb') is-invalid @enderror"
                    id="thumb"
                    name="thumb"
                    value="{{ old('thumb') }}"
                    />
                    @error('thumb')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="description">Descrizione:</label>
                    <input
                    type="textarea"
                    class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    value="{{ old('description') }}"
                    />
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <button class="btn btn-primary mt-3">Salva</button>
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