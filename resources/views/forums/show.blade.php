@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-primary">Detalles del Foro</h2>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="table-primary">ID</th>
                                    <td>{{ $forum->id }}</td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Nombre</th>
                                    <td>{{ $forum->name }}</td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Descripción</th>
                                    <td>{{ $forum->description }}</td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Fecha</th>
                                    <td>{{ \Carbon\Carbon::parse($forum->date)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Creador</th>
                                    <td>{{ $forum->user->name ?? 'Anónimo' }}</td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Tópicos</th>
                                    <td>{{ $forum->topics->count() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="mb-3">Últimos foros</h5>

                    @php
                        $topics = $forum->topics;
                        $topicsCount = $topics->count();
                    @endphp

                    @if($topicsCount > 0)
                        <div class="list-group">
                            @foreach($topics->sortByDesc('creation_date')->take(3) as $topic)
                                <a href="{{ route('topics.show', $topic->id) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $topic->title }}</h6>
                                        <small>{{ \Carbon\Carbon::parse($topic->creation_date)->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ \Illuminate\Support\Str::limit($topic->description, 50) }}</p>
                                    <small>{{ optional($topic->comments)->count() ?? 0 }} comentarios</small>

                                </a>
                            @endforeach
                        </div>

                        @if($topicsCount > 3)
                            <div class="mt-2 text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    Ver todos los temas ({{ $topicsCount }})
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-4 bg-light rounded">
                            <i class="bi bi-collection text-secondary" style="font-size: 2rem;"></i>
                            <p class="mt-2 text-muted">Este foro no tiene un tema definido</p>
                            <a href="{{ route('topics.create') }}" class="btn btn-sm btn-primary">
                                Crear primer foro con un tema establecido
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('forums.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
                <div>
                    <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-primary me-2">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar este foro y todos sus tópicos?')">
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
    .list-group-item {
        border-left: 3px solid var(--bs-primary);
    }
</style>

@endsection
