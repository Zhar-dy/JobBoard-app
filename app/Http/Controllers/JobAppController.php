<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use App\Models\JobPost;
use Storage;
Use File;

class JobAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(JobPost $jobpost)
    {
        return view('job_app.create', compact('jobpost'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {//use CheckNameRequest on store if u want it become only alphabet with no numbers

        if ($request->hasFile('resume')) {
            //rename file
            $fileName = $request->name.'-'.date('Y-m-d').'.'.$request->resume->getClientOriginalExtension();
            //simpan gambar file
            Storage::disk('public')->put('/jobapp/'.$fileName, File::get($request->resume));
        }

        JobApplication::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'job_post_id' => $request->job_post_id,
            'resume' => $fileName ?? 'No attachment',
            'cover_letter' => $request->cover_letter,
            'status' => $request->status ?? 'Pending',
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobpost,JobApplication $jobapp)
    {
        return view('job_app.show', compact('jobpost','jobapp'));
    }

    public function allshow(JobPost $jobpost)
    {
        $jobapps = JobApplication::all();
        return view('job_app.allshow', compact('jobpost','jobapps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobpost,JobApplication $jobapp)
    {
        return view('job_app.edit', compact('jobpost','jobapp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,JobPost $jobpost,JobApplication $jobapp)
    {
        if ($request->has('status') && !$request->hasFile('resume') && !$request->has('name') && !$request->has('cover_letter'))
        {
            $this->authorize('updateapp', $jobpost);
            $jobapp->update([
                'status' => $request->status,
            ]);
            return redirect()->route('jobapp.allshow', compact('jobpost','jobapp'));
        }

        if ($request->hasFile('resume')) {
            //rename file
            $fileName = $request->name.'-'.date('Y-m-d').'.'.$request->resume->getClientOriginalExtension();
            //simpan gambar file
            Storage::disk('public')->put('/jobapp/'.$fileName, File::get($request->resume));
        }

        $jobapp->update([
            'name' => $request->name,
            'resume' => $fileName ?? 'No attachment',
            'cover_letter' => $request->cover_letter,
        ]);

        return redirect()->route('jobapp.allshow', compact('jobpost','jobapp'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
