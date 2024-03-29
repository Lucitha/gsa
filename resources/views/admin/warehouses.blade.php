@extends('admin/layout')
@section('content')


<a class="btn btn-primary w-30 py-8 mb-4 rounded-2" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="ti ti-warehouse"></i> Add warehouses
</a>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <h5 class="mb-0">Warehouse List</h5>
                </div>
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered display text-nowrap"
                        style="width: 100%">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>Warehouse</th>
                                <th>Created_by</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($warehouses as $warehouse)
                            <tr>
                                <td>{{$warehouse->warehouse_name}}</td>
                                <td>{{$warehouse->warehouse_name}}</td>
                                <td>{{$warehouse->warehouse_flag}}</td>
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









<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
                <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
                    All input are required
                </span>
            </div>
            <form method="POST" action="/newWarehouse">
                @csrf
                <div class="card-body p-4">
                    <div class="mb-4 row align-items-center">
                    <label for="warehouse_name" class="form-label fw-semibold col-sm-3 col-form-label">Warehouse Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="warehouse_name" name="warehouse_name" placeholder="John Deo">
                    </div>
                    </div>
                    
                    <div class="mb-4 row align-items-center">
                    <label for="warehouse_description" class="form-label fw-semibold col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                        <textarea class="form-control" id="warehouse_description" name="warehouse_description" rows="5" style="width:100%"></textarea>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-9">
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection
<script>
    function login() {
        var admin_email = $('#admin_email').val();
        var admin_password = $('#admin_password').val();

        $('#btnSubmit').html('Wait...');

        //$('#btnSubmit').html('Veuiller patienter <i class="fa fa-spinner fa-spin"></i>');
        $.ajax({
            url: "/adminlogin",
            type: "POST",
            data: {
                admin_email: admin_email,
                admin_password: admin_password
            },
            success: function(msg) {

                if (msg.status == 0) {
                    $('#btnSubmit').html('Se connecter');
                    let error_msg = '';
                    if (msg.errors) {
                        for (let i in msg.errors) {
                            error_msg += msg.errors[i][0] + '<br>'
                        }
                        toastr.error(error_msg);
                    } else {
                        toastr.warning(msg.message);
                    }
                } else {
                    $('#btnSubmit').html('Se connecter');
                    toastr.success(msg.message);
                    setTimeout(function() {
                        location.href = '/admin/dashboard';
                    }, 2000);
                }
            }
        });
    }
</script>