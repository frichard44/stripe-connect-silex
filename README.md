stripe-connect-silex
====================

Example of a minimal Stripe connect authentication flow using PHP & Silex.  

If you just need a quick way to sign users up to your Stripe connect platform, you can deploy a copy to Heroku for free:

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

## Configuration
Two environment variables (config vars for Heroku) are needed:

+ `CLIENT_ID`: Stripe connect client ID from [settings](https://dashboard.stripe.com/account/applications/settings)
+ `API_KEY`: Stripe secret key from [apikeys](https://dashboard.stripe.com/account/apikeys)

For development you can create a new file called `.env` in the project root and add these values, they'll be read and used automatically.

## Redirection
You'll need to set the redirect URI for the callback from Stripe in the [settings](https://dashboard.stripe.com/account/applications/settings) panel.

By default this should be `[your app url]/callback`. For example - if deployed to Heroku, the redirect URL is `https://[app-name].herokuapp.com/callback`.

## Further development
That's as much as you need to do to get everything working. The PHP is minimal and commented. You'll probably want to customise the markup in `web/views`.
