import React from 'react';
import {CopyToClipboard} from 'react-copy-to-clipboard';

export default class ProductName extends React.Component {
    constructor(props) {
        super(props);
        this.formNameForCopy = this.formNameForCopy.bind(this);
        this.skuNameChanged = this.skuNameChanged.bind(this);
        this.state = {
            skuNameCopied: this.formNameForCopy(this.props.product.skuName)
        };

    }

    skuNameChanged(e) {
        let nameForCopy = this.formNameForCopy(e.target.value)
        this.setState({skuNameCopied: nameForCopy});
        this.formNameForCopy(e.target.value);
        this.props.onSkuNameChange(e);
    }

    formNameForCopy(name) {
        let result = name.match(/(.*?)\s\(.*/);
        if (result !== null && result.length === 2) {
            return result[1];
        } else {
            return name;
        }
    }

    render() {
        return <div className="">
            <div className="product__title-copy">
                <CopyToClipboard text={this.state.skuNameCopied}>
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                </CopyToClipboard>
            </div>
            <textarea className="materialize-textarea product__name text-grey-darkest flex-1 p-2 m-1 bg-transparent" defaultValue={this.props.product.skuName}
                      placeholder=""
                      onChange={this.skuNameChanged}/>
        </div>
    }
}


