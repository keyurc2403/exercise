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
                        <h2 class="card-title mb-0">Show Product Details</h2>
                    </div>    
                    <div class="col-md-2 text-right">
                        <a class="btn btn-secondary" href="{{ route('products.index') }}">Back</a>
                    </div>    
                </div>
                <hr class="" />
                    
                    <div class="form-body">
                        <div class="row p-t-10">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product Name</label><br/>
                                <b>{{ $product_details->name ?? '' }}</b>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product Price ( ₹ )</label><br/>
                                <b>{{ $product_details->price ?? '' }}</b>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product UPC</label><br/>
                                <b>{{ $product_details->upc ?? '' }}</b>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product Status</label><br/>
                                <b>{{ $product_details->status ?? '' }}</b>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Product Image</label><br/>
                                @if($product_details->product_image)
                                    <img src="{{ asset('/upload/product/'.$product_details->product_image) }}" width="100px" height="100px">
                                @else
                                    <img src="{{ asset('/assets/images/default-product.png') }}" width="100px" height="100px">
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    
</div>

@endsection