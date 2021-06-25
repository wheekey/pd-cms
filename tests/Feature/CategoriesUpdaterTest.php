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
use Illuminate\Foundation\Testing\RefreshDatabase;
use Psr\Log\LoggerInterface;
use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;

class CategoriesUpdaterTest extends TestCase
{

    protected CategoryRepository $categoryRepository;

    public function setUp(): void {
        parent::setUp();
        $this->categoryRepository = $this->app->make(CategoryRepository::class);
    }

    public function test_success_creates_new_cat(): void
    {
        $mageStorageDouble = Mockery::mock(MagentoStorage::class);
        $loggerDouble = Mockery::mock(LoggerInterface::class)->shouldIgnoreMissing();
        $mageStorageDouble
            ->shouldReceive('getCategories')
            ->andReturn([
                [
                          'attribute_set_id' => '1',
                          'attribute_set_name' => 'New Category Name'
                ]
                        ]);

        $sut = new CategoriesUpdater($mageStorageDouble, $this->categoryRepository, $loggerDouble);
        $sut->run();
    }

    public function test_success_updates_cat(): void
    {
        $mageStorageDouble = Mockery::mock(MagentoStorage::class);
        $loggerDouble = Mockery::mock(LoggerInterface::class)->shouldIgnoreMissing();
        $mageStorageDouble
            ->shouldReceive('getCategories')
            ->andReturn([
                            [
                                'attribute_set_id' => '969',
                                'attribute_set_name' => 'Updated Category Name'
                            ]
                        ]);

        $sut = new CategoriesUpdater($mageStorageDouble, $this->categoryRepository, $loggerDouble);
        $sut->run();
        $this->assertEquals($this->categoryRepository->findOneBy(['id' => 1])->getAttributeSetName(), 'Updated Category Name');
    }


}
