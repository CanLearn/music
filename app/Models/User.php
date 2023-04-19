<?php

namespace App\Models;

use App\Models\Manager\Biographi;
use App\Models\Manager\Category;
use App\Models\Manager\Discount;
use App\Models\Manager\File;
use App\Models\Manager\MemberShip;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Verta ;
use Illuminate\Database\Eloquent\SoftDeletes ;

class User extends Authenticatable
{
    use HasApiTokens , SoftDeletes, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function getCreatedAt()
    {
        return verta($this->created_at) ->format('Y/m/d');
    }


    public function biographis()
    {
        return $this->hasMany(Biographi::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function memberships()
    {
        return $this->hasMany(MemberShip::class);
    }

}
