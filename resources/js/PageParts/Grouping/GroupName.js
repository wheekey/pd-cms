import React from 'react';

export default function GroupName(props) {
    return <div className="pdlx-group__title bg-green-600 text-white">
        <div>Группа изображений №{props.groupName}</div>
    </div>;
}
