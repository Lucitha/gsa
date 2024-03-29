@extends('admin/layout')
@section('content')

  <div class="col-12">
    <div class="card w-100 position-relative overflow-hidden mb-0">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold" style="color: #5a9ad9;text-align: center;">Product Add</h5>
        <p class="card-subtitle mb-4" style="text-align: center;">Please enter all informations to add a product</p>
        <form method="POST" action="/addProduct">
          @csrf
          <div class="row">
            <div class="col-12">
                <div class="">
                  <label for="exampleInputPassword1" class="form-label fw-semibold">Product Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Cakes">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label fw-semibold">Product Alert</label>
                    <input type="text" class="form-control" id="product_alert" name="product_alert" placeholder="Cakes">
                </div>
            </div>
                
            <div class="col-lg-6">
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label fw-semibold">Product Category</label>
                    <select class="form-select" aria-label="Default select example" id="product_category" name="product_category">
                      <option selected>Select an option</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      
                      @endforeach
                    
                    </select>
                </div>
            </div>
            <div class="col-12">
              <div class="">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Product Description</label>
                <textarea class="form-control" id="category_description" name="product_description" rows="5" style="width:100%"></textarea>
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
    
@endsection