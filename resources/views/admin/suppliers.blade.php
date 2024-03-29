@extends('admin/layout')
@section('content')


<a class="btn btn-primary w-30 py-8 mb-4 rounded-2" href="/newSupplier" ><i class="ti ti-warehouse"></i> Add Supplier</a>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <h5 class="mb-0">Supplier List</h5>
                </div>
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered display text-nowrap"
                        style="width: 100%">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>Supplier</th>
                                <th>Phone</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{$supplier->supplier_name.' '.$supplier->supplier_surname}}</td>
                                <td>{{$supplier->supplier_phone}}</td>
                                <td>{{$supplier->supplier_flag}}</td>
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