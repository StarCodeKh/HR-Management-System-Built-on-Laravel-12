
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
                        <h3 class="page-title">Create Estimate</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Estimate</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
              
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route('create/estimate/save') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Client <span class="text-danger">*</span></label>
                                    <select class="select" id="client" name="client">
                                        <option> --Please Select-- </option>
                                        <option value="Barry Cuda">Barry Cuda</option>
                                        <option value="Tressa Wexler">Tressa Wexler</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Project <span class="text-danger">*</span></label>
                                    <select class="select" id="project" name="project">
                                        <option>Select Project</option>
                                        <option value="Office Management">Office Management</option>
                                        <option value="Project Management">Project Management</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Tax</label>
                                    <select class="select" id="tax" name="tax">
                                        <option>--Select Tax--</option>
                                        <option value="VAT">VAT</option>
                                        <option value="GST">GST</option>
                                        <option value="No Tax">No Tax</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Client Address</label>
                                    <textarea class="form-control" id="client_address" name="client_address" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Billing Address</label>
                                    <textarea class="form-control" id="billing_address" name="billing_address" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Estimate Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" id="estimate_date" name="estimate_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Expiry Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" id="expiry_date" name="expiry_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-white" id="tableEstimate">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px">#</th>
                                                <th class="col-sm-2">Item</th>
                                                <th class="col-md-6">Description</th>
                                                <th style="width:100px;">Unit Cost</th>
                                                <th style="width:80px;">Qty</th>
                                                <th>Amount</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input class="form-control" style="min-width:150px" type="text" id="item" name="item[]"></td>
                                            <td><input class="form-control"style="min-width:150px" type="text" id="description" name="description[]"></td>
                                            <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]"></td>
                                            <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                                            <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
                                            <td><a href="javascript:void(0)" class="text-success font-18" title="Add" id="addBtn"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-white">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">Total</td>
                                                <td>
                                                    <input class="form-control text-right total" type="text" id="sum_total" name="total" value="0" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">Tax</td>
                                                <td>
                                                    <input class="form-control text-right"type="text" id="tax_1" name="tax_1" value="0" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">
                                                    Discount %
                                                </td>
                                                <td>
                                                    <input class="form-control text-right discount" type="text" id="discount" name="discount" value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                    Grand Total
                                                </td>
                                                <td style="font-size: 16px;width: 230px">
                                                    <input class="form-control text-right" type="text" id="grand_total" name="grand_total" value="$ 0.00" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                               
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Other Information</label>
                                            <textarea class="form-control" rows="3" id="other_information" name="other_information"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn m-r-10">Save & Send</button>
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
 
    @section('script')
        {{-- add multiple row --}}
        <script>
            var rowIdx = 1;
            $("#addBtn").on("click", function ()
            {
                // Adding a row inside the tbody.
                $("#tableEstimate tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index text-center"><p> ${rowIdx}</p></td>
                    <td><input class="form-control" type="text" style="min-width:150px" id="item" name="item[]"></td>
                    <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
                    <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]"></td>
                    <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                    <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                </tr>`);
            });
            $("#tableEstimate tbody").on("click", ".remove", function ()
            {
                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest("tr").nextAll();
                // Iterating across all the rows
                // obtained to change the index
                child.each(function () {
                // Getting <tr> id.
                var id = $(this).attr("id");

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children(".row-index").children("p");

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`${dig - 1}`);

                // Modifying row id.
                $(this).attr("id", `R${dig - 1}`);
            });
    
                // Removing the current row.
                $(this).closest("tr").remove();
    
                // Decreasing total number of rows by 1.
                rowIdx--;
            });

            $("#tableEstimate tbody").on("input", ".unit_price", function () {
                var unit_price = parseFloat($(this).val());
                var qty = parseFloat($(this).closest("tr").find(".qty").val());
                var total = $(this).closest("tr").find(".total");
                total.val(unit_price * qty);

                calc_total();
            });

            $("#tableEstimate tbody").on("input", ".qty", function () {
                var qty = parseFloat($(this).val());
                var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
                var total = $(this).closest("tr").find(".total");
                total.val(unit_price * qty);
                calc_total();
            });
            function calc_total() {
                var sum = 0;
                $(".total").each(function () {
                sum += parseFloat($(this).val());
                });
                $(".subtotal").text(sum);
                
                var amounts = sum;
                var tax     = 100;
                $(document).on("change keyup blur", "#qty", function() 
                {
                    var qty = $("#qty").val();
                    var discount = $(".discount").val();
                    $(".total").val(amounts * qty);
                    $("#sum_total").val(amounts * qty);
                    $("#tax_1").val((amounts * qty)/tax);
                    $("#grand_total").val((parseInt(amounts)) - (parseInt(discount)));
                }); 
            }

        </script>
    @endsection
@endsection
