import React from 'react';
import DeleteButton from "./DeleteButton";


export default class SubGroupTitle extends React.Component {
    constructor(props) {
        super(props);
        this.onClickDeleteButton = this.onClickDeleteButton.bind(this);
    }

    onClickDeleteButton() {
        const requestOptions = {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({grtov: this.props.subGroup.grtov})
        };

        fetch("/api/removeSubGroup", requestOptions)
            .then(() => {
                this.props.subGroupDeleted();
            })
            .catch(console.log)
    }

    render() {
        // Если непустой объект
        if (Object.keys(this.props.subGroup).length !== 0 && this.props.subGroup.grtov !== null) {
            return <div className="subgroup__title text-2xl">
                <div className="subgroup__title-grtov">
                    {this.props.subGroup.grtov_sku}:
                </div>
                <div className="subgroup__title-text">
                    <div>
                        <input
                            className="bg-transparent rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px- text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            defaultValue={this.props.subGroup.grtov_name}
                               placeholder=""
                               type="text"
                               onKeyDown={this.props.onSubGroupNameChange}/>
                    </div>
                </div>
                <div className="subgroup__delete-button">
                    <DeleteButton onClick={this.onClickDeleteButton}/>
                </div>
            </div>;
        }

        return '';
    }
}
