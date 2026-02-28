<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List App+Api</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Кастомизация стилей -->
    <style>
        body {
            background: #f8f9fa;
            padding-top: 20px;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }

        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            border: none;
        }

        .task-item {
            transition: all 0.2s;
        }

        .task-item:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <!-- Навигация -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-4">
            <div class="container-fluid">
                <a class="navbar-brand text-primary fw-bold" href="/">
                    <i class="fas fa-tasks me-2"></i>To Do List (app+api)
                </a>

                <div class="d-flex">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-md me-1 ">
                        <i class="fas fa-plus me-1"></i>{{ __('tasks.addTask') }}
                    </a>

                    @php
                    $currentLocale = app()->getLocale();
                    @endphp
                    <div class="nav-item dropdown mx-3">
                        <a class="nav-link dropdown-toggle pt-1" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper($currentLocale) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                            <li><a class="dropdown-item {{ $currentLocale == 'en' ? 'active' : '' }}" href="{{ route('locale.switch', 'en') }}">English</a></li>
                            <li><a class="dropdown-item {{ $currentLocale == 'ru' ? 'active' : '' }}" href="{{ route('locale.switch', 'ru') }}">Русский</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
    </div>

    <!-- Основная часть -->
    <main>
        @yield('content')
    </main>

    <!-- Подвал -->
    <footer class="mt-5 pt-4 border-top text-center text-muted small fixed-bottom bg-white">
        <p>
            &copy; <span id="current-year"></span> {{ __('tasks.rightsReserved') }}.
        </p>
    </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Кастомный JavaScript -->
    <script>
        // Подтверждение перед удалением
        function confirmDelete(taskId, taskTitle) {
            if (confirm('{{ __("tasks.deleteTask") }}: "' + taskTitle + '"?')) {
                // Отправляем форму с соответствующим ID
                document.getElementById('delete-form-' + taskId).submit();
            }
        }
        // Автоматическое обновление года в футере
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>

</html>