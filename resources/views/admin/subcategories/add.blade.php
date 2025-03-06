@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add Subcategory</h1>
            </div>

            <form action="{{ route('admin.subcategories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="subcategoryName" class="form-label">Subcategory Name</label>
                    <input type="text" class="form-control" id="subcategoryName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="categoryId" class="form-label">Category</label>
                    <select class="form-select" id="categoryId" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Subcategory</button>
            </form>
        </main>
    </div>
</div>
@endsection