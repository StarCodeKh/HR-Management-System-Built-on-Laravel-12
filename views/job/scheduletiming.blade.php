
@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="page-title">Schedule timing</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item">Jobs</li>
                            <li class="breadcrumb-item active">Schedule timing</li>
                        </ul>
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>User Available Timings</th>
                                    <th class="text-center">Schedule timing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            <a href="profile.html">John Doe <span>Web Designer</span></a>
                                        </h2>
                                    </td>
                                    <td><a href="job-details.html">Web Developer</a></td>
                                    <td><b>11-03-2020</b> - 11:00 AM-12:00 PM<br><b>12-03-2020</b> - 10:00 AM-11:00 AM<br><b>01-01-1970</b> - 10:00 AM-11:00 AM<br> </td>
                                    <td class="text-center">
                                        <div class="action-label">
                                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_job" href="#">
                                                Schedule Time
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            <a href="profile.html">Richard Miles <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td><a href="job-details.html">Web Designer</a></td>
                                    <td><b>11-03-2020</b> - 11:00 AM-12:00 PM<br><b>12-03-2020</b> - 10:00 AM-11:00 AM<br><b>01-01-1970</b> - 10:00 AM-11:00 AM<br> </td>
                                    <td class="text-center">
                                        <div class="action-label">
                                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_job" href="#">
                                                Schedule Time
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            <a href="profile.html">John Smith <span>Android Developer</span></a>
                                        </h2>
                                    </td>
                                    <td><a href="job-details.html">Android Developer</a></td>
                                    <td><b>11-03-2020</b> - 11:00 AM-12:00 PM<br><b>12-03-2020</b> - 10:00 AM-11:00 AM<br><b>01-01-1970</b> - 10:00 AM-11:00 AM<br> </td>
                                    <td class="text-center">
                                        <div class="action-label">
                                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_job" href="#">
                                                Schedule Time
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
        
        <!-- Edit Job Modal -->
        <div id="edit_job" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Schedule Date 1</label>
                                        <input type="text" class="form-control datetimepicker" value="3 Mar 2019">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Time</label>
                                        <select class="select">
                                            <option>Select Time</option>
                                            <option selected>12:00 AM-01:00 AM</option>
                                            <option>01:00 AM-02:00 AM</option>
                                            <option>02:00 AM-03:00 AM</option>
                                            <option>03:00 AM-04:00 AM</option>
                                            <option>04:00 AM-05:00 AM</option>
                                            <option>05:00 AM-06:00 AM</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Schedule Date 2</label>
                                        <input type="text" class="form-control datetimepicker" value="3 Mar 2019">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Time</label>
                                        <select class="select">
                                            <option>Select Time</option>
                                            <option selected>12:00 AM-01:00 AM</option>
                                            <option>01:00 AM-02:00 AM</option>
                                            <option>02:00 AM-03:00 AM</option>
                                            <option>03:00 AM-04:00 AM</option>
                                            <option>04:00 AM-05:00 AM</option>
                                            <option>05:00 AM-06:00 AM</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Schedule Date 3</label>
                                        <input type="text" class="form-control datetimepicker" value="3 Mar 2019">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Time</label>
                                        <select class="select">
                                            <option>Select Time</option>
                                            <option selected>12:00 AM-01:00 AM</option>
                                            <option>01:00 AM-02:00 AM</option>
                                            <option>02:00 AM-03:00 AM</option>
                                            <option>03:00 AM-04:00 AM</option>
                                            <option>04:00 AM-05:00 AM</option>
                                            <option>05:00 AM-06:00 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Job Modal -->

        <!-- Delete Job Modal -->
        <div class="modal custom-modal fade" id="delete_job" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Job Modal -->
        
    </div>
    <!-- /Page Wrapper -->
@endsection