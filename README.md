stripe-connect-silex
====================

Example of a minimal Stripe connect authentication flow using PHP & Silex.  

You can use this as a starting point for development, or if you're just
looking for a quick way to sign users up to your Stripe connect platform, you can

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

## Configuration
Two environment variables (config vars for Heroku) are needed:

+ `CLIENT_ID`: Stripe connect client ID from [settings](https://dashboard.stripe.com/account/applications/settings)
+ `API_KEY`: Stripe secret key from [apikeys](https://dashboard.stripe.com/account/apikeys)

For development you can create a new file called `.env` in the project root and add these values, they'll be read and used automatically.

## Redirection
You'll need to set the redirect URI for the callback from Stripe.
In the [settings](https://dashboard.stripe.com/account/applications/settings) panel, set the Redirect URI to (by default) `[app url]/callback`, so for example if you deployed to Heroku and used your production Client ID and Secret, you should set the production Redirect URI to `https://[chosen-app-name].herokuapp.com/callback`.

## Further development
That's as much as you need to do to get everything working. You'll probably want to at least customise the markup in `web/views`.
