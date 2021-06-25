<?php

namespace App\Providers;

use App\Entities\AsAttribute;
use App\Entities\AsAttributeOption;
use App\Entities\AsProductOptionRelation;
use App\Entities\Category;
use App\Entities\CategorySetter\ProductCategoryRelation;
use App\Entities\GroupImage;
use App\Entities\GroupProduct;
use App\Entities\Manufacturer;
use App\Entities\ShopImage;
use App\Entities\Supplier;
use App\Entities\User;
use App\Repositories\AsAttributeOptionRepository;
use App\Repositories\AsAttributeRepository;
use App\Repositories\AsProductOptionRelationRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CategorySetter\DoctrineProductCategoryRelationRepository;
use App\Repositories\CategorySetter\ProductCategoryRelationRepository;
use App\Repositories\DoctrineAsAttributeOptionRepository;
use App\Repositories\DoctrineAsAttributeRepository;
use App\Repositories\DoctrineAsProductOptionRelationRepository;
use App\Repositories\DoctrineCategoryRepository;
use App\Repositories\DoctrineGroupImageRepository;
use App\Repositories\DoctrineGroupProductRepository;
use App\Repositories\DoctrineManufacturerRepository;
use App\Repositories\DoctrineShopImageRepository;
use App\Repositories\DoctrineSupplierRepository;
use App\Repositories\DoctrineUserRepository;
use App\Repositories\GroupImageRepository;
use App\Repositories\GroupProductRepository;
use App\Repositories\MagentoStorage;
use App\Repositories\MagentoStoragePdo;
use App\Repositories\ManufacturerRepository;
use App\Repositories\ShopImageRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CategoryRepository::class, function($app) {
            return new DoctrineCategoryRepository(
                $app['em'],
                $app['em']->getClassMetaData(Category::class)
            );
        });

        $this->app->bind(ManufacturerRepository::class, function($app) {
            return new DoctrineManufacturerRepository(
                $app['em'],
                $app['em']->getClassMetaData(Manufacturer::class)
            );
        });

        $this->app->bind(GroupImageRepository::class, function($app) {
            return new DoctrineGroupImageRepository(
                $app['em'],
                $app['em']->getClassMetaData(GroupImage::class)
            );
        });

        $this->app->bind(GroupProductRepository::class, function($app) {
            return new DoctrineGroupProductRepository(
                $app['em'],
                $app['em']->getClassMetaData(GroupProduct::class)
            );
        });

        $this->app->bind(SupplierRepository::class, function($app) {
            return new DoctrineSupplierRepository(
                $app['em'],
                $app['em']->getClassMetaData(Supplier::class)
            );
        });

        $this->app->bind(ShopImageRepository::class, function($app) {
            return new DoctrineShopImageRepository(
                $app['em'],
                $app['em']->getClassMetaData(ShopImage::class)
            );
        });

        $this->app->bind(AsAttributeOptionRepository::class, function($app) {
            return new DoctrineAsAttributeOptionRepository(
                $app['em'],
                $app['em']->getClassMetaData(AsAttributeOption::class)
            );
        });

        $this->app->bind(AsAttributeRepository::class, function($app) {
            return new DoctrineAsAttributeRepository(
                $app['em'],
                $app['em']->getClassMetaData(AsAttribute::class)
            );
        });

        $this->app->bind(AsProductOptionRelationRepository::class, function($app) {
            return new DoctrineAsProductOptionRelationRepository(
                $app['em'],
                $app['em']->getClassMetaData(AsProductOptionRelation::class)
            );
        });

        $this->app->bind(ProductCategoryRelationRepository::class, function($app) {
            return new DoctrineProductCategoryRelationRepository(
                $app['em'],
                $app['em']->getClassMetaData(ProductCategoryRelation::class)
            );
        });

        $this->app->bind(UserRepository::class, function($app) {
            return new DoctrineUserRepository(
                $app['em'],
                $app['em']->getClassMetaData(User::class)
            );
        });

        $this->app->bind(
            MagentoStorage::class,
            MagentoStoragePdo::class
        );
    }
}
