<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <title>Employee Salary Report</title>
    <style>
        @page {
            footer: page-footer;
            margin: 0;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        @page :first {
            margin-top: 0;
        }

        body {
            margin: 0;
            font-family: Khmeros;
        }

        table,
        tr,
        td {
            padding: 5px;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        td {
            vertical-align: center;
        }

        .page-break-before {
            page-break-before: always;
        }

        .container {
            padding: 0 10pt;
        }

        main .container {
            margin-top: 2em;
        }

        main h2 {
            margin: 0 0 .8em;
            page-break-after: avoid;
        }

        main p,
        main .table-wrapper {
            margin: 0 0 1em;
        }

        .clearfix {
            clear: botd;
        }

        .text-center {
            text-align: center;
        }

        .vertical-bar {
            display: block;
            width: 100px;
            border-bottom: 1px solid #45B6FE;
            margin: 0 auto;
        }

        .col1 {
            width: 8.33333%;
        }

        .col2 {
            width: 16.66667%;
        }

        .col3 {
            width: 25%;
        }

        .col4 {
            width: 33.33333%;
        }

        .col5 {
            width: 41.66667%;
        }

        .col6 {
            width: 50%;
        }

        .col7 {
            width: 58.33333%;
        }

        .col8 {
            width: 66.66667%;
        }

        .col9 {
            width: 75%;
        }

        .col10 {
            width: 83.33333%;
        }

        .col11 {
            width: 91.66667%;
        }

        .col12 {
            width: 100%;
        }

        .request-payment label {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .request-payment span {
            font-size: 12px;
            color: gray;
            font-style: italic;
        }

        .currency {
            margin-top: 5px;
            border: 1px solid;
            display: flex;
        }

        .currency .cur-label {
            border-right: 1px solid;
            padding: 5px;
            font-size: 12px;
            background-color: #dad0be;
        }

        .currency .sub-cur-label {
            width: 100px;
            padding: 5px;
            text-align: center;
            font-size: 12px;
        }


        .table-border td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
            vertical-align: middle;
        }

        .margin-top-10 {
            margin-top: 10px;
        }

        .main {
            padding: 10px;
        }

        .department {
            width: 250px;
            border: 1px solid;
        }

        ul {
            padding: 10px;
            margin: 0;
        }

        ul li {
            list-style: none;
        }

        .vertical-middle td{
            vertical-align: middle;
            text-align: center;
        }
        .table-left td{
            text-align: left;
        }
        .no-border{
            border-style: hidden !important;
        }
        .table-space{
            background-color: white !important;
            border-top: hidden !important;
            border-bottom: hidden !important;
            width: 1% !important;
        }
        .table-header{
            vertical-align: middle !important;
            font-weight: bold !important;
            font-size: 13px !important;
        }
        .td-border-top{
            border-top: 1px solid #45B6FE;
        }
        .td-border-left{
            border-left: 1px solid #45B6FE;
        }
        .td-border-right{
            border-right: 1px solid #45B6FE;
        }
        .td-border-bottom{
            border-bottom: 1px solid #45B6FE;
        }
        
        .payslip-title {
            margin-bottom: 20px;
            text-align: center;
            text-decoration: underline;
            text-transform: uppercase;
        }
        
        h4, .h4 {
            font-size: 1.125rem;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        .m-b-20 {
            margin-bottom: 20px !important;
        }
        .inv-logo {
            height: auto;
            margin-bottom: 20px;
            max-height: 100px;
            width: auto;
        }
        .invoice-details, .invoice-payment-details > li span {
            float: right;
            text-align: right;
        }
        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }
        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }

    </style>
</head>

<body style="font-size: 10px;">
    <div class="container">
        <table>
            <tr style="text-align: center;font-weight: bolder;">
                <td><h4 class="payslip-title">Payslip for the month of {{ \Carbon\Carbon::now()->format('M') }}   {{ \Carbon\Carbon::now()->year }}</h4></td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-6 m-b-20">
                           Logo
                            <ul class="list-unstyled mb-0">
                                <li>{{ $users->name }}</li>
                                <li>{{ $users->address }}</li>
                                <li>{{ $users->country }}</li>
                            </ul>
                        </div>
                        {{-- <div class="col-sm-6 m-b-20">
                            <div class="invoice-details">
                                <h3 class="text-uppercase">Payslip #49029</h3>
                                <ul class="list-unstyled">
                                    <li>Salary Month: <span>{{ \Carbon\Carbon::now()->format('M') }}  , {{ \Carbon\Carbon::now()->year }} </span></li>
                                </ul>
                                <br>
                            </div>
                        </div> --}}
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="container" style="padding-top: 8px; ">
        <table class="table-border">
            <tr style="font-weight: bold;">
                <td><strong style="float: left;">Basic Salary</strong> <span style="float: right;">$4</span></td>
                <td><strong style="float: left;">Basic Salary</strong> <span style="float: right;">$4</span></td>
                <td>Manual Title</td>
            </tr>
            <tr style="font-weight: bold;">
                <td><strong style="float: left;">House Rent Allowance (H.R.A.)</strong> <span style="float: right;">$4</span></td>
                <td><strong style="float: left;">Basic Salary</strong> <span style="float: right;">$4</span></td>
                <td>Manual Title</td>
            </tr>
            <tr style="font-weight: bold;">
                <td><strong style="float: left;">House Rent Allowance (H.R.A.)</strong> <span style="float: right;">$4</span></td>
                <td><strong style="float: left;">Basic Salary</strong> <span style="float: right;">$4</span></td>
                <td>Manual Title</td>
            </tr>
        </table>
    </div>
   
</body>
</html>