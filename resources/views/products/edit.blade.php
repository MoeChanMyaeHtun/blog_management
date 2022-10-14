@extends('../layouts/app')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@section('content')
    <h1 class="cmn-ttl">Product Edit</h1>

    <div class="inner">

        <form action="{{ route('products.update', $product->id) }}" class="pcreate-box clearfix" method="POST">
            @csrf

            <div class="back clearfix">
                <a href="{{ route('products.index') }}" class="back-link"><i class="fa fa-sign-out"
                        style="font-size:24px;color:#ffffff"></i></a>
            </div>
            <div class="pcreate-input-box">
                <input type="text" name="title" class="pcreate-input" placeholder="Enter your title"
                    @error('title') is-invalid @enderror autocomplete="title" autofocus
                    value="{{ old('title', $product->title) }}">

                @error('title')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="pcreate-input-box">
                <select class="form-select" multiple aria-label="multiple select " name="category[]">

                    @foreach ($product->categories as $category)
                        {{ $cate[] = $category->pivot->category_id }}
                    @endforeach
                    @foreach ($categories as $cat)
                        <option value="{{ $cat['id'] }}" @if (in_array($cat->id, $cate)) selected @endif>
                            {{ $cat['name'] }}</option>
                    @endforeach


                </select>
                @error('description')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="pcreate-input-box">
                <input type="text" name="description" class="pcreate-input" placeholder="Enter your description"
                    @error('description') is-invalid @enderror autocomplete="description" autofocus
                    value="{{ old('description', $product->description) }}">

                @error('description')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="pcreate-input-box">
                <input type="text" name="price" class="pcreate-input" placeholder="Enter your price"
                    @error('price') is-invalid @enderror autocomplete="price" autofocus
                    value="{{ old('price', $product->price) }}">

                @error('price')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>





            <div class="pcreate-input-box">
                <input type="submit" value="Update" class="pcreate-btn">
            </div>

        </form>


    </div>
@endsection
