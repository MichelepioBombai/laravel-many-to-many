@extends('layouts.app')

@section('actions')
<a href="{{ route('admin.projects.index')}}" class="btn btn-primary my-5">Torna alla lista</a>
@endsection

@section('content')
  <div class="card">
    <div class="card-body">

      <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="row g-4">
        @method('put')
        @csrf
        
    
        <div class="col-4">
          <div class="row">
            <div class="col-12"> 
              <label for="title" class="form-label">title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $project->title }}" />
            </div>

            <div class="row">
              <div class="col-12"> 
                <label for="category_id" class="form-label">category</label>
                <select class="form-select" name="category_id" id="category_id">
                  <option value="">Non categorizzato</option>
                  @foreach($categories as $category)
                    <option @if(old('category_id', $project->category_id) ==  $category->id ) selected @endif value="{{ $category->id }}">{{ $category->label }}</option>
                  @endforeach
                </select>
              </div>
          
            <div class="col-12">
              <label for="image" class="form-label">image</label>
              <input class="form-control" type="text" id="image" name="image" value="{{ old('image') ?? $project->image }}" >
            </div>
          </div>
        </div>
      
        <div class="col-8 mb-3">
          <label for="text" class="form-label">text</label>
          <textarea  class="form-control" id="text" name="text" value="{{ old('text') ?? $project->text}}"  rows="5"></textarea>
        </div>
      
      
        <div class="col-12">
          <button type="submit" class="btn btn-primary my-1">Salva</button>
        </div>
    
      </form>
    </div>

  </div>
</div>


@endsection