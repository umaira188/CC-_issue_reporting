<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintStatusLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'complaint_id',
        'status',
        'changed_at',
        'changed_by',
    ];

    protected $casts = [
        'changed_at' => 'datetime',
    ];

    // Log belongs to a complaint
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    // Admin who changed the status
    public function changedBy()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
