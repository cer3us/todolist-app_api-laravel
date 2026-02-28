@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{ __('tasks.taskDetails') }}</h4>
                <div>
                    <span class="badge bg-{{ $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'secondary') }} fs-6">
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
            </div>
            <div class="card-body">
                <h2 class="card-title mb-4">{{ $task->title }}</h2>

                @if($task->description)
                <div class="mb-4">
                    <h5 class="text-muted">
                        <i class="fas fa-align-left me-2"></i>{{ __('tasks.description') }}
                    </h5>
                    <p class="lead">{{ $task->description }}</p>
                </div>
                @endif

                <div class="row text-muted mb-4">
                    <div class="col-md-6">
                        <p>
                            <i class="far fa-calendar-plus me-2"></i>
                            <strong>{{ __('tasks.createdAt') }}:</strong>
                            {{ $task->created_at->format('F d, Y \a\t h:i A') }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <i class="far fa-calendar-check me-2"></i>
                            <strong>{{ __('tasks.updatedAt') }}:</strong>
                            {{ $task->updated_at->format('F d, Y \a\t h:i A') }}
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>{{ __('tasks.backToList') }}
                    </a>
                    <div>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>{{ __('tasks.edit') }}
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i>{{ __('tasks.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection