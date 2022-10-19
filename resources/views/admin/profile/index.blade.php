@extends('../admin/index')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('content')
    <section class="sec-index">
        <div class="inner">
            <h1 class="cmn-ttl">User Profile</h1>

            <div class="mt-5">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="profile-ttl">
                            <th>No</th>
                            <th class="name">Name</th>
                            <th class="email">Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="update">Updated_at</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>

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

                                        <form class="del-form "
                                            onsubmit="return confirm('Please confirm you want to delete! {{ $profile->name }} ');"
                                            action="{{ route('profile.delete', $profile->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="del-btn " onclick="myFunction()">
                                                Del

                                            </button>
                                        </form>


                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $profiles->links() }}
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
    </section>
@endsection
