<?php

namespace App\Mail;

use App\Models\Idee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IdeeStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $idee;
    public $status;

    public function __construct(Idee $idee, $status)
    {
        $this->idee = $idee;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Notification de Statut de l\'Idée')
                    ->markdown('emails.idee-status-notification');
    }
}

