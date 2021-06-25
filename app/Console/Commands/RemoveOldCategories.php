<?php

namespace App\Console\Commands;

use App\Services\OldCatsRemover;
use Illuminate\Console\Command;

class RemoveOldCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:remove:old-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private OldCatsRemover $oldCatsRemover)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->oldCatsRemover->run();
        return 0;
    }
}
