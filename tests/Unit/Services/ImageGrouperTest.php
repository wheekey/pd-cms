<?php

namespace Tests\Unit\Services;

use App\Entities\GroupImage;
use App\Repositories\GroupImageRepository;
use Tests\TestCase;

class ImageGrouperTest extends TestCase
{
    protected GroupImageRepository $groupImageRepository;

    public function setUp(): void {
        parent::setUp();
        $this->groupImageRepository = $this->app->make(GroupImageRepository::class);
    }

    public function testCreateGrimg(){
        $groupImage = $this->groupImageRepository->create(new GroupImage());;
        self::assertNotNull($groupImage);
    }
}
