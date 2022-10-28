@extends('../admin/index')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@section('content')
    <section class="product-index">
        <div class="inner">
            <h1 class="cmn-ttl">Product</h1>
        </div>

        <div class="d-flex justify-content-between">
            <div class="col-md-4">
                <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" name="file">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="file" class="form-control pt-1" id="user_data" name="file" required>

                        <div class="input-group-append">
                            <button class="btn btn-outline-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="">
                    <div class="srch_wrpr">
                        <input type="checkbox" name="title" class="checkbox">
                        <div class="srch_sb_cnt">
                            <input type="text" name="title" id="" class="sech_txt_inpt "
                                placeholder="Type to search..." value="{{ $request->title }}">
                            <button name="search" class="srch_btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <input type="submit" value="Export" class="btn btn-primary" name="export" >

                </form>
            </div>

        </div>
        <table class="table table-striped text-center   mx-auto">
            <thead class="table-dark">
                <tr class="cat-ttl">
                    <th>No</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Category</th>
                    {{-- <th style="width:300px">Description</th> --}}
                    <th>Price</th>
                    <th>Updated_at</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>

            @foreach ($products as $product)
                <tr>
                    <td>{{ request()->page? (request()->page - 1) * 5 + $loop->iteration : $loop->iteration }}</td>
                    <td>
                        {{ $product->users?->name }}
                    </td>
                    <td>{{ $product->title }}</td>
                    <td>
                        @foreach ($product->categories as $category)
                            {{ $category->name }}<br>
                        @endforeach
                    </td>
                    {{-- <td>{{ $product->description }}</td> --}}
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <div class="cart  align-items-center ">
                            <div class="d-flex  mb-2 mr-2">
                                <div>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary"
                                        style=" text-align:center;">
                                        <i class="fa-sharp fa-solid fa-circle-info"></i>  info
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <form class="del-form "
                                        onsubmit="return confirm('Please confirm you want to delete! {{ $product->name }} ');"
                                        action="{{ route('products.delete', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger ml-2 " onclick="myFunction()">
                                            <i class="fa-solid fa-trash-can"></i>   Del
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- {{ $products->links() }} --}}
        {{ $products->appends(request()->input())->links() }}
        @include('flash-message')



        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="/js/app.js"></script>
        <script type="text/javascript">
            var ctext = 'Confirm you want to Delete ? \n'
            var permissiontext = document.getElementsByName('permissionname');
            function ConfirmDelete() {

                return confirm(ctext);
            };
        </script>
    </section>
@endsection
