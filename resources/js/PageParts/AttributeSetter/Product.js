import React, { useState, useEffect } from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import Options from "./Options";
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';
import ImageSlider from "../../Shared/ImageSlider";

const Product = (props) => {
    const product = props.product;
    const { colorOptions, styleOptions, pictureOptions } = usePage().props;

    const [images, setImages] = useState([]);

    function fetchImages(){
        axios.get("/api/attribute-setter/images/" + product.entityId).
        then((response) => {
            setImages(response.data);
        });
    }

    useEffect(() => {
        fetchImages();
    }, []);

    function handleChangeOption(e){
        if(e.target.checked) {
            axios.get("api/attribute-setter/products/" +  props.product.id + "/options/" + e.target.name).
            then((response) => {
               // console.log(response);
            });
        } else {
            axios.delete("api/attribute-setter/products/" +  props.product.id + "/options/" + e.target.name).
            then((response) => {
              //  console.log(response);
            });
        }
    }

    return (
        <div className='flex'>
            <div className="flex-none w-3/6 ">
                <ImageSlider images={images}/>
            </div>
            <div className="flex-grow">
                <p className='text-2xl'>{product.artikul}</p>
                <p>{product.name}</p>
                <p>{product.namePricelist}</p>
            </div>
            <div className="flex-none w-2/6">
                <Options onChange={handleChangeOption} product={props.product} colorOptions={colorOptions} styleOptions={styleOptions} pictureOptions={pictureOptions}/>
            </div>
        </div>
    );
}

export default Product;
