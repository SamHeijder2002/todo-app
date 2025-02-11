@extends('layouts.app')

@section('title', 'ToDo App')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-lg">
        <h1 class="text-2xl mb-4">Taak Details:</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <h5 class="text-xl">{{ $task->title }}</h5>
            <p class="mt-2">{{ $task->description }}</p>
            <p class="mt-4">
                <span class="font-bold">Status:</span>
                <span class="{{ $task->status == 'Voltooid' ? 'bg-green-500' : ($task->status == 'In uitvoering' ? 'bg-yellow-500' : 'bg-red-500') }} text-white px-2 py-1 rounded">
                    {{ $task->status }}
                </span>
            </p>
            <p class="mt-2"><small class="text-gray-400">Aangemaakt: {{ $task->created_at->format('d-m-Y H:i') }}</small></p>
            <p class="mt-2"><small class="text-gray-400">Aangepast: {{ $task->updated_at->format('d-m-Y H:i') }}</small></p>
            <a href="{{ route('tasks.index') }}" class="bg-blue-500 text-white px-4 py-1 rounded mt-4 inline-block">Terug</a>
        </div>
    </div>
</div>
@endsection