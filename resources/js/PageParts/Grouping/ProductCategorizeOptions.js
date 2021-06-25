import React from 'react';

export default function ProductCategorizeOptions(props) {
    return <div className="input-field">
        <select
            className="block text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
            defaultValue="" onChange={props.onChangeCategorizeOption}>
            <option key='-1' value="" disabled>Действие</option>
            <option value="new">Новый</option>
            <option value="notFit">Не подходит</option>
            <option value="remake">На переделку</option>
            {props.subGroupsArr.map((subGroup) =>
                <option value={subGroup.grtov} key={subGroup.grtov}>
                    {subGroup.grtov_name}
                </option>)}
        </select>
    </div>
}
