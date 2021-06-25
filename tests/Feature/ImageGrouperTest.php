<?php

namespace Tests\Feature;

use App\Entities\GroupImage;

use App\Entities\User;
use App\Repositories\GroupImageRepository;

use App\Repositories\ShopImageRepository;
use App\Repositories\UserRepository;
use App\Services\ImageGrouper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageGrouperTest extends TestCase
{

    protected ImageGrouper $imageGrouper;
    protected UserRepository $userRepository;
    protected GroupImageRepository $groupImageRepository;
    protected ShopImageRepository $shopImageRepository;

    public function setUp(): void {
        parent::setUp();
        $this->userRepository = $this->app->make(UserRepository::class);
        $this->imageGrouper = $this->app->make(ImageGrouper::class);
        $this->groupImageRepository = $this->app->make(GroupImageRepository::class);
        $this->shopImageRepository = $this->app->make(ShopImageRepository::class);
    }

    public function test_success_grouping(): void
    {
        $this->imageGrouper->groupAll(3);
       // $this->assertNotNull($this->shopImageRepository->findBy());
        $this->assertNotNull($this->groupImageRepository->findAll());
    }
}
