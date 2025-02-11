@extends('layouts.app')

@section('title', 'ToDo App')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-lg">
        <h1 class="text-2xl mb-4">Taak Aanpassen:</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-300">Taak Titel</label>
                    <input type="text" class="form-input mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2" id="title" name="title" value="{{ $task->title }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-300">Taak Beschrijving</label>
                    <textarea class="form-textarea mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-300">Status</label>
                    <select id="status" name="status" class="form-select mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2" required>
                        <option value="Te doen" {{ $task->status == 'Te doen' ? 'selected' : '' }}>Te doen</option>
                        <option value="In uitvoering" {{ $task->status == 'In uitvoering' ? 'selected' : '' }}>In uitvoering</option>
                        <option value="Voltooid" {{ $task->status == 'Voltooid' ? 'selected' : '' }}>Voltooid</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="assigned_user_id" class="block text-sm font-medium text-gray-300">Toewijzen aan</label>
                    <select name="assigned_user_id" id="assigned_user_id" class="form-select mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2">
                        <option value="">Kies een user</option>
                        @foreach ($users as $user)
                        @if ($user->id != Auth::id())
                        <option value="{{ $user->id }}" {{ $task->assigned_user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pas Taak Aan</button>
                    <a href="{{ route('tasks.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Terug</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection