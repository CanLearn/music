<?php

namespace App\Models\Manager;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class File extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name_persion',
        'name_english',
        'name_music_persion',
        'name_music_english',
        'image',
        'album',
        'file_320',
        'file_120',
        'file_wav',
        'title',
        'slug',
        'caption',
        'tags',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class , 'category_file');
    }

}
