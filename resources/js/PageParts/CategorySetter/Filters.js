import React, { useState, useEffect, useRef } from 'react';


import pickBy from "lodash/pickBy";
import SelectInput from "../../Shared/SelectInput";
import { usePrevious } from 'react-use';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import TextField from '@material-ui/core/TextField';
import Autocomplete from '@material-ui/lab/Autocomplete';

const Filters = (props) => {
    const { manufacturers, suppliers, filters } = usePage().props;

    const [values, setValues] = useState({
        manufacturer: filters.manufacturer || null,
        supplier: filters.supplier || null,
    });

    const prevValues = usePrevious(values);

    function reset() {
        setValues({
            manufacturer: "",
            supplier: "",
        });
    }

    function handleChangeSupplier(e, value) {
        setValues(values => ({
            ...values,
            ['supplier']: value
        }));
    }

    function handleChangeManufacturer(e, value) {
        setValues(values => ({
            ...values,
            ['manufacturer']: value
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

         <Autocomplete
             onChange={handleChangeManufacturer}
             name="manufacturer"
             options={manufacturers.data}
             value={values.manufacturer}
             getOptionLabel={(option) => option.name}
             getOptionSelected={(option, value) => option.id === value.id}
             style={{ width: 300 }}
             renderInput={(params) => <TextField {...params} label="Производитель" variant="outlined" />}
         />

        <Autocomplete
         onChange={handleChangeSupplier}
         name="supplier"
         value={values.supplier}
         options={suppliers}
         getOptionLabel={(option) => option.postavshik_value}
         getOptionSelected={(option, value) => option.id === value.id}
         style={{ width: 300 }}
         renderInput={(params) => <TextField {...params} label="Поставщик" variant="outlined" />}
        />

     </div>
    );
}

export default Filters;
