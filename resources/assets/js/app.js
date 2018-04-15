require('./bootstrap');
 

/* Import the Main component */
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Main from './components/Main';
import Login from './components/Login';
import Dashboard from './components/store/Dashboard';

import '@shopify/polaris/styles.css';

if (document.getElementById('login')) {
    ReactDOM.render(<Login />, document.getElementById('login'));
}
if (document.getElementById('dashboard')) {
    ReactDOM.render(<Dashboard />, document.getElementById('dashboard'));
}
