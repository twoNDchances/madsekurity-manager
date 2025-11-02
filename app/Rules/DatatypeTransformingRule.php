<?php

namespace App\Rules;

use App\Models\Engine;
use App\Models\Target;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DatatypeTransformingRule implements ValidationRule
{
    private string $datatype;

    private string $validateIn;

    public function __construct($datatype, $validateIn) {
        $this->datatype   = $datatype;
        $this->validateIn = $validateIn;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $inputDatatype  = $this->datatype;
        foreach ($value as $id)
        {
            switch ($this->validateIn)
            {
                case 'target':
                    $engine = Engine::find($id);
                    if (!$engine)
                    {
                        $fail("Not found ID $id in $attribute.");
                        return;
                    }

                    if ($inputDatatype != $engine->input_datatype)
                    {
                        $fail("Output datatype is $inputDatatype when input datatype of Engine $engine->name is $engine->input_datatype.");
                        return;
                    }
                    $inputDatatype = $engine->output_datatype;
                    break;
                case 'engine':
                    $target = Target::find($id);
                    if (!$target)
                    {
                        $fail("Not found ID $id in $attribute.");
                        return;
                    }

                    if (!$target->engines()->exists())
                    {
                        return;
                    }

                    $outputDatatype = null;
                    foreach ($target->engines as $engine)
                    {
                        $outputDatatype = $engine->output_datatype;
                    }

                    if ($inputDatatype != $outputDatatype)
                    {
                        $fail("Input datatype is $inputDatatype when output datatype of Target $target->name is $outputDatatype.");
                        return;
                    }
                    break;
                default:
                    return;
            }
        }
    }
}
