@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col mx-3">
        <h1 class="h2">
            <i class="fas fa-list-check me-2"></i>{{ __('tasks.allTasks') }}
            @if(isset($tasks) && count($tasks) > 0)
            <span class="badge bg-secondary">{{ count($tasks) }}</span>
            @endif
        </h1>
    </div>
</div>

@if(!isset($tasks) || count($tasks) === 0)
<div class="text-center py-5">
    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
    <h3 class="text-muted">{{ __('tasks.noTasksYet') }}</h3>
    <p class="text-muted">{{ __('tasks.createYourNewTask') }}</p>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus me-2"></i>{{ __('tasks.createNewTask') }}
    </a>
</div>
@else
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($tasks as $task)
    <div class="col">
        <div class="card task-item h-100 mx-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start m-2">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <span class="badge bg-{{ $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'secondary') }}">
                        @switch($task->status)
                        @case('pending')
                        {{ __('tasks.statusPending') }}
                        @break
                        @case('in_progress')
                        {{ __('tasks.statusInProgress') }}
                        @break
                        @case('completed')
                        {{ __('tasks.statusCompleted') }}
                        @break
                        @default
                        {{ $task->status }}
                        @endswitch
                    </span>
                </div>

                @if($task->description)
                <p class="card-text text-muted">
                    {{ Str::limit($task->description, 100) }}
                </p>
                @else
                <p class="card-text text-muted"><em>{{ __('tasks.noDescription') }}</em></p>
                @endif

                <div class="text-muted small mb-3">
                    <i class="far fa-clock me-1"></i>
                    {{ __('tasks.createdAt') }}: {{ $task->created_at->format('d.m.Y H:i') }}
                </div>

                <div class="row g-2">
                    <div class="col-4 px-1">
                        <a href="{{ route('tasks.show', $task->id) }}"
                            class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center w-100"
                            style="height: 38px;">
                            <i class="fas fa-eye me-1"></i> {{ __('tasks.view') }}
                        </a>
                    </div>
                    <div class="col-4 px-1">
                        <a href="{{ route('tasks.edit', $task->id) }}"
                            class="btn btn-outline-warning btn-sm d-flex align-items-center justify-content-center w-100"
                            style="height: 38px;">
                            <i class="fas fa-edit me-1"></i> {{ __('tasks.edit') }}
                        </a>
                    </div>
                    <div class="col-4 px-1">
                        <form id="delete-form-{{ $task->id }}"
                            action="{{ route('tasks.destroy', $task->id) }}"
                            method="POST"
                            style="height: 38px;">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                onclick="confirmDelete({{ $task->id }}, '{{ addslashes($task->title) }}')"
                                class="btn btn-outline-danger btn-sm w-100 h-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-trash me-1"></i> {{ __('tasks.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection