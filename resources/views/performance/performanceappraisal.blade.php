
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
                        <h3 class="page-title">Performance Appraisal</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Performance</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_appraisal"><i class="fa fa-plus"></i> Add New</a>
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
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Appraisal Date</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appraisals as $key=>$appraisal)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td hidden class="id">{{ $appraisal->id }}</td>
                                    <td hidden class="name">{{ $appraisal->name }}</td>
                                    <td hidden class="date">{{ $appraisal->date }}</td>
                                    <td hidden class="designation">{{ $appraisal->name }}</td>
                                    <td hidden class="customer_experience">{{ $appraisal->customer_experience }}</td>
                                    <td hidden class="marketing">{{ $appraisal->marketing }}</td>
                                    <td hidden class="management">{{ $appraisal->management }}</td>
                                    <td hidden class="administration">{{ $appraisal->administration }}</td>
                                    <td hidden class="presentation_skill">{{ $appraisal->presentation_skill }}</td>
                                    <td hidden class="quality_of_work">{{ $appraisal->quality_of_Work }}</td>
                                    <td hidden class="efficiency">{{ $appraisal->efficiency }}</td>
                                    <td hidden class="integrity">{{ $appraisal->integrity }}</td>
                                    <td hidden class="professionalism">{{ $appraisal->professionalism }}</td>
                                    <td hidden class="team_work">{{ $appraisal->team_work }}</td>
                                    <td hidden class="critical_thinking">{{ $appraisal->critical_thinking }}</td>
                                    <td hidden class="conflict_management">{{ $appraisal->conflict_management }}</td>
                                    <td hidden class="attendance">{{ $appraisal->attendance }}</td>
                                    <td hidden class="ability_to_meet_deadline">{{ $appraisal->ability_to_meet_deadline }}</td>
                                    <td hidden class="status">{{ $appraisal->status }}</td>

                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('/assets/images/'. $appraisal->avatar) }}" alt="{{ $appraisal->avatar }}"></a>
                                            <a href="profile.html">{{ $appraisal->name }} </a>
                                        </h2>
                                    </td>
                                    <td>{{ $appraisal->department }}</td>
                                    <td>{{date('d F, Y',strtotime($appraisal->created_at)) }}</td>
                                    <td>
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-success"></i> Active
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit_appraisal" href="#" data-toggle="modal" data-target="#edit_appraisal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item delete_appraisal" href="#" data-toggle="modal" data-target="#delete_appraisal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

        <!-- Add Performance Appraisal Modal -->
        <div id="add_appraisal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Give Performance Appraisal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/performance/appraisal/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee</label>
                                        <select class="select" id="name" name="name">
                                            <option selected disabled> -- Select Employee -- </option>
                                            @foreach ($users as $user )
                                            <option value="{{ $user->name }}" data-employee_id={{ $user->user_id }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="form-control" type="hidden" id="employee_id" name="user_id" readonly>
                                    <div class="form-group">
                                        <label>Select Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" name="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-box">
                                                <div class="row user-tabs">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                        <ul class="nav nav-tabs nav-tabs-solid">
                                                            <li class="nav-item"><a href="#appr_technical" data-toggle="tab" class="nav-link active">Technical</a></li>
                                                            <li class="nav-item"><a href="#appr_organizational" data-toggle="tab" class="nav-link">Organizational</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div id="appr_technical" class="pro-overview tab-pane fade show active">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="bg-white">
                                                                <table class="table">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Technical Competencies</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                      <tr>
                                                                        <th colspan="2">Indicator</th>
                                                                        <th colspan="2">Expected Value</th>
                                                                        <th>Set Value</th>
                                                                      </tr>
                                                                      <tr>
                                                                        <td colspan="2">Customer Experience</td>
                                                                        <td colspan="2">Intermediate</td>
                                                                        <td>
                                                                            <select name="customer_experience" class="form-control">
                                                                                @foreach ($indicator as $indicators )
                                                                                <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td colspan="2">Marketing</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="marketing" class="form-control">
                                                                                @foreach ($indicator as $indicators )
                                                                                <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td colspan="2">Management</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="management" class="form-control">
                                                                                @foreach ($indicator as $indicators )
                                                                                <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td colspan="2">Administration</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="administration" class="form-control">
                                                                                @foreach ($indicator as $indicators )
                                                                                <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td colspan="2">Presentation Skill</td>
                                                                        <td colspan="2">Expert / Leader</td>
                                                                        <td>
                                                                            <select name="presentation_skill" class="form-control">
                                                                                @foreach ($indicator as $indicators )
                                                                                <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td colspan="2">Quality Of Work</td>
                                                                        <td colspan="2">Expert / Leader</td>
                                                                        <td>
                                                                            <select name="quality_of_work" class="form-control">
                                                                                @foreach ($indicator as $indicators )
                                                                                <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td colspan="2">Efficiency</td>
                                                                        <td colspan="2">Expert / Leader</td>
                                                                        <td>
                                                                            <select name="efficiency" class="form-control">
                                                                                @foreach ($indicator as $indicators )
                                                                                <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="appr_organizational">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="bg-white">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Organizational Competencies</th>
                                                                            <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <th colspan="2">Indicator</th>
                                                                            <th colspan="2">Expected Value</th>
                                                                            <th>Set Value</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Integrity</td>
                                                                            <td colspan="2">Beginner</td>
                                                                            <td>
                                                                                <select name="integrity" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Professionalism</td>
                                                                            <td colspan="2">Beginner</td>
                                                                            <td>
                                                                                <select name="professionalism" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Team Work</td>
                                                                            <td colspan="2">Intermediate</td>
                                                                            <td>
                                                                                <select name="team_work" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Critical Thinking</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td>
                                                                                <select name="critical_thinking" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Conflict Management</td>
                                                                            <td colspan="2">Intermediate</td>
                                                                            <td>
                                                                                <select name="conflict_management" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Attendance</td>
                                                                            <td colspan="2">Intermediate</td>
                                                                            <td>
                                                                                <select name="attendance" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Ability To Meet Deadline</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td>
                                                                                <select name="ability_to_meet_deadline" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select" name="status">
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
        <!-- /Add Performance Appraisal Modal -->
        
        <!-- Edit Performance Appraisal Modal -->
        <div id="edit_appraisal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Performance Appraisal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/performance/appraisal/update') }}" method="POST">
                            @csrf
                            <input type="hidden" id="e_id" name="id" value="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee</label>
                                        <select class="select" id="e_name" name="name">
                                            @foreach ($users as $user )
                                            <option disabled value="{{ $user->name }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="e_date" name="date" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-box">
                                                <div class="row user-tabs">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                        <ul class="nav nav-tabs nav-tabs-solid">
                                                            <li class="nav-item"><a href="#appr_technical1" data-toggle="tab" class="nav-link active">Technical</a></li>
                                                            <li class="nav-item"><a href="#appr_organizational1" data-toggle="tab" class="nav-link">Organizational</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div id="appr_technical1" class="pro-overview tab-pane fade show active">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="bg-white">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Technical Competencies</th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th colspan="2">Indicator</th>
                                                                            <th colspan="2">Expected Value</th>
                                                                            <th>Set Value</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Customer Experience</td>
                                                                            <td colspan="2">Intermediate</td>
                                                                            <td>
                                                                                <select id="e_customer_experience" name="customer_experience" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Marketing</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td>
                                                                                <select id="e_marketing" name="marketing" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Management</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td>
                                                                                <select id="e_management" name="management" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Administration</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td>
                                                                                <select id="e_administration" name="administration" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Presentation Skill</td>
                                                                            <td colspan="2">Expert / Leader</td>
                                                                            <td>
                                                                                <select id="e_presentation_skill" name="presentation_skill" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Quality Of Work</td>
                                                                            <td colspan="2">Expert / Leader</td>
                                                                            <td>
                                                                                <select id="e_quality_of_work" name="quality_of_work" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Efficiency</td>
                                                                            <td colspan="2">Expert / Leader</td>
                                                                            <td>
                                                                                <select id="e_efficiency" name="efficiency" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="appr_organizational1">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="bg-white">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Organizational Competencies</th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th colspan="2">Indicator</th>
                                                                            <th colspan="2">Expected Value</th>
                                                                            <th>Set Value</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Integrity</td>
                                                                            <td colspan="2">Beginner</td>
                                                                            <td>
                                                                                <select id="e_integrity" name="integrity" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Professionalism</td>
                                                                            <td colspan="2">Beginner</td>
                                                                            <td>
                                                                                <select id="e_professionalism" name="professionalism" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Team Work</td>
                                                                            <td colspan="2">Intermediate</td>
                                                                            <td>
                                                                                <select id="e_team_work" name="team_work" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Critical Thinking</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td>
                                                                                <select id="e_critical_thinking" name="critical_thinking" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Conflict Management</td>
                                                                            <td colspan="2">Intermediate</td>
                                                                            <td>
                                                                                <select id="e_conflict_management" name="conflict_management" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Attendance</td>
                                                                            <td colspan="2">Intermediate</td>
                                                                            <td>
                                                                                <select id="e_attendance" name="attendance" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Ability To Meet Deadline</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td>
                                                                                <select id="e_ability_to_meet_deadline" name="ability_to_meet_deadline" class="form-control">
                                                                                    @foreach ($indicator as $indicators )
                                                                                    <option value="{{ $indicators->per_name_list }}">{{ $indicators->per_name_list }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select" id="e_status" name="status">
                                            <option>Active</option>
                                            <option>Inactive</option>
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
        <!-- /Edit Performance Appraisal Modal -->
        
        <!-- Delete Performance Appraisal Modal -->
        <div class="modal custom-modal fade" id="delete_appraisal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Performance Appraisal List</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('form/performance/appraisal/delete') }}" method="POST">
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
        <!-- /Delete Performance Appraisal Modal -->
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    
    {{-- update js --}}
    <script>
        $(document).on('click','.edit_appraisal',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_date').val(_this.find('.date').text());

            var name = (_this.find(".name").text());
            var _option = '<option selected value="' + name + '">' + _this.find('.name').text() + '</option>'
            $( _option).appendTo("#e_name");
        
            var designation = (_this.find(".designation").text());
            var _option = '<option selected value="' + designation + '">' + _this.find('.designation').text() + '</option>'
            $( _option).appendTo("#e_designation");

            var customer_experience = (_this.find(".customer_experience").text());
            var _option = '<option selected value="' + customer_experience + '">' + _this.find('.customer_experience').text() + '</option>'
            $( _option).appendTo("#e_customer_experience");

            var marketing = (_this.find(".marketing").text());
            var _option = '<option selected value="' + marketing + '">' + _this.find('.marketing').text() + '</option>'
            $( _option).appendTo("#e_marketing");

            var management = (_this.find(".management").text());
            var _option = '<option selected value="' + management + '">' + _this.find('.management').text() + '</option>'
            $( _option).appendTo("#e_management");

            var administration = (_this.find(".administration").text());
            var _option = '<option selected value="' + administration + '">' + _this.find('.administration').text() + '</option>'
            $( _option).appendTo("#e_administration");

            var presentation_skill = (_this.find(".presentation_skill").text());
            var _option = '<option selected value="' + presentation_skill + '">' + _this.find('.presentation_skill').text() + '</option>'
            $( _option).appendTo("#e_presentation_skill");

            var quality_of_work = (_this.find(".quality_of_work").text());
            var _option = '<option selected value="' + quality_of_work + '">' + _this.find('.quality_of_work').text() + '</option>'
            $( _option).appendTo("#e_quality_of_work");

            var efficiency = (_this.find(".efficiency").text());
            var _option = '<option selected value="' + efficiency + '">' + _this.find('.efficiency').text() + '</option>'
            $( _option).appendTo("#e_efficiency");

            var integrity = (_this.find(".integrity").text());
            var _option = '<option selected value="' + integrity + '">' + _this.find('.integrity').text() + '</option>'
            $( _option).appendTo("#e_integrity");

            var professionalism = (_this.find(".professionalism").text());
            var _option = '<option selected value="' + professionalism + '">' + _this.find('.professionalism').text() + '</option>'
            $( _option).appendTo("#e_professionalism");

            var team_work = (_this.find(".team_work").text());
            var _option = '<option selected value="' + team_work + '">' + _this.find('.team_work').text() + '</option>'
            $( _option).appendTo("#e_team_work");

            var critical_thinking = (_this.find(".critical_thinking").text());
            var _option = '<option selected value="' + critical_thinking + '">' + _this.find('.critical_thinking').text() + '</option>'
            $( _option).appendTo("#e_critical_thinking");

            var conflict_management = (_this.find(".conflict_management").text());
            var _option = '<option selected value="' + conflict_management + '">' + _this.find('.conflict_management').text() + '</option>'
            $( _option).appendTo("#e_conflict_management");

            var attendance = (_this.find(".attendance").text());
            var _option = '<option selected value="' + attendance + '">' + _this.find('.attendance').text() + '</option>'
            $( _option).appendTo("#e_attendance");

            var ability_to_meet_deadline = (_this.find(".ability_to_meet_deadline").text());
            var _option = '<option selected value="' + ability_to_meet_deadline + '">' + _this.find('.ability_to_meet_deadline').text() + '</option>'
            $( _option).appendTo("#e_ability_to_meet_deadline");

            var status = (_this.find(".status").text());
            var _option = '<option selected value="' + status + '">' + _this.find('.status').text() + '</option>'
            $( _option).appendTo("#e_status");
        });
    </script>

    {{-- delete model --}}
    <script>
    $(document).on('click','.delete_appraisal',function()
    {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
    });
    </script>

    <script>
        // select auto id and email
        $('#name').on('change',function()
        {
            $('#employee_id').val($(this).find(':selected').data('employee_id'));
        });
    </script>
    @endsection
    

@endsection
