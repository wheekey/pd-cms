import React, { useState, useEffect } from 'react';


import pickBy from "lodash/pickBy";
import SelectInput from "../../Shared/SelectInput";
import { usePrevious } from 'react-use';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';

const Filters = (props) => {
    const { filters, categories, suppliers, colorOptions } = usePage().props;

    const [values, setValues] = useState({
        category: filters.category || null,
        supplier: filters.supplier || null,
        color: filters.color || null,
        perPage: filters.perPage || 1,
    });

    const prevValues = usePrevious(values);

    function reset() {
        setValues({
            category: "",
            supplier: "",
            color: "",
            perPage: "1"
        });
    }

    function handleChange(e) {
        const key = e.target.name;
        const value = e.target.value;

        setValues(values => ({
            ...values,
            [key]: value
        }));
    }

    useEffect(() => {
        // https://reactjs.org/docs/hooks-faq.html#how-to-get-the-previous-props-or-state
        if (prevValues) {
            const query = Object.keys(pickBy(values)).length
                ? pickBy(values)
                : { remember: 'forget' };
            Inertia.get(route(route().current()), query, {
                replace: true,
                preserveState: true
            });
        }
    }, [values]);

    return (
     <div className="filters">
         <button
             onClick={reset}
             className="ml-3 text-sm text-gray-600 hover:text-gray-700 focus:text-indigo-700 focus:outline-none"
             type="button">
             Сбросить фильтры
         </button>
         <SelectInput
             className=""
             label="Category"
             name="category"
             value={values.category}
             onChange={handleChange}
         >
             <option  value="" ></option>
             {categories.length && categories.map((category) =>
                 <option key={category.id} value={category.id}>{category.attributeSetName}</option>
             )}
         </SelectInput>
         <SelectInput
             className=""
             label="Supplier"
             name="supplier"
             value={values.supplier}
             onChange={handleChange}
         >
             <option value="" ></option>
             {suppliers.map((supplier) =>
                 <option key={supplier.id} value={supplier.id}>{supplier.postavshik_value}</option>
             )}
         </SelectInput>
         <SelectInput
             className=""
             label="Color"
             name="color"
             value={values.color}
             onChange={handleChange}
         >
             <option value="" ></option>
             {colorOptions.map((color) =>
                 <option key={color.id} value={color.id}>{color.optionValue}</option>
             )}
         </SelectInput>
         <SelectInput
             className=""
             label="Товаров на страницу"
             name="perPage"
             value={values.perPage}
             onChange={handleChange}
         >
             <option key='1' value='1'>1</option>
             <option key='5' value='5'>5</option>
             <option key='25' value='25'>25</option>
         </SelectInput>
    </div>
    );
}

export default Filters;
