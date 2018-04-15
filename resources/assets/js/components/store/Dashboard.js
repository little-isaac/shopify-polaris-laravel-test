import React, {Component} from 'react';
import fetch from 'node-fetch';
import {Page, Card, Button, List, CalloutCard} from '@shopify/polaris';
import * as PropTypes from 'prop-types';

class Dashboard extends React.Component {
    constructor(props) {
        super(props);

    }
    ;
            render() {
        /* Some css code has been removed for brevity */
        return (
               <Button>Add product</Button>
                );
    }
};
Dashboard.contextTypes={
    easdk: PropTypes.object
};
export default Dashboard;    