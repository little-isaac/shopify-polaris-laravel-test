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
      <Page
 breadcrumbs={[
    {content: 'Apps'}
  ]}
  title="Themes"
  primaryAction={{content: 'Save', disabled: true}}
  pagination={{
    hasPrevious: true,
    hasNext: true,
  }}
>
  <p>Page content</p>
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