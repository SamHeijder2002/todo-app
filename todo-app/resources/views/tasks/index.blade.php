@extends('layouts.app')

@section('title', 'ToDo App')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="p-4 bg-gray-800 rounded-lg">
        <h1 class="text-2xl mb-4">Mijn taken:</h1>
        <hr class="border-gray-700 mb-4">
        @foreach ($ownTasks as $task)
        <div class="bg-gray-700 p-4 rounded-lg mb-4">
            <h3 class="text-xl"><a href="{{ route('tasks.show', $task->id) }}" class="text-blue-400">{{ $task->title }}</a></h3>
            <p class="mt-2">
                <span class="font-bold">Status:</span>
                <span class="{{ $task->status == 'Voltooid' ? 'bg-green-500' : ($task->status == 'In uitvoering' ? 'bg-yellow-500' : 'bg-red-500') }} text-white px-2 py-1 rounded">
                    {{ $task->status }}
                </span>
            </p>
            @if ($task->assigned_user_id)
            <div class="mt-2 bg-gray-500 text-white px-2 py-1 rounded w-1/2">
                <span class="font-bold ">Toegewezen aan: {{ $task->assignedUser->name }}</span>
            </div>
            @endif
            <hr class="border-gray-600 my-4">
            <form action="{{ route('tasks.edit', $task->id) }}" method="GET" class="inline">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Aanpassen</button>
            </form>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-amber-500 text-white px-4 py-2 rounded {{ $task->assigned_user_id ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $task->assigned_user_id ? 'disabled' : '' }}>Verwijder</button>
            </form>
        </div>
        @endforeach
        <a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mt-4 inline-block">Nieuwe Taak maken</a>
    </div>
    <div class="p-4 bg-gray-800 rounded-lg">
        <h1 class="text-2xl mb-4">Toegewezen taken:</h1>
        <hr class="border-gray-700 mb-4">
        @foreach ($assignedTasks as $task)
        <div class="bg-gray-700 p-4 rounded-lg mb-4">
            <h3 class="text-xl"><a href="{{ route('tasks.show', $task->id) }}" class="text-blue-400">{{ $task->title }}</a></h3>
            <p class="mt-2">
                <span class="font-bold">Status:</span>
                <span class="{{ $task->status == 'Voltooid' ? 'bg-green-500' : ($task->status == 'In uitvoering' ? 'bg-yellow-500' : 'bg-red-500') }} text-white px-2 py-1 rounded">
                    {{ $task->status }}
                </span>
            </p>
            @if ($task->status != 'Voltooid')
            <hr class="border-gray-600 my-4">
            <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Voltooien</button>
            </form>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection