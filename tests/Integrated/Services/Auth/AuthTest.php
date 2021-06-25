<?php
declare(strict_types = 1);

namespace Tests\Integrated\Services\Auth;

use App\Entities\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    protected UserRepository $userRepository;

    public function setUp(): void {
        parent::setUp();
        $this->userRepository = $this->app->make(UserRepository::class);
    }

    public function testRegister(): void
    {
        $this->transaction();
        $userName = 'user_test';
        $this->userRepository->create(new User($userName, 'user_test@example.com', bcrypt('123')));
        $user = $this->userRepository->findOneBy(['name' => $userName]);
        self::assertNotNull($user);
        self::assertEquals($userName, $user->getName());
        $this->rollback();
    }

}
