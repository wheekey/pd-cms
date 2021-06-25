<?php

namespace App\Console\Commands;

use App\Services\CategoriesUpdater;
use App\Services\ManufacturersUpdater;
use Illuminate\Console\Command;

class UpdateManufacturers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:update-manufacturers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command updates manufacturers in the manufacturers table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private ManufacturersUpdater $manufacturersUpdater)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->manufacturersUpdater->run();

        return 1;
    }
}
