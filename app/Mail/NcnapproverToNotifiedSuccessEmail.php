<?php

namespace App\Mail;

use App\Ncnapprover;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NcnapproverToNotifiedSuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $ncnapprover;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ncnapprover $ncnapprover)
    {
        $this->ncnapprover = $ncnapprover;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vendor.emails.email');
    }
}
