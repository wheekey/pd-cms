import React from 'react';
import CreateSubGroup from "./CreateSubGroup";
import SubGroup from "./SubGroup";

export default class SubGroups extends React.Component {
    constructor(props) {
        super(props);
        this.state = {subGroups: this.props.subGroups, newSubGroupName: ''};
        this.onNewSubGroupNameChange = this.onNewSubGroupNameChange.bind(this);
        this.createNewSubgroup = this.createNewSubgroup.bind(this);
    }

    createNewSubgroup() {
        const requestOptions = {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({grimg: this.props.groupId, grtovName: this.state.newSubGroupName})
        };

        fetch("/api/createSubGroup", requestOptions)
            .then(() => {
                this.props.subGroupCreated();
            })
            .catch(console.log)
    }

    onNewSubGroupNameChange(e) {
        this.setState({newSubGroupName: e.target.value});
    }

    componentDidUpdate(prevProps) {
        if (prevProps.subGroups !== this.props.subGroups) {
            this.setState({subGroups: this.props.subGroups});
        }
    }

    render() {
        let subGroups = [];

        if (this.state.subGroups) {
            let subGroupsArr = [];
            let subGroupsObj = this.state.subGroups;
            let subGroupIds = [];

            Object.keys(subGroupsObj).forEach(function (subGroupId) {
                subGroupsArr.push(subGroupsObj[subGroupId]);
                subGroupIds.push(subGroupId);
            });

            subGroups = subGroupsArr.map(
                (subGroup, index) =>
                    <SubGroup subGroupDeleted={this.props.subGroupDeleted}
                              subGroupNameChanged={this.props.subGroupNameChanged}
                              subGroupChanged={this.props.subGroupChanged} subGroupsArr={subGroupsArr}
                              key={subGroupIds[index]}
                              subGroup={subGroup}/>
            );
        } else {
            subGroups = null;
        }

        return <div className="subgroups">
            <CreateSubGroup onClick={this.createNewSubgroup} onNewSubGroupNameChange={this.onNewSubGroupNameChange}
            />
            {subGroups}</div>
    }
}
