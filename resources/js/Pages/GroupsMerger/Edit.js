import React, { useState, useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink, usePage, useForm } from '@inertiajs/inertia-react';
import Layout from "../../Shared/Layout";
import GroupName from "../../PageParts/Grouping/GroupName";
import SubGroups from "../../PageParts/Grouping/SubGroups";

const Edit = () => {
    const { groupImages } = usePage().props;

    function onChange(mergeToGroupImageId, groupImageId){
        if (confirm('Вы уверены?')) {
            Inertia.put(route('groups-merger.merge',  { groupImageId: groupImageId, mergeToGroupImageId: mergeToGroupImageId }));
        }
    }

    function handleSubmit(e) {
        e.preventDefault();
        put(route('organizations.update', organization.id));
    }

    function restore() {
        if (confirm('Are you sure you want to restore this organization?')) {
            Inertia.put(route('organizations.restore', organization.id));
        }
    }

    return (
        <div>
            <div className="flex space-x-4">
                {groupImages.data.map(({ groupImageInfo, subGroups }) => {
                    return (
                        <div >
                            <h2 className="bg-yellow-800">Id группы {groupImageInfo.id}</h2>
                            <div className="bg-yellow-600">Переместить в:
                                <select
                                    value={groupImageInfo.id}
                                    className="bg-yellow-200"
                                        name=""
                                        id=""
                                        onChange={(e) => {
                                            onChange(e.target.value, groupImageInfo.id);
                                        }}
                                >

                                    {groupImages.data.map(({ groupImageInfo, subGroups }) => {
                                        return (
                                            <option value={groupImageInfo.id}>Группа {groupImageInfo.id}</option>
                                        );
                                    })}
                                </select>
                            </div>
                            <div>
                                {subGroups && subGroups.map(({ groupProductInfo, groupProductShopImages }) => {
                                    return (
                                        <div>
                                            <h2 className="bg-yellow-500">Id подгруппы {groupProductInfo.id}</h2>

                                            <div>
                                                {groupProductShopImages && groupProductShopImages.map(({ artikul, entityId, groupImageId, groupProductId, id, image, name, namePricelist }) => {
                                                    return (
                                                        <div className="flex bg-yellow-200">
                                                            <img className="h-48" src={image} alt=""/>
                                                            <div>
                                                                <p>{artikul}</p>
                                                                <p>{name}</p>
                                                                <p>{namePricelist}</p>
                                                            </div>
                                                        </div>
                                                    );
                                                })}
                                            </div>
                                        </div>
                                    );
                                })}
                            </div>
                        </div>
                    );
                })}
            </div>

            <h2 className="mt-12 text-2xl font-bold">Слияние групп</h2>
            <div className="groups-merger_groups flex">
                <div className="groups-merger_group bg-green-400 ">
                    <div className="groups-merger_subgroups">
                        <div className="groups-merger_subgroup">
                            <div className="groups-merger_subgroup-title">Subgroup title</div>
                            <div className="groups-merger_subgroup-products">
                                <div className="groups-merger_product flex mb-4">
                                    <div className="product_img">
                                        <img src="http://placehold.it/100x100" />
                                    </div>
                                    <div className="product_info">
                                        <div className="product-info_row">Info10</div>
                                        <div className="product-info_row">Info11</div>
                                        <div className="product-info_row">Info12</div>
                                    </div>
                                </div>
                                <div className="groups-merger_product flex mb-4 ">
                                    <div className="product_img">
                                        <img src="http://placehold.it/100x100" />
                                    </div>
                                    <div className="product_info">
                                        <div className="product-info_row">Info13</div>
                                        <div className="product-info_row">Info14</div>
                                        <div className="product-info_row">Info15</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div className="groups-merger_group bg-green-400 ">
                    <div className="groups-merger_subgroups">
                        <div className="groups-merger_subgroup">
                            <div className="groups-merger_subgroup-title">Subgroup title</div>
                            <div className="groups-merger_subgroup-products">
                                <div className="groups-merger_product flex mb-4">
                                    <div className="product_img">
                                        <img src="http://placehold.it/100x100" />
                                    </div>
                                    <div className="product_info">
                                        <div className="product-info_row">Info10</div>
                                        <div className="product-info_row">Info11</div>
                                        <div className="product-info_row">Info12</div>
                                    </div>
                                </div>
                                <div className="groups-merger_product flex mb-4 ">
                                    <div className="product_img">
                                        <img src="http://placehold.it/100x100" />
                                    </div>
                                    <div className="product_info">
                                        <div className="product-info_row">Info13</div>
                                        <div className="product-info_row">Info14</div>
                                        <div className="product-info_row">Info15</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

Edit.layout = page => <Layout children={page} />;

export default Edit;
