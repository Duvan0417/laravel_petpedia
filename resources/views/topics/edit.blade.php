@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tópico</h1>
    
    <form action="{{ route('topics.update', $topic->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $topic->title }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $topic->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="forum_id">Foro</label>
            <select name="forum_id" id="forum_id" class="form-control" required>
                @foreach($forums as $forum)
                    <option value="{{ $forum->id }}" {{ $topic->forum_id == $forum->id ? 'selected' : '' }}>{{ $forum->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="creation_date">Fecha de Creación</label>
            <input type="date" name="creation_date" id="creation_date" class="form-control" value="{{ $topic->creation_date->format('Y-m-d') }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('topics.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection