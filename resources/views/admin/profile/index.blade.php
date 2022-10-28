@extends('../admin/index')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/usersearch.css') }}">
@section('content')
    <section class="sec-index">
        <div class="inner">
            <div class="row">
                <div class="col-md-9">
            <h1 class="cmn-ttl text-left mb-0" >User Profile</h1>
        </div>
                <div class="col-md-3">
                    <form>
                        <div class="form-group mb-4">
                          <input id="exampleFormControlInput1" type="text" placeholder="What're you searching for?" class="form-control search" name="name">
                        </div>
                    </form>
                </div>
            </div>
            <div >
                <table class="table  table-striped text-center   mx-auto">
                    <thead class="table-dark">
                        <tr class="profile-ttl">
                            <th style="width: 50px">No</th>
                            <th style="width: 100px">Profile</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th >Updated_at</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($profiles as $profile)
                            <tr>

                                <td>{{ request()->page? (request()->page - 1) * 5 + $loop->iteration : $loop->iteration }}</td>
                                <td><img src="{{asset ($profile->image?->path) }}" alt="" width="100px"></td>
                                <td>{{ $profile->name }}</td>
                                <td>{{ $profile->email }}</td>
                                <td>{{ $profile->phone }}</td>
                                <td>{{ $profile->address }}</td>
                                <td>{{ $profile->updated_at }}</td>
                                <td>

                                    <div class="cart  align-items-center ">

                                        <div class="d-flex  mb-2 mr-2">
                                            <div>
                                                <a href="{{ route('profile.edit', $profile->id) }}"
                                                    class="btn btn-info" style=" text-align:center;">
                                                    <i class="fa-solid fa-pen"></i>  Edit
                                                </a>

                                            </div>

                                            <div class="ms-auto   ">

                                                <form class="del-form "
                                                    onsubmit="return confirm('Please confirm you want to delete! {{ $profile->name }} ');"
                                                    action="{{ route('profile.delete', $profile->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger ml-2 " onclick="myFunction()">
                                                        <i class="fa-solid fa-trash-can"></i>  Del
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
