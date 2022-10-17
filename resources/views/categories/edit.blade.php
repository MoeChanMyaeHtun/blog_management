@extends('../admin/index')
<link rel="stylesheet" href="{{asset('css/categories.css')}}">


@section('content')
<section class="sec-index">
    <div class="inner">
           <form action="{{ route('categories.update',$category->id) }}" class="create-box clearfix" method="POST">
            @csrf
            <div class="back clearfix">
                <a href="{{ route('categories.index') }}" class="back-link"><i class="fa fa-sign-out" style="font-size:24px;color:#ffffff"></i></a>
            </div>



            <div class="create-input">
                <input type="text" name="name" class="create-input" placeholder="Enter your category" @error('name') is-invalid @enderror  autocomplete="name" autofocus value="{{ old('name', $category->name) }}">

                @error('name')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <div class="create-btn">
                <input type="submit" value="Update" class="create-btn">
            </div>

    </form>

    </div>
</section>
@endsection
