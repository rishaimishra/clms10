<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class tokenSendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->from('cro@gmail.com', 'Commission for religious organizations ')
            ->subject('CLMS Registration Code:')
            ->view('admin.user.sendmail'); 
       // return $this->view('admin.user.sendmail');
    }
}
