@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Designations</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Designations</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Designation </th>
                                        <th>Department </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($designation as $item) 
                                        @foreach ($item->designations_r as $data)
                                        
                                            <tr>
                                                <td>{!! $data->id !!}</td>
                                                <td>{!! $data->designations !!}</td>
                                                <td>{!! $item->name !!}</td>
                                                <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_designation_{!! $data->id !!}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_designation_{!! $data->id !!}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Designation Modal -->
            <div id="add_designation" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Designation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('add_des')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Designation Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="designations">
                                </div>
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="select" name="id">
                                        <option>Select Department</option>
                                        @foreach($designation as $data) 
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach  
                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Designation Modal -->
            
            <!-- Edit Designation Modal -->
            @foreach($designation as $item) 
                @foreach ($item->designations_r as $data)
                    <div id="edit_designation_{!! $data->id !!}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Designation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('add_des')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Designation Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{!! $data->designations !!}" name="designations">
                                        </div>
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select" name="id">
                                                @foreach($designation as $data_val) 
                                                    <option value="{{$data_val->id}}" {{$data_val->id == $data->department_id  ? 'selected' : ''}}>{{$data_val->name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        <input type="hidden" name="edit_id" value="{{ $data->id }}">
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach  
            <!-- /Edit Designation Modal -->
            
            <!-- Delete Designation Modal -->
            @foreach($designation as $item) 
                @foreach ($item->designations_r as $data) 
                    <div class="modal custom-modal fade" id="delete_designation_{!! $data->id !!}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="form-header">
                                        <h3>Delete Designation</h3>
                                        <p>Are you sure want to delete?</p>
                                    </div>
                                    <div class="modal-btn delete-action">
                                        <form action="{{route('add_des')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$data->id}}" name='del_id'>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button class="btn btn-primary continue-btn" id="delete_btn">Delete</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach  
            <!-- /Delete Designation Modal -->
        
        </div>
        <!-- /Page Wrapper -->
@endsection