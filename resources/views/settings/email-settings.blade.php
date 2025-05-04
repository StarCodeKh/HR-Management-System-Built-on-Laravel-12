@extends('layouts.settings')
@section('content')
   <!-- Page Wrapper -->
   <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mailoption" id="phpmail" value="option1">
                                <label class="form-check-label" for="phpmail">PHP Mail</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mailoption" id="smtpmail" value="option2">
                                <label class="form-check-label" for="smtpmail">SMTP</label>
                            </div>
                        </div>
                        <h4 class="page-title">PHP Email Settings</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email From Address</label>
                                    <input class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Emails From Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <h4 class="page-title m-t-30">SMTP Email Settings</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP HOST</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP USER</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP PASSWORD</label>
                                    <input class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP PORT</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP Security</label>
                                    <select class="select">
                                        <option value="None">None</option>
                                        <option value="SSL">SSL</option>
                                        <option value="TLS">TLS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP Authentication Domain</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save &amp; Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection