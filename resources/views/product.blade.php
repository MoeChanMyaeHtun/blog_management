@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="cmn-ttl">Product</h1>
        <div class="row mb-5">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary ">Create</a>

            </div>
        </div>


        <div class="container mt-100">

            <div class="row ">

                @foreach ($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-5">
                            <div><img src="{{ asset('img/images.jpg') }}" alt="Category"style="width:100%; height:400px">

                            </div>
                            <div class="card-body text-center">

                                <h4 class="card-title">
                                    {{ $product->users?->name }}
                                </h4>
                                <p class="text-muted"> {{ $product->title }}</p>
                                <p class="text-muted">

                                    @foreach ($product->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </p>
                                <p class="text-muted"> {{ $product->price }}</p>

                                <a class="btn btn-outline-primary btn-sm" href="{{ route('product.detail', $product->id) }}"
                                    data-abc="true">View Products</a>

                            </div>
                            <!--card-body text-center-->
                        </div>
                        <!--card mb-30-->
                    </div>
                    <!--col-md-4 col-sm-6-->
                @endforeach
            </div>
            <!--row-->
        </div>
        <!--container mt-100-->
    </div>
@endsection
