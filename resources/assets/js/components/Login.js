import React, {Component} from 'react';
import fetch from 'node-fetch';
import {Page, Card, Button,List,TextField} from '@shopify/polaris';

export default class Login extends React.Component {
        
    constructor(props) {

        super(props);
        this.state = {
            login_btn_loading:false,
            store_name:'',
            store_name_error:null,
        };
        this.loginBtbClicked = this.loginBtbClicked.bind(this);
        this.handleStoreNameChange = this.handleStoreNameChange.bind(this);
        this.check_valid_store_name = this.check_valid_store_name.bind(this);
}
loginBtbClicked(e) {
    if(!this.check_valid_store_name()){
        return false;
    }
    this.setState({
        login_btn_loading:true
    });
    
    fetch("login/shopify?shop="+this.state.store_name,{
        method:"get"
    })
     .then(res => {
  return res.json() // download the body as JSON
}).then(res => {
         location.href=res.url
     }
                    );
  }
check_valid_store_name(){
    
    var store_name = this.state.store_name;
    if(!store_name){
        this.setState({
            store_name_error:'Please enter store name first'
        });
        return false;
    }
    
    if(!store_name.includes('.myshopify.com') || store_name == ".myshopify.com"){
        this.setState({
            store_name_error:'Please enter valid store name'
        });
        return false;
    }
    return true;
}
handleStoreNameChange (store_name) {
    
    this.setState({store_name});
  }
render() {
    /* Some css code has been removed for brevity */
    return (
            <div className="mt-5 mx-auto">
        <Card title="Login" subdued sectioned>
            <div>
            <TextField label="Store Url" error={this.state.store_name_error} value={this.state.store_name} onChange={this.handleStoreNameChange} type="text" helpText='ex. store.myshopify.com'></TextField>
            </div>
            <div className="mt-5">
            <Button  size="large" fullWidth primary onClick={this.loginBtbClicked} loading={this.state.login_btn_loading}>Login</Button>
            </div>
        </Card>
        </div>
        );
    }
}