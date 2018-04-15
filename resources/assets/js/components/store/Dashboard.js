import React, {Component} from 'react';
import fetch from 'node-fetch';
import {Page, Card, Button, List, CalloutCard} from '@shopify/polaris';
import * as PropTypes from 'prop-types';

export default class Dashboard extends React.Component {
    constructor(props) {
        super(props);

    }
    ;
            render() {
        /* Some css code has been removed for brevity */
        return (
                <CalloutCard
                    title="Customize the style of your checkout"
                    illustration="https://cdn.shopify.com/s/assets/admin/checkout/settings-customizecart-705f57c725ac05be5a34ec20c05b94298cb8afd10aac7bd9c7ad02030f48cfa0.svg"
                    >
                    <p>Upload your store’s logo, change colors and fonts, and more.</p>
                </CalloutCard>
                );
    }
}
Dashboard.contextTypes={
    easdk: PropTypes.object
};
    