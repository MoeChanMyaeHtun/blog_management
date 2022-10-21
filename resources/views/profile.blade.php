@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('content')
    <section class="sec-index">
        <div class="inner">
            <h1 class="cmn-ttl">User Profile</h1>

            <div class="mt-5">
                <table class="table table-striped text-center w-auto mx-auto">
                    <thead class="table-success">
                        <tr class="profile-ttl">
                            <th>No</th>
                            <th>Image</th>
                            <th >Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th >Updated_at</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($profiles as $profile)
                            <tr>

                                <td>{{ ++$i }}</td>
                                <td>
                                    <img src="{{ asset($profile->image?->path) }}" alt="image" style="width:100%; height:100px">

                                </td>
                                <td>{{ $profile->name }}</td>
                                <td>{{ $profile->email }}</td>
                                <td>{{ $profile->phone }}</td>
                                <td>{{ $profile->address }}</td>
                                <td>{{ $profile->updated_at }}</td>
                                <td>


                                    <div class="cart mt-4 align-items-center ">

                                        <div class="d-flex  mb-2">
                                        <div class="p-2  ">
                                            <a href="{{ route('profiles.edit', $profile->id) }}"
                                            class="btn btn-success" style="width:100px ; text-align:center;">
                                            Edit
                                        </a>

                                    </div>

                                        <div class="ms-auto p-2  ">

                                        <form class="del-form "
                                        onsubmit="return confirm('Please confirm you want to delete! {{ $profile->name }} ');"
                                        action="{{ route('profile.delete', $profile->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger " onclick="myFunction()">
                                            Delete

                                        </button>
                                    </form>
                                    </div>
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
