<?php

namespace App\Models\Manager;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'name', 'code', 'percent'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
