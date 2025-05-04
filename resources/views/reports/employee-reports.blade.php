
@extends('layouts.master')
@section('content')
    {{-- message --}}
    
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Employee Report</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee Report</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-primary">PDF</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <!-- Content Starts -->  
            
            <!-- Search Filter -->
            <div class="row filter-row mb-4">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input class="form-control floating" type="text">
                        <label class="focus-label">Employee</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option>Select Department</option>
                            <option>Designing</option>
                            <option>Development</option>
                            <option>Finance</option>
                            <option>Hr & Finance</option>
                        </select>
                        <label class="focus-label">Department</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <a href="#" class="btn btn-success btn-block"> Search </a>  
                </div>     
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Employee Type</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Joining Date</th>
                                    <th>DOB</th>
                                    <th>Martial Status</th>
                                    <th>Gender</th>
                                    <th>Terminated Date</th>
                                    <th>Relieving Date</th>
                                    <th>Salary</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                    <th>Emercency Contact Details</th>
                                    <th>Experience</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{URL::to('assets/img/profiles/avatar-02.jpg')}}"></a>
                                            <a href="profile.html" class="text-primary">John Doe <span>#0001</span></a>
                                        </h2>
                                    </td>
                                    <td>Employee</td>
                                    <td class="text-info">johndoe@example.com</td>
                                    <td>Design</td>
                                    <td>UI Design</td>
                                    <td>20 Aug 2020</td>
                                    <td>03 Mar 1992</td>
                                    <td>Married</td>
                                    <td>Male</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>$20000</td>
                                    <td>
                                        1861 Bayonne Ave, Manchester Township, NJ, 08759
                                    </td>
                                    <td>9876543210</td>
                                    <td>7894561235</td>
                                    <td>0 years 4 months and 9 days</td>
                                    <td><button class="btn btn-outline-success btn-sm">Active</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            <a href="profile.html" class="text-primary">Richard Miles <span>#0002</span></a>
                                        </h2>
                                    </td>
                                    <td>Employee</td>
                                    <td class="text-info">richardmiles@example.com</td>
                                    <td>Android Developer</td>
                                    <td>IT Support</td>
                                    <td>01 Jul 2020</td>
                                    <td>05 Dec 1979</td>
                                    <td>Married</td>
                                    <td>Male</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>$15000</td>
                                    <td>
                                        1861 Bayonne Ave, Manchester Township, NJ, 08759
                                    </td>
                                    <td>9876543210</td>
                                    <td>7894561235</td>
                                    <td>0 years 5 months and 24 days</td>
                                    <td><button class="btn btn-outline-success btn-sm">Active</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            <a href="profile.html" class="text-primary">John Smith <span>#003</span></a>
                                        </h2>
                                    </td>
                                    <td>Employee</td>
                                    <td class="text-info">johnsmith@example.com</td>
                                    <td>IOS Developer</td>
                                    <td>Development Manager</td>
                                    <td>03 Sep 2020</td>
                                    <td>16 Apr 1984</td>
                                    <td>Married</td>
                                    <td>Male</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>$27000</td>
                                    <td>
                                        1861 Bayonne Ave, Manchester Township, NJ, 08759
                                    </td>
                                    <td>9876543210</td>
                                    <td>7894561235</td>
                                    <td>0 years 3 months and 21 days</td>
                                    <td><button class="btn btn-outline-success btn-sm">Active</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            <a href="profile.html" class="text-primary">Mike Litorus <span>#004</span></a>
                                        </h2>
                                    </td>
                                    <td>Employee</td>
                                    <td class="text-info">mikelitorus@example.com</td>
                                    <td>Web Developer</td>
                                    <td>IT Support</td>
                                    <td>15 Nov 2020</td>
                                    <td>15 Jul 2005</td>
                                    <td>Single</td>
                                    <td>Male</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>$15000</td>
                                    <td>
                                        1861 Bayonne Ave, Manchester Township, NJ, 08759
                                    </td>
                                    <td>9876543210</td>
                                    <td>7894561235</td>
                                    <td>0 years 1 months and 9 days</td>
                                    <td><button class="btn btn-outline-success btn-sm">Active</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-11.jpg"></a>
                                            <a href="profile.html" class="text-primary">Wilmer Deluna <span>#005</span></a>
                                        </h2>
                                    </td>
                                    <td>Employee</td>
                                    <td class="text-info">wilmerdeluna@example.com</td>
                                    <td>Team Leader</td>
                                    <td>Development Manager</td>
                                    <td>01 Dec 2020</td>
                                    <td>21 Jun 1984</td>
                                    <td>Married</td>
                                    <td>Male</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>$25000</td>
                                    <td>
                                        1861 Bayonne Ave, Manchester Township, NJ, 08759
                                    </td>
                                    <td>9876543210</td>
                                    <td>7894561235</td>
                                    <td>0 years 0 months and 24 days</td>
                                    <td><button class="btn btn-outline-success btn-sm">Active</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Content End -->
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection
