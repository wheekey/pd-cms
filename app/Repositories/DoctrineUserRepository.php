<?php

namespace App\Repositories;


use App\Common\UserData;
use App\Entities\User;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Facades\EntityManager;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    private $tableName = "users";

    public function update(UserData $userData)
    {
        /**
         * @var $user User
         */
        $user = $this->getEntityManager()->findOneBy(["id" => $userData->id]);

        $user->setName($userData->name);
        $user->setEmail($userData->email);
        $user->setPassword(bcrypt($userData->password));

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function create(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}
