@extends('layouts.master')
@section('content')
    <style>
        .select {
            width: 100%; /* Make dropdowns responsive */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white; /* Light background color */
            color: #333; /* Text color */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }
        .select:focus {
            border-color: red; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }
    </style>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Leaves <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leaves</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                    </div>
                </div>
            </div>
            <!-- Leave Statistics -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Today Presents</h6>
                        <h4>12 / 60</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Planned Leaves</h6>
                        <h4>8 <span>Today</span></h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Unplanned Leaves</h6>
                        <h4>0 <span>Today</span></h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Pending Requests</h6>
                        <h4>12</h4>
                    </div>
                </div>
            </div>
            <!-- /Leave Statistics -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option> -- Select -- </option>
                            <option>Casual Leave</option>
                            <option>Medical Leave</option>
                            <option>Loss of Pay</option>
                        </select>
                        <label class="focus-label">Leave Type</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option> -- Select -- </option>
                            <option> Pending </option>
                            <option> Approved </option>
                            <option> Rejected </option>
                        </select>
                        <label class="focus-label">Leave Status</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <a href="#" class="btn btn-success btn-block"> Search </a>  
                </div>     
            </div>
            <!-- /Search Filter -->

			<!-- /Page Header -->
              
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($getLeave))
                                    @foreach ($getLeave as $items )
                                        @php // get photo from the table users
                                            $profiles  = DB::table('users')->where('name', $items->employee_name)->get();
                                        @endphp
                                        <tr>
                                            <td>
                                                @foreach($profiles as $key => $profile)
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar">
                                                            <img src="{{ URL::to('/assets/images/'.$profile->avatar) }}" alt="">
                                                        </a>
                                                        <a href="#">{{ $items->employee_name }}<span>{{ $profile->position }}</span></a>
                                                    </h2>
                                                @endforeach
                                            </td>
                                            <td hidden class="id">{{ $items->id }}</td>
                                            <td class="leave_type">{{$items->leave_type}}</td>
                                            <td hidden class="from_date">{{ $items->from_date }}</td>
                                            <td>{{date('d F, Y',strtotime($items->from_date)) }}</td>
                                            <td hidden class="to_date">{{$items->to_date}}</td>
                                            <td>{{date('d F, Y',strtotime($items->to_date)) }}</td>
                                            <td class="no_of_day">{{$items->no_of_day}} Day</td>
                                            <td class="leave_reason">{{$items->reason}}</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-purple"></i> New
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item leaveUpdate" data-toggle="modal" data-id="'.$items->id.'" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item leaveDelete" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
       
        <!-- Add Leave Modal -->
        <div id="add_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Leave</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="applyLeave" action="{{ route('form/leaves/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employee Name <span class="text-danger">*</span></label>
                                        <select class="select select2s-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="employee_name" name="employee_name">
                                            <option value="">-- Select --</option>
                                            @foreach ($userList as $key=>$user )
                                                <option value="{{ $user->name }}" data-employee_id={{ $user->user_id }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employee ID<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="employee_id" name="employee_id" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Leave Type <span class="text-danger">*</span></label>
                                        <select class="select" id="leave_type" name="leave_type">
                                            <option selected disabled>Select Leave Type</option>
                                            @foreach($leaveInformation as $key => $leaves)
                                                @if($leaves->leave_type != 'Total Leave Balance' && $leaves->leave_type != 'Use Leave' && $leaves->leave_type != 'Remaining Leave')   
                                                    <option value="{{ $leaves->leave_type }}">{{ $leaves->leave_type }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Remaining Leaves <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="remaining_leave" name="remaining_leave" readonly value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>From <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" id="date_from" name="date_from" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>To <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" id="date_to" name="date_to" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-6" id="leave_dates_display" style="display: none"></div>
                                <div class="col-md-6" id="select_leave_day" style="display: none"></div>
                            </div>
                            <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="number_of_day" name="number_of_day" value="0" readonly>
                            </div>
                            <div class="row">
                                <div id="leave_day_select" class="col-md-12">
                                    <div class="form-group">
                                        <label>Leave Day <span class="text-danger">*</span></label>
                                        <select class="select" name="select_leave_day[]" id="leave_day">
                                            <option value="Full-Day Leave">Full-Day Leave</option>
                                            <option value="Half-Day Morning Leave">Half-Day Morning Leave</option>
                                            <option value="Half-Day Afternoon Leave">Half-Day Afternoon Leave</option>
                                            <option value="Public Holiday">Public Holiday</option>
                                            <option value="Off Schedule">Off Schedule</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="2" class="form-control" name="reason"></textarea>
                            </div>
                           
                            <div class="submit-section">
                                <button type="submit" id="apply_leave" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Leave Modal -->
				
        <!-- Edit Leave Modal -->
       
        <!-- /Edit Leave Modal -->

        <!-- Approve Leave Modal -->
        <div class="modal custom-modal fade" id="approve_leave" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Leave Approve</h3>
                            <p>Are you sure want to approve for this leave?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Decline</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Approve Leave Modal -->
        
        <!-- Delete Leave Modal -->
        <div class="modal custom-modal fade" id="delete_approve" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Leave</h3>
                            <p>Are you sure want to delete this leave?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('form/leaves/edit/delete') }}" method="POST">
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
        <!-- /Delete Leave Modal -->
    </div>
    <!-- /Page Wrapper -->
@section('script')

    <script>
        $(document).ready(function() {
            $('.select2s-hidden-accessible').select2({
                closeOnSelect: false
            });
        });
        $('#employee_name').on('change',function()
        {
            $('#employee_id').val($(this).find(':selected').data('employee_id'));
        });
    </script>

    <!-- Calculate Leave  -->
    <script>
        // Define the URL for the AJAX request
        var url = "{{ route('hr/get/information/leave') }}";
        
        // Function to handle leave type change
        function handleLeaveTypeChange() {
            var leaveType   = $('#leave_type').val();
            var numberOfDay = $('#number_of_day').val();    
            $.post(url, {
                leave_type: leaveType,
                number_of_day: numberOfDay,
                _token: $('meta[name="csrf-token"]').attr('content')
            }, function(data) {
                if (data.response_code == 200) {
                    $('#remaining_leave').val(data.leave_type);
                }
            }, 'json');
        }
        
        function countLeaveDays()
        {
            // Get the date values from input fields
            var dateFrom = new Date($('#date_from').val());
            var dateTo   = new Date($('#date_to').val());
            var leaveDay = $('#leave_day').val();
            
            if (!isNaN(dateFrom) && !isNaN(dateTo)) {
                var numDays = Math.ceil((dateTo - dateFrom) / (1000 * 3600 * 24)) + 1;
                if (leaveDay.includes('Half-Day')) numDays -= 0.5;
                $('#number_of_day').val(numDays);
                updateRemainingLeave(numDays);

                // Clear previous display
                $('#leave_dates_display').empty();
                $('#select_leave_day').empty();

                // Display each date one by one if numDays > 0
                if (numDays > 0) {
                    for (let d = 0; d < numDays; d++) {
                        let currentDate = new Date(dateFrom);
                        currentDate.setDate(currentDate.getDate() + d);
                        var formattedDate = currentDate.getDate() + ' ' + (currentDate.getMonth() + 1) + ',' + currentDate.getFullYear();

                        document.getElementById('leave_day_select').style.display = 'block'; // or 'flex', depending on your layout
                        // Append each leave date to the display
                        if (numDays > 0) {
                            document.getElementById('leave_dates_display').style.display = 'block'; // or 'flex', depending on your layout
                            document.getElementById('select_leave_day').style.display = 'block'; // or 'flex', depending on your layout

                            const inputDate = formattedDate;
                            let [day, month, year] = inputDate.split(/[\s,]+/);
                            let date = new Date(year, month - 1, day - 1);
                            let formattedDateConvert = currentDate.getDate() + ' ' + currentDate.toLocaleString('en-GB', { month: 'short' }) + ', ' + currentDate.getFullYear();

                            // Create unique IDs for inputs and labels
                            let leaveDateInputId = `leave_date_${d}`;

                            // Append each leave date to the display
                            $('#leave_dates_display').append(`
                                <div class="form-group">
                                    <label><span class="text-danger">Leave Date ${d+1}</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control" id="${leaveDateInputId}" name="leave_date[]" value="${formattedDateConvert}" readonly>
                                    </div>
                                </div>
                            `);
                            
                            // Function to generate leave day select elements
                            function generateLeaveDaySelects(numDays) {
                                $('#select_leave_day').empty(); // Clear existing elements
                                for (let d = 0; d < numDays; d++) {
                                    let leaveDayId = `leave_day_${d}`;
                                    document.getElementById('leave_day_select').style.display = 'none'; // or 'flex', depending on your layout
                                    $('#select_leave_day').append(`
                                        <div class="form-group">
                                            <label><span class="text-danger">Leave Day ${d+1}</span></label>
                                            <select class="select" name="select_leave_day[]" id="${leaveDayId}">
                                                <option value="Full-Day Leave">Full-Day Leave</option>
                                                <option value="Half-Day Morning Leave">Half-Day Morning Leave</option>
                                                <option value="Half-Day Afternoon Leave">Half-Day Afternoon Leave</option>
                                                <option value="Public Holiday">Public Holiday</option>
                                                <option value="Off Schedule">Off Schedule</option>
                                            </select>
                                        </div>
                                    `);
                                }
                            }

                            // Call this function when you need to set up the dropdowns
                            generateLeaveDaySelects(numDays);

                            // Function to update total leave days and remaining leave
                            function updateLeaveDaysAndRemaining() {
                                let totalDays = numDays; // Start with the total number of days
                                for (let d = 0; d < numDays; d++) {
                                    let leaveType = $(`#leave_day_${d}`).val(); // Get the selected leave type
                                    if (leaveType && leaveType.includes('Half-Day')) totalDays -= 0.5;
                                }
                                $('#number_of_day').val(totalDays);
                                // Update remaining leave
                                updateRemainingLeave(totalDays);
                            }

                            // Event listener for leave day selection change
                            $(document).on('change', '[id^="leave_day"]', updateLeaveDaysAndRemaining);

                            // Initial setup
                            updateLeaveDaysAndRemaining();
                        } else {
                            $('#leave_dates_display').hide();
                            $('#select_leave_day').hide();
                        }
                    }
                    
                }
            } else {
                $('#number_of_day').val('0');
                $('#leave_dates_display').text(''); // Clear the display in case of invalid dates
                $('#select_leave_day').text(''); // Clear the display in case of invalid dates
            }
        }
            
        // Function to update remaining leave
        function updateRemainingLeave(numDays) {
            $.post(url, {
                number_of_day: numDays,
                leave_type: $('#leave_type').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            }, function(data) {
                if (data.response_code == 200) {
                    $('#remaining_leave').val(data.leave_type);
                    $('#apply_leave').prop('disabled', data.leave_type < 0);
                    // Show the alert only once if leave type is less than 0
                    if (data.leave_type < 0 && !$('#apply_leave').data('alerted')) {
                        toastr.info('You cannot apply for leave at this time.');
                        $('#apply_leave').data('alerted', true);
                    } else if (numDays < 0.5) {
                        $('#apply_leave').prop('disabled', true);
                    }
                }
            }, 'json');
        }
        
        // Event listeners
        $('#leave_type').on('change', handleLeaveTypeChange);
        $('#date_from, #date_to, #leave_day').on('dp.change', countLeaveDays);

        // Clearn data in form
        $(document).on('click', '.close', function() {
            // Clear the leave dates display
            $('#leave_dates_display').empty();
            // Clear the select leave day display
            $('#select_leave_day').empty();
            // Reset other relevant fields
            $('#number_of_day').val('');
            $('#date_from').val('');
            $('#date_to').val('');
            $('#leave_type').val(''); // Reset to default value if needed
            $('#remaining_leave').val('');
            // Optionally hide any UI elements
            $('#leave_day_select').hide(); // or reset to its original state
        });
    </script>

    <!-- Validate Form  -->
    <script>
        $(document).ready(function() {
            $(".applyLeave").validate({
                rules: {
                    employee_name: { required: true },
                    leave_type: { required: true },
                    date_from: { required: true },
                    date_to: { required: true },
                    reason: { required: true }
                },
                messages: {
                    employee_name: "Please select employee name",
                    leave_type: "Please select leave type",
                    date_from: "Please select date from",
                    date_to: "Please select date to",
                    reason: "Please input reason for leave"
                },
                errorElement: 'span',
                errorClass: 'text-danger',
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent());
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
    
            $('#employee_name, #leave_type').on('change', function() {
                $(this).siblings('span.error').toggle(!$(this).val());
            });
        });
    </script>
    

    @endsection
@endsection
