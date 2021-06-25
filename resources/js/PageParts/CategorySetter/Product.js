import React, { useState, useEffect } from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';
import ImageSlider from "../../Shared/ImageSlider";
import Autocomplete from '@material-ui/lab/Autocomplete';
import TextField from '@material-ui/core/TextField';

const Product = (props) => {
    const product = props.product;
    const { categories } = usePage().props;

    const [images, setImages] = useState([]);
    const [selectedCategory, setCategory] = useState();

    function fetchImages(){
        axios.get("/api/attribute-setter/images/" + product.entityId).
        then((response) => {
            setImages(response.data);
        });
    }

    useEffect(() => {
        fetchImages();
    }, []);

    function handleSetCategory(e, value) {
        axios({
            method: 'post',
            url: '/api/category-setter/set',
            data: {
                shop_image_id: product.id,
                attribute_set_id: selectedCategory.id
            }
        });
    }

    function handleNext(){
        Inertia.get(route('category-setter'));
    }

    function setSelectedCategory(e, value)
    {
        setCategory(value);
    }

    function handleRemake() {
        if (confirm('Вы уверены?')) {
            Inertia.delete(route('category-setter.delete-product',  { id: product.id }));
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
                <Autocomplete
                    name="category"
                    onChange={setSelectedCategory}
                    options={categories}
                    getOptionLabel={(option) => option.attributeSetName}
                    getOptionSelected={(option, value) => option.id === value.id}
                    style={{ width: 300 }}
                    renderInput={(params) => <TextField {...params} label="Категория" variant="outlined" />}
                />
                <button onClick={handleSetCategory}
                    className="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">
                    Сохранить
                </button>
                <button onClick={handleRemake}
                    className="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 border border-yellow-700 rounded">
                    На переделку
                </button>
                <button onClick={handleNext}
                        className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 border border-indigo-700 rounded">
                    Дальше
                </button>
            </div>
        </div>
    );
}

export default Product;
