<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use App\Models\JobPost;

class JobPostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job_post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {//use CheckNameRequest on store if u want it become only alphabet with no numbers
        JobPost::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'status' => $request->status ?? 'Pending',
        ]);
        return redirect()->route('home');
    }


    public function edit(JobPost $jobpost)
    {
        $this->authorize('view', $jobpost);
        return view('job_post.edit', compact('jobpost'));
    }
    public function update(Request $request,JobPost $jobpost)
    {
        if($request->has('name'))
        {
            $jobpost->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'location' => $request->location,
                'salary' => $request->salary,
            ]);
        }

        if($request->has('status'))
        {
            $this->authorize('update', $jobpost);
            $jobpost->update([
                'status' => $request->status
            ]);
        }

        return redirect()->route('home', $jobpost->id);
    }


    public function show(JobPost $jobpost,JobApplication $jobapp)
    {
        return view('job_post.show', compact('jobpost', 'jobapp'));
    }

    public function destroy(JobPost $jobpost)
    {
        $jobpost->delete();

        return redirect()->route('home');
    }

    public function indexing(Request $request)
    {
        $search = $request->keyword ?? null;
        
        $JobPosts = JobPost::search($search)->paginate(2);
        return view('home')->with(compact('JobPosts'));
    }

}
