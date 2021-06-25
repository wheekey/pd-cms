import React from 'react';

import SupplierFilter from "./SupplierFilter";
import FindSkuFilter from "./FindSkuFilter";
import CheckboxesFilter from "./CheckboxesFilter";

export default class Filters extends React.Component {
    constructor(props) {
        super(props);
        this.handleSupplierChange = this.handleSupplierChange.bind(this);
        this.handleSkuChange = this.handleSkuChange.bind(this);
        this.handleOnlyNewChange = this.handleOnlyNewChange.bind(this);
        this.state = {onlyNew: 0};
    }

    componentDidUpdate(prevProps) {
        if (prevProps.onlyNew !== this.props.onlyNew) {
            this.setState({onlyNew: this.props.onlyNew});
        }
    }

    handleSupplierChange(e) {
        this.props.onSupplierChange(e.target.value);
    }

    handleSkuChange(e) {
        this.props.onSkuChange(e.target.value);
    }

    handleOnlyNewChange(e) {
        this.props.onOnlyNewChange(e.target.checked);
    }

    render() {
        return <div className=" p-5 rounded bg-yellow-500 border border-gray-300  filters flex flex-row justify-around mt-5 mb-5">


            <SupplierFilter onlyNew={this.state.onlyNew} onSupplierChange={this.handleSupplierChange}/>
            <FindSkuFilter onSkuChange={this.handleSkuChange}/>
            <CheckboxesFilter onOnlyNewChange={this.handleOnlyNewChange}/>

        </div>
            ;
    }
}
