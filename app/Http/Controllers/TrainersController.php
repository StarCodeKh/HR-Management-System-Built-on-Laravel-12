<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use Session;
use Auth;
use DB;

class TrainersController extends Controller
{
    /** index page */
    public function index()
    {
        $trainers = DB::table('trainers')
                    ->join('users', 'users.user_id', '=', 'trainers.trainer_id')
                    ->select('trainers.*', 'users.avatar','users.user_id')
                    ->get();
        $user = DB::table('users')->get();
        return view('trainers.trainers',compact('user','trainers'));
    }

    /** Save Record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'full_name'   => 'required|string|max:255',
            'role'        => 'required|string|max:255',
            'phone'       => 'required|string|max:255',
            'status'      => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $trainer = new Trainer;
            $trainer->full_name    = $request->full_name;
            $trainer->trainer_id   = $request->trainer_id;
            $trainer->role         = $request->role;
            $trainer->email        = $request->email;
            $trainer->phone        = $request->phone;
            $trainer->status       = $request->status;
            $trainer->description  = $request->description;
            $trainer->save();
            
            DB::commit();
            flash()->success('Create new Trainers successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Add Trainers fail :)');
            return redirect()->back();
        }
    }

    /** Update Record */
    public function updateRecord(Request $request) 
    {
        DB::beginTransaction();
        try {
            if(!empty($request->trainer_id))
            {
                $update = [
                    'id'            => $request->id,
                    'full_name'     => $request->full_name,
                    'trainer_id'    => $request->trainer_id,
                    'role'          => $request->role,
                    'email'         => $request->email,
                    'phone'         => $request->phone,
                    'status'        => $request->status,
                    'description'   => $request->description,
                ];
            } else {
                $update = [
                    'id'            => $request->id,
                    'full_name'     => $request->full_name,
                    'role'          => $request->role,
                    'email'         => $request->email,
                    'phone'         => $request->phone,
                    'status'        => $request->status,
                    'description'   => $request->description,
                ];
            }
           
            Trainer::where('id',$request->id)->update($update);
            DB::commit();
            flash()->success('Updated Trainer successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Update Trainer fail :)');
            return redirect()->back();
        }
    }

    /** Delete Record */
    public function deleteRecord(Request $request)
    {
        try {
            Trainer::destroy($request->id);
            flash()->success('Trainers deleted successfully :)');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            flash()->error('Trainers delete fail :)');
            return redirect()->back();
        }
    }
}
