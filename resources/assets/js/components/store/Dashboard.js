import React from 'react';
import {render} from 'react-dom';
import * as PropTypes from 'prop-types';
import {Page, Card, Button} from '@shopify/polaris';
import {EmbeddedApp} from '@shopify/polaris/embedded';

class Dashboard extends React.Component {
  // This line is very important! It tells React to attach the `easdk`
  // object to `this.context` within your component.
  
  render() {
    return (
      <Page title="Example application">
        <Card sectioned>
          <Button onClick={() => this.context.easdk.startLoading()}>
            Start loading
          </Button>
          <Button onClick={() => this.context.easdk.stopLoading()}>
            Stop loading
          </Button>
        </Card>
      </Page>
    );
  }
}
Dashboard.contextTypes = {
    easdk: PropTypes.object
  };
if (document.getElementById('dashboard')) {
render(
  <EmbeddedApp
    apiKey="d5d77a79f3bda1bd18844814af04e672"
    shopOrigin="https://em-sc-2.myshopify.com"
  >
    <Dashboard />
  </EmbeddedApp>,
  document.querySelector('#dashboard')
);
}