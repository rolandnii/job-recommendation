<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected  $fillable = [
        'user_id',
        'job_id',
        'status',
    ];
    public function job() : BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function user() : BelongsTo
    {
       return  $this->belongsTo(User::class) ;
    }
}
