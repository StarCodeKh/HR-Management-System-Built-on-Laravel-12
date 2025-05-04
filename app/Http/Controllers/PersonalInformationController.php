<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use DB;

class PersonalInformationController extends Controller
{
    /** Save Record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'passport_no'          => 'required|string|max:255',
            'passport_expiry_date' => 'required|string|max:255',
            'tel'                  => 'required|string|max:255',
            'nationality'          => 'required|string|max:255',
            'religion'             => 'required|string|max:255',
            'marital_status'       => 'required|string|max:255',
            'employment_of_spouse' => 'required|string|max:255',
            'children'             => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            
            $user_information = PersonalInformation::firstOrNew(
                ['user_id' =>  $request->user_id],
            );
            $user_information->user_id              = $request->user_id;
            $user_information->passport_no          = $request->passport_no;
            $user_information->passport_expiry_date = $request->passport_expiry_date;
            $user_information->tel                  = $request->tel;
            $user_information->nationality          = $request->nationality;
            $user_information->religion             = $request->religion;
            $user_information->marital_status       = $request->marital_status;
            $user_information->employment_of_spouse = $request->employment_of_spouse;
            $user_information->children             = $request->children;
            $user_information->save();

            DB::commit();
            flash()->success('Create personal information successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Add personal information fail :)');
            return redirect()->back();
        }
    }
}
