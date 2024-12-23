<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $timestamp = true;

    protected $fillable = ['name', 'price','description', 'image_path', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
