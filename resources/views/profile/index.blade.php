@extends('../layouts/app')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('content')
<section class="sec-index">
    <div class="inner">

        <table class="profile-index">
            <tr class="profile-ttl">
                <th>No</th>
                <th class="name">Name</th>
                <th class="email">Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th class="update">Updated_at</th>
                <th class="action">Action</th>
            </tr>

            @foreach ($profiles as $profile)
                <tr>

                    <td>{{ ++$i }}</td>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->email }}</td>
                    <td>{{ $profile->phone }}</td>
                    <td>{{ $profile->address }}</td>
                    <td>{{ $profile->updated_at }}</td>
                    <td>
                        <div class="btn-div clearfix">
                            <button class="edit-btn"><a href="{{ route('profile.edit', $profile->id) }}"
                                    class="edit">
                                    Edit
                                </a></button>
                            <form class="del-form " action="{{ route('profile.delete', $profile->id) }}"
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
        {{ $profiles->links() }}
        @include('flash-message')


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
</section>

@endsection
