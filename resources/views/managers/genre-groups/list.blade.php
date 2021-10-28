@extends('layouts.admin-layout')

@section('admin-content')
<div class="card-header">
    <h6 class="text-uppercase mb-0">Genre Group Manager</h6>
    <a href="genre-group/create" title="Create" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
</div>
<div class="card-body">
    <table class="table table-hover card-text">
        <thead>
            <tr>
                <th>No.</th>
                <th>Group name</th>
                <th>Belong to</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $key => $group)
            <tr>
                <th>{{$key+1}}</th>
                <td>{{$group->group_name}}</td>
                <td>{{$group->category->category_name}}</td>
                <td class="td-func">
                    <a style="padding: 0 15px;" href="genre-group/edit/{{$group->id}}">
                        <i class="fas fa-edit text-success"></i>
                    </a>
                    <form class="delete-form" action="genre-group/delete/{{$group->id}}" onsubmit="return confirm('Are you sure about that ?')">
                        @csrf
                        <button type="submit" style="background-color: #ffffff00;border: none" title="Delete"><i class="fas fa-trash-alt text-danger"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{$groups->links('vendor.pagination.bootstrap-4')}}</div>
</div>
@endsection