
@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">  
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Estimate</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Estimate</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white">PDF</button>
                            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="{{ URL::to('assets/img/logo2.png') }}" class="inv-logo" alt="">
                                    <ul class="list-unstyled">
                                        <li>{{$estimatesJoin[0]->client }}</li>
                                        <li>{{$estimatesJoin[0]->client_address }}</li>
                                        <li>{{$estimatesJoin[0]->billing_address }}</li>
                                        <li>{{$estimatesJoin[0]->tax }}</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Estimate #{{$estimatesJoin[0]->estimate_number }}</h3>
                                        <ul class="list-unstyled">
                                            <li>Create Date: <span>{{date('d F, Y',strtotime($estimatesJoin[0]->estimate_date)) }}</span></li>
                                            <li>Expiry date: <span>{{date('d F, Y',strtotime($estimatesJoin[0]->expiry_date)) }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 m-b-20">
                                    <h5>Estimate to: {{$estimatesJoin[0]->client }}</h5>
                                    <ul class="list-unstyled">
                                        <li><a href="#">{{$estimatesJoin[0]->email }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ITEM</th>
                                        <th class="d-none d-sm-table-cell">DESCRIPTION</th>
                                        <th>UNIT COST</th>
                                        <th>QUANTITY</th>
                                        <th class="text-right">AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estimatesJoin as $key=>$item )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $item->description }}</td>
                                        <td>${{ $item->unit_cost }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td class="text-right">${{ $item->amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <div class="row invoice-payment">
                                    <div class="col-sm-7">
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="m-b-20">
                                            <div class="table-responsive no-border">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Subtotal:</th>
                                                            <td class="text-right">{{$estimatesJoin[0]->total }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tax: <span class="text-regular">(25%)</span></th>
                                                            <td class="text-right">{{$estimatesJoin[0]->tax_1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td class="text-right text-primary"><h5>{{$estimatesJoin[0]->total }}</h5></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-info">
                                    <h5>Other information</h5>
                                    <p class="text-muted">{{$estimatesJoin[0]->other_information }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
 
    @section('script')
   
    @endsection
@endsection
