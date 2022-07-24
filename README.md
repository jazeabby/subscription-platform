
## About Subscription Platform

This API platform is based on Laravel consists of 2 main APIs.

## Requirements

- PHP ^7.3|^8.0
- Composer V2
- Supervisor for auto-running of queues(optional)

## Deploying Steps

- Clone this repo
- Copy .env.example to .env. 
- Change following values in .env file
  ```
    # database settings and configuration
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    
    QUEUE_CONNECTION=database

    # change following to your email settings
    MAIL_MAILER=log
  ```
- Run following command to migrate the db and add seed data:
  ```
  php artisan migrate --seed
  ```
- Run following command to send emails
  ```
  php artisan send:emails
  ```
- Run following command for queue to work
  ```
  php artisan queue:work --queue=emails
  ```
- Import `Subscribe Websites.postman_collection.json` to Postman to check API endpoints and Payload 