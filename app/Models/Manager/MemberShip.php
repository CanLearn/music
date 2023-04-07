<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberShip extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'is_yearly' , 'priority'];
    protected $casts = ['is_yearly' => 'boolean',];
    protected $appends = ['type'];

    public function getTypeAttribute()
    {
        return $this->is_yearly ? 'سالیانه ' : 'ماهیانه ';
    }

}
