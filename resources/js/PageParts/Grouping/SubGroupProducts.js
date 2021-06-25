import React from 'react';
import Product from "./Product";

export default function SubGroupProducts(props) {
    if (props.skus) {
        return props.skus.map((product) =>
            <Product subGroupChanged={props.subGroupChanged} key={product.sku} subGroupsArr={props.subGroupsArr}
                     product={product}/>
        );
    }
    return '';
}
