@extends('layouts.admin-layout')

@section('admin-content')
<div class="card-header">
    <h6 class="text-uppercase mb-0">Discount Program Manager</h6>
    <a href="discounts/create" title="Create" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
</div>
<div class="card-body">
    <table class="table table-hover card-text">
        <thead>
            <tr>
                <th>No.</th>
                <th>Date Start</th>
                <th>Date End</th>
                <th>Value</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
            @foreach($discounts as $key => $discount)
            <tr>
                <th>{{$key+1}}</th>
                <td>{{$discount->start_date}}</td>
                <td>{{$discount->end_date}}</td>
                <td>{{$discount->discount_value}}</td>
                <td class="td-func">
                    <a style="padding: 0 15px;" href="discounts/info/{{$discount->id}}">
                        <i class="fas fa-info-circle text-success"></i>
                    </a>
                    <a style="padding: 0 15px;" href="discounts/edit/{{$discount->id}}">
                        <i class="fas fa-edit text-success"></i>
                    </a>
                    <form class="delete-form" action="discounts/delete/{{$discount->id}}" onsubmit="return confirm('Are you sure about that ?')">
                        @csrf
                        <button type="submit" style="background-color: #ffffff00;border: none" title="Delete"><i class="fas fa-trash-alt text-danger"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

