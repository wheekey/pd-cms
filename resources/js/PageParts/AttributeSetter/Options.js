import React, { useState, useEffect } from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import axios from 'axios';
import Option from "./Option";

const Options = (props) => {
    const {colorOptions, styleOptions, pictureOptions} = usePage().props;

    return (
        <div className='flex flex-col'>
            <p className='w-full'>Цвет</p>
            {colorOptions.length && colorOptions.map((colorOption) =>
                <Option key={colorOption.id} productId={props.product.id} option={colorOption} onChange={props.onChange} />
            )}
            <p className='w-full'>Стиль</p>
            {styleOptions.length && styleOptions.map((styleOption) =>
                <Option key={styleOption.id} productId={props.product.id} option={styleOption} onChange={props.onChange} />
            )}
            <p className='w-full'>Рисунок</p>
            {pictureOptions.length && pictureOptions.map((pictureOption) =>
                <Option key={pictureOption.id} productId={props.product.id} option={pictureOption} onChange={props.onChange} />
            )}
        </div>
    );
}

export default Options;
