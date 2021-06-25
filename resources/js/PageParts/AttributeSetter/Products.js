import React, { useState, useEffect } from 'react';
import Product from "./Product";

 const Products = (props) => {
    return (
     <div  className="flex flex-col">
            {props.products ? props.products.map((product) =>
                <Product key={product.id} product={product} />
            ) : ''}
    </div>
    );
}

export default Products;
