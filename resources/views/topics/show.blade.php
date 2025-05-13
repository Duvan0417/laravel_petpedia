@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $topic->title }}</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <p class="card-text"><strong>Foro:</strong> {{ $topic->forum->name }}</p>
            <p class="card-text"><strong>Fecha de creación:</strong> {{ $topic->creation_date->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $topic->description ?? 'Sin descripción' }}</p>
        </div>
    </div>
    
    <h3>Comentarios</h3>
    @if($topic->comments->count() > 0)
        <ul class="list-group mb-4">
            @foreach($topic->comments as $comment)
                <li class="list-group-item">
                    <p>{{ $comment->content }}</p>
                    <small class="text-muted">Publicado el {{ $comment->created_at->format('d/m/Y H:i') }}</small>
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-info">No hay comentarios para este tópico.</div>
    @endif
    
    <a href="{{ route('topics.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection