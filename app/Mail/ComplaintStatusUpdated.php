<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Complaint;

class ComplaintStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;
    public $newStatus;

    public function __construct(Complaint $complaint, $newStatus)
    {
        $this->complaint = $complaint;
        $this->newStatus = $newStatus;
    }

    public function build()
    {
        return $this->subject('Complaint Status Updated')
            ->markdown('emails.complaint.status-updated'); 

    }
}

