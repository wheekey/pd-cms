import React, { useState } from 'react';
import FindSkuInput from "../../PageParts/Grouping/FindSkuInput";
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import SearchResults from "../../PageParts/CheckSku/SearchResults";
import Layout from '../../Shared/Layout';

const Index = () => {

    const { product } = usePage().props;
    const [sku, changeSku] = useState('');

    function findSkuChange(e) {
        changeSku(e.target.value);
        if(e.target.value !== '')
        {
            Inertia.visit(route('products.find', e.target.value), {preserveState: true});
        }
    }

    return (
         <div>
            <FindSkuInput sku={sku} findSkuChange={findSkuChange}/>
            <SearchResults product={product}/>
        </div>
            );
}

Index.layout = page => <Layout title="Check Sku" children={page} />;

export default Index;
