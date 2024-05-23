<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasName
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'is_verified',
        'email_verified_at'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    protected $attributes = [
        'is_verified' => false
    ];

    public function jobs() : HasMany
    {
        return $this->hasMany(Job::class,'created_by','id');
    }

    public function  company() : HasOne
    {
        return  $this->hasOne(CompanyUser::class);
    }

    public function applications() : HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

   public function getFilamentName(): string
   {

       return  $this->first_name . " " . $this->last_name;
   }

   public function getDisplayNameAttribute()
   {
       return $this->phone ? "{$this->full_name} ({$this->phone})" : $this->full_name;
   }

   public function getIsAdminAttribute()
   {
       return $this->hasRole('admin');
   }



}
