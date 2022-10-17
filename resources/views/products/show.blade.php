@extends('../admin/index')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@section('content')
    <div class="inner">
        <div class="detail-box">
            <div class="detail-ttl">
                <h1 class="cmn-ttl">Product Detail</h1>
            </div>
            <div class="detail-box1">
                <ul >
                    <li class="clearfix">
                        <div class="l"><h3>User</h3> </div>

                        <div class="r"><p>:{{ $product->user_id = auth()->user()->name }}</p></div>
                    </li>
                    <li class="clearfix">
                        <div class="l"><h3>Title</h3> </div>

                        <div class="r"><p>:{{ $product->title }}</p></div>
                    </li>
                    <li class="clearfix">
                        <div class="l"><h3>Description</h3> </div>

                        <div class="r"><p>:{{ $product->description }}</p></div>
                    </li>
                    <li class="clearfix">
                        <div class="l"><h3>Price</h3> </div>

                        <div class="r"><p>:{{ $product->price}}</p></div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
@endsection
