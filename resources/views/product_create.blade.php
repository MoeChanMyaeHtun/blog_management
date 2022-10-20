@extends('../layouts/app')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@section('content')
    <section class="product-create">
        <div class="inner">

                <form action="{{ route('product.store') }}"  class="pc-form" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="pc-box">
                <input type="text" name="title" id="" class="title" placeholder="Enter product title" @error('title') is-invalid @enderror  autocomplete="title" autofocus>

                @error('title')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="pc-box">
                <input type="file" name="image" id="" class="title"  @error('image') is-invalid @enderror  autocomplete="image" autofocus>

                @error('image')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

                <div class="pc-box">

                <select class="form-select" multiple aria-label="multiple select " name="category[]">

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
            </div>
                <div class="pc-box">
                <input type="text" name="description" id="" class="title" placeholder="Enter product description" @error('description') is-invalid @enderror  autocomplete="description" autofocus>

                @error('description')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

                <div class="pc-box">
                <input type="text" name="price" id="" class="title" placeholder="Enter product price" @error('price') is-invalid @enderror  autocomplete="title" autofocus>

                @error('title')
                    <span class="feedback " role="alert" class="display:block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="pc-box">
                <input type="submit" value="Create" class="pc-btn">
            </div>
                </form>

        </div>
    </section>

@endsection

