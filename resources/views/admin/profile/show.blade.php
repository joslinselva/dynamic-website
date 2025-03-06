@if (Auth::user()->photo_path)
    <img src="{{ Storage::url(Auth::user()->photo_path) }}" alt="Profile Photo" class="rounded-circle">
@else
    <img src="{{ asset('images/default_profile.png') }}" alt="Default Profile Photo" class="rounded-circle">
@endif