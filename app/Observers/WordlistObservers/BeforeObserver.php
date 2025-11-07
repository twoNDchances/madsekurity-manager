<?php

namespace App\Observers\WordlistObservers;

use App\Models\Wordlist;
use App\Services\IdentificationService;
use App\Services\WordlistService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Wordlist "saving" event.
     */
    public function saving(Wordlist $wordlist): void
    {
        $wordlist->name        = Str::slug($wordlist->name);
        $wordlist->words_count = count(WordlistService::getWords($wordlist));
        switch ($wordlist->words_type)
        {
            case 'file':
                $wordlist->words_text = null;
                break;
            case 'text':
                $wordlist->words_file = null;
                break;
            default:
                break;
        }
    }

    /**
     * Handle the Wordlist "creating" event.
     */
    public function creating(Wordlist $wordlist): void
    {
        $wordlist->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Wordlist "updating" event.
     */
    public function updating(Wordlist $wordlist): void
    {
        //
    }

    /**
     * Handle the Wordlist "deleting" event.
     */
    public function deleting(Wordlist $wordlist): void
    {
        //
    }

    /**
     * Handle the Wordlist "restoring" event.
     */
    public function restoring(Wordlist $wordlist): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Wordlist $wordlist): void
    {
        //
    }
}
