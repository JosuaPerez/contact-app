<?php

namespace App\Console\Commands;

use App\Models\Person;
use Illuminate\Console\Command;

class CheckForBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cwb:birthdayCheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is de birthday command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $people = Person::whereDay('birthday', '=', now()->addDays(5)->format('d'))
            ->whereMonth('birthday', '=', now()->addDays(5)->format('m'))
            ->pluck('firstname');
    }
}
