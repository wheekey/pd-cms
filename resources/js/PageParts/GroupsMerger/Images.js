import React, { useState, useEffect } from 'react';
import Image from "./Image";

const Images = (props) => {
    return (
     <div className="grid grid-cols-3 gap-4">
            {props.images ? props.images.map((image) =>
                <Image key={image.id} image={image} />
            ) : ''}
    </div>
    );
}

export default Images;
