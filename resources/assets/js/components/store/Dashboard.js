import React from 'react';
import {render} from 'react-dom';
import * as PropTypes from 'prop-types';
import {Page, Card, Button, Layout, FormLayout, TextField, Select} from '@shopify/polaris';
import {EmbeddedApp} from '@shopify/polaris/embedded';

class Dashboard extends React.Component {
  // This line is very important! It tells React to attach the `easdk`
  // object to `this.context` within your component.
  constructor(props) {

        super(props);
        this.state = {
            selectedToCompare:null,
            selectedWithCompare:null,
        };
        this.themes = [];
        this.handleChangeToCompare = this.handleChangeToCompare.bind(this);
        this.handleChangeWithCompare = this.handleChangeWithCompare.bind(this);
        this.getThemes = this.getThemes.bind(this);
        this.getThemes();
}
getThemes(){
    fetch("get_themes",{
        method:"get"
    }).then(res => {
  return res.json() // download the body as JSON
}).then(res => {
         debugger;
         this.themes = res.themes;
     }
                    );
}
handleChangeToCompare(newValue) {
    this.setState({selectedToCompare: newValue});
  }
handleChangeWithCompare(newValue) {
    this.setState({selectedWithCompare: newValue});
  }
  render() {
      
    return (
      <Page
  title="Themes"
>
 <Layout>
  <Layout.AnnotatedSection
    title="Store details"
    description="Shopify and your customers will use this information to contact you.">
    <Card sectioned>
      <FormLayout>
        <FormLayout.Group>
            <Select
                label="To compare"
                options={this.themes}
                onChange={this.handleChangeToCompare}
                value={this.state.selectedToCompare}
              />
              <Select
                label="With Compare"
                options={this.themes}
                onChange={this.handleChangeWithCompare}
                value={this.state.selectedWithCompare}
              />
        </FormLayout.Group>
      </FormLayout>
    </Card>
  </Layout.AnnotatedSection>
</Layout>
</Page>
    );
  }
}
Dashboard.contextTypes = {
    easdk: PropTypes.object
  };
if (document.getElementById('root')) {
    var api_key = window.api_key;
    var shop_name = "https://"+window.shop_name+"/";
render(
  <EmbeddedApp
    apiKey={api_key}
    shopOrigin={shop_name}
  >
    <Dashboard />
  </EmbeddedApp>,
  document.querySelector('#root')
);
}