import React, {useState, useEffect, useLayoutEffect} from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import axios from 'axios';

const Option = (props) => {
    const [isChecked, isOptionSet] = useState(false);

    function setCheckedStatus() {
         axios.get("/api/attribute-setter/isOptionSet/" + props.productId + "/" + props.option.id).
                then((response) => {
            isOptionSet(response.data['isOptionSet']);
        });
    }

    function onChange(e){
        isOptionSet(!isChecked);
        props.onChange(e);
    }

    useLayoutEffect(() => {
        setCheckedStatus();
    }, []);

    return (
                <div>
                    <label className="inline-flex items-center">
                        <input
                            checked={isChecked}
                            name={props.option.id}
                            onChange={onChange}
                            type="checkbox"
                            className="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                        <span className="ml-2">{props.option.optionValue}</span>
                    </label>
                </div>
    );
}

export default Option;
