<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'user_id',
        'category',
        'department', // Optional: if you're using this
        'address',
        'details',
        'image',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Complaint belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Complaint has many status updates
    public function statusLogs()
    {
        return $this->hasMany(ComplaintStatusLog::class)->orderBy('changed_at');
    }
}
