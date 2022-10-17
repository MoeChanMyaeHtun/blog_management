@extends('../admin/index')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@section('content')
<section class="product-index">
    <div class="inner">
        <h1 class="cmn-ttl">Product</h1>

        <div class="clearfix">
            <div class="srch_wrpr">
                <form action="" >

                <input type="checkbox" name="title" class="checkbox">
                <div class="srch_sb_cnt">
                    <input type="text" name="title" id="" class="sech_txt_inpt" placeholder="Type to search...">
                    <button class="srch_btn">
                        <i class="fa fa-search" ></i>
                    </button>

                </form>
                </div>
            </div>

        <div class="create-btn1">
            <a href="{{ route('products.create') }}">Create</a>
        </div>
    </div>
        <table class="product-index">
            <tr class="cat-ttl">
                <th class="no">No</th>
                <th class="name">User</th>
                <th class="name">Title</th>
                <th class="name">Category</th>
                <th class="name">Description</th>
                <th class="name">Price</th>
                <th class="name">Updated_at</th>
                <th class="name">Action</th>
            </tr>

            @foreach ($products as $product)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->user_id = auth()->user()->name }}</td>
                    <td>{{ $product->title }}</td>
                    <td>
                        @foreach ($product->categories as $category){{ $category->name }}
                                @endforeach
                    </td>
                    <td>{{ $product->description}}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <div class="btn-div clearfix">
                            <a href="{{ route('products.show',$product->id) }}"
                                    class="show show-btn">
                                    Info
                                </a>
                           <a href="{{ route('products.edit', $product->id) }}"
                                    class="edit edit-btn">
                                    Edit
                                </a>
                            <form class="del-form " action="{{ route('products.delete', $product->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="del-btn" value="Del">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- {{ $products->links() }} --}}
        {{ $products->appends(request()->input())->links() }}



    </div>
</section>
@endsection
