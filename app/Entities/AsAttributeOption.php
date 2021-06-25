<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsAttributeOption
 *
 * @ORM\Table(name="as_attribute_option", indexes={@ORM\Index(name="attribute_id_index", columns={"attribute_id"})})
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineAsAttributeOptionRepository")
 */
class AsAttributeOption
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
     * @var AsAttribute
     *
     * @ORM\ManyToOne(targetEntity="AsAttribute")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $asAttribute;

    /**
     * @var string|null
     *
     * @ORM\Column(name="option_value", type="string", length=128, nullable=true)
     */
    private $optionValue;

    /**
     * AsAttributeOption constructor.
     * @param AsAttribute $asAttribute
     * @param string|null $optionValue
     */
    public function __construct(AsAttribute $asAttribute, ?string $optionValue)
    {
        $this->asAttribute = $asAttribute;
        $this->optionValue = $optionValue;
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
     *
     * @param AsAttribute|null $grimg
     *
     * @return AsAttributeOption
     */
    public function setAsAttribute(AsAttribute $asAttribute = null)
    {
        $this->asAttribute = $asAttribute;
        return $this;
    }

    /**
     *
     * @return AsAttribute|null
     */
    public function getAsAttribute()
    {
        return $this->asAttribute;
    }


    /**
     *
     * @param string|null $optionValue
     *
     * @return AsAttributeOption
     */
    public function setOptionValue($optionValue = null)
    {
        $this->optionValue = $optionValue;
        return $this;
    }

    /**
     *
     * @return string|null
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

}
