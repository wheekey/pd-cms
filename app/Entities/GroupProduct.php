<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * GroupProduct
 *
 * @ORM\Table(name="group_product", indexes={@ORM\Index(name="grtov_sku", columns={"grtov_sku"}), @ORM\Index(name="grimg", columns={"grimg"}), @ORM\Index(name="updated_at_local_name", columns={"updated_at_local_name"})})
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineGroupProductRepository")
 */
class GroupProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="grtov", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="grtov_sku", type="string", length=128, nullable=true)
     */
    private $grtovSku;

    /**
     * @var string|null
     *
     * @ORM\Column(name="grtov_name", type="string", length=128, nullable=true)
     */
    private $grtovName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="grtov_name_site", type="string", length=128, nullable=true)
     */
    private $grtovNameSite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at_local_name", type="datetime", nullable=true)
     */
    private $updatedAtLocalName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at_site_name", type="datetime", nullable=true)
     */
    private $updatedAtSiteName;

    /**
     * @var GroupImage
     *
     * @ORM\ManyToOne(targetEntity="GroupImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grimg", referencedColumnName="grimg", onDelete="CASCADE")
     * })
     */
    private $groupImage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\ShopImage", mappedBy="groupProduct")
     */
    private Collection $shopImages;

    public function toArray()
    {
        return ['id' => $this->id];
    }

    /**
     * GroupProduct constructor.
     * @param string|null $grtovSku
     * @param string|null $grtovName
     * @param GroupImage $groupImage
     */
    public function __construct(?string $grtovSku, ?string $grtovName, GroupImage $groupImage)
    {
        $this->grtovSku = $grtovSku;
        $this->grtovName = $grtovName;
        $this->groupImage = $groupImage;
        $this->shopImages = new ArrayCollection();
    }

    /**
     * Get grtov.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set grtovSku.
     *
     * @param string|null $grtovSku
     *
     * @return GroupProduct
     */
    public function setGrtovSku($grtovSku = null)
    {
        $this->grtovSku = $grtovSku;

        return $this;
    }

    /**
     * Get grtovSku.
     *
     * @return string|null
     */
    public function getGrtovSku()
    {
        return $this->grtovSku;
    }

    /**
     * Set grtovNameSite.
     *
     * @param string|null $grtovNameSite
     *
     * @return GroupProduct
     */
    public function setGrtovNameSite($grtovNameSite = null)
    {
        $this->grtovNameSite = $grtovNameSite;

        return $this;
    }

    /**
     * Get grtovNameSite.
     *
     * @return string|null
     */
    public function getGrtovNameSite()
    {
        return $this->grtovNameSite;
    }

    /**
     * Set grtovName.
     *
     * @param string|null $grtovName
     *
     * @return GroupProduct
     */
    public function setGrtovName($grtovName = null)
    {
        $this->grtovName = $grtovName;

        return $this;
    }

    /**
     * Get grtovName.
     *
     * @return string|null
     */
    public function getGrtovName()
    {
        return $this->grtovName;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAtSiteName
     *
     * @return GroupProduct
     */
    public function setUpdatedAtSiteName($updatedAtSiteName)
    {
        $this->updatedAtSiteName = $updatedAtSiteName;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAtSiteName()
    {
        return $this->updatedAtSiteName;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAtLocalName
     *
     * @return GroupProduct
     */
    public function setUpdatedAtLocalName($updatedAtLocalName)
    {
        $this->updatedAtLocalName = $updatedAtLocalName;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAtLocalName()
    {
        return $this->updatedAtLocalName;
    }

    /**
     * Set grimg.
     *
     * @param GroupImage|null $groupImage
     *
     * @return GroupProduct
     */
    public function setGroupImage(GroupImage $groupImage = null)
    {
        $this->groupImage = $groupImage;

        return $this;
    }

    /**
     * Get grimg.
     *
     * @return GroupImage|null
     */
    public function getGroupImage()
    {
        return $this->groupImage;
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

}
