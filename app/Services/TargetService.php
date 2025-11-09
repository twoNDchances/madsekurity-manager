<?php

namespace App\Services;

use App\Models\Target;

class TargetService
{
    public static function getFinalDatatype(Target $target)
    {
        $datatype = $target->datatype;
        $engines  = $target->engines;
        foreach ($engines as $engine)
        {
            if ($engine->input_datatype != $datatype)
            {
                return $datatype;
            }
            $datatype = $engine->output_datatype;
        }
        return $datatype;
    }
}
