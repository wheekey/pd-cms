<?php

namespace App\Console\Commands;

use App\Repositories\SupplierRepository;
use App\Services\ImageGrouper;
use Faker\Provider\Image;
use Illuminate\Console\Command;

class GroupImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:group-images {days} {supplier?}';

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
    public function __construct(private ImageGrouper $imageGrouper,
    private SupplierRepository $supplierRepository)
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
        if ($this->argument('supplier') !== null) {
            $this->imageGrouper->group($this->supplierRepository->findOneBy(['postavshikValue' => $this->argument('supplier')]));
        } else {
            $this->imageGrouper->groupAll($this->argument('days'));
        }

        return 0;
    }
}
