<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplyForJob;
use App\Models\Category;
use App\Models\Question;
use App\Models\AddJob;
use Carbon\Carbon;
use Response;
use DB;

class JobController extends Controller
{
    /** Job List */
    public function jobList()
    {    
        $job_list = DB::table('add_jobs')->get();
        return view('job.joblist',compact('job_list'));
    }
    
    /** Job View */
    public function jobView($id)
    { 
        // Find the job post by ID and increment the count
        $post = AddJob::find($id);
        $update = ['count' =>$post->count + 1,];
        AddJob::where('id',$post->id)->update($update);

        $job_view = DB::table('add_jobs')->where('id',$id)->get();
        // Return the view with the job details
        return view('job.jobview',compact('job_view'));
    }

    /** Users Dashboard */
    public function userDashboard()
    {
        $job_list   = DB::table('add_jobs')->get();
        return view('job.userdashboard',compact('job_list'));
    }

    /** Jobs Dashboard */
    public function jobsDashboard() {
        return view('job.jobsdashboard');
    }

    /** User All Job */
    public function userDashboardAll() 
    {
        return view('job.useralljobs');
    }

    /** Save Job */
    public function userDashboardSave()
    {
      return view('job.savedjobs');
    }

    /** Applied Job */
    public function userDashboardApplied()
    {
        return view('job.appliedjobs');
    }

    /** Inter Viewing Job*/
    public function userDashboardInterviewing()
    {
        return view('job.interviewing');
    }

    /** Inter viewing Job*/
    public function userDashboardOffered()
    {
        return view('job.offeredjobs');
    }

    /** Visited Job */
    public function userDashboardVisited()
    {
        return view('job.visitedjobs');
    }

    /** Archived Job*/
    public function userDashboardArchived()
    {
        return view('job.visitedjobs');
    }

    /** Jobs */
    public function Jobs()
    {
        $department = DB::table('departments')->get();
        $type_job   = DB::table('type_jobs')->get();
        $job_list   = DB::table('add_jobs')->get();
        return view('job.jobs',compact('department','type_job','job_list'));
    }

    /** Save Record */
    public function JobsSaveRecord(Request $request)
    {
        $request->validate([
            'job_title'       => 'required|string|max:255',
            'department'      => 'required|string|max:255',
            'job_location'    => 'required|string|max:255',
            'no_of_vacancies' => 'required|string|max:255',
            'experience'      => 'required|string|max:255',
            'age'             => 'required|integer',
            'salary_from'     => 'required|string|max:255',
            'salary_to'       => 'required|string|max:255',
            'job_type'        => 'required|string|max:255',
            'status'          => 'required|string|max:255',
            'start_date'      => 'required',
            'expired_date'    => 'required',
            'description'     => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            AddJob::create($request->all());
            flash()->success('Job created successfully :)');
        });
        return redirect()->back();
    }

    /** Update Ajax Status */
    public function jobTypeStatusUpdate(Request $request)
    {
        // Find the first non-empty job type value from the request
        $job_type = $request->only(['full_time', 'part_time', 'internship', 'temporary', 'remote', 'others']);
        $job_type = array_filter($job_type); // Remove empty values
        $job_type = reset($job_type); // Get the first non-empty value
    
        if ($job_type) {
            AddJob::where('id', $request->id_update)->update(['job_type' => $job_type]);
            flash()->success('Updated successfully :)');
            return Response::json(['success' => $job_type], 200);
        }
    
        flash()->error('Update failed. No job type provided.');
        return Response::json(['error' => 'No job type provided'], 400);
    }    
    
    /** Job Applicants */
    public function jobApplicants($job_title)
    {
       $apply_for_jobs = DB::table('apply_for_jobs')->where('job_title',$job_title)->get();
        return view('job.jobapplicants',compact('apply_for_jobs'));
    }

