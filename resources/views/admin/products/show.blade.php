@extends('../admin/index')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@section('content')
    <div class="inner">
        <div class="detail-box">
            <div class="detail-ttl ">
                <h1 class="cmn-ttl">Product Detail</h1>
            </div>
            <div class="detail-box1">
                <ul class="detail-list">
                    <li class="clearfix">
                        <div class="l"><h4>User</h4> </div>

                        <div class="r"><p>:{{  $product->users?->name  }}</p></div>
                    </li>
                    <li class="clearfix">
                        <div class="l"><h4>Title</h4> </div>

                        <div class="r"><p>:{{ $product->title }}</p></div>
                    </li>
                    <li class="clearfix">
                        <div class="l"><h4>Category</h4> </div>

                        <div class="r"><p>: @foreach ($product->categories as $category){{ $category->name }}
                            @endforeach</p></div>
                    </li>
                    <li class="clearfix">
                        <div class="l"><h4>Description</h4> </div>

                        <div class="r"><p>:{{ $product->description }}</p></div>
                    </li>
                    <li class="clearfix">
                        <div class="l"><h4>Price</h4> </div>

                        <div class="r"><p>:{{ $product->price}}</p></div>
                    </li>

                </ul>
            </div>
        </div>

    </div>
@endsection
