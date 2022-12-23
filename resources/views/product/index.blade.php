@extends('layouts.main')
@section('title','Products')

@section('page-title','Products')
@section('content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-10">
                        <h2 class="card-title mb-0">Product List</h2>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fa fa-plus pr-1"></i>Add</a>
                    </div>    
                </div>
                <hr />

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>Product Name</th>
                                <th>Product Price ( ₹ )</th>
                                <th>UPC</th>
                                <th>Product Image</th>
                                <th>Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($products) > 0)
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product->name ?? '' }}</td>
                                        <td>{{ $product->price ?? '' }}</td>
                                        <td>{{ $product->upc ?? '' }}</td>
                                        <td>
                                            @if($product->product_image)
                                                <img src="{{ asset('/upload/product/'.$product->product_image) }}" width="100px" height="100px">
                                            @else
                                                <img src="{{ asset('/assets/images/default-product.png') }}" width="100px" height="100px">
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->status == "Active")
                                                <span class="label label-success font-weight-100">Active</span>
                                            @else
                                                <span class="label label-danger font-weight-100">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap d-flex">
                                            <a href="{{ route('products.show',$product->id) }}" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye btn btn-info m-r-10"></i> </a>
                                            <a href="{{ route('products.edit',$product->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil btn btn-success m-r-10"></i> </a>
                                            <form action="{{URL::route('products.destroy',$product->id)}}" method="POST" id="{{$product->id}}">@method('delete')
                                            @csrf
                                                <button type="submit" name="submit" data-id="{{$product->id}}"  class="hideBtn submitData_{{$product->id}} d-none"><i class="ft-trash-2"></i> Submit</button>
                                                <a class="delete cursor-pointer" data-toggle="tooltip" data-original-title="Close" data-id="{{ $product->id }}"> <i class="fa fa-close btn btn-danger"></i> </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="7">No records found.  </td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-md-12 paginations">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                            
                                @if(isset($products)){!! $products->render() !!}@endif
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
    $(document).on('click','.delete',function(){
        var id=$(this).data('id');
        var getval = $(this).data('value');
        bootbox.confirm("Are you sure you want to delete this product ?", function(result){ 
            if(result == true)
            {   
              $('.submitData_'+id).trigger('click');
            }
        });
    });
</script>
@endsection