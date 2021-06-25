<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entities\ShopImage;

/**
 * GroupImage
 *
 * @ORM\Table(name="group_image")
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineGroupImageRepository")
 */
class GroupImage
{

    public $resource;

    /**
     * @var int
     *
     * @ORM\Column(name="grimg", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\ShopImage", mappedBy="groupImage")
     */
    private $shopImages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\GroupProduct", mappedBy="groupImage")
     */
    private Collection $groupProducts;

    public function __construct()
    {
        $this->shopImages = new ArrayCollection();
        $this->groupProducts = new ArrayCollection();
    }

    public function toArray(): array
    {
        $result = ['groupImageInfo' => ['id' => $this->getId()]];

        /* @var $groupProduct GroupProduct*/
        foreach ($this->getGroupProducts()->toArray() As $groupProduct){
            $result['subGroups'][$groupProduct->getId()]['groupProductInfo'] = ['id' => $groupProduct->getId()];

            /* @var $shopImage ShopImage */
            foreach ($groupProduct->getShopImages()->toArray() As $shopImage){
                $result['subGroups'][$groupProduct->getId()]['groupProductShopImages'][] = $shopImage->toArray();
            }
        }

        return $result;
    }

    /**
     * Get grimg.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection
     */
    public function getShopImages(): Collection
    {
        return $this->shopImages;
    }

    /**
     * @param Collection $shopImages
     */
    public function setShopImages(Collection $shopImages): void
    {
        $this->shopImages = $shopImages;
    }

    /**
     * @return Collection
     */
    public function getGroupProducts(): Collection
    {
        return $this->groupProducts;
    }

    /**
     * @param Collection $groupProducts
     */
    public function setGroupProducts(Collection $groupProducts): void
    {
        $this->groupProducts = $groupProducts;
    }
}
