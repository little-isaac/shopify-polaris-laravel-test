require('./bootstrap');
 

/* Import the Main component */
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {EmbeddedApp} from '@shopify/polaris/embedded';
import Login from './components/Login';
import Dashboard from './components/store/Dashboard';

import '@shopify/polaris/styles.css';

if (document.getElementById('login')) {
    ReactDOM.render(<Login />, document.getElementById('login'));
}
if (document.getElementById('dashboard')) {
    ReactDOM.render(
            <EmbeddedApp
    apiKey="d5d77a79f3bda1bd18844814af04e672"
    shopOrigin="https://em-sc-2.myshopify.com"
    >
    <Dashboard />
    </EmbeddedApp>, 
    document.getElementById('dashboard'));
}
