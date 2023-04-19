<?php

namespace App\Models\Manager;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class MemberShip extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'is_yearly' , 'priority'];
    protected $casts = ['is_yearly' => 'boolean',];
    protected $appends = ['type'];

    public function getTypeAttribute()
    {
        return $this->is_yearly ? 'سالیانه ' : 'ماهیانه ';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
