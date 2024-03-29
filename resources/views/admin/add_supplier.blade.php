@extends('admin/layout')
@section('content')

<div class="col-12">
    <div class="card w-100 position-relative overflow-hidden mb-0">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold" style="color: #5a9ad9;text-align: center;">Supplier Details</h5>
        <p class="card-subtitle mb-4" style="text-align: center;">All input are required to save a new supplier</p>
        <form method="POST" action="/addSupplier">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Supplier Name</label>
                <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Mathew">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Supplier references</label>
                <input type="text" class="form-control" id="supplier_references" name="supplier_references" placeholder="Maxima Studio">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Supplier Phone Number</label>
                <input type="tel" class="form-control" id="supplier_phone" name="supplier_phone" placeholder="00000000">
              </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label fw-semibold">Supplier surname</label>
                    <input type="text" class="form-control" id="supplier_surname" name="supplier_surname" placeholder="Doe Anderson">
                  </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Supplier Address</label>
                <input type="text" class="form-control" id="supplier_address" name="supplier_address" placeholder="Avenue Jean Paul II">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Supplier Email</label>
                <input type="email" class="form-control" id="supplier_email" name="supplier_email" placeholder="info@modernize.com">
              </div>
              
            </div>
            <div class="col-12">
              <div class="">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Supplier Description</label>
                <textarea class="form-control" id="supplier_description" name="supplier_description" rows="5" style="width:100%"></textarea>
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