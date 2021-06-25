<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsAttribute
 *
 * @ORM\Table(name="as_attribute")
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineAsAttributeRepository")
 */
class AsAttribute
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
     * @ORM\Column(name="attribute_name", type="string", length=128, nullable=false)
     */
    private $attributeName;

    public function __construct(string $attributeName)
    {
        $this->setAttributeName($attributeName);
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
     * Set attributeName.
     *
     * @param string|null $attributeName
     *
     * @return AsAttribute
     */
    public function setAttributeName($attributeName = null)
    {
        $this->attributeName = $attributeName;

        return $this;
    }

    /**
     * Get attributeName.
     *
     * @return string|null
     */
    public function getAttributeName()
    {
        return $this->attributeName;
    }


}