    /** Download */
    public function downloadCV($id) {
        $cv_uploads = DB::table('apply_for_jobs')->where('id',$id)->first();
        $pathToFile = public_path("assets/images/{$cv_uploads->cv_upload}");
        return \Response::download($pathToFile);
    }

    /** Job Details */
    public function jobDetails($id)
    {
        $job_view_detail = DB::table('add_jobs')->where('id',$id)->get();
        return view('job.jobdetails',compact('job_view_detail'));
    }

    /** apply Job SaveRecord */
    public function applyJobSaveRecord(Request $request) 
    {
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'name'      => 'required|string|max:255',
            'phone'     => 'required|string|max:255',
            'email'     => 'required|string|email|max:255',
            'message'   => 'required|string|max:255',
            'cv_upload' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validate file type and size
        ]);
    
        DB::beginTransaction();
    
        try {
            // Upload file
            $cv_uploads = time() . '.' . $request->file('cv_upload')->extension();
            $request->file('cv_upload')->move(public_path('assets/images'), $cv_uploads);
    
            // Save application
            ApplyForJob::create([
                'job_title' => $validatedData['job_title'],
                'name'      => $validatedData['name'],
                'phone'     => $validatedData['phone'],
                'email'     => $validatedData['email'],
                'message'   => $validatedData['message'],
                'cv_upload' => $cv_uploads,
            ]);
    
            DB::commit();
            flash()->success('Job application submitted successfully :)');
            return redirect()->back();
    
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Job application submission failed :)');
            return redirect()->back()->withInput();
        }
    }
    
    /** applyJobUpdateRecord */
    public function applyJobUpdateRecord(Request $request)
    {
        $request->validate([
            'id'              => 'required|integer|exists:add_jobs,id',
            'job_title'       => 'required|string|max:255',
            'department'      => 'required|string|max:255',
            'job_location'    => 'required|string|max:255',
            'no_of_vacancies' => 'required|integer',
            'experience'      => 'required|string|max:255',
            'age'             => 'required|integer',
            'salary_from'     => 'required|numeric',
            'salary_to'       => 'required|numeric',
            'job_type'        => 'required|string|max:255',
            'status'          => 'required|string|max:255',
            'start_date'      => 'required',
            'expired_date'    => 'required',
            'description'     => 'required|string',
        ]);
    
        DB::beginTransaction();
    
        try {
            AddJob::where('id', $request->id)->update($request->except('_token'));
    
            DB::commit();
            flash()->success('Job details updated successfully :)');
            return redirect()->back();
    
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to update job details :)');
            return redirect()->back()->withInput();
        }
    }    

    /** manage Resumes */
    public function manageResumesIndex()
    {
        $department    = DB::table('departments')->get();
        $type_job      = DB::table('type_jobs')->get();
        $manageResumes = DB::table('add_jobs')
            ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
            ->select('add_jobs.*', 'apply_for_jobs.*')
            ->get();
        return view('job.manageresumes',compact('manageResumes','department','type_job'));
    }

    /** shortlist candidates */
    public function shortlistCandidatesIndex()
    {
        return view('job.shortlistcandidates');
    }

    /** Interview Questions */
    public function interviewQuestionsIndex()
    {
        $question    = DB::table('questions')->get();
        $category    = DB::table('categories')->get();
        $department  = DB::table('departments')->get();
        $answer      = DB::table('answers')->get();
        return view('job.interviewquestions',compact('category','department','answer','question'));
    }

    /** Interview Questions Save */
    public function categorySave(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:categories,category',
        ]);

        DB::beginTransaction();

        try {
            $category = new Category();
            $category->category = $request->category;
            $category->save();
            
            DB::commit();
            flash()->success('New Category created successfully :)');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to add Category :)');
            return redirect()->back()->withInput();
        }
    }

    /** Save Question */
    public function questionSave(Request $request)
    {
        $request->validate([
            'category'           => 'required|string|max:255',
            'department'         => 'required|string|max:255',
            'questions'          => 'required|string|max:255',
            'option_a'           => 'required|string|max:255',
            'option_b'           => 'required|string|max:255',
            'option_c'           => 'required|string|max:255',
            'option_d'           => 'required|string|max:255',
            'answer'             => 'required|string|max:255',
            'code_snippets'      => 'nullable|string',
            'answer_explanation' => 'nullable|string|max:255',
            'video_link'         => 'nullable|url',
            'image_to_question'  => 'required|image|max:2048', // Assuming image validation
        ]);

        DB::beginTransaction();

        try {
            /** upload file */
            $imageName = time().'.'.$request->image_to_question->extension();  
            $request->image_to_question->move(public_path('assets/images/question'), $imageName);

            $question = new Question();
            $question->category   = $request->category;
            $question->department = $request->department;
            $question->questions  = $request->questions;
            $question->option_a   = $request->option_a;
            $question->option_b   = $request->option_b;
            $question->option_c   = $request->option_c;
            $question->option_d   = $request->option_d;
            $question->answer     = $request->answer;
            $question->code_snippets      = $request->code_snippets;
            $question->answer_explanation = $request->answer_explanation;
            $question->video_link         = $request->video_link;
            $question->image_to_question  = $imageName;
            $question->save();
            
            DB::commit();
            flash()->success('New question created successfully :)');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to add question :)');
            return redirect()->back()->withInput();
        }
    }

    /** Question Update */
    public function questionsUpdate(Request $request)
    {
        $request->validate([
            'id'                 => 'required|exists:questions,id',
            'category'           => 'required|string|max:255',
            'department'         => 'required|string|max:255',
            'questions'          => 'required|string|max:255',
            'option_a'           => 'required|string|max:255',
            'option_b'           => 'required|string|max:255',
            'option_c'           => 'required|string|max:255',
            'option_d'           => 'required|string|max:255',
            'answer'             => 'required|string|max:255',
            'code_snippets'      => 'nullable|string',
            'answer_explanation' => 'nullable|string|max:255',
            'video_link'         => 'nullable|url',
            'image_to_question'  => 'nullable|image|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $question = Question::findOrFail($request->id);

            // Handle file upload if a new image is provided
            if ($request->hasFile('image_to_question')) {
                $imageName = time().'.'.$request->image_to_question->extension();
                $request->image_to_question->move(public_path('assets/images/question'), $imageName);
                $question->image_to_question = $imageName;
            }

            // Update other fields
            $question->category            = $request->category;
            $question->department          = $request->department;
            $question->questions           = $request->questions;
            $question->option_a            = $request->option_a;
            $question->option_b            = $request->option_b;
            $question->option_c            = $request->option_c;
            $question->option_d            = $request->option_d;
            $question->answer              = $request->answer;
            $question->code_snippets       = $request->code_snippets;
            $question->answer_explanation  = $request->answer_explanation;
            $question->video_link          = $request->video_link;
            
            $question->save();

            DB::commit();
            flash()->success('Updated question successfully :)');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Failed to update question :)');
            return redirect()->back()->withInput();
        }
    }

    /** Delete Question */
    public function questionsDelete(Request $request)
    {
        try {
            // Find the question to delete
            $question = Question::findOrFail($request->id);

            // Optionally delete associated image if needed
            unlink('assets/images/question/'.$question->image_to_question);

            // Delete the question
            $question->delete();

            flash()->success('Question deleted successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            flash()->error('Failed to delete question :)');
            return redirect()->back();
        }
    }

    /** Offer Approvals */
    public function offerApprovalsIndex()
    {
        return view('job.offerapprovals');
    }

    /** Experience Level */
    public function experienceLevelIndex()
    {
        return view('job.experiencelevel');
    }

    /** Candidates */
    public function candidatesIndex()
    {
        return view('job.candidates');
    }

    /** Schedule Timing */
    public function scheduleTimingIndex()
    {
        return view('job.scheduletiming');
    }

    /** Aptitude Result */
    public function aptituderesultIndex()
    {
        return view('job.aptituderesult');
    }
}
