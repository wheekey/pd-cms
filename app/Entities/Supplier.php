<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplier
 *
 * @ORM\Table(name="supplier", indexes={@ORM\Index(name="supplier_postavshik_index", columns={"postavshik"})})
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineSupplierRepository")
 */
class Supplier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="postavshik", type="integer", nullable=false)
     */
    private $postavshik = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="postavshik_value", type="string", length=255, nullable=true)
     */
    private $postavshikValue;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_visible", type="boolean", nullable=true, options={"default"="1"})
     */
    private $isVisible = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="has_new_products", type="boolean", nullable=true, options={"default"="1"})
     */
    private $hasNewProducts = false;

    public function __construct(int $postavshik, string $postavshikValue, bool $isVisible, bool $hasNewProducts)
    {
        $this->setPostavshik($postavshik);
        $this->setPostavshikValue($postavshikValue);
        $this->setIsVisible($isVisible);
        $this->setHasNewProducts($hasNewProducts);
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set postavshik.
     *
     * @param int $postavshik
     *
     * @return Supplier
     */
    public function setPostavshik($postavshik)
    {
        $this->postavshik = $postavshik;

        return $this;
    }

    /**
     * Get postavshik.
     *
     * @return int
     */
    public function getPostavshik()
    {
        return $this->postavshik;
    }

    /**
     * Set postavshikValue.
     *
     * @param string|null $postavshikValue
     *
     * @return Supplier
     */
    public function setPostavshikValue($postavshikValue = null)
    {
        $this->postavshikValue = $postavshikValue;

        return $this;
    }

    /**
     * Get postavshikValue.
     *
     * @return string|null
     */
    public function getPostavshikValue()
    {
        return $this->postavshikValue;
    }

    /**
     * Set isVisible.
     *
     * @param bool|null $isVisible
     *
     * @return Supplier
     */
    public function setIsVisible($isVisible = null)
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    /**
     * Get isVisible.
     *
     * @return bool|null
     */
    public function getIsVisible()
    {
        return $this->isVisible;
    }

    /**
     * Set hasNewProducts.
     *
     * @param bool|null $hasNewProducts
     *
     * @return Supplier
     */
    public function setHasNewProducts($hasNewProducts = null)
    {
        $this->hasNewProducts = $hasNewProducts;

        return $this;
    }

    /**
     * Get hasNewProducts.
     *
     * @return bool|null
     */
    public function getHasNewProducts()
    {
        return $this->hasNewProducts;
    }
}
