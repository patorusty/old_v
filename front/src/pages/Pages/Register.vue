<template>
  <div class="container">
    <div class="row">
      <div class="col-md-5 ml-auto">
        <div class="info-area info-horizontal mt-5">
          <div class="icon icon-warning">
            <i class="tim-icons icon-wifi"></i>
          </div>
          <div class="description">
            <h3 class="info-title">Marketing</h3>
            <p class="description">
              We've created the marketing campaign of the website. It was a very
              interesting collaboration.
            </p>
          </div>
        </div>
        <div class="info-area info-horizontal">
          <div class="icon icon-primary">
            <i class="tim-icons icon-triangle-right-17"></i>
          </div>
          <div class="description">
            <h3 class="info-title">Fully Coded in HTML5</h3>
            <p class="description">
              We've developed the website with HTML5 and CSS3. The client has
              access to the code using GitHub.
            </p>
          </div>
        </div>
        <div class="info-area info-horizontal">
          <div class="icon icon-info">
            <i class="tim-icons icon-trophy"></i>
          </div>
          <div class="description">
            <h3 class="info-title">Built Audience</h3>
            <p class="description">
              There is also a Fully Customizable CMS Admin Dashboard for this
              product.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-7 mr-auto">
        <card class="card-register card-white">
          <template slot="header">
            <img class="card-img" src="img/card-primary.png" alt="Card image" />
            <h4 class="card-title">Register</h4>
          </template>

          <form @submit.prevent>
            <base-input
              placeholder="Full Name"
              addon-left-icon="tim-icons icon-single-02"
            >
            </base-input>

            <base-input
              placeholder="Email"
              addon-left-icon="tim-icons icon-email-85"
            >
            </base-input>

            <base-input
              placeholder="Password"
              addon-left-icon="tim-icons icon-lock-circle"
            >
            </base-input>

            <base-checkbox class="text-left">
              I agree to the <a href="#something">terms and conditions</a>.
            </base-checkbox>
          </form>

          <base-button slot="footer" type="primary" round block size="lg">
            Get Started
          </base-button>
        </card>
      </div>
    </div>
  </div>
</template>
<script>
import { BaseCheckbox } from 'src/components';

export default {
  components: {
    BaseCheckbox
  }
};
</script>
<style></style>
