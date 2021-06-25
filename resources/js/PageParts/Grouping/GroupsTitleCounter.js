import React from 'react';


export default function GroupsTitleCounter(props) {
    return <h5>Группы товаров. Всего новых товаров: {props.ungroupedProductsQty}</h5>;
}
