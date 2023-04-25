@extends('layouts.app')
@section('title', 'aggiungi un progetto')

@section('actions')
<a href="{{ route('admin.projects.index')}}" class="btn btn-primary my-5">Torna alla lista</a>
@endsection

@section('content')

      @if($errors->any())
        <div class="alert alert-danger" role="alert">
          <h3>
            Risolvi i seguenti errori
          </h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      @endif


<div class="card">
  <div class="card-body">
    
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
      @csrf
      
      <div class="col-4">
        <div class="row">
          <div class="col-12"> 
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" {{ old('title') }} />
            
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          
            <div class="row">
              <div class="col-12"> 
                <label for="category_id" class="form-label">category</label>
                <select class="form-select" name="category_id" id="category_id">
                  <option value="">Non categorizzato</option>
                  @foreach($categories as $category)
                    <option @if(old('category_id') ==  $category->id ) selected @endif value="{{ $category->id }}">{{ $category->label }}</option>
                  @endforeach
                </select>
              </div>
          
          <div class="col-12">
            <label for="image" class="form-label">image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" {{ old('image') }} />

            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
      </div>
      
      <div class="col-8 mb-3">
        <label for="text" class="form-label">text</label>
        <textarea  class="form-control @error('text') is-invalid @enderror" id="text" name="text" value="{{ old('text') }}"  rows="5">{{ old('text') }}</textarea>
            @error('text')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
      </div>
      
      
      <div class="col-12">
          <button type="submit" class="btn btn-primary my-1">Salva</button>
        </div>
    
    
      </form>
    </div>
  </div>
</div>
@endsection