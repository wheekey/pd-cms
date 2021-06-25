import React from 'react';


export default function ProductImage(props) {
    return <div className="product__col product__image">
        <img
            className="materialboxed responsive-img"
            src={props.product.image}/>
    </div>
}
