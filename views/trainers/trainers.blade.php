
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
                        <h3 class="page-title">Trainers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Trainers</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_trainer"><i class="fa fa-plus"></i> Add New</a>
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
                                    <th>Name </th>
                                    <th>Contact Number </th>
                                    <th>Email </th>
                                    <th>Description </th>
                                    <th>Status </th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th hidden></th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainers as $key=>$trainer )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{ url('employee/profile/'.$trainer->user_id) }}" class="avatar">
                                                <img alt="" src="{{ URL::to('/assets/images/'. $trainer->avatar) }}">
                                            </a>
                                            <a href="{{ url('employee/profile/'.$trainer->user_id) }}">{{ $trainer->full_name }}</a>
                                        </h2>
                                    </td>
                                    <td class="phone">{{ $trainer->phone }}</td>
                                    <td class="email">{{ $trainer->email }}</td>
                                    <td class="description">{{ $trainer->description }}</td>
                                    <td hidden class="e_id">{{ $trainer->id }}</td>
                                    <td hidden class="trainers">{{ $trainer->full_name }}</td>
                                    <td hidden class="role">{{ $trainer->role }}</td>
                                    <td hidden class="status">{{ $trainer->status }}</td>

                                    @if($trainer->status =='Active')
                                    <td>
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-success"></i>{{ $trainer->status }}
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                    @if($trainer->status =='Inactive')
                                    <td>
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-danger"></i>{{ $trainer->status }}
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit_type" href="#" data-toggle="modal" data-target="#edit_type"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item delete_type" href="#" data-toggle="modal" data-target="#delete_type"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

        <!-- Add Trainers List Modal -->
        <div id="add_trainer" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Trainer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/trainers/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Full Name<span class="text-danger">*</span></label>
                                        <select class="select @error('full_name') is-invalid @enderror" id="trainer" name="full_name">
                                            <option selected disabled>-- Select --</option>
                                            @foreach ($user as $key=>$items )
                                                <option value="{{ $items->name }} {{ old('full_name') == $items->name ? 'selected' : '' }}" data-trainer_id={{ $items->user_id }} data-email={{ $items->email }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="trainer_id" name="trainer_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Role <span class="text-danger">*</span></label>
                                        <input class="form-control @error('role') is-invalid @enderror" type="text" id="role" name="role" value="{{ old('role') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone </label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select  @error('status') is-invalid @enderror" id="status" name="status">
                                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" id="description" name="description" autofocus>{{ old('description') }}</textarea>
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
        <!-- /Add Trainers List Modal -->
        
        <!-- Edit Trainers List Modal -->
        <div id="edit_type" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Trainer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/trainers/update') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" id="e_id" name="id" value="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Full Name<span class="text-danger">*</span></label>
                                        <select class="select" id="e_trainer" name="full_name">
                                            @foreach ($user as $key=>$items )
                                                <option value="{{ $items->name }}" data-trainer_id={{ $items->user_id }} data-email={{ $items->email }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="e_trainer_id" name="trainer_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Role <span class="text-danger">*</span></label>
                                        <input class="form-control @error('role') is-invalid @enderror" type="text" id="e_role" name="role" value="{{ old('role') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="e_email" name="email" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone </label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" id="e_phone" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select" id="e_status" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="e_description" name="description"></textarea>
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
        <!-- /Edit Trainers List Modal -->
        
        <!-- Delete Trainers List Modal -->
        <div class="modal custom-modal fade" id="delete_type" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Trainers List</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('form/trainers/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" class="e_id" name="id" value="">
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
        <!-- /Delete Trainers List Modal -->
    </div>
    <!-- /Page Wrapper -->
@section('script')
    <script>
        // Function to handle change event for select elements
        function handleSelectChange(selectId, idField, emailField) {
            $(selectId).on('change', function() {
                const selected = $(this).find(':selected');
                $(idField).val(selected.data('trainer_id'));
                if (emailField) {
                    $(emailField).val(selected.data('email'));
                }
            });
        }
    
        // Initialize change events for trainers
        handleSelectChange('#e_trainer', '#e_trainer_id', '#e_email');
        handleSelectChange('#trainer', '#trainer_id', '#email');
    
        // Update type information on edit button click
        $(document).on('click', '.edit_type', function() {
            var _this = $(this).parents('tr');
            
            $('#e_id').val(_this.find('.e_id').text());
            $('#e_trainer_id').val(_this.find('.trainer_id').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_role').val(_this.find('.role').text());
            $('#e_phone').val(_this.find('.phone').text());
            $('#e_description').val(_this.find('.description').text());
            $('#e_status').val(_this.find('.status').text()).change();

        });
    
        // Handle delete action
        $(document).on('click', '.delete_type', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.e_id').text());
        });
    </script>
@endsection
@endsection
