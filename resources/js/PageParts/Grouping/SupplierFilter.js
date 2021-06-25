import React from 'react';

export default class SupplierFilter extends React.Component {
    constructor(props) {
        super(props);
        this.fetchSuppliers = this.fetchSuppliers.bind(this);

        this.state = {suppliers: [], onlyNew: 0};
    }


    componentDidUpdate(prevProps) {
        if (prevProps.onlyNew !== this.props.onlyNew) {
            this.setState({onlyNew: this.props.onlyNew}, this.fetchSuppliers);
        }
    }

    fetchSuppliers() {
        fetch("/api/suppliers/" + this.state.onlyNew)
            .then(res => res.json())
            .then((data) => {
                this.setState({suppliers: data})
            })
            .catch(console.log)
    }

    componentDidMount() {
        this.fetchSuppliers();
    }


    render() {
        const supplierItems = this.state.suppliers.map((supplier) =>
            <option key={supplier.postavshik} value={supplier.postavshik}>{supplier.postavshik_value}</option>
        );


        return <div className="">
            <div className="flex flex-col">
                <label className="text-gray-700" htmlFor="sku_find">Поставщик</label>
                <select
                    className="block text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                    id="supplier"
                    defaultValue=""
                    onChange={this.props.onSupplierChange}>
                    <option value="" disabled>Выбрать</option>
                    {supplierItems}
                </select>




            </div>
        </div>;
    }
}
