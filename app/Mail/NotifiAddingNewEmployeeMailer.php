<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifiAddingNewEmployeeMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $item)
    {
        $this->data = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->from(env('MAIL_FROM_ADDRESS'), 'DEMO-SITE')
			->subject('Регистрация нового сотрудника')
			->view('email.new_employee', [
				'data' => $this->data,
			]);
    }
}
