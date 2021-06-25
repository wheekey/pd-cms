<?php

namespace Tests\Feature;

use App\Entities\GroupImage;
use App\Entities\User;
use App\Repositories\CategoryRepository;
use App\Repositories\GroupImageRepository;
use App\Repositories\MagentoStorage;
use App\Repositories\UserRepository;
use App\Services\CategoriesUpdater;
use App\Services\ImageGrouper;
use App\Services\OldCatsRemover;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Psr\Log\LoggerInterface;
use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;

class OldCatsRemoverTest extends TestCase
{


    protected CategoryRepository $categoryRepository;

    public function setUp(): void {
        parent::setUp();
        $this->categoryRepository = $this->app->make(CategoryRepository::class);
    }

    public function test_success_delete_old_cat(): void
    {
        Artisan::call('doctrine:migrations:refresh');
        Artisan::call('db:seed');
        $mageStorageDouble = Mockery::mock(MagentoStorage::class);
        $loggerDouble = Mockery::mock(LoggerInterface::class)->shouldIgnoreMissing();
        $mageStorageDouble
            ->shouldReceive('getCatIds')
            ->andReturn(['1']);

        $sut = new OldCatsRemover($mageStorageDouble, $this->categoryRepository, $loggerDouble);
        // TODO Реализовать после того, как пойму как делать seed после каждого теста
        // $sut->run();
        // $this->assertNull( $this->categoryRepository->findOneBy(['attributeSetId' => 969]));
    }

}
