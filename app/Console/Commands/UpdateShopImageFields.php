<?php

namespace App\Console\Commands;

use App\Services\ShopImageFieldsUpdater;
use Illuminate\Console\Command;

class UpdateShopImageFields extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:update-shop-image-fields';

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
    public function __construct(private ShopImageFieldsUpdater $shopImageFieldsUpdater)
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
        $this->shopImageFieldsUpdater->update();
        return 0;
    }
}
