import React from 'react';


export default function ProductSku(props) {
    let productSkuClassName = '';
    if (document.getElementById('sku_find').value === props.product.sku) {
        productSkuClassName = ' lime accent-3';
    }

    return <div className="product__col product__sku">
        <div className={productSkuClassName}><b>SKU: </b>{props.product.sku}</div>
    </div>
}
