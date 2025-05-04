<?php

namespace App\Http\Controllers;

use App\Models\RolesPermissions;
use App\Models\CompanySettings;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    /** Company Settings Page */
    public function companySettings()
    {
        $companySettings = CompanySettings::where('id',1)->first();
        return view('settings.companysettings',compact('companySettings'));
    }

    /** Save Record Company Settings */
    public function saveRecord(Request $request)
    {
        // validate form
        $request->validate([
            'company_name'   =>'required',
            'contact_person' =>'required',
            'address'        =>'required',
            'country'        =>'required',
            'city'           =>'required',
            'state_province' =>'required',
            'postal_code'    =>'required',
            'email'          =>'required',
            'phone_number'   =>'required',
            'mobile_number'  =>'required',
            'fax'            =>'required',
            'website_url'    =>'required',
        ]);

        try {
            
            // save or update to databases CompanySettings table
            $saveRecord = CompanySettings::updateOrCreate(['id' => $request->id]);
            $saveRecord->company_name   = $request->company_name;
            $saveRecord->contact_person = $request->contact_person;
            $saveRecord->address        = $request->address;
            $saveRecord->country        = $request->country;
            $saveRecord->city           = $request->city;
            $saveRecord->state_province = $request->state_province;
            $saveRecord->postal_code    = $request->postal_code;
            $saveRecord->email          = $request->email;
            $saveRecord->phone_number   = $request->phone_number;
            $saveRecord->mobile_number  = $request->mobile_number;
            $saveRecord->fax            = $request->fax;
            $saveRecord->website_url    = $request->website_url;
            $saveRecord->save();
            
            DB::commit();
            flash()->success('Save CompanySettings successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            flash()->error('Save CompanySettings fail :)');
            return redirect()->back();
        }
    }
    
    /** Roles & Permissions  */
    public function rolesPermissions()
    {
        $rolesPermissions = RolesPermissions::All();
        return view('settings.rolespermissions',compact('rolesPermissions'));
    }

    /** Add Role Permissions */
    public function addRecord(Request $request)
    {
        $request->validate([
            'roleName' => 'required|string|max:255',
        ]);
        
        DB::beginTransaction();
        try {
            $roles = RolesPermissions::where('permissions_name', '=', $request->roleName)->first();
            if ($roles === null) {
                // roles name doesn't exist
                $role = new RolesPermissions;
                $role->permissions_name = $request->roleName;
                $role->save();
            } else {
                // roles name exits
                DB::rollback();
                flash()->error('Roles name exits :)');
                return redirect()->back();
            }

            DB::commit();
            flash()->success('Create new role successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Logout successfully :)');
            return redirect()->back();
        }
    }

    /** Edit Roles Permissions */
    public function editRolesPermissions(Request $request)
    {
        DB::beginTransaction();
        try{
            $id        = $request->id;
            $roleName  = $request->roleName;
            
            $update = [
                'id'               => $id,
                'permissions_name' => $roleName,
            ];

            RolesPermissions::where('id',$id)->update($update);
            DB::commit();
            flash()->success('Role Name updated successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Role Name update fail :)');
            return redirect()->back();
        }
    }

    /** Delete Roles Permissions */
    public function deleteRolesPermissions(Request $request)
    {
        try {
            RolesPermissions::destroy($request->id);
            flash()->success('Role Name deleted successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Role Name delete fail :)');
            return redirect()->back();
        }
    }

    /** Localization */
    public function localizationIndex()
    {
        return view('settings.localization');
    }

    /** Salary Settings */
    public function salarySettingsIndex()
    {
        return view('settings.salary-settings');
    }

    /** Email Settings */
    public function emailSettingsIndex()
    {
        return view('settings.email-settings');
    }
}
