@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Tópico</h2>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="table-success">ID</th>
                                    <td>{{ $topic->id }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Título</th>
                                    <td>{{ $topic->title }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Descripción</th>
                                    <td>{{ $topic->description ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Fecha Creación</th>
                                    <td>{{ \Carbon\Carbon::parse($topic->date)->format('d/m/Y') }}</td>


                                </tr>
                                <tr>
                                    <th class="table-success">Foro</th>
                                    <td>{{ $topic->forum->name ?? 'Sin foro' }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Comentarios</th>
                                    <td>{{ $topic->comments->count() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="mb-3">Comentarios Recientes</h5>
                    @if($topic->comments->count() > 0)
                        <div class="list-group">
                            @foreach($topic->comments->take(3) as $comment)
                                <div class="list-group-item">
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    <p class="mb-1">{{ Str::limit($comment->content, 100) }}</p>
                                </div>
                            @endforeach
                        </div>
                        @if($topic->comments->count() > 3)
                            <div class="mt-2 text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    Ver todos los comentarios ({{ $topic->comments->count() }})
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-4 bg-light rounded">
                            <i class="bi bi-chat-left-text text-secondary" style="font-size: 2rem;"></i>
                            <p class="mt-2 text-muted">Este tópico no tiene comentarios</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('topics.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
                <div>
                    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-primary me-2">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('¿Eliminar este tópico y sus comentarios?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table th {
        width: 30%;
    }
</style>
@endsection