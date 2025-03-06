@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories') }}">
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.subcategories') }}">
                                Subcategories
                            </a>
                        </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <p>Welcome to your dashboard, {{ Auth::user()->name }}!</p>

            </main>
    </div>
</div>
@endsection