@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Profile</h1>
            </div>

            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Profile Photo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                    @if (Auth::user()->photo_path)
                        <div class="mt-2">
                            <img src="{{ Storage::url(Auth::user()->photo_path) }}" alt="Profile Photo" class="img-thumbnail" width="150">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </main>
    </div>
</div>
@endsection