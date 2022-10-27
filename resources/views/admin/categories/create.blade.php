@extends('../admin/index')
<link rel="stylesheet" href="{{asset('css/categories.css')}}">


@section('content')
<section class="sec-index">
    <div class="inner">
           <form action="{{ route('categories.store') }}" class="create-box clearfix" method="POST">
            @csrf

            <div class="back clearfix">
                <h2 class="cmn-ttl2 pedit">Categories create</h2>
                <a href="{{ route('profile.index') }}" class="back-link">

                    <i class="fa-solid fa-arrow-left" style="font-size:24px;color:#ffffff"></i>
                </a>
            </div>
            <div class="create-input">
                <input type="text" name="name" class="create-input" placeholder="Enter your category" @error('name') is-invalid @enderror  autocomplete="name" autofocus>

                @error('name')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <div class="create-btn">
                <input type="submit" value="Create" class="create-btn btn btn-primary ml-3">
            </div>

    </form>

    </div>
</section>
@endsection
