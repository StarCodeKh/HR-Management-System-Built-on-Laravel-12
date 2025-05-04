@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Interviewing</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item">Jobs</li>
                            <li class="breadcrumb-item">User Dashboard</li>
                            <li class="breadcrumb-item active">Interviewing</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <!-- Content Starts -->
            <div class="card">
                <div class="card-body">
                    @include('sidebar.sidebarjob')
                </div>
            </div>	

            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid nav-justified flex-column">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Apptitude</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Schedule Interview</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="home" class="tab-pane show active">
                                    <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table mb-0 datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Job Title</th>
                                                    <th>Department</th>
                                                    <th class="text-center">Job Type</th>
                                                    <th class="text-center">Aptitude Test</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="#">Web Developer</a></td>
                                                    <td>Development</td>
                                                    <td class="text-center">
                                                        <div class="action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Full Time
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="job-aptitude.html" class="btn btn-primary aptitude-btn"><span>Click Here</span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><a href="#">Web Developer</a></td>
                                                    <td>Development</td>
                                                    <td class="text-center">
                                                        <div class="action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                            <i class="fa fa-dot-circle-o text-warning"></i> Part Time
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="job-aptitude.html" class="btn btn-primary aptitude-btn"><span>Click Here</span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><a href="#">Web Designing</a></td>
                                                    <td>Development</td>
                                                    <td class="text-center">
                                                        <div class="action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                            <i class="fa fa-dot-circle-o text-warning"></i> Part Time
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="job-aptitude.html" class="btn btn-primary aptitude-btn"><span>Click Here</span></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                    <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table mb-0 datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Job Title</th>
                                                    <th>Department</th>
                                                    <th class="text-center">Job Type</th>
                                                    <th class="text-center">Aptitude Test</th>
                                                    <th class="text-center">Schedule Interview</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="#">Web Developer</a></td>
                                                    <td>Development</td>
                                                    <td class="text-center">
                                                        <div class="action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Full Time
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-primary disabled"><span>Selected</span></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-primary aptitude-btn" data-toggle="modal" data-target="#selectMyTime"><span>Select Your Time Here</span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="#">Web Designing</a></td>
                                                    <td>Development</td>
                                                    <td class="text-center">
                                                        <div class="action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                            <i class="fa fa-dot-circle-o text-warning"></i> Part Time
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-primary disabled"><span>Selected</span></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-primary aptitude-btn" data-toggle="modal" data-target="#selectMyTime"><span>Select Your Time Here</span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="#">Web Developer</a></td>
                                                    <td>Development</td>
                                                    <td class="text-center">
                                                        <div class="action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                            <i class="fa fa-dot-circle-o text-warning"></i> Part Time
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-primary disabled"><span>Selected</span></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-primary aptitude-btn" data-toggle="modal" data-target="#selectMyTime"><span>Select Your Time Here</span></a>
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
            <!-- /Content End -->
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->
        
    <!-- Modal -->
    <div id="selectMyTime" class="modal  custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Your Time</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Day1 <span class="text-danger">*</span></label>
                                <select class="form-control" name="designations" id="designations">
                                    <option value="">11.00am - 11.30am (24 Feb 2020) </option>
                                    <option value="">1.00pm - 1.30pm (25 Feb 2020) </option>
                                    <option value="">3.00pm - 3.30pm (26 Feb 2020) </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-btn delete-action mt-3">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-primary btn-block cancel-btn">Submit</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary btn-block cancel-btn" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection