@extends('../layouts/app')
@section('content')
<section class="product-index">
    <div class="inner">
        <table class="category-index">
            <tr class="cat-ttl">
                <th>No</th>
                <th class="name">Title</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th class="action">Action</th>
            </tr>

            @foreach ($products as $product)
                <tr>

                    <td>{{ ++$i }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <div class="btn-div clearfix">
                            <button class="edit-btn"><a href="{{ route('categories.edit', $product->id) }}"
                                    class="edit">
                                    Edit
                                </a></button>
                            <form class="del-form " action="{{ route('categories.delete', $product->id) }}"
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
    </div>
</section>
@endsection
