
@extends('layouts.master')
@section('content')
    {{-- message --}}
    
    <!-- Page Wrapper -->
        <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Training</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Training</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_training"><i class="fa fa-plus"></i> Add New </a>
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
                                    <th style="width: 30px;">No</th>
                                    <th>Training Type</th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th>Trainer</th>
                                    <th>Employee</th>
                                    <th>Time Duration</th>
                                    <th>Description </th>
                                    <th>Cost </th>
                                    <th>Status </th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainings as $key=>$training )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td hidden class="e_id">{{ $training->id }}</td>
                                    <td hidden class="trainer_id">{{ $training->trainer_id }}</td>
                                    <td hidden class="employees_id">{{ $training->employees_id }}</td>
                                    <td hidden class="id">{{ $training->id }}</td>
                                    <td class="training_type">{{ $training->training_type }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{ url('employee/profile/'.$training->user_id) }}" class="avatar">
                                                <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                            </a>
                                            <a href="{{ url('employee/profile/'.$training->user_id) }}">{{ $training->trainer }}</a>
                                        </h2>
                                    </td>
                                    <td hidden class="trainer">{{ $training->trainer }}</td>
                                    <td hidden class="employees">{{ $training->employees }}</td>
                                    <td hidden class="description">{{ $training->description }}</td>
                                    <td>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" title="Bernardo Galaviz" data-toggle="tooltip">
                                                    <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Richard Miles" data-toggle="tooltip">
                                                    <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                </a>
                                            </li>
                                            <li class="dropdown avatar-dropdown">
                                                <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="avatar-group">
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt="" src="{{ URL::to('/assets/images/'. $training->avatar) }}">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-pagination">
                                                        <ul class="pagination">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">«</span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Next">
                                                                    <span aria-hidden="true">»</span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li> 
                                        </ul>
                                    </td>
                                    <td >{{ $training->start_date }} - {{ $training->end_date }}</td>
                                    <td hidden class="start_date">{{ $training->start_date }}</td>
                                    <td hidden class="end_date">{{ $training->end_date }}</td>
                                    <td>{{ $training->description }}</td>
                                    <td>${{ $training->training_cost }}</td>
                                    <td hidden class="training_cost">{{ $training->training_cost }}</td>
                                    <td>
                                        <i class="fa fa-dot-circle-o text-success"></i> {{ $training->status }}
                                    </td>
                                    <td hidden class="status">{{ $training->status }}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit_training" href="#" data-toggle="modal" data-target="#edit_training"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item delete_training" href="#" data-toggle="modal" data-target="#delete_training"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Training List Modal -->
        <div id="add_training" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Training</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/training/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Type</label>
                                        <select class="select" name="training_type" @error('training_type') is-invalid @enderror>
                                            <option selected disabled>-- Select --</option>
                                            <option value="Node Training">Node Training</option>
                                            <option value="Swift Training">Swift Training</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Trainer</label>
                                        <select class="select" id="trainer" name="trainer" @error('trainer') is-invalid @enderror>
                                            @foreach ($users as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-trainer_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="trainer_id" name="trainer_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employees</label>
                                        <select class="select" id="employees" name="employees" @error('employees') is-invalid @enderror>
                                            @foreach ($users as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-employees_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="employees_id" name="employees_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Cost <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="training_cost" @error('training_cost') is-invalid @enderror>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker @error('start_date') is-invalid @enderror" type="text" name="start_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker @error('end_date') is-invalid @enderror" type="text" name="end_date">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3"name="description" @error('description') is-invalid @enderror></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select" name="status" @error('status') is-invalid @enderror>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Training List Modal -->
        
        <!-- Edit Training List Modal -->
        <div id="edit_training" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Training List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/training/update') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" id="e_id" name="id" value="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Type</label>
                                        <select class="select" id="e_training_type" name="training_type">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Node Training">Node Training</option>
                                            <option value="Swift Training">Swift Training</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Trainer</label>
                                        <select class="select" id="e_trainer" name="trainer">
                                            @foreach ($users as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-e_trainer_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="e_trainer_id" name="trainer_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employees</label>
                                        <select class="select" id="e_employees" name="employees">
                                            @foreach ($users as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-e_employees_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="e_employees_id" name="employees_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Cost <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="e_training_cost" name="training_cost" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="e_start_date" name="start_date" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="e_end_date" name="end_date" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="e_description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select" id="e_status" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Training List Modal -->
        
        <!-- Delete Training List Modal -->
        <div class="modal custom-modal fade" id="delete_training" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Training List</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('form/training/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" class="e_id" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
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
        <!-- /Delete Training List Modal -->
    
    </div>
    <!-- /Page Wrapper -->
    @section('script')

    {{-- update js --}}
    <script>
        $(document).on('click','.edit_training',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.e_id').text());
            $('#e_trainer_id').val(_this.find('.trainer_id').text());
            $('#e_employees_id').val(_this.find('.employees_id').text());
            $('#e_training_cost').val(_this.find('.training_cost').text());
            $('#e_start_date').val(_this.find('.start_date').text());  
            $('#e_end_date').val(_this.find('.end_date').text());  
            $('#e_description').val(_this.find('.description').text());
            $('#e_training_type').val(_this.find('.training_type').text()).change();
            $('#e_trainer').val(_this.find('.trainer').text()).change();
            $('#e_employees').val(_this.find('.employees').text()).change();
            $('#e_status').val(_this.find('.status').text()).change();
        });
    </script>

    {{-- delete model --}}
    <script>
        $(document).on('click','.delete_training',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>

    @endsection
@endsection
