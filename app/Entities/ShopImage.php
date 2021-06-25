<?php

namespace App\Entities;

use App\Entities\GroupImage;
use Doctrine\ORM\Mapping as ORM;



/**
 * ShopImage
 *
 * @ORM\Table(name="shop_image", uniqueConstraints={@ORM\UniqueConstraint(name="shop_image_artikul_uindex", columns={"artikul"})}, indexes={@ORM\Index(name="shop_image_entity_id_index", columns={"entity_id"}), @ORM\Index(name="img_tut", columns={"img_tut"}), @ORM\Index(name="k_rgb_mix", columns={"k_rgb_mix"}), @ORM\Index(name="size_tam", columns={"size_tam"}), @ORM\Index(name="shop_image_postavshik_index", columns={"postavshik"}), @ORM\Index(name="image", columns={"image"}), @ORM\Index(name="k_grey", columns={"k_grey"}), @ORM\Index(name="size_tut", columns={"size_tut"}), @ORM\Index(name="skachan", columns={"skachan"}), @ORM\Index(name="shop_image_attribute_set_id_index", columns={"attribute_set_id"})})
 * @ORM\Entity(repositoryClass="App\Repositories\DoctrineShopImageRepository")
 */
class ShopImage
{

    public function toArray() {
        return ['id' => $this->id,
            'artikul' => $this->artikul,
            'image' => "https://pd.ru/media/catalog/product/{$this->image}",
            'name' => $this->name,
            'namePricelist' => $this->namePricelist,
            'entityId' => $this->entityId,
            'groupImageId' => $this->groupImage->getId(),
            'groupProductId' => $this->groupProduct?->getId(),

        ];
    }

    /**
     *
     *  @var GroupImage|null
     *
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="GroupImage", inversedBy="shopImages")
     * @ORM\JoinColumn(name="grimg_id", referencedColumnName="grimg")
     */
    private $groupImage;

    /**
     *
     *  @var GroupProduct|null
     *
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="GroupProduct", inversedBy="shopImages")
     * @ORM\JoinColumn(name="grtov_id", referencedColumnName="grtov")
     */
    private $groupProduct;

    //https://github.com/laravel-doctrine/orm/issues/450
    // Костыль для пагинации ларки
    public $resource;

    /**
     * ShopImage constructor.
     * @param string|null $artikul
     * @param string|null $image
     * @param string|null $name
     * @param string|null $namePricelist
     * @param Category $attributeSet
     * @param string|null $imgTut
     * @param int|null $sizeX
     * @param int|null $sizeY
     * @param int|null $sizeXy
     * @param int|null $sizeTut
     * @param int|null $kGrey
     * @param int|null $kRgbMix
     * @param int|null $sizeTam
     * @param int|null $entityId
     * @param bool|null $skachan
     * @param string|null $dop
     * @param bool|null $isInStock
     * @param Supplier $postavshik
     * @param int|null $k11
     * @param int|null $k21
     * @param int|null $k31
     * @param int|null $k12
     * @param int|null $k22
     * @param int|null $k32
     * @param int|null $k13
     * @param int|null $k23
     * @param int|null $k33
     * @param int|null $k14
     * @param int|null $k24
     * @param int|null $k34
     * @param int|null $k15
     * @param int|null $k25
     * @param int|null $k35
     * @param int|null $k16
     * @param int|null $k26
     * @param int|null $k36
     * @param int|null $k17
     * @param int|null $k27
     * @param int|null $k37
     * @param int|null $k18
     * @param int|null $k28
     * @param int|null $k38
     * @param int|null $k19
     * @param int|null $k29
     * @param int|null $k39
     * @param int|null $k110
     * @param int|null $k210
     * @param int|null $k310
     * @param int|null $k111
     * @param int|null $k211
     * @param int|null $k311
     * @param int|null $k112
     * @param int|null $k212
     * @param int|null $k312
     * @param int|null $k113
     * @param int|null $k213
     * @param int|null $k313
     * @param int|null $k114
     * @param int|null $k214
     * @param int|null $k314
     * @param int|null $k115
     * @param int|null $k215
     * @param int|null $k315
     * @param int|null $k116
     * @param int|null $k216
     * @param int|null $k316
     * @param int|null $ott0
     * @param int|null $ott1
     * @param int|null $ott2
     * @param int|null $ott3
     * @param int|null $ott4
     * @param int|null $ott5
     * @param int|null $ott6
     * @param int|null $ott7
     * @param int|null $ott8
     * @param int|null $ott9
     * @param int|null $ott10
     * @param int|null $ott11
     * @param int|null $ott12
     * @param int|null $ott13
     * @param int|null $ott14
     * @param int|null $ott15
     * @param int|null $ott16
     * @param int|null $ott17
     * @param int|null $ott18
     * @param int|null $ott19
     * @param int|null $ott20
     * @param int|null $ott21
     * @param int|null $ott22
     * @param int|null $ott23
     * @param int|null $ott24
     * @param int|null $ott25
     * @param int|null $ott26
     * @param int|null $ott27
     * @param int|null $ott28
     * @param int|null $ott29
     * @param int|null $ott30
     * @param int|null $ott31
     * @param int|null $ott32
     * @param int|null $ott33
     * @param int|null $ott34
     * @param int|null $ott35
     * @param int|null $ott36
     * @param int|null $ott37
     * @param int|null $ott38
     * @param int|null $ott39
     * @param int|null $ott40
     * @param int|null $ott41
     * @param int|null $ott42
     * @param int|null $ott43
     * @param int|null $ott44
     * @param int|null $ott45
     * @param int|null $ott46
     * @param int|null $ott47
     * @param int|null $ott48
     * @param int|null $ott49
     * @param int|null $ott50
     * @param int|null $ott51
     * @param int|null $ott52
     * @param int|null $ott53
     * @param int|null $ott54
     * @param int|null $ott55
     * @param int|null $ott56
     * @param int|null $ott57
     * @param int|null $ott58
     * @param int|null $ott59
     * @param int|null $ott60
     * @param int|null $ott61
     * @param int|null $ott62
     * @param int|null $ott63
     * @param \DateTime $nameUpdatedAt
     * @param \DateTime $updatedAt
     * @param string|null $upakovka
     */
    public function __construct(
        ?Manufacturer $manufacturer,
        ?GroupImage $groupImage,
        ?GroupProduct $groupProduct,
        ?string $artikul,
        ?string $image,
        ?string $name,
        ?string $namePricelist,
        Category $attributeSet,
        ?string $imgTut,
        ?int $sizeX,
        ?int $sizeY,
        ?int $sizeXy,
        ?int $sizeTut,
        ?int $kGrey,
        ?int $kRgbMix,
        ?int $sizeTam,
        ?int $entityId,
        ?bool $skachan,
        ?string $dop,
        ?bool $isInStock,
        Supplier $postavshik,
        ?int $k11,
        ?int $k21,
        ?int $k31,
        ?int $k12,
        ?int $k22,
        ?int $k32,
        ?int $k13,
        ?int $k23,
        ?int $k33,
        ?int $k14,
        ?int $k24,
        ?int $k34,
        ?int $k15,
        ?int $k25,
        ?int $k35,
        ?int $k16,
        ?int $k26,
        ?int $k36,
        ?int $k17,
        ?int $k27,
        ?int $k37,
        ?int $k18,
        ?int $k28,
        ?int $k38,
        ?int $k19,
        ?int $k29,
        ?int $k39,
        ?int $k110,
        ?int $k210,
        ?int $k310,
        ?int $k111,
        ?int $k211,
        ?int $k311,
        ?int $k112,
        ?int $k212,
        ?int $k312,
        ?int $k113,
        ?int $k213,
        ?int $k313,
        ?int $k114,
        ?int $k214,
        ?int $k314,
        ?int $k115,
        ?int $k215,
        ?int $k315,
        ?int $k116,
        ?int $k216,
        ?int $k316,
        ?int $ott0,
        ?int $ott1,
        ?int $ott2,
        ?int $ott3,
        ?int $ott4,
        ?int $ott5,
        ?int $ott6,
        ?int $ott7,
        ?int $ott8,
        ?int $ott9,
        ?int $ott10,
        ?int $ott11,
        ?int $ott12,
        ?int $ott13,
        ?int $ott14,
        ?int $ott15,
        ?int $ott16,
        ?int $ott17,
        ?int $ott18,
        ?int $ott19,
        ?int $ott20,
        ?int $ott21,
        ?int $ott22,
        ?int $ott23,
        ?int $ott24,
        ?int $ott25,
        ?int $ott26,
        ?int $ott27,
        ?int $ott28,
        ?int $ott29,
        ?int $ott30,
        ?int $ott31,
        ?int $ott32,
        ?int $ott33,
        ?int $ott34,
        ?int $ott35,
        ?int $ott36,
        ?int $ott37,
        ?int $ott38,
        ?int $ott39,
        ?int $ott40,
        ?int $ott41,
        ?int $ott42,
        ?int $ott43,
        ?int $ott44,
        ?int $ott45,
        ?int $ott46,
        ?int $ott47,
        ?int $ott48,
        ?int $ott49,
        ?int $ott50,
        ?int $ott51,
        ?int $ott52,
        ?int $ott53,
        ?int $ott54,
        ?int $ott55,
        ?int $ott56,
        ?int $ott57,
        ?int $ott58,
        ?int $ott59,
        ?int $ott60,
        ?int $ott61,
        ?int $ott62,
        ?int $ott63,
        ?string $upakovka
    ) {
        $this->manufacturer = $manufacturer;
        $this->groupImage = $groupImage;
        $this->groupProduct = $groupProduct;
        $this->artikul = $artikul;
        $this->image = $image;
        $this->name = $name;
        $this->namePricelist = $namePricelist;
        $this->attributeSet = $attributeSet;
        $this->imgTut = $imgTut;
        $this->sizeX = $sizeX;
        $this->sizeY = $sizeY;
        $this->sizeXy = $sizeXy;
        $this->sizeTut = $sizeTut;
        $this->kGrey = $kGrey;
        $this->kRgbMix = $kRgbMix;
        $this->sizeTam = $sizeTam;
        $this->entityId = $entityId;
        $this->skachan = $skachan;
        $this->dop = $dop;
        $this->isInStock = $isInStock;
        $this->postavshik = $postavshik;
        $this->k11 = $k11;
        $this->k21 = $k21;
        $this->k31 = $k31;
        $this->k12 = $k12;
        $this->k22 = $k22;
        $this->k32 = $k32;
        $this->k13 = $k13;
        $this->k23 = $k23;
        $this->k33 = $k33;
        $this->k14 = $k14;
        $this->k24 = $k24;
        $this->k34 = $k34;
        $this->k15 = $k15;
        $this->k25 = $k25;
        $this->k35 = $k35;
        $this->k16 = $k16;
        $this->k26 = $k26;
        $this->k36 = $k36;
        $this->k17 = $k17;
        $this->k27 = $k27;
        $this->k37 = $k37;
        $this->k18 = $k18;
        $this->k28 = $k28;
        $this->k38 = $k38;
        $this->k19 = $k19;
        $this->k29 = $k29;
        $this->k39 = $k39;
        $this->k110 = $k110;
        $this->k210 = $k210;
        $this->k310 = $k310;
        $this->k111 = $k111;
        $this->k211 = $k211;
        $this->k311 = $k311;
        $this->k112 = $k112;
        $this->k212 = $k212;
        $this->k312 = $k312;
        $this->k113 = $k113;
        $this->k213 = $k213;
        $this->k313 = $k313;
        $this->k114 = $k114;
        $this->k214 = $k214;
        $this->k314 = $k314;
        $this->k115 = $k115;
        $this->k215 = $k215;
        $this->k315 = $k315;
        $this->k116 = $k116;
        $this->k216 = $k216;
        $this->k316 = $k316;
        $this->ott0 = $ott0;
        $this->ott1 = $ott1;
        $this->ott2 = $ott2;
        $this->ott3 = $ott3;
        $this->ott4 = $ott4;
        $this->ott5 = $ott5;
        $this->ott6 = $ott6;
        $this->ott7 = $ott7;
        $this->ott8 = $ott8;
        $this->ott9 = $ott9;
        $this->ott10 = $ott10;
        $this->ott11 = $ott11;
        $this->ott12 = $ott12;
        $this->ott13 = $ott13;
        $this->ott14 = $ott14;
        $this->ott15 = $ott15;
        $this->ott16 = $ott16;
        $this->ott17 = $ott17;
        $this->ott18 = $ott18;
        $this->ott19 = $ott19;
        $this->ott20 = $ott20;
        $this->ott21 = $ott21;
        $this->ott22 = $ott22;
        $this->ott23 = $ott23;
        $this->ott24 = $ott24;
        $this->ott25 = $ott25;
        $this->ott26 = $ott26;
        $this->ott27 = $ott27;
        $this->ott28 = $ott28;
        $this->ott29 = $ott29;
        $this->ott30 = $ott30;
        $this->ott31 = $ott31;
        $this->ott32 = $ott32;
        $this->ott33 = $ott33;
        $this->ott34 = $ott34;
        $this->ott35 = $ott35;
        $this->ott36 = $ott36;
        $this->ott37 = $ott37;
        $this->ott38 = $ott38;
        $this->ott39 = $ott39;
        $this->ott40 = $ott40;
        $this->ott41 = $ott41;
        $this->ott42 = $ott42;
        $this->ott43 = $ott43;
        $this->ott44 = $ott44;
        $this->ott45 = $ott45;
        $this->ott46 = $ott46;
        $this->ott47 = $ott47;
        $this->ott48 = $ott48;
        $this->ott49 = $ott49;
        $this->ott50 = $ott50;
        $this->ott51 = $ott51;
        $this->ott52 = $ott52;
        $this->ott53 = $ott53;
        $this->ott54 = $ott54;
        $this->ott55 = $ott55;
        $this->ott56 = $ott56;
        $this->ott57 = $ott57;
        $this->ott58 = $ott58;
        $this->ott59 = $ott59;
        $this->ott60 = $ott60;
        $this->ott61 = $ott61;
        $this->ott62 = $ott62;
        $this->ott63 = $ott63;

        $this->upakovka = $upakovka;

        $this->updatedAt = new \DateTime();
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
     * @var string|null
     *
     * @ORM\Column(name="artikul", type="string", length=128, nullable=true, options={"fixed"=true})
     */
    private $artikul;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="text", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="new_name", type="text", length=255, nullable=true)
     */
    private $newName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_pricelist", type="string", length=255, nullable=true)
     */
    private $namePricelist;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_set_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $attributeSet;

