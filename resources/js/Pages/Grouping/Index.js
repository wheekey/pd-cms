import React from 'react';

import Loader from "../../Shared/Loader.js";
import GroupsTitleCounter from "../../PageParts/Grouping/GroupsTitleCounter.js";
import Filters from "../../PageParts/Grouping/Filters";
import Groups from "../../PageParts/Grouping/Groups";
import Pages from "../../PageParts/Grouping/Pages";
import Layout from "../../Shared/Layout";

class Grouping extends React.Component {
    constructor(props) {
        super(props);
        this.handleSupplierChange = this.handleSupplierChange.bind(this);
        this.handleOnlyNewChange = this.handleOnlyNewChange.bind(this);
        this.handleSkuChange = this.handleSkuChange.bind(this);
        this.subGroupChanged = this.subGroupChanged.bind(this);
        this.subGroupNameChanged = this.subGroupNameChanged.bind(this);
        this.fetchGroups = this.fetchGroups.bind(this);
        this.fetchPagesCnt = this.fetchPagesCnt.bind(this);
        this.reloadGroups = this.reloadGroups.bind(this);
        this.handlePageClick = this.handlePageClick.bind(this);
        this.subGroupDeleted = this.subGroupDeleted.bind(this);
        this.subGroupCreated = this.subGroupCreated.bind(this);
        this.getHeader = this.getHeader.bind(this);
        this.saveScrollPosition = this.saveScrollPosition.bind(this);

        this.findSkuChange = this.findSkuChange.bind(this);
        this.state = {
            supplier: 0,
            groups: [],
            showOnlyNew: 0,
            pageNumber: 1,
            skuFind: '',
            ungroupedProductsQty: 0,
            pagesCnt: 0,
            loading: false,
            skuNotFound: false,
            scrollPosition: 0
        };
    }

    fetchPagesCnt() {
        fetch("/api/pager/" + this.state.supplier + "/" + this.state.showOnlyNew + "/" + this.state.skuFind)
            .then(res => res.json())
            .then((data) => {
                this.setState({pagesCnt: data})
            })
            .catch(console.log)
    }

    fetchGroups() {
        this.setState({loading: true});
        fetch("/api/groups/" + this.state.supplier + "/" + this.state.showOnlyNew + "/" + this.state.pageNumber + "/" + this.state.skuFind)
            .then(res => res.json())
            .then((data) => {


                this.setState({groups: data, loading: false});
                if (typeof data !== 'undefined' && data.length === 0) {
                    if (this.state.skuFind !== '') {
                        this.setState({skuNotFound: true});
                    } else {
                        this.setState({skuNotFound: false});
                    }
                } else {
                    this.setState({skuNotFound: false});
                }
                window.scrollTo(0, this.state.scrollPosition);
            })
            .catch(() => {
                    this.setState({loading: false});
                }
            );
    }

    handleSupplierChange(supplierId) {
        this.setState({
            supplier: supplierId
        }, this.reloadGroups);
    }

    handleSkuChange(sku) {
        this.setState({
            skuFind: sku
        }, this.reloadGroups);
    }

    handlePageClick(pageNumber) {
        this.setState({
                pageNumber: pageNumber
            },
            this.fetchGroups);
    }

    saveScrollPosition() {
        this.setState({
            scrollPosition: window.pageYOffset
        });
    }

    reloadGroups() {
        console.log("reload");
        console.log(window.pageYOffset);
        this.saveScrollPosition();
        this.fetchGroups();
        this.fetchPagesCnt();
    }

    componentDidMount() {
        fetch("/api/products/getUngroupedCnt")
            .then(res => res.json())
            .then((data) => {
                this.setState({ungroupedProductsQty: data})
            })
            .catch(console.log)
    }

    handleOnlyNewChange(val) {
        this.setState({
            showOnlyNew: (+val)
        }, function () {
            this.handleSupplierChange(document.getElementById("supplier").value)
        });
    }

    findSkuChange(e) {
        this.setState({loading: true});
        fetch("/api/products/" + e.target.value + "/find")
            .then(res => res.json())
            .then((data) => {
                this.setState({loading: false});
                this.setState({searchedSku: data});
            })
            .catch(() => {
                    this.setState({loading: false});
                }
            )
        ;
    }

    subGroupChanged() {
        this.reloadGroups();
    }

    subGroupNameChanged() {
        this.reloadGroups();
    }

    subGroupCreated() {
        this.reloadGroups();
    }

    subGroupDeleted() {
        this.reloadGroups();
    }

    getHeader() {
        return (<div>
                <GroupsTitleCounter ungroupedProductsQty={this.state.ungroupedProductsQty}/>
                <Filters onlyNew={this.state.showOnlyNew}
                         onSkuChange={this.handleSkuChange}
                         onOnlyNewChange={this.handleOnlyNewChange}
                         onSupplierChange={this.handleSupplierChange}/>
        </div>
        );
    }

    render() {
        let groupResults = "";
        if (document.getElementById("sku_find")) {
            groupResults = <div>
                <Pages onPageClick={this.handlePageClick} qty={this.state.pagesCnt}
                                       pageNumber={this.state.pageNumber}/>
                <Groups subGroupDeleted={this.subGroupDeleted}
                        subGroupCreated={this.subGroupCreated}
                        subGroupNameChanged={this.subGroupNameChanged}
                        subGroupChanged={this.subGroupChanged}
                        groups={this.state.groups}/>
                <Pages onPageClick={this.handlePageClick} qty={this.state.pagesCnt}
                       pageNumber={this.state.pageNumber}/>
            </div>
        }


        if (this.state.loading) {
            return (
                <div>
                    {this.getHeader()}
                    <Loader/>
                </div>
            )
                ;
        }

        if (this.state.skuNotFound) {
            return (
                <div>
                    {this.getHeader()}
                    <p>Соответствия не найдено.</p>
                </div>
            )
                ;
        }

        return (
            <div>
                {this.getHeader()}
                {groupResults}
            </div>
        );
    }
}

// Persistent layout
// Docs: https://inertiajs.com/pages#persistent-layouts
Grouping.layout = page => <Layout title="Grouping" children={page} />;

export default Grouping;
