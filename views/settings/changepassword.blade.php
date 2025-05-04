@extends('layouts.settings')
@section('content')
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div class="sidebar-menu">
                <ul>
                    <li><a href="{{ route('home') }}"><i class="la la-home"></i> <span>Back to Home</span></a></li>
                    <li class="menu-title">Settings</li>
                    <li><a href="{{ route('company/settings/page') }}"><i class="la la-building"></i><span>Company Settings</span></a></li>
                    <li><a href="localization.html"><i class="la la-clock-o"></i><span>Localization</span></a></li>
                    <li><a href="theme-settings.html"><i class="la la-photo"></i><span>Theme Settings</span></a></li>
                    <li><a href="{{ route('roles/permissions/page') }}"><i class="la la-key"></i><span>Roles & Permissions</span></a></li>
                    <li><a href="email-settings.html"><i class="la la-at"></i><span>Email Settings</span></a></li>
                    <li><a href="performance-setting.html"><i class="la la-chart-bar"></i><span>Performance Settings</span></a></li>
                    <li><a href="approval-setting.html"><i class="la la-thumbs-up"></i><span>Approval Settings</span></a></li>
                    <li><a href="invoice-settings.html"><i class="la la-pencil-square"></i><span>Invoice Settings</span></a></li>
                    <li><a href="salary-settings.html"><i class="la la-money"></i><span>Salary Settings</span></a></li>
                    <li><a href="notifications-settings.html"><i class="la la-globe"></i><span>Notifications</span></a></li>
                    <li class="active"><a href="{{ route('change/password') }}"><i class="la la-lock"></i><span>Change Password</span></a></li>
                    <li><a href="leave-type.html"><i class="la la-cogs"></i><span>Leave Type</span></a></li>
                    <li><a href="toxbox-setting.html"><i class="la la-comment"></i><span>ToxBox Settings</span></a></li>
                    <li><a href="cron-setting.html"><i class="la la-rocket"></i><span>Cron Settings</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
    
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Change Password</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form method="POST" action="{{ route('change/password/db') }}">
                        @csrf
                        <div class="form-group">
                            <label>Old password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror " name="current_password" value="{{ old('current_password') }}" placeholder="Enter Old Password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="Enter Current Password">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" placeholder="Choose Confirm Password">
                            @error('new_confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection