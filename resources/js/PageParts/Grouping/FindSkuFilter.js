import React from 'react';


export default function FindSkuFilter(props) {
    return <div className="">
            <div className="flex flex-col">
                <label className="text-gray-700" htmlFor="sku_find">Поиск sku</label>
                <input placeholder="" id="sku_find" type="text"
                       className="validate rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       onChange={props.onSkuChange}/>
            </div>




    </div>;
}
