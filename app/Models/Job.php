<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'salary',
        'created_by',
        'categories',
        'description',
        'qualification',
        'skill',
        'location',
        'is_published',
        'end_date',
        'job_type',
    ];

    protected $casts = [
        'qualification' => AsArrayObject::class,
        'categories' =>  'array',
        'skill' => AsArrayObject::class,
        'end_date' => 'date'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }


}
