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

    </div>
        <table class="table table-striped product-index">
            <thead class="table-dark">
            <tr class="cat-ttl">
                <th class="no">No</th>
                <th class="name">User</th>
                <th class="name">Title</th>
                <th class="name">Category</th>
                <th class="name">Description</th>
                <th class="name">Price</th>
                <th class="name">Updated_at</th>
                <th style="width: 100px;">Action</th>
            </tr>
            </thead>

            @foreach ($products as $product)
                <tr>

                    <td>{{ ++$i }}</td>
                    <td>
                        {{ $product->users?->name }}

                    </td>
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

                            <form class="del-form " action="{{ route('products.delete', $product->id) }}" onsubmit="return confirm('Please confirm you want to delete! {{ $product->title }} ');"
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
</section>
@endsection
