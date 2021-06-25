import React from 'react';

export default function CheckboxesFilter(props) {
    return <div className="filters__checkboxes  self-end">
        <div className="flex flex-row">
            <input type="checkbox" id="new_tov_check" onChange={props.onOnlyNewChange}/>
            <span className="text-gray-700 ">Только новые</span>
        </div>

    </div>;
}
