@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">


@section('content')
<section class="sec-index">
    <div class="inner">
           <form action="{{ route('profiles.update',$profile->id) }}" class="profile-box clearfix" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="profile-input">
                <input type="text" name="name" class="profile-input" placeholder="Enter your name" @error('name') is-invalid @enderror  autocomplete="name" autofocus value="{{ old('name', $profile->name) }}">

                @error('name')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="profile-input">
                <img src="{{ asset($profile->image?->path) }}" alt="image" style="width:100px; height:100px">
                <input type="file" name="image" id="" class="title"  @error('image') is-invalid @enderror  autocomplete="image" autofocus>

                @error('image')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="profile-input">
                <input type="text" name="email" class="profile-input" placeholder="Enter your email" @error('email') is-invalid @enderror  autocomplete="email" autofocus value="{{ old('email', $profile->email) }}">

                @error('email')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="profile-input">
                <input type="text" name="address" class="profile-input" placeholder="Enter your address" @error('address') is-invalid @enderror  autocomplete="address" autofocus value="{{ old('address', $profile->address) }}">

                @error('address')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="profile-input">
                <input type="text" name="phone" class="profile-input" placeholder="Enter your phone" @error('phone') is-invalid @enderror  autocomplete="phone" autofocus value="{{ old('phone', $profile->phone) }}">

                @error('Phone')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <div class="profile-btn">
                <input type="submit" value="Update" class="profile-btn1">
            </div>

    </form>

    </div>
</section>
@endsection
