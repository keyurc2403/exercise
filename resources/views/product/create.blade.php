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
                        <h2 class="card-title mb-0">Add Product</h2>
                    </div>    
                </div>
                <hr class="mt-0" />


                <form id="prodctform" name="prodctform" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                    <div class="form-body">
                        <div class="row p-t-10">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product Price ( ₹ )<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Product Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">UPC<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="upc" name="upc" value="{{ old('upc') }}" placeholder="UPC">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product Image<span class="text-danger">* (Accepted format: .jpg, .jpeg, .png)</span></label>
                                <input class="form-control" id="product_image" name="product_image" value="" type="file" accept=".jpg,.jpeg,.png">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <a href="{{ route('products.index') }}" class="btn btn-inverse">Cancel</a>
                    </div>    
                    
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
    $("form[name='prodctform']").validate({
        rules: 
        {
          name:'required',
          price:'required',
          upc:'required',
          product_image:'required',
        },
        messages: 
        {
          name:'Please enter product name.',
          price:'Please enter product price.',
          upc:'Please enter upc.',
          product_image:'Please select product image.',
        }
    });
</script>

@endsection