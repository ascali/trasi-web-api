@extends('index')
@section('content')

<div class="pull-right">
    <button class="btn btn-raised btn-round btn-info" onclick="add()">
        <div class="card-header card-header-icon" data-background-color="purple">
            <i class="material-icons">add_circle</i>  Add News
        </div>
    </button>
</div>

<div class="container-fluid">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>


                <div class="card-content">
                    <h4 class="card-title">Table News</h4>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Main</th>
                                    <th>Image</th>
                                    <th>By</th>
                                    <th>Updated at</th>
                                    <th class="disabled-sorting text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end content-->
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
</div>

@include('modules.news.modal')

@stop