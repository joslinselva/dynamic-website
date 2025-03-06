@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Image Slider (Bootstrap Carousel) --}}
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ Vite::asset('resources/images/sliders/images.jpg') }}" class="d-block w-100 rounded" alt="Slider 1">
            </div>
            <div class="carousel-item">
                <img src="{{ Vite::asset('resources/images/sliders/road220058.jpg') }}" class="d-block w-100 rounded" alt="Slider 2">
            </div>
            <div class="carousel-item">
                <img src="{{ Vite::asset('resources/images/sliders/images.jpg') }}" class="d-block w-100 rounded" alt="Slider 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Profile List --}}
    <h2 class="mt-5 mb-3 text-center">Profile List</h2>
    <div class="row mt-4">
        @foreach ($profiles as $profile)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if ($profile->photo_path)
                        <img src="{{ Storage::url($profile->photo_path) }}" class="card-img-top rounded" alt="{{ $profile->name }}">
                    @else
                        <img src="{{ Vite::asset('resources/images/profile_photo/placeholder.png') }}" class="card-img-top rounded" alt="Default Profile">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection