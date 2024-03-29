@extends('admin/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <h5 class="mb-0">Product List</h5>
                </div>
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered display text-nowrap"
                        style="width: 100%">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>Products</th>
                                <th>Created_by</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_flag}}</td>
                                <td> 
                                    @if ($product->product_flag==1)
                                        <a href="/statutProduct/{{$product->id}}" onclick="return confirm('voulez vous vraiment désactiver ce produit?')">Statut</a>  
                                    @else
                                        <a href="/statutProduct/{{$product->id}}" onclick="return confirm('voulez vous vraiment activer ce produit?')">Statut</a>
                                    @endif
                                </td>
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