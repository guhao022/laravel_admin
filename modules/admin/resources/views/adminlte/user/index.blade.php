@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')
    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="btn-group" style="margin-right: 10px">
                    <a href="{{ route('admin.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>
            </div>

            <div class="box-body no-padding">
    <ul class="users-list ">
        <li>
            <img src="{{admin_asset('img/user1-128x128.jpg')}}" alt="User Image">
            <a class="users-list-name" href="#">Alexander Pierce</a>
            <span class="users-list-date">Today</span>
        </li>

    </ul>
    <!-- /.users-list -->
</div>

        </div>
    </div>

    @stop