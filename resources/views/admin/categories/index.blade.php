@extends('../admin/index')
<link rel="stylesheet" href="{{asset('css/categories.css')}}">


@section('content')
    <section class="sec-index">
        <div class="inner">
            <div class="index-box">
                <h1 class="cmn-ttl">Categories</h1>
            <div class="create-btn1">
                <a href="{{ route('categories.create') }}">Create</a>
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

                        <td>{{ ++$i}}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <div class="btn-div clearfix">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                        class="edit edit-btn">
                                        Edit
                                    </a>
                                <form class="del-form " action="{{ route('categories.delete', $category->id) }}" onsubmit="return confirm('Please confirm you want to delete! {{ $category->name }} ');"
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

            console.log(ctext);
            console.log(permissiontext);

            function ConfirmDelete() {

                return confirm(ctext);
            };
        </script>
    </section>
@endsection
