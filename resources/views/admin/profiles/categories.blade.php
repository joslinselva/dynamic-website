@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Set Categories for User: {{ $user->name }}</h1>
            </div>

            <form action="{{ route('admin.users.categories.update', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="categories" class="form-label">Categories</label>
                    <select multiple class="form-select" id="categories" name="categories[]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $user->categories->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Categories</button>
            </form>
        </main>
    </div>
</div>
@endsection