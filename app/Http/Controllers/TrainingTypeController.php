<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingType;
use DB;

class TrainingTypeController extends Controller
{
    /** Index page for training types */
    public function index() 
    {
        $trainingTypes = TrainingType::all(); // Using Eloquent model
        return view('trainingtype.trainingtype', compact('trainingTypes'));
    }

    /** Save a new training type record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'type'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status'      => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $trainingType = new TrainingType;
            $trainingType->type        = $request->type;
            $trainingType->description = $request->description;
            $trainingType->status      = $request->status;
            $trainingType->save();

            DB::commit();
            flash()->success('Created new Training Type successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to add Training Type :)');
            return redirect()->back();
        }
    }

    /** Update a training type record */
    public function updateRecord(Request $request) 
    {
        $request->validate([
            'id'          => 'required|integer|exists:training_types,id',
            'type'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status'      => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            TrainingType::where('id', $request->id)->update([
                'type'        => $request->type,
                'description' => $request->description,
                'status'      => $request->status,
            ]);

            DB::commit();
            flash()->success('Updated Training Type successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to update Training Type :)');
            return redirect()->back();
        }
    }

    /** Delete a training type record */
    public function deleteTrainingType(Request $request)
    {
        $request->validate(['id' => 'required|integer|exists:training_types,id']);

        try {
            TrainingType::destroy($request->id);
            flash()->success('Training Type deleted successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            flash()->error('Failed to delete Training Type :)');
            return redirect()->back();
        }
    }
}