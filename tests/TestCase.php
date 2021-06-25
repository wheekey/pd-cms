<?php

namespace Tests;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function transaction(): void
    {
        $this->app->make(EntityManagerInterface::class)->beginTransaction();
    }

    protected function rollback(): void
    {
        $this->app->make(EntityManagerInterface::class)->rollback();
    }
}
