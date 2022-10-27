@extends('admin/index')
<link rel="stylesheet" href="{{asset('css/categories.css')}}">


@section('content')
    <section class="sec-index">
        <div class="inner">
            <div class="index-box">
                <h1 class="cmn-ttl">Categories</h1>
            <div class="create-btn1">
                <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"></i> Create</a>
            </div>
            <table class="table table-striped product-index">
                <thead class="table-dark">
                <tr class="cat-ttl">
                    <th>No</th>
                    <th class="name">Name</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th class="action">Action</th>
                </tr>
                </thead>
                @foreach ($categories as $category)
                    <tr>

                        <td>{{ request()->page? (request()->page - 1) * 5 + $loop->iteration : $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <div class="cart  align-items-center ">

                                <div class="d-flex  mb-2 mr-2">
                                    <div>
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-info" style=" text-align:center;">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>

                                    </div>

                                    <div class="ms-auto   ">

                                        <form class="del-form "
                                            onsubmit="return confirm('Please confirm you want to delete! {{ $category->name }} ');"
                                            action="{{ route('categories.delete', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ml-2 " onclick="myFunction()">
                                                <i class="fa-solid fa-trash-can"></i>     Del
                                            </button>
                                        </form>
                                    </div>
                                </div>


                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
            @include('flash-message')

        </div>
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
