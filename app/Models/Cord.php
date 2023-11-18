<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cord extends Model
{
    use HasFactory;

    protected $with = ['user','comments'];

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function comments(){
        return $this->hasMany(Comment::class,'cord_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class,'cord_like')->withTimestamps();
    }
}