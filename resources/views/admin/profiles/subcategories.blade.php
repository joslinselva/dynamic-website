@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Set Subcategories for User: {{ $user->name }}</h1>
            </div>

            <form action="{{ route('admin.users.subcategories.update', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="subcategories" class="form-label">Subcategories</label>
                    <select multiple class="form-select" id="subcategories" name="subcategories[]">
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $user->subcategories->contains($subcategory->id) ? 'selected' : '' }}>
                                {{ $subcategory->name }} ({{ $subcategory->category->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Subcategories</button>
            </form>
        </main>
    </div>
</div>
@endsection