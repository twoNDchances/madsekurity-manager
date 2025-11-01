<?php

namespace App\Services;

use App\Models\Wordlist;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WordlistService
{
    public static function getWords(Wordlist $wordlist)
    {
        $filterCallback = fn ($line) => Str::length(Str::trim($line)) != 0;
        return match ($wordlist->words_type)
        {
            'file' => File::lines(Storage::path($wordlist->words_file))->filter($filterCallback)->toArray(),
            'text' => array_filter(explode("\n", $wordlist->words_text), $filterCallback),
        };
    }
}
