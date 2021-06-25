import React, {useState, useEffect, useLayoutEffect} from 'react';
import Layout from '../../Shared/Layout';
import Filters from "../../PageParts/CategorySetter/Filters";
import Product from "../../PageParts/CategorySetter/Product";
import { InertiaLink, usePage } from '@inertiajs/inertia-react';

const Index = () => {

    const { product } = usePage().props;

    return (
        <div>
            <Filters />
            <div className="mt-4">
                {product && (
                    <Product product={product}/>

                )}

                {
                    !product && (
                         <p>Не найдено непроставленных товаров.
                         </p>
                    )
                }
            </div>
        </div>
    );
}

Index.layout = page => <Layout title="Category Setter" children={page} />;

export default Index;
