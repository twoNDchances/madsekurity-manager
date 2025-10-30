<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FileTextCheckingRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $path = $value->getRealPath();

        $content = File::get($path);
        if (Str::length(Str::trim($content)) == 0)
        {
            $fail("$attribute is empty");
            return;
        }

        $handle = fopen($path, 'rb');
        $chunk = fread($handle, 8192);
        fclose($handle);

        if ($chunk === false || trim($chunk) === '') {
            $fail("$attribute is empty");
            return;
        }

        $printable = 0;
        $len = Str::length($chunk);
        for ($i = 0; $i < $len; $i++) {
            $ord = ord($chunk[$i]);
            if (($ord >= 32 && $ord <= 126) || in_array($ord, [9, 10, 13])) {
                $printable++;
            }
        }

        $ratio = $printable / $len;

        if ($ratio < 0.95)
        {
            $fail("$attribute isn't a plain-text");
            return;
        }
    }
}
