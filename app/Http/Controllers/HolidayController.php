<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use DB;

class HolidayController extends Controller
{
    /** Display All Holidays */
    public function holiday()
    {
        $holidays = Holiday::all();
        return view('employees.holidays', compact('holidays'));
    }
    
    /** Save Record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'nameHoliday' => 'required|string|max:255',
            'holidayDate' => 'required',
        ]);
        
        DB::beginTransaction();
        try {
            Holiday::create([
                'name_holiday' => $request->nameHoliday,
                'date_holiday' => $request->holidayDate,
            ]);
            
            DB::commit();
            flash()->success('Created new holiday successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to add holiday :)');
            return redirect()->back();
        }
    }
    
    /** Update Record */
    public function updateRecord(Request $request)
    {
        $request->validate([
            'id'           => 'required|integer|exists:holidays,id',
            'holidayName'  => 'required|string|max:255',
            'holidayDate'  => 'required',
        ]);

        DB::beginTransaction();
        try {
            Holiday::where('id', $request->id)->update([
                'name_holiday' => $request->holidayName,
                'date_holiday' => $request->holidayDate,
            ]);
            
            DB::commit();
            flash()->success('Holiday updated successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to update holiday :)');
            return redirect()->back();
        }
    }

    /** Delete Record */
    public function deleteRecord(Request $request)
    {
        $request->validate(['id' => 'required|integer']);

        try {
            Holiday::destroy($request->id);
            flash()->success('Holiday deleted successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            \Log::error($e); // Log the error for debugging
            flash()->error('Failed to delete Holiday :)');
            return redirect()->back();
        }
    }
}