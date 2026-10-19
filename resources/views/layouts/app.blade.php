<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventaris Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('items.index') }}">Inventaris</a>
        <div class="navbar-nav me-auto">
            <a class="nav-link" href="{{ route('items.index') }}">Barang</a>
            <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-light btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container">
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error'))   <div class="alert alert-danger">{{ session('error') }}</div> @endif
    @yield('content')
</div>
</body>
</html>