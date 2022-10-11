
@extends('../layouts/app')



@section('content')
<section class="sec-index">
    <div class="inner">
           <form action="{{ route('categories.store') }}" class="create-box" method="POST">
            @csrf
            <input type="text" name="name " class="create-input" placeholder="Enter your category">
            <input type="submit" value="Create" class="create-btn">
           </form>



    </div>
</section>
@endsection
