@extends('admin/layout')
@section('content')

<div class="col-12">
    <div class="card w-100 position-relative overflow-hidden mb-0">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold" style="color: #5a9ad9;text-align: center;">Stock Add</h5>
        <form method="POST" action="\addStock">
          @csrf
          <div class="row">
            <div class="mb-4">
              <label for="reference" class="form-label fw-semibold">Stock reference</label>
              <input type="text" class="form-control" id="reference" name="reference" placeholder="RA-45">
            </div>
            <div class="col-lg-6">
              <div class="mb-4">
                <label for="type" class="form-label fw-semibold">Stock type</label>
                <select class="form-select" aria-label="Default select example" id="type" name='type'>
                <option disabled selected>Select a stock type</option>
                <option value="Input">INPUT</option>
                <option value="Output">OUTPUT</option>
                </select>
              </div>

              <div class="mb-4">
                <label for="warehouse" class="form-label fw-semibold">Warehouse</label>
                <select class="form-select" aria-label="Default select example" id="warehouse" name='warehouse'>
                  <option selected>Select an option</option>
                  @foreach ($warehouses as $warehouse)
                  <option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                  
                  @endforeach
                
                </select>
              </div>
                <div class="mb-4">
                    <label for="category" class="form-label fw-semibold">ProductcCategory</label>
                    <select class="form-select" aria-label="Default select example" id="category" name='category'>
                      <option selected>Select an option</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      
                      @endforeach
                    
                    </select>
                </div>
                
                
            </div>
                
            <div class="col-lg-6">
              <div class="mb-4">
                <label for="supplier" class="form-label fw-semibold">Supplier</label>
                <select class="form-select" aria-label="Default select example" id="supplier" name='supplier'>
                  <option selected>Select an option</option>
                  @foreach ($suppliers as $supplier)
                  <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                  @endforeach
                
                </select>
              </div>
              <div class="mb-4">
                <label for="quantity" class="form-label fw-semibold" id="quantity" name='quantity'>Quantity</label>
                <input type="number" class="form-control" id="stock_quantity" min="1">
              </div>
              
                <div class="mb-4">
                    <label for="product" class="form-label fw-semibold">Product</label>
                    <select class="form-select" aria-label="Default select example" id="product" name='product'>
                    <option selected>India (INR)</option>
                    <option value="1">US Dollar ($)</option>
                    <option value="2">United Kingdom (Pound)</option>
                    <option value="3">India (INR)</option>
                    <option value="3">Russia (Ruble)</option>
                    </select>
                </div>
                
                 
            </div>
            <div class="col-12">
              <div class="">
                <label for="description" class="form-label fw-semibold">Stock description</label>
                <textarea class="form-control" id="description" name="description" rows="5" style="width:100%"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                <button class="btn btn-primary">Save</button>
                <button class="btn btn-light-danger text-danger">Cancel</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    
@endsection