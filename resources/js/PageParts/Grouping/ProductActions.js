import React from 'react';
import ProductCategorizeOptions from './ProductCategorizeOptions';

export default function ProductActions(props) {
    return <div className="product__actions">
        <ProductCategorizeOptions onChangeCategorizeOption={props.onChangeCategorizeOption}
                                  subGroupsArr={props.subGroupsArr}/>
    </div>;
}
