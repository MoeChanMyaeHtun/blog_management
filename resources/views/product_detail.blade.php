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
                                <img id="main-image" src="{{ asset('img/images.jpg') }}" width="250" />
                             </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            {{-- <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div> --}}
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

                                    <div class="d-flex bd-highlight mb-3">
                                    <div class="p-2 bd-highlight ">  <a href="{{ route('product.edit', $product->id) }}"
                                        class=" edit edit-btn " style="width:100px ; text-align:center;">
                                        Edit
                                    </a></div>

                                    <div class="ms-auto p-2 bd-highlight ">
                                    <form class="del-form " action="{{ route('products.delete', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" class="del-btn " value="Del" style="width:100px">
                                    </form>
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