    /**
     * @var Manufacturer
     *
     * @ORM\ManyToOne(targetEntity="Manufacturer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $manufacturer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_tut", type="string", length=32, nullable=true)
     */
    private $imgTut;

    /**
     * @var int|null
     *
     * @ORM\Column(name="size_x", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $sizeX;

    /**
     * @var int|null
     *
     * @ORM\Column(name="size_y", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $sizeY;

    /**
     * @var int|null
     *
     * @ORM\Column(name="size_xy", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $sizeXy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="size_tut", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $sizeTut;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_grey", type="integer", nullable=true)
     */
    private $kGrey;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_rgb_mix", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $kRgbMix;

    /**
     * @var int|null
     *
     * @ORM\Column(name="size_tam", type="integer", nullable=true)
     */
    private $sizeTam;

    /**
     * @var int|null
     *
     * @ORM\Column(name="entity_id", type="integer", nullable=true)
     */
    private $entityId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="skachan", type="boolean", nullable=true)
     */
    private $skachan;

    /**
     * @var bool
     *
     * @ORM\Column(name="not_fit", type="boolean", nullable=false)
     */
    private $notFit=false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dop", type="string", length=32, nullable=true)
     */
    private $dop;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_in_stock", type="boolean", nullable=true)
     */
    private $isInStock;

    /**
     * @var Supplier
     *
     * @ORM\ManyToOne(targetEntity="Supplier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="postavshik", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $postavshik;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_1", type="integer", nullable=true)
     */
    private $k11;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_1", type="integer", nullable=true)
     */
    private $k21;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_1", type="integer", nullable=true)
     */
    private $k31;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_2", type="integer", nullable=true)
     */
    private $k12;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_2", type="integer", nullable=true)
     */
    private $k22;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_2", type="integer", nullable=true)
     */
    private $k32;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_3", type="integer", nullable=true)
     */
    private $k13;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_3", type="integer", nullable=true)
     */
    private $k23;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_3", type="integer", nullable=true)
     */
    private $k33;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_4", type="integer", nullable=true)
     */
    private $k14;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_4", type="integer", nullable=true)
     */
    private $k24;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_4", type="integer", nullable=true)
     */
    private $k34;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_5", type="integer", nullable=true)
     */
    private $k15;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_5", type="integer", nullable=true)
     */
    private $k25;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_5", type="integer", nullable=true)
     */
    private $k35;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_6", type="integer", nullable=true)
     */
    private $k16;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_6", type="integer", nullable=true)
     */
    private $k26;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_6", type="integer", nullable=true)
     */
    private $k36;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_7", type="integer", nullable=true)
     */
    private $k17;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_7", type="integer", nullable=true)
     */
    private $k27;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_7", type="integer", nullable=true)
     */
    private $k37;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_8", type="integer", nullable=true)
     */
    private $k18;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_8", type="integer", nullable=true)
     */
    private $k28;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_8", type="integer", nullable=true)
     */
    private $k38;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_9", type="integer", nullable=true)
     */
    private $k19;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_9", type="integer", nullable=true)
     */
    private $k29;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_9", type="integer", nullable=true)
     */
    private $k39;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_10", type="integer", nullable=true)
     */
    private $k110;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_10", type="integer", nullable=true)
     */
    private $k210;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_10", type="integer", nullable=true)
     */
    private $k310;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_11", type="integer", nullable=true)
     */
    private $k111;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_11", type="integer", nullable=true)
     */
    private $k211;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_11", type="integer", nullable=true)
     */
    private $k311;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_12", type="integer", nullable=true)
     */
    private $k112;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_12", type="integer", nullable=true)
     */
    private $k212;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_12", type="integer", nullable=true)
     */
    private $k312;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_13", type="integer", nullable=true)
     */
    private $k113;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_13", type="integer", nullable=true)
     */
    private $k213;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_13", type="integer", nullable=true)
     */
    private $k313;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_14", type="integer", nullable=true)
     */
    private $k114;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_14", type="integer", nullable=true)
     */
    private $k214;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_14", type="integer", nullable=true)
     */
    private $k314;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_15", type="integer", nullable=true)
     */
    private $k115;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_15", type="integer", nullable=true)
     */
    private $k215;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_15", type="integer", nullable=true)
     */
    private $k315;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_1_16", type="integer", nullable=true)
     */
    private $k116;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_2_16", type="integer", nullable=true)
     */
    private $k216;

    /**
     * @var int|null
     *
     * @ORM\Column(name="k_3_16", type="integer", nullable=true)
     */
    private $k316;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_0", type="integer", nullable=true)
     */
    private $ott0;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_1", type="integer", nullable=true)
     */
    private $ott1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_2", type="integer", nullable=true)
     */
    private $ott2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_3", type="integer", nullable=true)
     */
    private $ott3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_4", type="integer", nullable=true)
     */
    private $ott4;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_5", type="integer", nullable=true)
     */
    private $ott5;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_6", type="integer", nullable=true)
     */
    private $ott6;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_7", type="integer", nullable=true)
     */
    private $ott7;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_8", type="integer", nullable=true)
     */
    private $ott8;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_9", type="integer", nullable=true)
     */
    private $ott9;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_10", type="integer", nullable=true)
     */
    private $ott10;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_11", type="integer", nullable=true)
     */
    private $ott11;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_12", type="integer", nullable=true)
     */
    private $ott12;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_13", type="integer", nullable=true)
     */
    private $ott13;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_14", type="integer", nullable=true)
     */
    private $ott14;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_15", type="integer", nullable=true)
     */
    private $ott15;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_16", type="integer", nullable=true)
     */
    private $ott16;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_17", type="integer", nullable=true)
     */
    private $ott17;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_18", type="integer", nullable=true)
     */
    private $ott18;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_19", type="integer", nullable=true)
     */
    private $ott19;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_20", type="integer", nullable=true)
     */
    private $ott20;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_21", type="integer", nullable=true)
     */
    private $ott21;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_22", type="integer", nullable=true)
     */
    private $ott22;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_23", type="integer", nullable=true)
     */
    private $ott23;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_24", type="integer", nullable=true)
     */
    private $ott24;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_25", type="integer", nullable=true)
     */
    private $ott25;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_26", type="integer", nullable=true)
     */
    private $ott26;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_27", type="integer", nullable=true)
     */
    private $ott27;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_28", type="integer", nullable=true)
     */
    private $ott28;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_29", type="integer", nullable=true)
     */
    private $ott29;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_30", type="integer", nullable=true)
     */
    private $ott30;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_31", type="integer", nullable=true)
     */
    private $ott31;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_32", type="integer", nullable=true)
     */
    private $ott32;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_33", type="integer", nullable=true)
     */
    private $ott33;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_34", type="integer", nullable=true)
     */
    private $ott34;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_35", type="integer", nullable=true)
     */
    private $ott35;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_36", type="integer", nullable=true)
     */
    private $ott36;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_37", type="integer", nullable=true)
     */
    private $ott37;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_38", type="integer", nullable=true)
     */
    private $ott38;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_39", type="integer", nullable=true)
     */
    private $ott39;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_40", type="integer", nullable=true)
     */
    private $ott40;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_41", type="integer", nullable=true)
     */
    private $ott41;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_42", type="integer", nullable=true)
     */
    private $ott42;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_43", type="integer", nullable=true)
     */
    private $ott43;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_44", type="integer", nullable=true)
     */
    private $ott44;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_45", type="integer", nullable=true)
     */
    private $ott45;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_46", type="integer", nullable=true)
     */
    private $ott46;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_47", type="integer", nullable=true)
     */
    private $ott47;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_48", type="integer", nullable=true)
     */
    private $ott48;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_49", type="integer", nullable=true)
     */
    private $ott49;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_50", type="integer", nullable=true)
     */
    private $ott50;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_51", type="integer", nullable=true)
     */
    private $ott51;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_52", type="integer", nullable=true)
     */
    private $ott52;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_53", type="integer", nullable=true)
     */
    private $ott53;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_54", type="integer", nullable=true)
     */
    private $ott54;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_55", type="integer", nullable=true)
     */
    private $ott55;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_56", type="integer", nullable=true)
     */
    private $ott56;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_57", type="integer", nullable=true)
     */
    private $ott57;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_58", type="integer", nullable=true)
     */
    private $ott58;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_59", type="integer", nullable=true)
     */
    private $ott59;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_60", type="integer", nullable=true)
     */
    private $ott60;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_61", type="integer", nullable=true)
     */
    private $ott61;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_62", type="integer", nullable=true)
     */
    private $ott62;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ott_63", type="integer", nullable=true)
     */
    private $ott63;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="name_updated_at", type="datetime", nullable=true)
     */
    private $nameUpdatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"}, columnDefinition="DATETIME on update CURRENT_TIMESTAMP")
     */
    private $updatedAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="upakovka", type="string", length=100, nullable=true)
     */
    private $upakovka = '';



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
     * Set artikul.
     *
     * @param string|null $artikul
     *
     * @return ShopImage
     */
    public function setArtikul($artikul = null)
    {
        $this->artikul = $artikul;

        return $this;
    }

    /**
     * Get artikul.
     *
     * @return string|null
     */
    public function getArtikul()
    {
        return $this->artikul;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return ShopImage
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $ShopImageRow
     * @return mixed
     */
    public function isImageDownloaded(): bool
    {
        if (!isset($this->imgTut)) {
            return false;
        }

        return $this->imgTut;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return ShopImage
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set namePricelist.
     *
     * @param string|null $namePricelist
     *
     * @return ShopImage
     */
    public function setNamePricelist($namePricelist = null)
    {
        $this->namePricelist = $namePricelist;

        return $this;
    }

    /**
     * Get namePricelist.
     *
     * @return string|null
     */
    public function getNamePricelist()
    {
        return $this->namePricelist;
    }

    /**
     * Set imgTut.
     *
     * @param string|null $imgTut
     *
     * @return ShopImage
     */
    public function setImgTut($imgTut = null)
    {
        $this->imgTut = $imgTut;

        return $this;
    }

    /**
     * Get imgTut.
     *
     * @return string|null
     */
    public function getImgTut()
    {
        return $this->imgTut;
    }

    /**
     * Set sizeX.
     *
     * @param int|null $sizeX
     *
     * @return ShopImage
     */
    public function setSizeX($sizeX = null)
    {
        $this->sizeX = $sizeX;

        return $this;
    }

    /**
     * Get sizeX.
     *
     * @return int|null
     */
    public function getSizeX()
    {
        return $this->sizeX;
    }

    /**
     * Set sizeY.
     *
     * @param int|null $sizeY
     *
     * @return ShopImage
     */
    public function setSizeY($sizeY = null)
    {
        $this->sizeY = $sizeY;

        return $this;
    }

    /**
     * Get sizeY.
     *
     * @return int|null
     */
    public function getSizeY()
    {
        return $this->sizeY;
    }

    /**
     * Set sizeXy.
     *
     * @param int|null $sizeXy
     *
     * @return ShopImage
     */
    public function setSizeXy($sizeXy = null)
    {
        $this->sizeXy = $sizeXy;

        return $this;
    }

    /**
     * Get sizeXy.
     *
     * @return int|null
     */
    public function getSizeXy()
    {
        return $this->sizeXy;
    }

    /**
     * Set entityId.
     *
     * @param int|null $entityId
     *
     * @return ShopImage
     */
    public function setEntityId($entityId = null)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId.
     *
     * @return int|null
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * Set sizeTut.
     *
     * @param int|null $sizeTut
     *
     * @return ShopImage
     */
    public function setSizeTut($sizeTut = null)
    {
        $this->sizeTut = $sizeTut;

        return $this;
    }

    /**
     * Get sizeTut.
     *
     * @return int|null
     */
    public function getSizeTut()
    {
        return $this->sizeTut;
    }

    /**
     * Set kGrey.
     *
     * @param int|null $kGrey
     *
     * @return ShopImage
     */
    public function setKGrey($kGrey = null)
    {
        $this->kGrey = $kGrey;

        return $this;
    }

    /**
     * Get kGrey.
     *
     * @return int|null
     */
    public function getKGrey()
    {
        return $this->kGrey;
    }

    /**
     * Set kRgbMix.
     *
     * @param int|null $kRgbMix
     *
     * @return ShopImage
     */
    public function setKRgbMix($kRgbMix = null)
    {
        $this->kRgbMix = $kRgbMix;

        return $this;
    }

    /**
     * Get kRgbMix.
     *
     * @return int|null
     */
    public function getKRgbMix()
    {
        return $this->kRgbMix;
    }

    /**
     * Set sizeTam.
     *
     * @param int|null $sizeTam
     *
     * @return ShopImage
     */
    public function setSizeTam($sizeTam = null)
    {
        $this->sizeTam = $sizeTam;

        return $this;
    }

    /**
     * Get sizeTam.
     *
     * @return int|null
     */
    public function getSizeTam()
    {
        return $this->sizeTam;
    }

    /**
     * Set skachan.
     *
     * @param bool|null $skachan
     *
     * @return ShopImage
     */
    public function setSkachan($skachan = null)
    {
        $this->skachan = $skachan;

        return $this;
    }

    /**
     * Get skachan.
     *
     * @return bool|null
     */
    public function getSkachan()
    {
        return $this->skachan;
    }

    /**
     * Set dop.
     *
     * @param string|null $dop
     *
     * @return ShopImage
     */
    public function setDop($dop = null)
    {
        $this->dop = $dop;

        return $this;
    }

    /**
     * Get dop.
     *
     * @return string|null
     */
    public function getDop()
    {
        return $this->dop;
    }

    /**
     * Set isInStock.
     *
     * @param bool|null $isInStock
     *
     * @return ShopImage
     */
    public function setIsInStock($isInStock = null)
    {
        $this->isInStock = $isInStock;

        return $this;
    }

    /**
     * Get isInStock.
     *
     * @return bool|null
     */
    public function getIsInStock()
    {
        return $this->isInStock;
    }

    /**
     * Set k11.
     *
     * @param int|null $k11
     *
     * @return ShopImage
     */
    public function setK11($k11 = null)
    {
        $this->k11 = $k11;

        return $this;
    }

    /**
     * Get k11.
     *
     * @return int|null
     */
    public function getK11()
    {
        return $this->k11;
    }

    /**
     * Set k21.
     *
     * @param int|null $k21
     *
     * @return ShopImage
     */
    public function setK21($k21 = null)
    {
        $this->k21 = $k21;

        return $this;
    }

    /**
     * Get k21.
     *
     * @return int|null
     */
    public function getK21()
    {
        return $this->k21;
    }

    /**
     * Set k31.
     *
     * @param int|null $k31
     *
     * @return ShopImage
     */
    public function setK31($k31 = null)
    {
        $this->k31 = $k31;

        return $this;
    }

    /**
     * Get k31.
     *
     * @return int|null
     */
    public function getK31()
    {
        return $this->k31;
    }

    /**
     * Set k12.
     *
     * @param int|null $k12
     *
     * @return ShopImage
     */
    public function setK12($k12 = null)
    {
        $this->k12 = $k12;

        return $this;
    }

    /**
     * Get k12.
     *
     * @return int|null
     */
    public function getK12()
    {
        return $this->k12;
    }

    /**
     * Set k22.
     *
     * @param int|null $k22
     *
     * @return ShopImage
     */
    public function setK22($k22 = null)
    {
        $this->k22 = $k22;

        return $this;
    }

    /**
     * Get k22.
     *
     * @return int|null
     */
    public function getK22()
    {
        return $this->k22;
    }

    /**
     * Set k32.
     *
     * @param int|null $k32
     *
     * @return ShopImage
     */
    public function setK32($k32 = null)
    {
        $this->k32 = $k32;

        return $this;
    }

    /**
     * Get k32.
     *
     * @return int|null
     */
    public function getK32()
    {
        return $this->k32;
    }

    /**
     * Set k13.
     *
     * @param int|null $k13
     *
     * @return ShopImage
     */
    public function setK13($k13 = null)
    {
        $this->k13 = $k13;

        return $this;
    }

    /**
     * Get k13.
     *
     * @return int|null
     */
    public function getK13()
    {
        return $this->k13;
    }

    /**
     * Set k23.
     *
     * @param int|null $k23
     *
     * @return ShopImage
     */
    public function setK23($k23 = null)
    {
        $this->k23 = $k23;

        return $this;
    }

    /**
     * Get k23.
     *
     * @return int|null
     */
    public function getK23()
    {
        return $this->k23;
    }

    /**
     * Set k33.
     *
     * @param int|null $k33
     *
     * @return ShopImage
     */
    public function setK33($k33 = null)
    {
        $this->k33 = $k33;

        return $this;
    }

    /**
     * Get k33.
     *
     * @return int|null
     */
    public function getK33()
    {
        return $this->k33;
    }

    /**
     * Set k14.
     *
     * @param int|null $k14
     *
     * @return ShopImage
     */
    public function setK14($k14 = null)
    {
        $this->k14 = $k14;

        return $this;
    }

    /**
     * Get k14.
     *
     * @return int|null
     */
    public function getK14()
    {
        return $this->k14;
    }

    /**
     * Set k24.
     *
     * @param int|null $k24
     *
     * @return ShopImage
     */
    public function setK24($k24 = null)
    {
        $this->k24 = $k24;

        return $this;
    }

    /**
     * Get k24.
     *
     * @return int|null
     */
    public function getK24()
    {
        return $this->k24;
    }

    /**
     * Set k34.
     *
     * @param int|null $k34
     *
     * @return ShopImage
     */
    public function setK34($k34 = null)
    {
        $this->k34 = $k34;

        return $this;
    }

    /**
     * Get k34.
     *
     * @return int|null
     */
    public function getK34()
    {
        return $this->k34;
    }

    /**
     * Set k15.
     *
     * @param int|null $k15
     *
     * @return ShopImage
     */
    public function setK15($k15 = null)
    {
        $this->k15 = $k15;

        return $this;
    }

    /**
     * Get k15.
     *
     * @return int|null
     */
    public function getK15()
    {
        return $this->k15;
    }

    /**
     * Set k25.
     *
     * @param int|null $k25
     *
     * @return ShopImage
     */
    public function setK25($k25 = null)
    {
        $this->k25 = $k25;

        return $this;
    }

    /**
     * Get k25.
     *
     * @return int|null
     */
    public function getK25()
    {
        return $this->k25;
    }

    /**
     * Set k35.
     *
     * @param int|null $k35
     *
     * @return ShopImage
     */
    public function setK35($k35 = null)
    {
        $this->k35 = $k35;

        return $this;
    }

    /**
     * Get k35.
     *
     * @return int|null
     */
    public function getK35()
    {
        return $this->k35;
    }

    /**
     * Set k16.
     *
     * @param int|null $k16
     *
     * @return ShopImage
     */
    public function setK16($k16 = null)
    {
        $this->k16 = $k16;

        return $this;
    }

    /**
     * Get k16.
     *
     * @return int|null
     */
    public function getK16()
    {
        return $this->k16;
    }

    /**
     * Set k26.
     *
     * @param int|null $k26
     *
     * @return ShopImage
     */
    public function setK26($k26 = null)
    {
        $this->k26 = $k26;

        return $this;
    }

    /**
     * Get k26.
     *
     * @return int|null
     */
    public function getK26()
    {
        return $this->k26;
    }

    /**
     * Set k36.
     *
     * @param int|null $k36
     *
     * @return ShopImage
     */
    public function setK36($k36 = null)
    {
        $this->k36 = $k36;

        return $this;
    }

    /**
     * Get k36.
     *
     * @return int|null
     */
    public function getK36()
    {
        return $this->k36;
    }

    /**
     * Set k17.
     *
     * @param int|null $k17
     *
     * @return ShopImage
     */
    public function setK17($k17 = null)
    {
        $this->k17 = $k17;

        return $this;
    }

    /**
     * Get k17.
     *
     * @return int|null
     */
    public function getK17()
    {
        return $this->k17;
    }

    /**
     * Set k27.
     *
     * @param int|null $k27
     *
     * @return ShopImage
     */
    public function setK27($k27 = null)
    {
        $this->k27 = $k27;

        return $this;
    }

    /**
     * Get k27.
     *
     * @return int|null
     */
    public function getK27()
    {
        return $this->k27;
    }

    /**
     * Set k37.
     *
     * @param int|null $k37
     *
     * @return ShopImage
     */
    public function setK37($k37 = null)
    {
        $this->k37 = $k37;

        return $this;
    }

    /**
     * Get k37.
     *
     * @return int|null
     */
    public function getK37()
    {
        return $this->k37;
    }

    /**
     * Set k18.
     *
     * @param int|null $k18
     *
     * @return ShopImage
     */
    public function setK18($k18 = null)
    {
        $this->k18 = $k18;

        return $this;
    }

    /**
     * Get k18.
     *
     * @return int|null
     */
    public function getK18()
    {
        return $this->k18;
    }

    /**
     * Set k28.
     *
     * @param int|null $k28
     *
     * @return ShopImage
     */
    public function setK28($k28 = null)
    {
        $this->k28 = $k28;

        return $this;
    }

    /**
     * Get k28.
     *
     * @return int|null
     */
    public function getK28()
    {
        return $this->k28;
    }

    /**
     * Set k38.
     *
     * @param int|null $k38
     *
     * @return ShopImage
     */
    public function setK38($k38 = null)
    {
        $this->k38 = $k38;

        return $this;
    }

    /**
     * Get k38.
     *
     * @return int|null
     */
    public function getK38()
    {
        return $this->k38;
    }

    /**
     * Set k19.
     *
     * @param int|null $k19
     *
     * @return ShopImage
     */
    public function setK19($k19 = null)
    {
        $this->k19 = $k19;

        return $this;
    }

    /**
     * Get k19.
     *
     * @return int|null
     */
    public function getK19()
    {
        return $this->k19;
    }

    /**
     * Set k29.
     *
     * @param int|null $k29
     *
     * @return ShopImage
     */
    public function setK29($k29 = null)
    {
        $this->k29 = $k29;

        return $this;
    }

    /**
     * Get k29.
     *
     * @return int|null
     */
    public function getK29()
    {
        return $this->k29;
    }

    /**
     * Set k39.
     *
     * @param int|null $k39
     *
     * @return ShopImage
     */
    public function setK39($k39 = null)
    {
        $this->k39 = $k39;

        return $this;
    }

    /**
     * Get k39.
     *
     * @return int|null
     */
    public function getK39()
    {
        return $this->k39;
    }

    /**
     * Set k110.
     *
     * @param int|null $k110
     *
     * @return ShopImage
     */
    public function setK110($k110 = null)
    {
        $this->k110 = $k110;

        return $this;
    }

    /**
     * Get k110.
     *
     * @return int|null
     */
    public function getK110()
    {
        return $this->k110;
    }

    /**
     * Set k210.
     *
     * @param int|null $k210
     *
     * @return ShopImage
     */
    public function setK210($k210 = null)
    {
        $this->k210 = $k210;

        return $this;
    }

    /**
     * Get k210.
     *
     * @return int|null
     */
    public function getK210()
    {
        return $this->k210;
    }

    /**
     * Set k310.
     *
     * @param int|null $k310
     *
     * @return ShopImage
     */
    public function setK310($k310 = null)
    {
        $this->k310 = $k310;

        return $this;
    }

    /**
     * Get k310.
     *
     * @return int|null
     */
    public function getK310()
    {
        return $this->k310;
    }

    /**
     * Set k111.
     *
     * @param int|null $k111
     *
     * @return ShopImage
     */
    public function setK111($k111 = null)
    {
        $this->k111 = $k111;

        return $this;
    }

    /**
     * Get k111.
     *
     * @return int|null
     */
    public function getK111()
    {
        return $this->k111;
    }

    /**
     * Set k211.
     *
     * @param int|null $k211
     *
     * @return ShopImage
     */
    public function setK211($k211 = null)
    {
        $this->k211 = $k211;

        return $this;
    }

    /**
     * Get k211.
     *
     * @return int|null
     */
    public function getK211()
    {
        return $this->k211;
    }

    /**
     * Set k311.
     *
     * @param int|null $k311
     *
     * @return ShopImage
     */
    public function setK311($k311 = null)
    {
        $this->k311 = $k311;

        return $this;
    }

    /**
     * Get k311.
     *
     * @return int|null
     */
    public function getK311()
    {
        return $this->k311;
    }

    /**
     * Set k112.
     *
     * @param int|null $k112
     *
     * @return ShopImage
     */
    public function setK112($k112 = null)
    {
        $this->k112 = $k112;

        return $this;
    }

    /**
     * Get k112.
     *
     * @return int|null
     */
    public function getK112()
    {
        return $this->k112;
    }

    /**
     * Set k212.
     *
     * @param int|null $k212
     *
     * @return ShopImage
     */
    public function setK212($k212 = null)
    {
        $this->k212 = $k212;

        return $this;
    }

    /**
     * Get k212.
     *
     * @return int|null
     */
    public function getK212()
    {
        return $this->k212;
    }

    /**
     * Set k312.
     *
     * @param int|null $k312
     *
     * @return ShopImage
     */
    public function setK312($k312 = null)
    {
        $this->k312 = $k312;

        return $this;
    }

    /**
     * Get k312.
     *
     * @return int|null
     */
    public function getK312()
    {
        return $this->k312;
    }

    /**
     * Set k113.
     *
     * @param int|null $k113
     *
     * @return ShopImage
     */
    public function setK113($k113 = null)
    {
        $this->k113 = $k113;

        return $this;
    }

    /**
     * Get k113.
     *
     * @return int|null
     */
    public function getK113()
    {
        return $this->k113;
    }

    /**
     * Set k213.
     *
     * @param int|null $k213
     *
     * @return ShopImage
     */
    public function setK213($k213 = null)
    {
        $this->k213 = $k213;

        return $this;
    }

    /**
     * Get k213.
     *
     * @return int|null
     */
    public function getK213()
    {
        return $this->k213;
    }

    /**
     * Set k313.
     *
     * @param int|null $k313
     *
     * @return ShopImage
     */
    public function setK313($k313 = null)
    {
        $this->k313 = $k313;

        return $this;
    }

    /**
     * Get k313.
     *
     * @return int|null
     */
    public function getK313()
    {
        return $this->k313;
    }

    /**
     * Set k114.
     *
     * @param int|null $k114
     *
     * @return ShopImage
     */
    public function setK114($k114 = null)
    {
        $this->k114 = $k114;

        return $this;
    }

    /**
     * Get k114.
     *
     * @return int|null
     */
    public function getK114()
    {
        return $this->k114;
    }

    /**
     * Set k214.
     *
     * @param int|null $k214
     *
     * @return ShopImage
     */
    public function setK214($k214 = null)
    {
        $this->k214 = $k214;

        return $this;
    }

    /**
     * Get k214.
     *
     * @return int|null
     */
    public function getK214()
    {
        return $this->k214;
    }

    /**
     * Set k314.
     *
     * @param int|null $k314
     *
     * @return ShopImage
     */
    public function setK314($k314 = null)
    {
        $this->k314 = $k314;

        return $this;
    }

    /**
     * Get k314.
     *
     * @return int|null
     */
    public function getK314()
    {
        return $this->k314;
    }

    /**
     * Set k115.
     *
     * @param int|null $k115
     *
     * @return ShopImage
     */
    public function setK115($k115 = null)
    {
        $this->k115 = $k115;

        return $this;
    }

    /**
     * Get k115.
     *
     * @return int|null
     */
    public function getK115()
    {
        return $this->k115;
    }

    /**
     * Set k215.
     *
     * @param int|null $k215
     *
     * @return ShopImage
     */
    public function setK215($k215 = null)
    {
        $this->k215 = $k215;

        return $this;
    }

    /**
     * Get k215.
     *
     * @return int|null
     */
    public function getK215()
    {
        return $this->k215;
    }

    /**
     * Set k315.
     *
     * @param int|null $k315
     *
     * @return ShopImage
     */
    public function setK315($k315 = null)
    {
        $this->k315 = $k315;

        return $this;
    }

    /**
     * Get k315.
     *
     * @return int|null
     */
    public function getK315()
    {
        return $this->k315;
    }

    /**
     * Set k116.
     *
     * @param int|null $k116
     *
     * @return ShopImage
     */
    public function setK116($k116 = null)
    {
        $this->k116 = $k116;

        return $this;
    }

    /**
     * Get k116.
     *
     * @return int|null
     */
    public function getK116()
    {
        return $this->k116;
    }

    /**
     * Set k216.
     *
     * @param int|null $k216
     *
     * @return ShopImage
     */
    public function setK216($k216 = null)
    {
        $this->k216 = $k216;

        return $this;
    }

    /**
     * Get k216.
     *
     * @return int|null
     */
    public function getK216()
    {
        return $this->k216;
    }

    /**
     * Set k316.
     *
     * @param int|null $k316
     *
     * @return ShopImage
     */
    public function setK316($k316 = null)
    {
        $this->k316 = $k316;

        return $this;
    }

    /**
     * Get k316.
     *
     * @return int|null
     */
    public function getK316()
    {
        return $this->k316;
    }

    /**
     * Set ott0.
     *
     * @param int|null $ott0
     *
     * @return ShopImage
     */
    public function setOtt0($ott0 = null)
    {
        $this->ott0 = $ott0;

        return $this;
    }

    /**
     * Get ott0.
     *
     * @return int|null
     */
    public function getOtt0()
    {
        return $this->ott0;
    }

    /**
     * Set ott1.
     *
     * @param int|null $ott1
     *
     * @return ShopImage
     */
    public function setOtt1($ott1 = null)
    {
        $this->ott1 = $ott1;

        return $this;
    }

    /**
     * Get ott1.
     *
     * @return int|null
     */
    public function getOtt1()
    {
        return $this->ott1;
    }

    /**
     * Set ott2.
     *
     * @param int|null $ott2
     *
     * @return ShopImage
     */
    public function setOtt2($ott2 = null)
    {
        $this->ott2 = $ott2;

        return $this;
    }

    /**
     * Get ott2.
     *
     * @return int|null
     */
    public function getOtt2()
    {
        return $this->ott2;
    }

    /**
     * Set ott3.
     *
     * @param int|null $ott3
     *
     * @return ShopImage
     */
    public function setOtt3($ott3 = null)
    {
        $this->ott3 = $ott3;

        return $this;
    }

    /**
     * Get ott3.
     *
     * @return int|null
     */
    public function getOtt3()
    {
        return $this->ott3;
    }

    /**
     * Set ott4.
     *
     * @param int|null $ott4
     *
     * @return ShopImage
     */
    public function setOtt4($ott4 = null)
    {
        $this->ott4 = $ott4;

        return $this;
    }

    /**
     * Get ott4.
     *
     * @return int|null
     */
    public function getOtt4()
    {
        return $this->ott4;
    }

    /**
     * Set ott5.
     *
     * @param int|null $ott5
     *
     * @return ShopImage
     */
    public function setOtt5($ott5 = null)
    {
        $this->ott5 = $ott5;

        return $this;
    }

    /**
     * Get ott5.
     *
     * @return int|null
     */
    public function getOtt5()
    {
        return $this->ott5;
    }

    /**
     * Set ott6.
     *
     * @param int|null $ott6
     *
     * @return ShopImage
     */
    public function setOtt6($ott6 = null)
    {
        $this->ott6 = $ott6;

        return $this;
    }

    /**
     * Get ott6.
     *
     * @return int|null
     */
    public function getOtt6()
    {
        return $this->ott6;
    }

    /**
     * Set ott7.
     *
     * @param int|null $ott7
     *
     * @return ShopImage
     */
    public function setOtt7($ott7 = null)
    {
        $this->ott7 = $ott7;

        return $this;
    }

    /**
     * Get ott7.
     *
     * @return int|null
     */
    public function getOtt7()
    {
        return $this->ott7;
    }

    /**
     * Set ott8.
     *
     * @param int|null $ott8
     *
     * @return ShopImage
     */
    public function setOtt8($ott8 = null)
    {
        $this->ott8 = $ott8;

        return $this;
    }

    /**
     * Get ott8.
     *
     * @return int|null
     */
    public function getOtt8()
    {
        return $this->ott8;
    }

    /**
     * Set ott9.
     *
     * @param int|null $ott9
     *
     * @return ShopImage
     */
    public function setOtt9($ott9 = null)
    {
        $this->ott9 = $ott9;

        return $this;
    }

    /**
     * Get ott9.
     *
     * @return int|null
     */
    public function getOtt9()
    {
        return $this->ott9;
    }

    /**
     * Set ott10.
     *
     * @param int|null $ott10
     *
     * @return ShopImage
     */
    public function setOtt10($ott10 = null)
    {
        $this->ott10 = $ott10;

        return $this;
    }

    /**
     * Get ott10.
     *
     * @return int|null
     */
    public function getOtt10()
    {
        return $this->ott10;
    }

    /**
     * Set ott11.
     *
     * @param int|null $ott11
     *
     * @return ShopImage
     */
    public function setOtt11($ott11 = null)
    {
        $this->ott11 = $ott11;

        return $this;
    }

    /**
     * Get ott11.
     *
     * @return int|null
     */
    public function getOtt11()
    {
        return $this->ott11;
    }

    /**
     * Set ott12.
     *
     * @param int|null $ott12
     *
     * @return ShopImage
     */
    public function setOtt12($ott12 = null)
    {
        $this->ott12 = $ott12;

        return $this;
    }

    /**
     * Get ott12.
     *
     * @return int|null
     */
    public function getOtt12()
    {
        return $this->ott12;
    }

    /**
     * Set ott13.
     *
     * @param int|null $ott13
     *
     * @return ShopImage
     */
    public function setOtt13($ott13 = null)
    {
        $this->ott13 = $ott13;

        return $this;
    }

    /**
     * Get ott13.
     *
     * @return int|null
     */
    public function getOtt13()
    {
        return $this->ott13;
    }

    /**
     * Set ott14.
     *
     * @param int|null $ott14
     *
     * @return ShopImage
     */
    public function setOtt14($ott14 = null)
    {
        $this->ott14 = $ott14;

        return $this;
    }

    /**
     * Get ott14.
     *
     * @return int|null
     */
    public function getOtt14()
    {
        return $this->ott14;
    }

    /**
     * Set ott15.
     *
     * @param int|null $ott15
     *
     * @return ShopImage
     */
    public function setOtt15($ott15 = null)
    {
        $this->ott15 = $ott15;

        return $this;
    }

    /**
     * Get ott15.
     *
     * @return int|null
     */
    public function getOtt15()
    {
        return $this->ott15;
    }

    /**
     * Set ott16.
     *
     * @param int|null $ott16
     *
     * @return ShopImage
     */
    public function setOtt16($ott16 = null)
    {
        $this->ott16 = $ott16;

        return $this;
    }

    /**
     * Get ott16.
     *
     * @return int|null
     */
    public function getOtt16()
    {
        return $this->ott16;
    }

    /**
     * Set ott17.
     *
     * @param int|null $ott17
     *
     * @return ShopImage
     */
    public function setOtt17($ott17 = null)
    {
        $this->ott17 = $ott17;

        return $this;
    }

    /**
     * Get ott17.
     *
     * @return int|null
     */
    public function getOtt17()
    {
        return $this->ott17;
    }

    /**
     * Set ott18.
     *
     * @param int|null $ott18
     *
     * @return ShopImage
     */
    public function setOtt18($ott18 = null)
    {
        $this->ott18 = $ott18;

        return $this;
    }

    /**
     * Get ott18.
     *
     * @return int|null
     */
    public function getOtt18()
    {
        return $this->ott18;
    }

    /**
     * Set ott19.
     *
     * @param int|null $ott19
     *
     * @return ShopImage
     */
    public function setOtt19($ott19 = null)
    {
        $this->ott19 = $ott19;

        return $this;
    }

    /**
     * Get ott19.
     *
     * @return int|null
     */
    public function getOtt19()
    {
        return $this->ott19;
    }

    /**
     * Set ott20.
     *
     * @param int|null $ott20
     *
     * @return ShopImage
     */
    public function setOtt20($ott20 = null)
    {
        $this->ott20 = $ott20;

        return $this;
    }

    /**
     * Get ott20.
     *
     * @return int|null
     */
    public function getOtt20()
    {
        return $this->ott20;
    }

    /**
     * Set ott21.
     *
     * @param int|null $ott21
     *
     * @return ShopImage
     */
    public function setOtt21($ott21 = null)
    {
        $this->ott21 = $ott21;

        return $this;
    }

    /**
     * Get ott21.
     *
     * @return int|null
     */
    public function getOtt21()
    {
        return $this->ott21;
    }

    /**
     * Set ott22.
     *
     * @param int|null $ott22
     *
     * @return ShopImage
     */
    public function setOtt22($ott22 = null)
    {
        $this->ott22 = $ott22;

        return $this;
    }

    /**
     * Get ott22.
     *
     * @return int|null
     */
    public function getOtt22()
    {
        return $this->ott22;
    }

    /**
     * Set ott23.
     *
     * @param int|null $ott23
     *
     * @return ShopImage
     */
    public function setOtt23($ott23 = null)
    {
        $this->ott23 = $ott23;

        return $this;
    }

    /**
     * Get ott23.
     *
     * @return int|null
     */
    public function getOtt23()
    {
        return $this->ott23;
    }

    /**
     * Set ott24.
     *
     * @param int|null $ott24
     *
     * @return ShopImage
     */
    public function setOtt24($ott24 = null)
    {
        $this->ott24 = $ott24;

        return $this;
    }

    /**
     * Get ott24.
     *
     * @return int|null
     */
    public function getOtt24()
    {
        return $this->ott24;
    }

    /**
     * Set ott25.
     *
     * @param int|null $ott25
     *
     * @return ShopImage
     */
    public function setOtt25($ott25 = null)
    {
        $this->ott25 = $ott25;

        return $this;
    }

    /**
     * Get ott25.
     *
     * @return int|null
     */
    public function getOtt25()
    {
        return $this->ott25;
    }

    /**
     * Set ott26.
     *
     * @param int|null $ott26
     *
     * @return ShopImage
     */
    public function setOtt26($ott26 = null)
    {
        $this->ott26 = $ott26;

        return $this;
    }

    /**
     * Get ott26.
     *
     * @return int|null
     */
    public function getOtt26()
    {
        return $this->ott26;
    }

    /**
     * Set ott27.
     *
     * @param int|null $ott27
     *
     * @return ShopImage
     */
    public function setOtt27($ott27 = null)
    {
        $this->ott27 = $ott27;

        return $this;
    }

    /**
     * Get ott27.
     *
     * @return int|null
     */
    public function getOtt27()
    {
        return $this->ott27;
    }

    /**
     * Set ott28.
     *
     * @param int|null $ott28
     *
     * @return ShopImage
     */
    public function setOtt28($ott28 = null)
    {
        $this->ott28 = $ott28;

        return $this;
    }

    /**
     * Get ott28.
     *
     * @return int|null
     */
    public function getOtt28()
    {
        return $this->ott28;
    }

    /**
     * Set ott29.
     *
     * @param int|null $ott29
     *
     * @return ShopImage
     */
    public function setOtt29($ott29 = null)
    {
        $this->ott29 = $ott29;

        return $this;
    }

    /**
     * Get ott29.
     *
     * @return int|null
     */
    public function getOtt29()
    {
        return $this->ott29;
    }

    /**
     * Set ott30.
     *
     * @param int|null $ott30
     *
     * @return ShopImage
     */
    public function setOtt30($ott30 = null)
    {
        $this->ott30 = $ott30;

        return $this;
    }

    /**
     * Get ott30.
     *
     * @return int|null
     */
    public function getOtt30()
    {
        return $this->ott30;
    }

    /**
     * Set ott31.
     *
     * @param int|null $ott31
     *
     * @return ShopImage
     */
    public function setOtt31($ott31 = null)
    {
        $this->ott31 = $ott31;

        return $this;
    }

    /**
     * Get ott31.
     *
     * @return int|null
     */
    public function getOtt31()
    {
        return $this->ott31;
    }

    /**
     * Set ott32.
     *
     * @param int|null $ott32
     *
     * @return ShopImage
     */
    public function setOtt32($ott32 = null)
    {
        $this->ott32 = $ott32;

        return $this;
    }

    /**
     * Get ott32.
     *
     * @return int|null
     */
    public function getOtt32()
    {
        return $this->ott32;
    }

    /**
     * Set ott33.
     *
     * @param int|null $ott33
     *
     * @return ShopImage
     */
    public function setOtt33($ott33 = null)
    {
        $this->ott33 = $ott33;

        return $this;
    }

    /**
     * Get ott33.
     *
     * @return int|null
     */
    public function getOtt33()
    {
        return $this->ott33;
    }

    /**
     * Set ott34.
     *
     * @param int|null $ott34
     *
     * @return ShopImage
     */
    public function setOtt34($ott34 = null)
    {
        $this->ott34 = $ott34;

        return $this;
    }

    /**
     * Get ott34.
     *
     * @return int|null
     */
    public function getOtt34()
    {
        return $this->ott34;
    }

    /**
     * Set ott35.
     *
     * @param int|null $ott35
     *
     * @return ShopImage
     */
    public function setOtt35($ott35 = null)
    {
        $this->ott35 = $ott35;

        return $this;
    }

    /**
     * Get ott35.
     *
     * @return int|null
     */
    public function getOtt35()
    {
        return $this->ott35;
    }

    /**
     * Set ott36.
     *
     * @param int|null $ott36
     *
     * @return ShopImage
     */
    public function setOtt36($ott36 = null)
    {
        $this->ott36 = $ott36;

        return $this;
    }

    /**
     * Get ott36.
     *
     * @return int|null
     */
    public function getOtt36()
    {
        return $this->ott36;
    }

    /**
     * Set ott37.
     *
     * @param int|null $ott37
     *
     * @return ShopImage
     */
    public function setOtt37($ott37 = null)
    {
        $this->ott37 = $ott37;

        return $this;
    }

    /**
     * Get ott37.
     *
     * @return int|null
     */
    public function getOtt37()
    {
        return $this->ott37;
    }

    /**
     * Set ott38.
     *
     * @param int|null $ott38
     *
     * @return ShopImage
     */
    public function setOtt38($ott38 = null)
    {
        $this->ott38 = $ott38;

        return $this;
    }

    /**
     * Get ott38.
     *
     * @return int|null
     */
    public function getOtt38()
    {
        return $this->ott38;
    }

    /**
     * Set ott39.
     *
     * @param int|null $ott39
     *
     * @return ShopImage
     */
    public function setOtt39($ott39 = null)
    {
        $this->ott39 = $ott39;

        return $this;
    }

    /**
     * Get ott39.
     *
     * @return int|null
     */
    public function getOtt39()
    {
        return $this->ott39;
    }

    /**
     * Set ott40.
     *
     * @param int|null $ott40
     *
     * @return ShopImage
     */
    public function setOtt40($ott40 = null)
    {
        $this->ott40 = $ott40;

        return $this;
    }

    /**
     * Get ott40.
     *
     * @return int|null
     */
    public function getOtt40()
    {
        return $this->ott40;
    }

    /**
     * Set ott41.
     *
     * @param int|null $ott41
     *
     * @return ShopImage
     */
    public function setOtt41($ott41 = null)
    {
        $this->ott41 = $ott41;

        return $this;
    }

    /**
     * Get ott41.
     *
     * @return int|null
     */
    public function getOtt41()
    {
        return $this->ott41;
    }

    /**
     * Set ott42.
     *
     * @param int|null $ott42
     *
     * @return ShopImage
     */
    public function setOtt42($ott42 = null)
    {
        $this->ott42 = $ott42;

        return $this;
    }

    /**
     * Get ott42.
     *
     * @return int|null
     */
    public function getOtt42()
    {
        return $this->ott42;
    }

    /**
     * Set ott43.
     *
     * @param int|null $ott43
     *
     * @return ShopImage
     */
    public function setOtt43($ott43 = null)
    {
        $this->ott43 = $ott43;

        return $this;
    }

    /**
     * Get ott43.
     *
     * @return int|null
     */
    public function getOtt43()
    {
        return $this->ott43;
    }

    /**
     * Set ott44.
     *
     * @param int|null $ott44
     *
     * @return ShopImage
     */
    public function setOtt44($ott44 = null)
    {
        $this->ott44 = $ott44;

        return $this;
    }

    /**
     * Get ott44.
     *
     * @return int|null
     */
    public function getOtt44()
    {
        return $this->ott44;
    }

    /**
     * Set ott45.
     *
     * @param int|null $ott45
     *
     * @return ShopImage
     */
    public function setOtt45($ott45 = null)
    {
        $this->ott45 = $ott45;

        return $this;
    }

    /**
     * Get ott45.
     *
     * @return int|null
     */
    public function getOtt45()
    {
        return $this->ott45;
    }

    /**
     * Set ott46.
     *
     * @param int|null $ott46
     *
     * @return ShopImage
     */
    public function setOtt46($ott46 = null)
    {
        $this->ott46 = $ott46;

        return $this;
    }

    /**
     * Get ott46.
     *
     * @return int|null
     */
    public function getOtt46()
    {
        return $this->ott46;
    }

    /**
     * Set ott47.
     *
     * @param int|null $ott47
     *
     * @return ShopImage
     */
    public function setOtt47($ott47 = null)
    {
        $this->ott47 = $ott47;

        return $this;
    }

    /**
     * Get ott47.
     *
     * @return int|null
     */
    public function getOtt47()
    {
        return $this->ott47;
    }

    /**
     * Set ott48.
     *
     * @param int|null $ott48
     *
     * @return ShopImage
     */
    public function setOtt48($ott48 = null)
    {
        $this->ott48 = $ott48;

        return $this;
    }

    /**
     * Get ott48.
     *
     * @return int|null
     */
    public function getOtt48()
    {
        return $this->ott48;
    }

    /**
     * Set ott49.
     *
     * @param int|null $ott49
     *
     * @return ShopImage
     */
    public function setOtt49($ott49 = null)
    {
        $this->ott49 = $ott49;

        return $this;
    }

    /**
     * Get ott49.
     *
     * @return int|null
     */
    public function getOtt49()
    {
        return $this->ott49;
    }

    /**
     * Set ott50.
     *
     * @param int|null $ott50
     *
     * @return ShopImage
     */
    public function setOtt50($ott50 = null)
    {
        $this->ott50 = $ott50;

        return $this;
    }

    /**
     * Get ott50.
     *
     * @return int|null
     */
    public function getOtt50()
    {
        return $this->ott50;
    }

    /**
     * Set ott51.
     *
     * @param int|null $ott51
     *
     * @return ShopImage
     */
    public function setOtt51($ott51 = null)
    {
        $this->ott51 = $ott51;

        return $this;
    }

    /**
     * Get ott51.
     *
     * @return int|null
     */
    public function getOtt51()
    {
        return $this->ott51;
    }

    /**
     * Set ott52.
     *
     * @param int|null $ott52
     *
     * @return ShopImage
     */
    public function setOtt52($ott52 = null)
    {
        $this->ott52 = $ott52;

        return $this;
    }

    /**
     * Get ott52.
     *
     * @return int|null
     */
    public function getOtt52()
    {
        return $this->ott52;
    }

    /**
     * Set ott53.
     *
     * @param int|null $ott53
     *
     * @return ShopImage
     */
    public function setOtt53($ott53 = null)
    {
        $this->ott53 = $ott53;

        return $this;
    }

    /**
     * Get ott53.
     *
     * @return int|null
     */
    public function getOtt53()
    {
        return $this->ott53;
    }

    /**
     * Set ott54.
     *
     * @param int|null $ott54
     *
     * @return ShopImage
     */
    public function setOtt54($ott54 = null)
    {
        $this->ott54 = $ott54;

        return $this;
    }

    /**
     * Get ott54.
     *
     * @return int|null
     */
    public function getOtt54()
    {
        return $this->ott54;
    }

    /**
     * Set ott55.
     *
     * @param int|null $ott55
     *
     * @return ShopImage
     */
    public function setOtt55($ott55 = null)
    {
        $this->ott55 = $ott55;

        return $this;
    }

    /**
     * Get ott55.
     *
     * @return int|null
     */
    public function getOtt55()
    {
        return $this->ott55;
    }

    /**
     * Set ott56.
     *
     * @param int|null $ott56
     *
     * @return ShopImage
     */
    public function setOtt56($ott56 = null)
    {
        $this->ott56 = $ott56;

        return $this;
    }

    /**
     * Get ott56.
     *
     * @return int|null
     */
    public function getOtt56()
    {
        return $this->ott56;
    }

    /**
     * Set ott57.
     *
     * @param int|null $ott57
     *
     * @return ShopImage
     */
    public function setOtt57($ott57 = null)
    {
        $this->ott57 = $ott57;

        return $this;
    }

    /**
     * Get ott57.
     *
     * @return int|null
     */
    public function getOtt57()
    {
        return $this->ott57;
    }

    /**
     * Set ott58.
     *
     * @param int|null $ott58
     *
     * @return ShopImage
     */
    public function setOtt58($ott58 = null)
    {
        $this->ott58 = $ott58;

        return $this;
    }

    /**
     * Get ott58.
     *
     * @return int|null
     */
    public function getOtt58()
    {
        return $this->ott58;
    }

    /**
     * Set ott59.
     *
     * @param int|null $ott59
     *
     * @return ShopImage
     */
    public function setOtt59($ott59 = null)
    {
        $this->ott59 = $ott59;

        return $this;
    }

    /**
     * Get ott59.
     *
     * @return int|null
     */
    public function getOtt59()
    {
        return $this->ott59;
    }

    /**
     * Set ott60.
     *
     * @param int|null $ott60
     *
     * @return ShopImage
     */
    public function setOtt60($ott60 = null)
    {
        $this->ott60 = $ott60;

        return $this;
    }

    /**
     * Get ott60.
     *
     * @return int|null
     */
    public function getOtt60()
    {
        return $this->ott60;
    }

    /**
     * Set ott61.
     *
     * @param int|null $ott61
     *
     * @return ShopImage
     */
    public function setOtt61($ott61 = null)
    {
        $this->ott61 = $ott61;

        return $this;
    }

    /**
     * Get ott61.
     *
     * @return int|null
     */
    public function getOtt61()
    {
        return $this->ott61;
    }

    /**
     * Set ott62.
     *
     * @param int|null $ott62
     *
     * @return ShopImage
     */
    public function setOtt62($ott62 = null)
    {
        $this->ott62 = $ott62;

        return $this;
    }

    /**
     * Get ott62.
     *
     * @return int|null
     */
    public function getOtt62()
    {
        return $this->ott62;
    }

    /**
     * Set ott63.
     *
     * @param int|null $ott63
     *
     * @return ShopImage
     */
    public function setOtt63($ott63 = null)
    {
        $this->ott63 = $ott63;

        return $this;
    }

    /**
     * Get ott63.
     *
     * @return int|null
     */
    public function getOtt63()
    {
        return $this->ott63;
    }

    /**
     * Set nameUpdatedAt.
     *
     * @param \DateTime $nameUpdatedAt
     *
     * @return ShopImage
     */
    public function setNameUpdatedAt($nameUpdatedAt)
    {
        $this->nameUpdatedAt = $nameUpdatedAt;

        return $this;
    }

    /**
     * Get nameUpdatedAt.
     *
     * @return \DateTime
     */
    public function getNameUpdatedAt()
    {
        return $this->nameUpdatedAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return ShopImage
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set upakovka.
     *
     * @param string|null $upakovka
     *
     * @return ShopImage
     */
    public function setUpakovka($upakovka = null)
    {
        $this->upakovka = $upakovka;

        return $this;
    }

    /**
     * Get upakovka.
     *
     * @return string|null
     */
    public function getUpakovka()
    {
        return $this->upakovka;
    }

    /**
     * Set attributeSet.
     *
     * @param Category|null $attributeSet
     *
     * @return ShopImage
     */
    public function setAttributeSet(Category $attributeSet = null)
    {
        $this->attributeSet = $attributeSet;

        return $this;
    }

    /**
     * Get attributeSet.
     *
     * @return Category|null
     */
    public function getAttributeSet()
    {
        return $this->attributeSet;
    }

    /**
     * Set postavshik.
     *
     * @param Supplier|null $postavshik
     *
     * @return ShopImage
     */
    public function setPostavshik(Supplier $postavshik = null)
    {
        $this->postavshik = $postavshik;

        return $this;
    }

    /**
     * Get postavshik.
     *
     * @return Supplier|null
     */
    public function getPostavshik()
    {
        return $this->postavshik;
    }

    /**
     * @return GroupImage|null
     */
    public function getGroupImage()
    {
        return $this->groupImage;
    }

    /**
     * @param GroupImage|null $groupImage
     */
    public function setGroupImage(GroupImage $groupImage = null): void
    {
        $this->groupImage = $groupImage;
    }

    /**
     * @return GroupProduct
     */
    public function getGroupProduct(): GroupProduct
    {
        return $this->groupProduct;
    }

    /**
     * @param GroupProduct|null $groupProduct
     */
    public function setGroupProduct(GroupProduct $groupProduct = null): void
    {
        $this->groupProduct = $groupProduct;
    }

    /**
     * @return bool|null
     */
    public function getNotFit(): ?bool
    {
        return $this->notFit;
    }

    /**
     * @param bool|null $notFit
     */
    public function setNotFit(?bool $notFit): void
    {
        $this->notFit = $notFit;
    }

    /**
     * @return string|null
     */
    public function getNewName(): ?string
    {
        return $this->newName;
    }

    /**
     * @param string|null $newName
     */
    public function setNewName(?string $newName): void
    {
        $this->newName = $newName;
    }

    /**
     * @return Manufacturer
     */
    public function getManufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer $manufacturer
     */
    public function setManufacturer(Manufacturer $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }
}
