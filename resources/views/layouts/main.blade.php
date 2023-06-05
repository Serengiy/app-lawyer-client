<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .sidebar {
            background-color: #001f3f;
            color: #fff;
        }
        .sidebar .nav-link {
            color: #fff;
        }
    </style>
    <title>New Application</title>
</head>
<body class="h-100">
<div class="d-flex">
    <!-- Sidebar -->
    <aside class="col-3 sidebar flex-column p-3 position-fixed h-100" >
        @if(auth()->user()->role_id === 0)
        <h2>Client Interface</h2>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{route('home')}}">Рандомные заявки</a>
            <a class="nav-link" href="{{route('application.index')}}">Мои заявки</a>
            <a class="nav-link" href="{{route('new.application')}}">Новая заявка</a>
                <form  action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="nav-link" type="submit" >
                        Выйти
                    </button>
                </form>
        </nav>
            <hr style="border: 2px solid white">
        @elseif(auth()->user()->role_id==1)
        <nav class="nav flex-column">
            <h2>Lawyer Interface</h2>
            <a class="nav-link" href="{{route('lawyer.index')}}">Лента заявок</a>
            <a class="nav-link" href="{{route('lawyer.show')}}">Мои заявления</a>
            <form  action="{{route('logout')}}" method="POST">
                @csrf
                <button class="nav-link" type="submit" >
                    Выйти
                </button>
            </form>
        </nav>
        <hr style="border: 2px solid white">
        @endif
    </aside>
    <!-- Content -->
    <div class="col-9 offset-3 flex-grow-1">
        <!-- Content Area -->
        <div class="container">
            <div class="p-5">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/custom/client.js')}}"></script>
<script src="{{asset('js/custom/lawyer.js')}}"></script>
</body>
</html>

