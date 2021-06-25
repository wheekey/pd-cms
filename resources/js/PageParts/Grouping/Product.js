import React from 'react';
import ProductImage from "./ProductImage";
import ProductSku from "./ProductSku";
import ProductDescription from "./ProductDescription";

export default class Product extends React.Component {
    constructor(props) {
        super(props);
        this.onChangeCategorizeOption = this.onChangeCategorizeOption.bind(this);
        this.onSkuNameChange = this.onSkuNameChange.bind(this);
    }

    onChangeCategorizeOption(e) {
        const requestOptions = {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({sku: this.props.product.sku, option: e.target.value})
        };

        fetch("/api/product/changedCategorizeOption", requestOptions)
        .then(() => {
            this.props.subGroupChanged();
        })
        .catch(console.log)
    }

    onSkuNameChange(e) {
        console.log({sku: this.props.product.sku, skuName: e.target.value});
        const requestOptions = {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({sku: this.props.product.sku, skuName: e.target.value})
        };
        fetch("/api/product/renameSkuName", requestOptions).catch(console.log)
    }


    render() {
        let className = 'product ';

        if (this.props.product.isNew === 1) {
            className = 'product product--new';
        }

        if (this.props.product.hasNotGroup === 1) {
            className = 'product product--no-group';
        }
        return <div className={className}>
            <ProductImage product={this.props.product}/>
            <ProductSku product={this.props.product}/>
            <ProductDescription
                subGroupsArr={this.props.subGroupsArr}
                onChangeCategorizeOption={this.onChangeCategorizeOption}
                onSkuNameChange={this.onSkuNameChange}
                product={this.props.product}/>
        </div>;
    }
}
