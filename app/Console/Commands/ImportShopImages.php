<?php

namespace App\Console\Commands;

use App\Services\ShopImagesImporter;
use Illuminate\Console\Command;

class ImportShopImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:import-shop-images';

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
    public function __construct(private ShopImagesImporter $shopImagesImporter)
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
        $this->shopImagesImporter->run();
        return 0;
    }
}
