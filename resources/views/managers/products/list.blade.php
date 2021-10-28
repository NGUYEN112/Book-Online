@extends('layouts.admin-layout')

@section('admin-content')
<div class="card-header">
    <h6 class="text-uppercase mb-0">Products Manager</h6>
    <a href="products/create" title="Create" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
</div>
<div class="card-body">
    <table class="table table-hover card-text">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product name</th>
                <th>Category</th>
                <th>Genre Group</th>
                <th>Genre</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <th>{{$key+1}}</th>
                <td>{{$product->product_name}}</td>
                <td>{{$product->category->category_name}}</td>
                <td>{{$product->group->group_name}}</td>
                <td>{{$product->genre->genre_name}}</td>
                <td class="td-func">
                    <a style="padding: 0 15px;" href="products/edit/{{$product->id}}">
                        <i class="fas fa-edit text-success"></i>
                    </a>
                    <form class="delete-form" action="products/delete/{{$product->id}}" onsubmit="return confirm('Are you sure about that ?')">
                        @csrf
                        <button type="submit" style="background-color: #ffffff00;border: none" title="Delete"><i class="fas fa-trash-alt text-danger"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{$products->links('vendor.pagination.bootstrap-4')}}</div>
</div>
@endsection