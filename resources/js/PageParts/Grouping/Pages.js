import React from 'react';

export default class Pages extends React.Component {

    constructor(props) {
        super(props);
        this.preparePageLi = this.preparePageLi.bind(this);
        this.handlePageClick = this.handlePageClick.bind(this);
        this.state = {pageNumber: this.props.pageNumber};
    }

    componentDidUpdate(prevProps) {
        if (prevProps.pageNumber !== this.props.pageNumber) {
            this.setState({pageNumber: this.props.pageNumber});
        }
    }

    handlePageClick(event) {
        this.props.onPageClick(event.target.id);
    }

    preparePageLi(number) {
        let className = "waves-effect";

        if (Number.parseInt(number) === Number.parseInt(this.state.pageNumber)
        ) {
            className = 'active';
        }
        return (
            <li
                className={className}
                key={number}
                onClick={this.handlePageClick}
            >
                <a href="#" id={number}>
                    {number}
                </a>
            </li>
        );
    }

    render() {
        const pageNumbers = [];
        for (let i = 1; i <= this.props.qty; i++) {
            pageNumbers.push(i);
        }

        const renderPageNumbers = pageNumbers.map(this.preparePageLi);

        return <div>
            <ul className="pagination mb-5">
                {renderPageNumbers}
            </ul>
        </div>;
    }
}
