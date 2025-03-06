@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar') {{-- Include the sidebar --}}

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="d-flex align-items-center">
                    @if (Auth::user()->photo_path)
                        <img src="{{ Storage::url(Auth::user()->photo_path) }}" alt="Profile Photo" class="rounded-circle me-2" width="40" height="40">
                    @else
                        <img src="{{ asset('images/default_profile.png') }}" alt="Default Profile Photo" class="rounded-circle me-2" width="40" height="40">
                    @endif
                    <span>{{ Auth::user()->name }}</span>
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-outline-secondary ms-2">
                        Edit Profile
                    </a>
                </div>
            </div>

            <p>Welcome to your dashboard, {{ Auth::user()->name }}!</p>
        </main>
    </div>
</div>
@endsection