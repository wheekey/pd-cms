import React from 'react';
import SubGroupTitle from "./SubGroupTitle";
import SubGroupProducts from "./SubGroupProducts";

export default class SubGroup extends React.Component {
    constructor(props) {
        super(props);
        this.onSubGroupNameChange = this.onSubGroupNameChange.bind(this);
    }

    onSubGroupNameChange(e) {
        if (e.key === 'Enter') {
            console.log('enter');
            const requestOptions = {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({grtov: this.props.subGroup.grtov, grtovName: e.target.value})
            };

            fetch("/api/product/changeSubGroupName", requestOptions)
                .then(() => {
                    this.props.subGroupNameChanged();
                })
                .catch(console.log)
        }
    }

    render() {
        return <div className="subgroup">
            <div className="subgroup__content">
                <SubGroupTitle subGroupDeleted={this.props.subGroupDeleted}
                               onSubGroupNameChange={this.onSubGroupNameChange}
                               subGroup={this.props.subGroup}/>
                <div className="products">
                    <SubGroupProducts
                        subGroupChanged={this.props.subGroupChanged}
                        subGroupsArr={this.props.subGroupsArr}
                        skus={this.props.subGroup.skus}/>
                </div>
            </div>
        </div>
            ;
    }
}
