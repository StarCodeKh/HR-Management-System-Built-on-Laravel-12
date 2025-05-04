@extends('layouts.settings')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Basic Settings</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Default Country</label>
                                    <select class="select">
                                        <option selected="selected">USA</option>
                                        <option>United Kingdom</option>
                                        <option>Cambodai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date Format</label>
                                    <select class="select">
                                        <option value="d/m/Y">25/05/2023</option>
                                        <option value="d.m.Y">15.05.2022</option>
                                        <option value="d-m-Y">15-05-2021</option>
                                        <option value="m/d/Y">05/15/2020</option>
                                        <option selected="selected" value="d M Y">15 May 2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Timezone</label>
                                    <select class="select">
                                        <option>(UTC +7:00) Asai/Phnom Penh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Default Language</label>
                                    <select class="select">
                                        <option selected="selected">English</option>
                                        <option>Khmer</option>
                                        <option>French</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Currency Code</label>
                                    <select class="select">
                                        <option selected="selected">USD</option>
                                        <option>Pound</option>
                                        <option>EURO</option>
                                        <option>KHR</option>
                                        <option>Ringgit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Currency Symbol</label>
                                    <input class="form-control" readonly value="$" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->

@endsection