@extends('app')
@section('title', '| Create New Campaign')
@section('content')

<div class="container">
<center>
    <div class="box white">
    <div class="card z-depth-3">
      <div class="row center-align">
        <img src="{{ asset('img/logo.png') }}" alt="">
      </div>
      <div class="container" style="padding:3% 0 3% 0"><br>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title"><b></b></h1>
          </div>
          <div class="panel-body">
            <form action="{{ route('donate.store') }}" method="POST" id="payment-form">
              {{csrf_field()}}
              <div class="input-field col s12">
               <input  pattern= "[0-9]" title="Integer Only: [0-9]" required id="amount" type="number" min="50" class="validate" name="amount" placeholder="Minimum of &#8369; 50">
               <label class="blue-text text-lighten-1" for="amount">Amount:</label>
             </div>
              <!-- <div class="input-field col s12">
               <input name="A_email" required id="email" type="email" class="validate" @if(Auth::check()) disabled value="{{ Auth::user()->email }}" @else value="" @endif>
               <label class="blue-text text-lighten-1" for="email">Email:</label>
             </div>
             <div class="input-field col s12">
               <input name="A_name" required id="name" type="text" class="validate"  @if(Auth::check()) disabled value="{{ Auth::user()->name }}" @else value="" @endif>
               <label class="blue-text text-lighten-1" for="name">Name:</label>
             </div>
             <div class="input-field col s12">
               <input name="A_contactNo" required id="phone" type="text" class="validate"  @if(Auth::check()) disabled value="{{ Auth::user()->contactNo }}" @else value="" @endif>
               <label class="blue-text text-lighten-1" for="phone">Tel No:</label>
             </div> -->
              <div class="form-row">
                <label for="card-element" class="blue-text text-lighten-1">
                  Credit or debit card
                </label>
                <div id="card-element" class="field"></div>
                <div id="card-errors" role="alert"></div>
              </div>
              <input type="hidden" name="c_id" value="{{ $campaign->id }}">
              <div class="row">
                <div class="col-md-12 right-align"><br><br><br>
                  <input type="submit" name="" value="DONATE" class="btn-large btn btn-info" style="width:100%;">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</center>

</div>

@endsection

@section('scripts')

<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
var stripe = Stripe('pk_test_wMw2TMfOGqdzb47apTLFl4ji');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
base: {
  color: '#32325d',
  lineHeight: '24px',
  fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
  fontSmoothing: 'antialiased',
  fontSize: '16px',
  '::placeholder': {
    color: '#aab7c4'
  }
},
invalid: {
  color: '#fa755a',
  iconColor: '#fa755a'
}
};

// Create an instance of the card Element
var card = elements.create('card', {'hidePostalCode': true});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
var displayError = document.getElementById('card-errors');
if (event.error) {
  displayError.textContent = event.error.message;
} else {
  displayError.textContent = '';
}
});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
event.preventDefault();

stripe.createToken(card).then(function(result) {
  if (result.error) {
    // Inform the user if there was an error
    var errorElement = document.getElementById('card-errors');
    errorElement.textContent = result.error.message;
  } else {
    // Send the token to your server
    stripeTokenHandler(result.token);
  }
});
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection
