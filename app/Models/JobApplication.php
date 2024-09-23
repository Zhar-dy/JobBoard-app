<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $fillable = [
        'user_id',
        'name',
        'job_post_id',
        'resume',
        'cover_letter',
        'status',
    ];
    // protected $attributes = [
    //     'status' => 'Pending', run if status cannot auto set pending upon creation something
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobapps()
    {
        return $this->belongsTo(JobApplication::class);
    }

}
