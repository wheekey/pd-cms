import React from 'react';

export default function SearchResults(props) {
    if (props.product !== undefined && props.product.sku !== undefined){
        return <div>
            <div>SKU: {props.product.sku}</div>
            <div>Name: {props.product.name}</div>
            <div>Name PriceList: {props.product.namePrice}</div>
            <img src={props.product.url} width="500" alt=""/></div>;
    }

    return <div> Ничего не найдено.</div>;
}
