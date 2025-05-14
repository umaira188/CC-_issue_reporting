<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // 👇 This tells Laravel to use the "feedback" table
    protected $table = 'feedbacks';

    protected $fillable = ['user_id', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
