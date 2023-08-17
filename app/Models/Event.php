<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'date', 'time', 'user_id','location'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
