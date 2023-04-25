<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Project extends Model
{
    use HasFactory;

    protected $fillable = ["category_id",  "title", "slug", "text", "image"];

    public function getAbstract($max = 50) {
        return substr($this->text, 0, $max) . "...";
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}