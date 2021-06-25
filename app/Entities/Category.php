<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category", indexes={@ORM\Index(name="attribute_set_id", columns={"attribute_set_id"}), @ORM\Index(name="attribute_set_name", columns={"attribute_set_name"})})
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineCategoryRepository")
 */
class Category
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
     * @var string|null
     *
     * @ORM\Column(name="attribute_set_name", type="string", length=128, nullable=true)
     */
    private $attributeSetName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="attribute_set_id", type="integer", nullable=true)
     */
    private $attributeSetId;

    /**
     * Category constructor.
     * @param string|null $attributeSetName
     * @param int|null $attributeSetId
     */
    public function __construct(?string $attributeSetName, ?int $attributeSetId)
    {
        $this->attributeSetName = $attributeSetName;
        $this->attributeSetId = $attributeSetId;
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
     * Set attributeSetName.
     *
     * @param string|null $attributeSetName
     *
     * @return Category
     */
    public function setAttributeSetName($attributeSetName = null)
    {
        $this->attributeSetName = $attributeSetName;

        return $this;
    }

    /**
     * Get attributeSetName.
     *
     * @return string|null
     */
    public function getAttributeSetName()
    {
        return $this->attributeSetName;
    }

    /**
     * Set attributeSetId.
     *
     * @param int|null $attributeSetId
     *
     * @return Category
     */
    public function setAttributeSetId($attributeSetId = null)
    {
        $this->attributeSetId = $attributeSetId;

        return $this;
    }

    /**
     * Get attributeSetId.
     *
     * @return int|null
     */
    public function getAttributeSetId()
    {
        return $this->attributeSetId;
    }
}
