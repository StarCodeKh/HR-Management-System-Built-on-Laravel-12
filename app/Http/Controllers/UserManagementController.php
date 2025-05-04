<?php

namespace App\Http\Controllers;

use App\Models\UserEmergencyContact;
use App\Models\PersonalInformation;
use App\Models\ProfileInformation;
use App\Rules\MatchOldPassword;
use App\Models\BankInformation;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Form;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Hash;
use Auth;
use DB;

class UserManagementController extends Controller
{
    /** Index page */
    public function index()
    {
        if (Session::get('role_name') == 'Admin')
        {
            $result      = DB::table('users')->get();
            $role_name   = DB::table('role_type_users')->get();
            $position    = DB::table('position_types')->get();
            $department  = DB::table('departments')->get();
            $status_user = DB::table('user_types')->get();
            return view('usermanagement.user_control',compact('result','role_name','position','department','status_user'));
        } else {
            return redirect()->route('home');
        }
    }

    /** Get List Data And Search */
    public function getUsersData(Request $request) 
    {
        $draw            = $request->get('draw');
        $start           = $request->get("start");
        $rowPerPage      = $request->get("length"); // total number of rows per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr  = $request->get('columns');
        $order_arr       = $request->get('order');
        $search_arr      = $request->get('search');

        $columnIndex     = $columnIndex_arr[0]['column']; // Column index
        $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue     = $search_arr['value']; // Search value

        $users =  DB::table('users');
        $totalRecords = $users->count();

        // Search
        $filters = [
            'name'      => $request->user_name,
            'role_name' => $request->type_role,
            'status'    => $request->type_status,
        ];
        
        foreach ($filters as $field => $value) {
            if (!empty($value)) {
                $users->where($field, 'like', "%$value%");
            }
        }

        $searchColumns = [
            'name', 
            'user_id', 
            'email', 
            'position', 
            'phone_number', 
            'join_date', 
            'role_name', 
            'status', 
            'department'
        ];
        
        // Apply search filter and get the total records with filter
        $totalRecordsWithFilter = $users->where(function ($query) use ($searchValue, $searchColumns) {
            foreach ($searchColumns as $column) {
                $query->orWhere($column, 'like', '%' . $searchValue . '%');
            }})->count();
        
        // Retrieve filtered and sorted records
        $records = $users->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue, $searchColumns) {
            foreach ($searchColumns as $column) {
                $query->orWhere($column, 'like', '%' . $searchValue . '%');
            }})->skip($start)->take($rowPerPage)->get();
        
        $data_arr = [];
        $roleBadges = [
            'Admin'       => 'bg-inverse-danger',
            'Super Admin' => 'bg-inverse-warning',
            'Normal User' => 'bg-inverse-info',
            'Client'      => 'bg-inverse-success',
            'Employee'    => 'bg-inverse-dark',
        ];
        
        $statusBadges = [
            'Active'   => 'text-success',
            'Inactive' => 'text-info',
            'Disable'  => 'text-danger',
        ];
        
        foreach ($records as $key => $record) {
            $record->name = '
                <h2 class="table-avatar">
                    <a href="'.url('employee/profile/' . $record->user_id).'">
                        <img class="avatar" data-avatar="'.$record->avatar.'" src="'.url('/assets/images/'.$record->avatar).'">
                        '.$record->name.'
                         <span class="name" hidden>'.$record->name.'</span>
                    </a>
                </h2>';
            
            $role_name = isset($roleBadges[$record->role_name]) ? '<span class="badge '.$roleBadges[$record->role_name].' role_name">'.$record->role_name.'</span>' : 'NULL';
        
            $full_status = '
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
                    <a class="dropdown-item"><i class="fa fa-dot-circle-o text-warning"></i> Inactive </a>
                    <a class="dropdown-item"><i class="fa fa-dot-circle-o text-danger"></i> Disable </a>
                </div>';
        
            $status = '
                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-dot-circle-o '.($statusBadges[$record->status] ?? 'text-dark').'"></i>
                    <span class="status_s">'.$record->status.'</span>
                </a>
                '.$full_status;
        
            $action = '
                <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$record->id.'" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a href="#" class="dropdown-item userDelete" data-toggle="modal" data-id="'.$record->id.'" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                </div>';
        
            $last_login = Carbon::parse($record->last_login)->diffForHumans();
        
            $data_arr[] = [
                "no"           => '<span class="id" data-id="'.$record->id.'">'.($start + $key + 1).'</span>',
                "name"         => $record->name,
                "user_id"      => '<span class="user_id">'.$record->user_id.'</span>',
                "email"        => '<span class="email">'.$record->email.'</span>',
                "position"     => '<span class="position">'.$record->position.'</span>',
                "phone_number" => '<span class="phone_number">'.$record->phone_number.'</span>',
                "join_date"    => $record->join_date,
                "last_login"   => $last_login,
                "role_name"    => $role_name,
                "status"       => $status,
                "department"   => '<span class="department">'.$record->department.'</span>',
                "action"       => $action,
            ];
        }
     
        $response = [
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData"               => $data_arr
        ];
        return response()->json($response);
    }

    /** Profile User */
    public function profile()
    {
        $profile = Session::get('user_id'); // Get the user ID from session

        // Eager load all necessary data in one go
        $userInformation  = PersonalInformation::where('user_id', $profile)->first();
        $bankInformation  = BankInformation::where('user_id', $profile)->first();
        $emergencyContact = UserEmergencyContact::where('user_id', $profile)->first();
        $users            = DB::table('users')->get();
        $employeeProfile = DB::table('profile_information')->where('user_id', $profile)->first();

        // Check if employee profile exists
        if ($employeeProfile) {
            // Profile exists, return with all the data
            return view('usermanagement.profile_user', [
                'information'       => $employeeProfile,
                'user'              => $users,
                'userInformation'   => $userInformation,
                'emergencyContact'  => $emergencyContact,
                'bankInformation'   => $bankInformation
            ]);
        } else {
            // No employee profile, return only the basic information
            return view('usermanagement.profile_user', [
                'information'       => null,
                'user'              => $users,
                'userInformation'   => $userInformation
            ]);
        }
    }

    /** Save Profile Information */
    public function profileInformation(Request $request)
    {
        try {
            if(!empty($request->images))
            {
                $image_name = $request->hidden_image;
                $image = $request->file('images');
                if ($image_name =='photo_defaults.jpg')
                {
                    if($image != '') {
                        $image_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/assets/images/'), $image_name);
                    }
                } else {
                    if($image != '') {
                        $image_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/assets/images/'), $image_name);
                        unlink('assets/images/'.Auth::user()->avatar);
                    }
                }
                $update = [
                    'user_id' => $request->user_id,
                    'name'    => $request->name,
                    'avatar'  => $image_name,
                ];
                User::where('user_id',$request->user_id)->update($update);
            } 

            $information = ProfileInformation::updateOrCreate(['user_id' => $request->user_id]);
            $information->name         = $request->name;
            $information->user_id      = $request->user_id;
            $information->email        = $request->email;
            $information->birth_date   = $request->birth_date;
            $information->gender       = $request->gender;
            $information->address      = $request->address;
            $information->state        = $request->state;
            $information->country      = $request->country;
            $information->pin_code     = $request->pin_code;
            $information->phone_number = $request->phone_number;
            $information->department   = $request->department;
            $information->designation  = $request->designation;
            $information->reports_to   = $request->reports_to;
            $information->save();

            $employee = Employee::where('employee_id', $request->user_id)->first();
            if ($employee) {
                $employee->name         = $request->name;
                $employee->email        = $request->email;
                $employee->gender       = $request->gender;
                $employee->birth_date   = $request->birth_date;
                $employee->line_manager = $request->reports_to;
                $employee->save();
            }

            $user = User::updateOrCreate(['user_id' => $request->user_id]);
            $user->name         = $request->name;
            $user->user_id      = $request->user_id;
            $user->email        = $request->email;
            $user->line_manager = $request->reports_to;
            $user->save();
            
            DB::commit();
            flash()->success('Add Profile Information successfully :)');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            \Log::error('Failed: ' . $e->getMessage());
            flash()->error('Add Profile Information fail :)');
            return redirect()->back();
        }
    }
   
    /** Save new user */
    public function addNewUserSave(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|min:11|numeric',
            'role_name' => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'department'=> 'required|string|max:255',
            'status'    => 'required|string|max:255',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Added image file type and size validation
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $todayDate = Carbon::now()->toDayDateTimeString();

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images'), $imageName);

            $user = new User;
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->join_date    = $todayDate;
            $user->last_login   = $todayDate;
            $user->phone_number = $request->phone;
            $user->role_name    = $request->role_name;
            $user->position     = $request->position;
            $user->department   = $request->department;
            $user->status       = $request->status;
            $user->avatar       = $imageName;
            $user->password     = Hash::make($request->password);
            $user->save();

            DB::commit();

            Toastr::success('Created new account successfully!', 'Success');
            return redirect()->route('userManagement');
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Failed to create new account', ['error' => $e->getMessage()]);
            Toastr::error('Failed to create new account. Please try again.', 'Error');
            return redirect()->back()->withInput();
        }
    }

    /** Update Record */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id   = $request->user_id;
            $name      = $request->name;
            $email     = $request->email;
            $role_name = $request->role_name;
            $position  = $request->position;
            $phone     = $request->phone;
            $department= $request->department;
            $status    = $request->status;
            $image_name = $request->hidden_image;
    
            $dt = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
    
            $image = $request->file('images');
            if ($image) {
                // Delete old image if not the default one
                if ($image_name && $image_name != 'photo_defaults.jpg') {
                    // Delete the old image if it exists
                    unlink('assets/images/'.$image_name);
                }
    
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images'), $image_name);
            }
    
            $update = [
                'user_id'       => $user_id,
                'name'          => $name,
                'role_name'     => $role_name,
                'email'         => $email,
                'position'      => $position,
                'phone_number'  => $phone,
                'department'    => $department,
                'status'        => $status,
                'avatar'        => $image_name,
            ];
    
            $activityLog = [
                'user_name'    => $name,
                'email'        => $email,
                'phone_number' => $phone,
                'status'       => $status,
                'role_name'    => $role_name,
                'modify_user'  => 'Update',
                'date_time'    => $todayDate,
            ];
    
            DB::table('user_activity_logs')->insert($activityLog);
            User::where('user_id', $user_id)->update($update);
    
            DB::commit();
    
            flash()->success('User updated successfully :)');
            return redirect()->route('userManagement');
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('User update failed', ['error' => $e->getMessage()]);
            flash()->success('User update failed :)');
            return redirect()->back()->withInput();
        }
    }

    /** Delete Record */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'avatar' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $dt = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();

            // Log the deletion activity
            $activityLog = [
                'user_name'    => Session::get('name'),
                'email'        => Session::get('email'),
                'phone_number' => Session::get('phone_number'),
                'status'       => Session::get('status'),
                'role_name'    => Session::get('role_name'),
                'modify_user'  => 'Delete',
                'date_time'    => $todayDate,
            ];

            DB::table('user_activity_logs')->insert($activityLog);

            $userId = $request->id;
            $avatar = $request->avatar;

            // Find the user first
            $user = User::find($userId);
            if (!$user) {
                flash()->error('User not found.');
                return redirect()->back();
            }

            // Delete related records
            PersonalInformation::where('user_id', $userId)->delete();
            UserEmergencyContact::where('user_id', $userId)->delete();
            $user->delete();

            // Delete the avatar if not default and file exists
            if ($avatar !== 'photo_defaults.jpg') {
                $avatarPath = public_path('assets/images/' . $avatar);
                if (file_exists($avatarPath)) {
                    try {
                        unlink($avatarPath);
                    } catch (\Exception $e) {
                        \Log::warning('Failed to delete avatar file: ' . $avatarPath . ' - ' . $e->getMessage());
                    }
                } else {
                    \Log::info('Avatar file not found: ' . $avatarPath);
                }
            }

            DB::commit();
            flash()->success('User deleted successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error deleting user: ' . $e->getMessage(), ['exception' => $e]);
            flash()->error('User deletion failed :)');
            return redirect()->back();
        }
    }

    /** View Change Password */
    public function changePasswordView()
    {
        return view('settings.changepassword');
    }
    
    /** Change Password User */
    public function changePasswordDB(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new MatchOldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            // Find the authenticated user
            $user = Auth::user();
            // Update the user's password
            $user->update(['password' => Hash::make($request->new_password)]);
            // Commit the transaction
            DB::commit();
            // Show success message
            flash()->success('Password changed successfully :)');
            // Redirect to the intended route
            return redirect()->intended('home');
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            // Optionally log the error or show an error message
            flash()->error('An error occurred while changing the password. Please try again.');
            // Redirect back
            return redirect()->back();
        }
    }

    /** User Profile Emergency Contact */
    public function emergencyContactSaveOrUpdate(Request $request)
    {
        // Validate form input
        $request->validate([
            'name_primary'           => 'required',
            'relationship_primary'   => 'required',
            'phone_primary'          => 'required',
            'phone_2_primary'        => 'required',
            'name_secondary'         => 'required',
            'relationship_secondary' => 'required',
            'phone_secondary'        => 'required',
            'phone_2_secondary'      => 'required',
        ]);

        try {
            // Save or update emergency contact
            $saveRecord = UserEmergencyContact::updateOrCreate(
                ['user_id' => $request->user_id],
                [
                    'name_primary'           => $request->name_primary,
                    'relationship_primary'   => $request->relationship_primary,
                    'phone_primary'          => $request->phone_primary,
                    'phone_2_primary'        => $request->phone_2_primary,
                    'name_secondary'         => $request->name_secondary,
                    'relationship_secondary' => $request->relationship_secondary,
                    'phone_secondary'        => $request->phone_secondary,
                    'phone_2_secondary'      => $request->phone_2_secondary,
                ]
            );

            // Success message
            flash()->success('Emergency contact updated successfully :)');
        } catch (Exception $e) {
            // Log the error and show failure message
            \Log::error('Failed to save emergency contact: ' . $e->getMessage());
            flash()->error('Failed to update emergency contact');
        }
        // Redirect back
        return redirect()->back();
    }
} 