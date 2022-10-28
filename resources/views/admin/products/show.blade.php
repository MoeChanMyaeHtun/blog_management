@extends('../admin/index')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@section('content')
    <div class="inner ">

        <div class="row">
        <div class="col-md-10 detail-box pb-5">

            <div class="detail-box1 bg-secondary">

                <div class="row mx-auto pt-3 pb-3 bg-dark">
                <div class="col-md-11 text-center">
                    <h2>Product Detail</h2>
                </div>
                <div class="col-md-1">
                  <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
                <div class="row mx-auto pt-3 pb-3 ">
                <div class="col-md-4 text-center">
                    <h4>User</h4>
                </div>
                <div class="col-md-8">
                    {{  $product->users?->name  }}
                </div>
            </div>
                <div class="row mx-auto pt-3 pb-3 ">
                <div class="col-md-4 text-center">
                    <h4>Title</h4>
                </div>
                <div class="col-md-8">
                    {{ $product->title }}
                </div>
            </div>
                <div class="row mx-auto pt-3 pb-3 ">
                <div class="col-md-4 text-center">
                    <h4>Category</h4>
                </div>
                <div class="col-md-8">
                    @foreach ($product->categories as $category){{ $category->name }}
                    @endforeach
                </div>
            </div>
                <div class="row mx-auto pt-3 pb-3 ">
                <div class="col-md-4 text-center">
                    <h4>Description</h4>
                </div>
                <div class="col-md-8">
                    {{ $product->description }}
                </div>
            </div>
                <div class="row mx-auto pt-3 pb-3">
                <div class="col-md-4 text-center">
                    <h4>Price</h4>
                </div>
                <div class="col-md-8">
                    {{ $product->price}}
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection
