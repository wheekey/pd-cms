import React from 'react';
import GroupName from "./GroupName";
import SubGroups from "./SubGroups";

export default class Groups extends React.Component {
    constructor(props) {
        super(props);
        this.state = {groups: this.props.groups};
    }

    // https://stackoverflow.com/questions/38892672/react-why-child-component-doesnt-update-when-prop-changes

    componentDidUpdate(prevProps) {
        if (prevProps.groups !== this.props.groups) {
            this.setState({groups: this.props.groups});
        }
        //M.AutoInit();
    }

    componentDidMount() {
    }

    componentWillUnmount() {
    }

    render() {
        let groupItems;

        if (this.state.groups) {
            let groupItemsArr = [];
            let groupsObj = this.state.groups;
            let groupIds = []

            Object.keys(groupsObj).forEach(function (groupId) {
                groupItemsArr.push(groupsObj[groupId]);
                groupIds.push(groupId);
            });

            groupItems = groupItemsArr.map((subGroups, index) => <div key={groupIds[index]} className="pdlx-group">
                <GroupName groupName={groupIds[index]}/>
                <SubGroups groupId={groupIds[index]} subGroupDeleted={this.props.subGroupDeleted}
                           subGroupNameChanged={this.props.subGroupNameChanged}
                           subGroupChanged={this.props.subGroupChanged}
                           subGroupCreated={this.props.subGroupCreated}
                           subGroups={subGroups}/>
            </div>);
        } else {
            groupItems = null;
        }

        return <div className="groups">
            <div className="row">
                <div className="col s12">
                    {groupItems}
                </div>
            </div>
        </div>;
    }
}
