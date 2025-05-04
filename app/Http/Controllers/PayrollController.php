<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\SalaryExcel;
use App\Models\StaffSalary;
use PDF;
use DB;

class PayrollController extends Controller
{
    /** View Page Salary */
    public function salary()
    {
        $users            = DB::table('users')->join('staff_salaries', 'users.user_id', '=', 'staff_salaries.user_id')->select('users.*', 'staff_salaries.*')->get(); 
        $userList         = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        return view('payroll.employeesalary',compact('users','userList','permission_lists'));
    }

    /** Save Record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'salary'            => 'required|string|max:255',
            'basic'             => 'required|string|max:255',
            'da'                => 'required|string|max:255',
            'hra'               => 'required|string|max:255',
            'conveyance'        => 'required|string|max:255',
            'allowance'         => 'required|string|max:255',
            'medical_allowance' => 'required|string|max:255',
            'tds'               => 'required|string|max:255',
            'esi'               => 'required|string|max:255',
            'pf'                => 'required|string|max:255',
            'leave'             => 'required|string|max:255',
            'prof_tax'          => 'required|string|max:255',
            'labour_welfare'    => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $salary = StaffSalary::updateOrCreate(['user_id' => $request->user_id]);
            $salary->name              = $request->name;
            $salary->user_id           = $request->user_id;
            $salary->salary            = $request->salary;
            $salary->basic             = $request->basic;
            $salary->da                = $request->da;
            $salary->hra               = $request->hra;
            $salary->conveyance        = $request->conveyance;
            $salary->allowance         = $request->allowance;
            $salary->medical_allowance = $request->medical_allowance;
            $salary->tds               = $request->tds;
            $salary->esi               = $request->esi;
            $salary->pf                = $request->pf;
            $salary->leave             = $request->leave;
            $salary->prof_tax          = $request->prof_tax;
            $salary->labour_welfare    = $request->labour_welfare;
            $salary->save();

            DB::commit();
            flash()->success('Create new Salary successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Add Salary fail :)');
            return redirect()->back();
        }
    }

    /** Salary View Detail */
    public function salaryView($user_id)
    {
        $users = DB::table('users')
                ->join('staff_salaries', 'users.user_id', 'staff_salaries.user_id')
                ->join('profile_information', 'users.user_id', 'profile_information.user_id')
                ->select('users.*', 'staff_salaries.*','profile_information.*')
                ->where('staff_salaries.user_id',$user_id)->first();
        if (!empty($users)) {
            return view('payroll.salaryview',compact('users'));
        } else {
            flash()->warning('Please update information user :)');
            return redirect()->route('profile_user');
        }
    }

    /** Update Record */
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                => $request->id,
                'name'              => $request->name,
                'salary'            => $request->salary,
                'basic'             => $request->basic,
                'da'                => $request->da,
                'hra'               => $request->hra,
                'conveyance'        => $request->conveyance,
                'allowance'         => $request->allowance,
                'medical_allowance' => $request->medical_allowance,
                'tds'               => $request->tds,
                'esi'               => $request->esi,
                'pf'                => $request->pf,
                'leave'             => $request->leave,
                'prof_tax'          => $request->prof_tax,
                'labour_welfare'    => $request->labour_welfare,
            ];

            StaffSalary::where('id',$request->id)->update($update);
            DB::commit();
            flash()->success('Salary updated successfully :)');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Salary update fail :)');
            return redirect()->back();
        }
    }

    /** Delete Record */
    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            StaffSalary::destroy($request->id);
            DB::commit();
            flash()->success('Salary deleted successfully :)');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Salary deleted fail :)');
            return redirect()->back();
        }
    }

    /** Payroll Items */
    public function payrollItems()
    {
        return view('payroll.payrollitems');
    }

    /** Report PDF */
    public function reportPDF(Request $request)
    {
        $user_id = $request->user_id;
        $users = DB::table('users')
            ->join('staff_salaries', 'users.user_id', 'staff_salaries.user_id')
            ->join('profile_information', 'users.user_id', 'profile_information.user_id')
            ->select('users.*', 'staff_salaries.*','profile_information.*')
            ->where('staff_salaries.user_id',$user_id)->first();

            $pdf = PDF::loadView('report_template.salary_pdf',compact('users'))->setPaper('a4', 'landscape');
            return $pdf->download('ReportDetailSalary'.'.pdf');
    }

    /** Export Excel */
    public function reportExcel(Request $request)
    {
        $user_id = $request->user_id;
        $users = DB::table('users')
            ->join('staff_salaries', 'users.user_id', 'staff_salaries.user_id')
            ->join('profile_information', 'users.user_id', 'profile_information.user_id')
            ->select('users.*', 'staff_salaries.*','profile_information.*')
            ->where('staff_salaries.user_id',$user_id)->get();
        return Excel::download(new SalaryExcel($user_id),'ReportDetailSalary'.'.xlsx');
    }
}
