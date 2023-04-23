<?php

namespace App\Helpers;

use App\Mail\NotifiAddingNewEmployeeMailer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

class SendMail
{
	/**
	 * @param FormRequest $request
	 */
	public static function send(FormRequest $request): void
	{
		$data = new \stdClass();
		$data->name = $request->input('name');
		$data->email = $request->input('email');
		$data->password = $request->input('password');

		Mail::to($data->email)->send(new NotifiAddingNewEmployeeMailer($data));
	}
}
