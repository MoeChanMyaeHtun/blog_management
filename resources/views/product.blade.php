@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/user_product.css') }}">
@section('content')
    <div class="container pt-5">
        <div class="row mb-5 mt-5 " style="border-bottom:1px solid gray; padding-bottom:10px">
            <div class="col-md-6 d-flex justify-content-left">
                <h1 class="cmn-ttl mb-0 text-secondary">User Product</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">

                <a href="{{ route('product.create') }}" class="btn btn-primary " style="line-height: 2"><i class="fa-sharp fa-solid fa-plus"></i>Create</a>

            </div>

        </div>

        <div class="row ">
            @foreach ($products as $product)
                @if ($product->user_id == auth()->id())
                    <div class="col-md-3 mx-auto d-flex flex-column  product-item ">
                        <div class="title  pt-4 ">
                            <h4 style="padding-left: 10px">{{ $product->title }}</h4>
                        </div>

                        <div class="product ">
                            <hr>
                            @if (!$product->image?->path)
                                <img src="{{ asset('img/productd/default_product.png') }}" alt="image" style="width:100%; height:300px">
                                @else
                                <img src="{{ asset($product->image?->path) }}" alt="image" style="width:100%; height:300px">
                                @endif
                            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                                <li class="icon">
                                    <a class="btn btn-primary"  href="{{ route('product.detail', $product->id) }}" data-abc="true" style="width: 100px"> <i class="fa-sharp fa-solid fa-circle-info"></i> Detail</a></li>
                                <li class="icon mx-3"> @can('edit', $product)
                                        <form class="del-form " action="{{ route('product.delete', $product->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Please confirm you want to delete! {{ $product->title }} ');">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" onclick="myFunction()"><i class="fa-solid fa-trash-can"></i> Delete</button>
                                        </form>
                                    @endcan
                                </li>

                            </ul>
                        </div>

                    </div>
                @endif
            @endforeach



        </div>
        <!--container mt-100-->
        {{ $products->appends(request()->input())->links() }}
        @include('flash-message')

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        var ctext = 'Confirm you want to Delete ? \n'
        var permissiontext = document.getElementsByName('permissionname');

        console.log(ctext);
        console.log(permissiontext);

        function ConfirmDelete() {

            return confirm(ctext);
        };
    </script>
@endsection
