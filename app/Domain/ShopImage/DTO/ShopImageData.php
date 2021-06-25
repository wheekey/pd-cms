<?php

namespace App\Domain\ShopImage\DTO;

use App\Common\ObjectData;
use App\Entities\ShopImage;

final class ShopImageData extends ObjectData
{
    public string $url;
    public string $sku;
    public string $name;
    public string $namePrice;

    public static function fromEntity(ShopImage $shopImage): self
    {
        return new static(
            url:  "https://pd.ru/media/catalog/product/{$shopImage->getImage()}",
            sku: $shopImage->getArtikul(),
            name: $shopImage->getName(),
            namePrice: $shopImage->getNamePricelist()
        );
    }


}
