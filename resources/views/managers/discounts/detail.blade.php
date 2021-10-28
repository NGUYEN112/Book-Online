@extends('layouts.admin-layout')
@section('admin-content')
<div class="card-header">
    <h3 class="h6 text-uppercase mb-0">Detail Discount Program</h3>
</div>
<div class="card-body">
    <div class="form-horizontal">

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Date to begin</label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" value="{{$discount->start_date}}" name="start_date" type="date" placeholder="" class="detail-input form-control form-control-success">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-3 form-control-label">Date to end</label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" value="{{$discount->end_date}}" name="end_date" type="date" placeholder="" class="detail-input form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Discount value</label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" value="{{$discount->discount_value}}" name="discount_value" type="number" placeholder="" class="detail-input form-control form-control-success">
            </div>
        </div>

        @if($discount->category_id == null)
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Category apply for </label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" type="text" placeholder="Apply for all Category" class="detail-input form-control form-control-success">
            </div>
        </div>
        @else
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Category apply for </label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" type="text" placeholder="{{$discount->category->category_name}}" class="detail-input form-control form-control-success">
            </div>
        </div>
        @if($discount->group_id == null)
        <div class="form-group row ">
            <label class="col-md-3 form-control-label">Genre group apply for </label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" type="text" placeholder="Apply for all Genre Group" class="detail-input form-control form-control-success">
            </div>
        </div>
        @else
        <div class="form-group row ">
            <label class="col-md-3 form-control-label">Genre group apply for </label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" type="text" placeholder="{{$discount->group->group_name}}" class="detail-input form-control form-control-success">
            </div>
        </div>


        <!-- Genre Select -->
        @if($discount->genre_id == null)
        <div class="form-group row ">
            <label class="col-md-3 form-control-label">Genre apply for </label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" type="text" placeholder="Apply for all Genre" class="detail-input form-control form-control-success">
            </div>
        </div>
        @else
        <div class="form-group row ">
            <label class="col-md-3 form-control-label">Genre apply for </label>
            <div class="col-md-9">
                <input disabled id="inputHorizontalSuccess" type="text" placeholder="{{$discount->genre->genre_name}}" class="detail-input form-control form-control-success">
            </div>
        </div>
        <!--  -->
        @endif
    @endif
@endif

        <div class="form-group row ">
            <label class="col-md-3 form-control-label">Applied to the price</label>
            <div class="col-md-9 value-range row">
                @if($discount->the_range_from == null && $discount->the_range_to == null)
                <input disabled id="inputHorizontalSuccess" placeholder="Apply for all product price" type="date" placeholder="" class="form-control form-control-success">
                @else
                <input disabled id="inputHorizontalSuccess" value="{{$discount->the_range_from}}" name="the_range_from" type="number" placeholder="$" class="col-md-5 detail-input form-control form-control-success">
                <p class="col-md-2">To</p>
                <input disabled id="inputHorizontalSuccess" value="{{$discount->the_range_to}}" name="the_range_to" type="number" placeholder="$" class="col-md-5 detail-input form-control form-control-success">
                @endif
            </div>
        </div>



        <div class="form-group row button-container pl-auto">
            <div class="col-md-9 ml-auto">
                <a href="/manager/discounts" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection