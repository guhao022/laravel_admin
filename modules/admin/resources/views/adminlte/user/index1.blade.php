@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')
    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="pull-right">
                    <div class="form-inline pull-right">
                        <form action="" method="get">
                            <fieldset>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"><strong>ID</strong></span>
                                    <input type="text" class="form-control" placeholder="Id" name="id" value="">
                                </div>

                                <div class="btn-group btn-group-sm">
                                    <button type="submit" class="btn btn-primary" title="搜索"><i class="fa fa-search"></i></button>
                                    <a href="{{ route($current_menu->name) }}" class="btn btn-warning" title="还原"><i class="fa fa-undo"></i></a>
                                </div>

                            </fieldset>
                        </form>
                    </div>

                </div>

                <div class="btn-group" style="margin-right: 10px">
                    <a href="{{ route('admin.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th><input type="checkbox" class="minimal-red grid-select-all"></th>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                    </tr>

                    <tr>
                        <td>
                            <input type="checkbox" class="minimal grid-row-checkbox" data-id="1" />
                        </td>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" class="minimal grid-row-checkbox" data-id="1" />
                        </td>
                        <td>219</td>
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop
@section('scripts')

@stop