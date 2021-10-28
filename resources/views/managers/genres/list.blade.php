@extends('layouts.admin-layout')

@section('admin-content')
<div class="card-header">
    <h6 class="text-uppercase mb-0">Genres Manager</h6>
    <a href="genres/create" title="Create" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
</div>
<div class="card-body">
    <table class="table table-hover card-text">
        <thead>
            <tr>
                <th>No.</th>
                <th>Genre name</th>
                <th>Belong to Group</th>
                <th>Belong to Category</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $key => $genre)
            <tr>
                <th>{{$key+1}}</th>
                <td>{{$genre->genre_name}}</td>
                <td>{{$genre->group->group_name}}</td>
                <td>{{$genre->category->category_name}}</td>
                <td class="td-func">
                    <a style="padding: 0 15px;" href="genres/edit/{{$genre->id}}">
                        <i class="fas fa-edit text-success"></i>
                    </a>
                    <form class="delete-form" action="genres/delete/{{$genre->id}}" onsubmit="return confirm('Are you sure about that ?')">
                        @csrf
                        <button type="submit" style="background-color: #ffffff00;border: none" title="Delete"><i class="fas fa-trash-alt text-danger"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{$genres->links('vendor.pagination.bootstrap-4')}}</div>
</div>
@endsection

