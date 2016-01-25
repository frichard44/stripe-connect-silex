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

If you are developing locally, you can create a new file called `.env`
in the project root, add these values, and they'll be read and used
automatically.
