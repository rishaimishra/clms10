<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PassResetSendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function build()
    {
        return $this->from('chogdeylhentsho@gmail.com', 'Commission for Religious Organizations')
            ->subject('Commission for Religious Organizations System Mail:')
            ->view('admin.user.passresetsendmail'); 
       // return $this->view('admin.user.sendmail');
    }
}
