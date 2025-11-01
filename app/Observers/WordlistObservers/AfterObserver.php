<?php

namespace App\Observers\WordlistObservers;

use App\Models\Wordlist;
use App\Services\BehaviorService;
use Illuminate\Support\Facades\Storage;

trait AfterObserver
{
    /**
     * Handle the Wordlist "saved" event.
     */
    public function saved(Wordlist $wordlist): void
    {
        if ($wordlist->isDirty('words_file'))
        {
            $originalwordsFile = $wordlist->getOriginal('words_file');
            if ($originalwordsFile)
            {
                Storage::delete($originalwordsFile);
            }
        }
    }

    /**
     * Handle the Wordlist "created" event.
     */
    public function created(Wordlist $wordlist): void
    {
        BehaviorService::perform($wordlist, 'Create');
    }

    /**
     * Handle the Wordlist "updated" event.
     */
    public function updated(Wordlist $wordlist): void
    {
        BehaviorService::perform($wordlist, 'Update');
    }

    /**
     * Handle the Wordlist "deleted" event.
     */
    public function deleted(Wordlist $wordlist): void
    {
        BehaviorService::perform($wordlist, 'Delete');
        $wordsFile = $wordlist->words_file;
        if ($wordsFile)
        {
            Storage::delete($wordsFile);
        }
    }

    /**
     * Handle the Wordlist "restored" event.
     */
    public function restored(Wordlist $wordlist): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Wordlist $wordlist): void
    {
        //
    }
}
