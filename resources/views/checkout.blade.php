@extends('layouts.default')

@prepend('scripts')
    <script src="https://js.stripe.com/v3/"></script>
@endprepend

@section('content')
   <div class="container">
      <div class="py-5 text-center">
        <h1>Checkout</h1>
      </div>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-danger badge-pill">{{ Cart::content()->count() }}</span>
          </h4>
          <ul class="list-group mb-3">
            @foreach (Cart::content() as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $item->name }}</h6>
                        <small class="text-muted">Quantity {{ $item->qty }}</small>
                    </div>
                    <span class="text-muted">€ {{ number_format($item->price,2,'.','') }}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
              <span>Shipping</span>
              <strong>€ {{ number_format(Shipping::total(),2,'.','') }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between text-success">
              <span>Total (EURO)</span>
              <strong>€ {{ number_format(Cart::total() + Shipping::total(),2,'.','') }}</strong>
            </li>
          </ul>

        </div>
        <div class="col-md-8 order-md-1">
          <div class="card">
              <form action="{{ route('cart.checkout') }}" method="post" id="payment-form" class="needs-validation">
                  @csrf                   
                    <div class="card-header">
                        <label for="card-element">
                            We accept:
                        </label>
                        <img src="{{ asset('images/icons/visa.png') }}" alt="visa">
                        <img src="{{ asset('images/icons/mastercard.png') }}" alt="mastercard">
                        <img src="{{ asset('images/icons/american_express.png') }}" alt="american_express">
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="surname">Surname</label>
                            <input type="text" id="surname" name="surname" class="form-control" required>
                          </div>
                        </div>
                        <div class="from-group">
                          <label for="email">Email</label>
                          <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="from-group">
                          <label for="address">Address</label>
                          <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <div class="form-row">
                          <div class="col-md-4">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" class="form-control" required>
                          </div>
                          <div class="col-md-4">
                            <label for="county">County/State</label>
                            <input type="text" id="county" name="county" class="form-control" required>
                          </div>
                          <div class="col-md-4">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                          </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::check() == true ? Auth::user()->id : null }}">
                        <div class="form-group">
                          <label for="card-element">Card Details</label>
                          <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Card number:</strong>4242 4242 4242 4242
                            <strong>Expiry:</strong>any
                            <strong>CVC:</strong>any
                            <strong>ZIP:</strong>any
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div id="card-element" class="form-control">
                          <!-- A Stripe Element will be inserted here. -->
                          </div>
                          <!-- Used to display form errors. -->
                          <div id="card-errors" class="invalid-feedback" role="alert"></div>
                        </div>
                    </div>
                  <div class="card-footer text-center">
                      <button class="btn btn-block btn-primary" type="submit">Pay € {{ number_format(Cart::total() + Shipping::total(),2,'.','') }}</button>
                  </div>
              </form>
            </div>
        </div>
      </div>
   </div>
@endsection

@push('scripts')
    <script>
            // Create a Stripe client.
      var stripe = Stripe('{{ env('STRIPE_KEY') }}');

      // Create an instance of Elements.
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
          base: {
              color: "#32325d",
              lineHeight: "18px",
              fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
              fontSmoothing: "antialiased",
              fontSize: "16px",
              "::placeholder": {
                  color: "#aab7c4"
              }
          },
          invalid: {
              color: "#fa755a",
              iconColor: "#fa755a"
          }
      };

      // Create an instance of the card Element.
      var card = elements.create("card", { style: style });

      // Add an instance of the card Element into the `card-element` <div>.
      card.mount("#card-element");

      // Handle real-time validation errors from the card Element.
      card.addEventListener("change", function(event) {
          var displayError = document.getElementById("card-errors");
          if (event.error) {
              displayError.textContent = event.error.message;
          } else {
              displayError.textContent = "";
          }
      });

      // Handle form submission.
      var form = document.getElementById("payment-form");
      form.addEventListener("submit", function(event) {
          event.preventDefault();

          stripe.createToken(card).then(function(result) {
              if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById("card-errors");
                  errorElement.textContent = result.error.message;
              } else {
                  // Send the token to your server.
                  stripeTokenHandler(result.token);
              }
          });
      });

      // Submit the form with the token ID.
      function stripeTokenHandler(token) {
          // Insert the token ID into the form so it gets submitted to the server
          var form = document.getElementById("payment-form");
          var hiddenInput = document.createElement("input");
          hiddenInput.setAttribute("type", "hidden");
          hiddenInput.setAttribute("name", "stripeToken");
          hiddenInput.setAttribute("value", token.id);
          form.appendChild(hiddenInput);

          // Submit the form
          form.submit();
      }

    </script>
@endpush