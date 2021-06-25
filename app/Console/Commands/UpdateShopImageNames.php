<?php

namespace App\Console\Commands;

use App\Services\ShopImageNamesUpdater;
use Illuminate\Console\Command;

class UpdateShopImageNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:update-shop-image-names';

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
    public function __construct(private ShopImageNamesUpdater $shopImageNamesUpdater)
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
        $this->shopImageNamesUpdater->run();
        return 0;
    }
}
