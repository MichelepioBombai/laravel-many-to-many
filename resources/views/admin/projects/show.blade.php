@extends('layouts.app')

@section('title', $project->title)
@section('actions')
<a href="{{ route('admin.projects.index') }}" class=" btn btn-primary float-end my-5">Torna alla lista</a>
@endsection

@section('content')
<section class="card clearfix">
  <div class="card-body">
    <h2 class="text-muted text-secondary my-5">{{ $project->slug }}</h2>
    <p>
      <strong>Categoria: </strong>
      <span class="badge rounded-pill" style="background-color: {{ $project->category?->color }}">{{ $project->category?->label }}</span>
    </p>
    <img src="{{ asset('storage/' . $project->image) }}" alt="" width="300" class="float-start me-3 mb-1">
    <p>{{ $project->text }}</p>
  </div>
</section>

@endsection