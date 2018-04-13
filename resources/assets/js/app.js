require('./bootstrap');
 

/* Import the Main component */
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Main from './components/Main';
import Login from './components/Login';

import '@shopify/polaris/styles.css';

if (document.getElementById('root')) {
    ReactDOM.render(<Login />, document.getElementById('root'));
}