@extends('admin/layout')
@section('content')

<div class="col-12 mb-5">
    <div class="card w-100 position-relative overflow-hidden mb-0">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold" style="color: #5a9ad9;text-align: center;">Add Categories</h5>
       
        <form method="POST" action="/addCategory">
            @csrf
            <div class="row">
                <div class="col-12 mb-4">
                    <label for="category_name" class="form-label fw-semibold">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Mathew Anderson">
                </div>
                
               
                <div class="col-12">
                    <div class="">
                        <label for="exampleInputPassword1" class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" id="category_description" name="category_description" rows="5" style="width:100%"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-light-danger text-danger">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <h5 class="mb-0">Multi-column ordering</h5>
                </div>
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered display text-nowrap"
                        style="width: 100%">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>Category name</th>
                                <th>Created_by</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_flag}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                            <!-- end row -->
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ---------------------
                end Multi-column ordering
            ---------------- -->
    </div>
</div>


    
@endsection