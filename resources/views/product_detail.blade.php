@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4">
                                <img src="{{ asset($product->image?->path) }}" alt="image" style="width:100%; height:300px">
                             </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">{{ $product->users?->name }}</span>
                                <h5 class="text-uppercase">{{ $product->title }}</h5>

                            </div>

                            <p class="about">@foreach ($product->categories as $category){{ $category->name }}
                                @endforeach</p>
                            <p class="about">{{ $product->description}}</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase"><span>$</span>{{$product->price  }}</h6>
                            </div>
                            <div class="cart mt-4 align-items-center">
                                        @can('edit', $product)
                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="p-2 bd-highlight ">
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-success" style="width:100px ; text-align:center;">
                                                Edit
                                            </a>

                                        </div>

                                            {{-- <div class="ms-auto p-2 bd-highlight ">
                                            <form class="del-form " action="{{ route('product.delete', $product->id) }}"
                                                method="POST" onsubmit="return confirm('Please confirm you want to delete! {{ $product->title }} ');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger">Delete</button>

                                            </form>
                                        </div> --}}
                                        @endcan

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
