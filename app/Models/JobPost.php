<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;
    protected $table = 'job_posts';

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'description',
        'location',
        'salary',
        'status'
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
        return $this->hasMany(JobApplication::class);
    }

    public function scopeSearch($query, $search = null)
    {
        $query->where(function ($query2) use ($search) {
            if ($search) {
                $query2->where('name', 'like', "%" . $search . "%");
                // $query2->orwhere('description', 'like', "%" . $search . "%");

                //to find in other table
                // $query2->orwhereHas('', function ($query3) use ($search) {
                //     $query3->where('', 'like', "%" . $search . "%");
                // });
            }
        });

        return $query;
    }

}
