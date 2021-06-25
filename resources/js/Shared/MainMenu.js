import React from 'react';
import MainMenuItem from './MainMenuItem';

export default ({ className }) => {
  return (
    <div className={className}>
      <MainMenuItem text="Dashboard" link="dashboard" icon="dashboard" />
      <MainMenuItem text="Check Sku" link="check-sku" icon="check" />
      <MainMenuItem text="Grouping" link="grouping" icon="collection" />
      <MainMenuItem text="Groups Merger" link="groups-merger" icon="collection" />
      <MainMenuItem text="Attribute Setter" link="attribute-setter" icon="badge-check" />
      <MainMenuItem text="Category Setter" link="category-setter" icon="badge-check" />

     {/*
      <MainMenuItem text="Contacts" link="contacts" icon="users" />
      <MainMenuItem text="Reports" link="reports" icon="printer" />*/}
    </div>
  );
};
