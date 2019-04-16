<template>
<div>
    <form action="/checkout" method="POST" id="payment-form" @submit.prevent="pay()">
      <div class="form-group">
          <label for="name_on_card">Name on Card:</label>
          <input type="text" class="form-control" id="name" v-validate="'required'" name="name" v-model="name">
           <span class="error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
      </div>

      <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" id="email" v-model="email" v-validate="'required|email'" name="email">
          <span class="error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
      </div>

      <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" class="form-control" id="phone" v-model="phone" v-validate="'required|min:11'" name="phone">
          <span class="error" v-if="errors.has('phone')">{{ errors.first('phone') }}</span>
      </div>

      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="amount">Amount:</label>
                  <select v-model="amount" class="form-control" name="amount" id="amount" v-validate="'required'">
                      <option v-for="data in amounts" :value="data.value">{{ data.text }}</option>
                  </select>
                  <span class="error" v-if="errors.has('amount')">{{ errors.first('amount') }}</span>
            </div>
        </div>
        <div class=" col-md-6">
          <div class="form-group">
              <label for="date">Set Date:</label>
                 <input type="date" v-model="date" name="date" id="date" class="form-control" v-validate="'required|date|after:tomorrow'">
                 <span class="error" v-if="errors.has('date')">{{ errors.first('date') }}</span>
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="card-element">Credit Card</label>
        <cardelement></cardelement>
    </div>

    <!-- CSRF Field -->
    <input type="hidden" name="_token" :value="csrf">

    <div class="spacer"></div>

    <button type="submit" class="btn btn-outline-info btn-md btn-block">Submit Payment</button>

    </form>
    <div class="form-group mt-2">
        <a href="/" class="btn btn-outline-light btn-block">Go back</a>
    </div>
</div>
</template>

<script>
    import { createToken, Card } from 'vue-stripe-elements-plus'

    export default {
        data () {
            return {
              csrf: document.head.querySelector('meta[name="csrf-token"]').content,
              name: '',
              email: '',
              phone: '',
              date: '',
              amount: '',
              amounts:[
                {text: '1,200.00 | Day', value: '1,200'},
                {text: '2,000.00 | Night ', value: '2,000'},
                {text: '7,000.00 | 7 Packs', value: '7,000'},
                {text: '10,000.00 | 10 Packs', value: '1,0000'}
              ],
              errorsMessages: []
            }
        },
        methods: {
         pay(){
           this.$validator.validateAll().then(() => {
            var options = {
              name: this.name
            } 
              createToken(options).then(result => {
                // var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);

                this.$el.appendChild(hiddenInput);

                // Submit the form
                this.$el.submit();  
            })
          })
         }
      }
    }
</script>
