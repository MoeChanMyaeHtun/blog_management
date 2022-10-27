@extends('layouts.app')

@section('content')
    <div class="container mt-5  mb-5">
        <div class="row d-flex justify-content-center pt-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4">
                                    <img src="{{ asset($product->image?->path) }}" alt="image"
                                        style="width:100%; height:300px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="mt-4 mb-3"> <span
                                        class="text-uppercase text-muted brand">{{ $product->users?->name }}</span>
                                    <h5 class="text-uppercase">{{ $product->title }}</h5>
                                </div>
                                <p class="about">
                                    @foreach ($product->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </p>
                                <p class="about">{{ $product->description }}</p>
                                <div class="sizes mt-5">
                                    <h6 class="text-uppercase"><span>$</span>{{ $product->price }}</h6>
                                </div>
                                <div class="cart mt-4 align-items-center">
                                </div>
                                <div class="d-flex  mb-2 mr-2">
                                    @can('edit', $product)
                                        <div class="p-2 bd-highlight ">

                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success"
                                                style="width:100px ; text-align:center;">
                                                <i class="fa-solid fa-pen"></i>
                                                Edit
                                            </a>
                                        </div>
                                    @endcan
                                    <div class="ms-auto   ">

                                        <div class="p-2  bd-highlight ">
                                            <a href="{{ route('product') }}" class="btn btn-secondary"
                                                style="width:100px ; text-align:center;">
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<div class="cart  align-items-center ">

    <div class="d-flex  mb-2 mr-2">
        <div>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info" style=" text-align:center;">
                Edit
            </a>

        </div>

        <div class="ms-auto   ">

            <form class="del-form "
                onsubmit="return confirm('Please confirm you want to delete! {{ $category->name }} ');"
                action="{{ route('categories.delete', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger ml-2 " onclick="myFunction()">
                    Del

                </button>
            </form>
        </div>
    </div>
