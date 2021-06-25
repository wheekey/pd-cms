import React from 'react';
import ProductActions from './ProductActions';
import ProductName from './ProductName';

export default function ProductDescription(props) {
    return <div className="product__description">
        <div className="product__description-header">
            <div className="product__category">
                <b>Название категории: </b>{props.product.skuCategoryName}
            </div>
            <ProductActions
                onChangeCategorizeOption={props.onChangeCategorizeOption}
                subGroupsArr={props.subGroupsArr}
                product={props.product}/>
        </div>
        <div className="product__description-body">
            <div className="product__title">
                <ProductName onSkuNameChange={props.onSkuNameChange} product={props.product}/>
            </div>
            <div className="product__pricelist"><b>Наименование в прайсе: </b>{props.product.pricelistName}</div>
            <div className="product__package"><b>Упаковка: </b>{props.product.package}</div>
        </div>
    </div>;
}
