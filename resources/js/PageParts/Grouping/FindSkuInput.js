import React from 'react';


export default function FindSkuInput(props) {
    return <div className='row'>
        <div className="col s4">
            <div className="input-field ">
                <input onChange={props.findSkuChange} placeholder="Введите ску" id="sku_in_db" type="text" value={props.sku}/>
                <label className="active" htmlFor="sku_in_db">SKU</label>
            </div>
        </div>
    </div>;
}
