<?php

namespace App\Console\Commands;

use App\Services\OldCatsRemover;
use App\Services\OldManufacturersRemover;
use Illuminate\Console\Command;

class RemoveOldManufacturers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:remove:old-manufacturers';

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
    public function __construct(private OldManufacturersRemover $oldManufacturersRemover)
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
        $this->oldManufacturersRemover->run();
        return 0;
    }
}
