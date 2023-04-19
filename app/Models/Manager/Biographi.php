<?php

namespace App\Models\Manager;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;
class Biographi extends Model
{
    use HasFactory , Sluggable , SoftDeletes;

    protected $fillable =
        [
            'title',
            'slug',
            'images_title',
            'name',
            'last_name',
            'coption_music',
            'first_image',
            'title_image',
            'coption_two_music',
            'seconde_image',
            'title_two_image',
            'license',
            'concert_image',
            'title_concert_image',
            'list_album',
            'list_music',
            'tags'
        ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' ,
            ]
        ];
    }
    protected $appends = ['name_last_name'];

    public function getNameLastNameAttribute()
    {
        return $this->name . $this->last_name ;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
