@extends('layouts.app')
@section('title', 'Projects')

@section('actions')
<a class="btn btn-primary my-5" href="{{ route('admin.projects.create') }}">aggiungi un nuovo progetto</a>
@endsection

@section('content')

<div class="card my-4">
    <div class="card-body">
        
        <table class="table table-striped">
        
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">titolo</th>
                    <th scope="col">slug</th>
                    <th scope="col">label</th>
                    <th scope="col">Abstract</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->category?->label }}</td>
                    <td>{{ $project->getAbstract() }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project) }}">
                            <i class="bi bi-eye mx-2"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project) }}">
                            <i class="bi bi-pencil mx-2"></i>
                        </a>
                        <a type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $project->id }}">
                            <i class="bi bi-trash mx-2"></i>              
                        </a>
        
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@foreach ($projects as $project)
  <!-- Modal -->
  <div class="modal fade" id="delete-modal-{{ $project->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $project->id }}-label"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="delete-modal-{{ $project->id }}-label">Conferma eliminazione</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
          Sei sicuro di voler eliminare il progetto {{ $project->title }} con ID
          {{ $project->id }}? <br>
          L'operazione non è reversibile
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

          <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

    {{ $projects->links() }}


@endsection