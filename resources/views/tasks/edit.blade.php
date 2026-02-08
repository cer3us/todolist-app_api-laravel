@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Изменить задачу
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Название *</label>
                        <input type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            name="title"
                            value="{{ old('title', $task->title) }}"
                            required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            rows="4">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Статус</label>
                        <select class="form-select @error('status') is-invalid @enderror"
                            id="status"
                            name="status">
                            <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>
                                ⏳ Ожидает
                            </option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>
                                🔄 В процессе
                            </option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                ✅ Завершена
                            </option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i>Отмена
                        </a>
                        <div>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-1"></i>Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection