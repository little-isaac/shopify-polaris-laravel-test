import React, {Component} from 'react';
import {Page, Card, Button,List,TextField} from '@shopify/polaris';

export default class Login extends React.Component {
    constructor() {

        super();
        this.loginBtbClicked = this.loginBtbClicked.bind(this);
}
loginBtbClicked() {
      debugger;
      console.log('Hello');
}
render() {
    debugger;
    /* Some css code has been removed for brevity */
    var divStyle = {
        width: '500px'
    };
    return (
        <div className="mt-5 mx-auto" style={ divStyle }>
        <Card title="Login" subdued sectioned>
            <div>
            <TextField label="Store Url" type="text" helpText='ex. store.myshopify.com'></TextField>
            </div>
            <div className="mt-5">
            <Button  size="large" fullWidth primary onClick={this.loginBtbClicked} >Login</Button>
            </div>
        </Card>
        </div>
        );
    }
}