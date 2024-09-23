<?php

namespace App\Policies;
use App\Models\JobApplication;
use App\Models\User;
use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
class JobPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, JobPost $jobpost)
    {
        return  $user->role === 'admin'||$user->id === $jobpost->user_id;
    }

    public function updateapp(User $user, JobPost $jobpost)
    {
        return  $user->id === $jobpost->user_id;
    }

public function view(User $user, JobPost $JobPost)
{
    return $user->role === 'admin'||$JobPost->user_id == $user->id
    ? Response::allow()
    : Response::deny('You do not own this post.');
}

public function create(User $user)
{
    return $user->role == 'admin'|| $user->role == 'employer';
}
public function delete(User $user, JobPost $JobPost)
{
    return $user->role === 'admin' || $JobPost->user_id === $user->id;
}
public function viewdata(User $user,JobPost $JobPost)
{
    if($user->role == 'admin')
    {
        return true;
    }
    return $user->role == 'commissioner' || ($JobPost->user_id != $user->id || $user->role == 'employer');
}

public function idJob(User $user, JobApplication $JobApp)
{
    if($user->role == 'admin')
    {
        return true;
    }
    return $JobApp->user_id == $user->id;
}

public function validjobapp(User $user, JobApplication $jobapp, JobPost $jobpost)
{
    return $jobpost->id === $jobapp->job_post_id;
}



}
