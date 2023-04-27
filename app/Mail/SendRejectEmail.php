<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRejectEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $remarks;
   
    public function __construct($remarks)
    {
        $this->remarks = $remarks;
    }

    public function build()
    {
        return $this->from('cro@gmail.com', 'Commission for religious organizations ')
            ->subject('Registration Approval Status:')
            ->view('admin.user.sendmailreject'); 
       // return $this->view('admin.user.sendmail');
    }
}
