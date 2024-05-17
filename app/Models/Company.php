<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    use HasFactory;


    protected  $fillable = [
        'name',
        'email',
        'phone',
        'logo',
        'description',
        'location',
        'website',
        'is_verified',
        'categories'
    ];

    protected  $attributes  = [
        'is_verified' => true
    ];

    protected  $casts = [
        'is_verified' => 'boolean',
        'categories' => 'array'
    ];


    public function  user() : HasOne
    {
        return  $this->hasOne(CompanyUser::class);
    }

}
