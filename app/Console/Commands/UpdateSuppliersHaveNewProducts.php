<?php

namespace App\Console\Commands;

use App\Services\SuppliersHaveNewProductsUpdater;
use Illuminate\Console\Command;

class UpdateSuppliersHaveNewProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:update-suppliers-have-new-products';

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
    public function __construct(private SuppliersHaveNewProductsUpdater $newProductsUpdater)
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
        $this->newProductsUpdater->run();
        return 0;
    }
}
