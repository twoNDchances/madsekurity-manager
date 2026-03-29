<?php

namespace App\Http\Controllers;

use App\Models\Defender;
use App\Services\DefenderService;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class DefenderController extends Controller
{
    public function inspect($id)
    {
        $defender = Defender::find($id);
        if (!$defender)
        {
            abort(404);
        }
        $response = DefenderService::perform($defender, 'inspect', null, false);
        if (\is_string($response))
        {
            return response()->json(Json::decode($response), 500);
        }
        return response()->json($response);
    }
}
