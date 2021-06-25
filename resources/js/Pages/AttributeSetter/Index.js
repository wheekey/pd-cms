import React, {useState, useEffect, useLayoutEffect} from 'react';
import Layout from '../../Shared/Layout';
import Filters from "../../PageParts/AttributeSetter/Filters";
import Products from "../../PageParts/AttributeSetter/Products";
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import Pagination from "../../Shared/Pagination";
import { CSVLink } from "react-csv";

const Index = () => {
    const headers = [
        { label: "Id", key: "id" },
        { label: "OptionId", key: "option_id" },
        { label: "ProductId", key: "product_id" },
    ];

    const [reportContent, setReportContent] = useState([]);
    const { products } = usePage().props;
    const {
        data,
        meta: {links} = []
    } = products ;

    const downloadReport = async () => {
        const data = await getReportContent();
        setReportContent(data);
        document.getElementById('csvLink').click();
    }

    function getReportContent() {
        return fetch('/api/attribute-setter/formReportData')
            .then(res => res.json());
    }

    return (
        <div>
            <div>
                <input type="button" value="Экспорт в CSV" onClick={downloadReport} />
                <CSVLink
                    id="csvLink"
                    headers={headers}
                    filename="Выгрузка.csv"
                    data={reportContent}
                />
            </div>
            <Filters />
            {links && <Pagination links={links} />}
          <Products products={data}/>
            {links && <Pagination links={links} />}
        </div>
    );
}

Index.layout = page => <Layout title="Attribute Setter" children={page} />;

export default Index;
