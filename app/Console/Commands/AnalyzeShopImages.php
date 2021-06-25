<?php

namespace App\Console\Commands;

use App\Services\ShopImagesAnalyzator;
use Illuminate\Console\Command;

class AnalyzeShopImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:analyze-shop-images';

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
    public function __construct(private ShopImagesAnalyzator $shopImagesAnalyzator)
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
        $this->shopImagesAnalyzator->run();
        return 0;
    }
}
