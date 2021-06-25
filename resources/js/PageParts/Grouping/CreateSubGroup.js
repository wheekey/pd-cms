import React from 'react';


export default function CreateSubGroup(props) {
    return <div className="subgroup-create">
        <div className="subgroup-create__input">
            <div className="inline">
                <input
                    className=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    onChange={props.onNewSubGroupNameChange} type="text" placeholder='Введите название подгруппы'/>
            </div>
        </div>
        <div className="">

            <button onClick={props.onClick} type="button"
                    className="py-2 px-4  bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                Создать
            </button>

        </div>
    </div>;
}
