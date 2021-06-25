<?php

namespace Tests\Feature;

use App\Entities\GroupImage;
use App\Entities\ShopImage;

use App\Entities\Supplier;
use App\Entities\User;
use App\Repositories\CategoryRepository;
use App\Repositories\GroupImageRepository;
use App\Repositories\MagentoStorage;
use App\Repositories\ShopImageRepository;

use App\Repositories\SupplierRepository;
use App\Repositories\UserRepository;
use App\Services\CategoriesUpdater;
use App\Services\ImageGrouper;
use App\Services\OldCatsRemover;
use App\Services\OldSkusRemover;
use App\Services\OldSupsRemover;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Psr\Log\LoggerInterface;
use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;

class OldSupsRemoverTest extends TestCase
{

    protected SupplierRepository $supplierRepository;

    public function setUp(): void {
        parent::setUp();
        $this->supplierRepository = $this->app->make(SupplierRepository::class);
    }

    public function test_success_delete_old_sups(): void
    {
        Artisan::call('doctrine:migrations:refresh');
        Artisan::call('db:seed');
        $mageStorageDouble = Mockery::mock(MagentoStorage::class);
        $loggerDouble = Mockery::mock(LoggerInterface::class)->shouldIgnoreMissing();
        $mageStorageDouble
            ->shouldReceive('getSupplierIds')
            ->andReturn(['1', '2']);

        $sut = new OldSupsRemover($mageStorageDouble, $this->supplierRepository, $loggerDouble);
        $sut->run();

        $this->assertNull( $this->supplierRepository->findOneBy(['postavshik' => 123]));
    }

}
