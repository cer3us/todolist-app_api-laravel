@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle me-2"></i>{{ __('tasks.addTask') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-1"></i>{{ __('tasks.title') }}
                            </label>
                            <input type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                placeholder="{{ __('tasks.fillTitle') }}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-1"></i>{{ __('tasks.description') }}
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="{{ __('tasks.fillDescription') }}">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">
                                <i class="fas fa-tasks me-1"></i>{{ __('tasks.status') }}
                            </label>
                            <select class="form-select @error('status') is-invalid @enderror"
                                id="status"
                                name="status">
                                <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>
                                    ⏳ {{ __('tasks.statusPending') }}
                                </option>
                                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>
                                    🔄 {{ __('tasks.statusInProgress') }}
                                </option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                    ✅ {{ __('tasks.statusCompleted') }}
                                </option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>{{ __('tasks.backToList') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>{{ __('tasks.saveTask') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection