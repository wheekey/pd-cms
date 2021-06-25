<?php

namespace App\Console\Commands;

use App\Services\SuppliersUpdater;
use Illuminate\Console\Command;

class UpdateSuppliers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:update-suppliers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command updates suppliers in the supplier table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private SuppliersUpdater $suppliersUpdater)
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
        $this->suppliersUpdater->run();

        return 1;
    }
}
