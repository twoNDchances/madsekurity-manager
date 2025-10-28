<?php

namespace App\Rules;

use App\Mail\VerificationMail;
use Closure;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Mail;

class EmailSendingRule implements ValidationRule
{
    private $name;

    private $email;

    private $token;

    public function __construct($name, $email, $token)
    {
        $this->name  = $name;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value == false)
        {
            return;
        }

        try
        {
            Mail::to($this->email)->queue(new VerificationMail($this->name, $this->email, $this->token));
        }
        catch (Exception $exception)
        {
            $fail("Can't send email for verification when $attribute enabled, detail: " . $exception->getMessage());
        }
    }
}
