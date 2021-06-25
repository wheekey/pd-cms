import React, { useState, useEffect } from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';

const Image = (props) => {
    const image = props.image;

    return (
        <div>
            <InertiaLink
                tabIndex="-1"
                href={route('groups-merger.edit', image.id)}
                className="flex items-center px-4 focus:outline-none"
            >
                <img src={image.image} alt="" />
            </InertiaLink>
        </div>
    );
}

export default Image;
