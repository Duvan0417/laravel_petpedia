@extends('layouts.app')

@section('title', 'Schedules')

@section('content')
    <h1>Schedules</h1>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Create New Schedule</a>
    <ul class="list-group">
        @foreach($schedules as $schedule)
            <li class="list-group-item">
                <a href="{{ route('schedules.show', $schedule->id) }}">{{ $schedule->location }} - {{ $schedule->date }} at {{ $schedule->hour }}</a>
            </li>
        @endforeach
    </ul>
@endsection
