<?php

namespace App\Console\Commands;

use App\Services\CategoriesUpdater;
use Illuminate\Console\Command;

class UpdateCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:update-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command updates categories in the categories table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private CategoriesUpdater $categoriesUpdater)
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
        $this->categoriesUpdater->run();

        return 1;
    }
}
