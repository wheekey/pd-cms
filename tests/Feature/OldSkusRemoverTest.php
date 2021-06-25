<?php

namespace Tests\Feature;

use App\Repositories\MagentoStorage;
use App\Repositories\ShopImageRepository;
use App\Services\OldSkusRemover;
use Illuminate\Support\Facades\Artisan;
use Psr\Log\LoggerInterface;
use Tests\TestCase;
use Mockery;

class OldSkusRemoverTest extends TestCase
{

    protected ShopImageRepository $shopImageRepository;

    public function setUp(): void {
        parent::setUp();
        $this->shopImageRepository = $this->app->make(ShopImageRepository::class);
    }

    public function test_success_delete_old_skus(): void
    {
        Artisan::call('doctrine:migrations:refresh');
        Artisan::call('db:seed');
        $mageStorageDouble = Mockery::mock(MagentoStorage::class);
        $loggerDouble = Mockery::mock(LoggerInterface::class)->shouldIgnoreMissing();
        $mageStorageDouble
            ->shouldReceive('getProductEntityIds')
            ->andReturn(['823611', '851409', '851408']);

        $sut = new OldSkusRemover($mageStorageDouble, $this->shopImageRepository, $loggerDouble);
        $sut->run();

        $this->assertNull( $this->shopImageRepository->findOneBy(['entityId' => 46237]));
    }

}
