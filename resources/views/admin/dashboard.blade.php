@extends('admin/layout')
@section('content')
    <div class="col-12">
        <div class="card w-100 position-relative overflow-hidden mb-0">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold">Mrs/ Sir, {{session()->get('user')->user_surname}} {{session()->get('user')->user_name}}</h5>
            <p class="card-subtitle mb-4">Welcome to your app of stock manage</p>
        
        </div>
        </div>
    </div>




@endsection