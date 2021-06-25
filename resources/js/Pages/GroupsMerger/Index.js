import React from 'react';

import Layout from "../../Shared/Layout";
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import Pagination from "../../Shared/Pagination";
import Images from "../../PageParts/GroupsMerger/Images";

const Index = () => {
    const { images } = usePage().props;
    const {
        data,
        meta: {links} = []
    } = images;

    return (
        <div>
            {links && <Pagination links={links} />}
            <Images images={data}/>
            {links && <Pagination links={links} />}
        </div>
    );
}

Index.layout = page => <Layout title="Groups Merger" children={page} />;

export default Index;
