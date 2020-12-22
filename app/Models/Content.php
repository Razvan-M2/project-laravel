<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Category;
use Rating;

class Content extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable = ['date'];
    protected $primaryKey = "id";

    public function user()
    {
        //  This belongs to class with this id
        return $this->belongsTo(User::class, 'id_user');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'id_rating');
    }
}
