<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsProductOptionRelation
 *
 * @ORM\Table(name="as_product_option_relation", indexes={@ORM\Index(name="product_id_index", columns={"product_id"}), @ORM\Index(name="option_id_index", columns={"option_id"})})
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineAsProductOptionRelationRepository")
 */
class AsProductOptionRelation
{

    // https://github.com/laravel-doctrine/orm/issues/450
    // Костыль для пагинации ларки
    public $resource;

    // https://github.com/laravel-doctrine/orm/issues/450
    public function toArray() {
        return ['id' => $this->id
        ];
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var AsAttributeOption
     *
     * @ORM\ManyToOne(targetEntity="AsAttributeOption")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $asAttributeOption;

    /**
     * @var ShopImage
     *
     * @ORM\ManyToOne(targetEntity="ShopImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $shopImage;


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
     *
     * @param AsAttributeOption|null $asAttributeOption
     *
     * @return AsProductOptionRelation
     */
    public function setAsAttributeOption(AsAttributeOption $asAttributeOption = null)
    {
        $this->asAttributeOption = $asAttributeOption;
        return $this;
    }

    /**
     *
     * @return AsAttributeOption|null
     */
    public function getAsAttributeOption()
    {
        return $this->asAttributeOption;
    }

    /**
     *
     * @param ShopImage|null $shopImage
     *
     * @return AsProductOptionRelation
     */
    public function setShopImage(ShopImage $shopImage = null)
    {
        $this->shopImage = $shopImage;
        return $this;
    }

    /**
     *
     * @return ShopImage|null
     */
    public function getShopImage()
    {
        return $this->shopImage;
    }

}
