<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manufacturer
 *
 * @ORM\Table(name="manufacturer", indexes={@ORM\Index(name="man_id", columns={"id"}), @ORM\Index(name="man_name", columns={"manufacturer_name"})})
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineManufacturerRepository")
 */
class Manufacturer
{
    public $resource;

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
     * @ORM\Column(name="manufacturer_name", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="manufacturer_id", type="integer", nullable=true)
     */
    private $manufacturerId;

    /**
     * Category constructor.
     * @param string|null $name
     * @param int|null $manufacturerId
     */
    public function __construct(?string $name, ?int $manufacturerId)
    {
        $this->name = $name;
        $this->manufacturerId = $manufacturerId;
    }

    public function toArray()
    {
        return ['id' => $this->id,
            'name'=>$this->name,
            'manufacturerId' => $this->manufacturerId];
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
     * @param string|null $name
     *
     * @return Manufacturer
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set attributeSetId.
     *
     * @param int|null $manufacturerId
     *
     * @return Manufacturer
     */
    public function setManufacturerId($manufacturerId = null)
    {
        $this->manufacturerId = $manufacturerId;

        return $this;
    }

    /**
     * Get ManufacturerId.
     *
     * @return int|null
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }
}
