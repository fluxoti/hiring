# HN User Lookup
Search for an user to list all his publications on Hacker News - stories, comments, pools and jobs.

## Want to run it in your computer?
You will need have Docker and Docker Compose installed in your system to be able to follow the steps below:

1. Clone the project on your system
   `git clone git@gitlab.com:lcdss/hn-user-lookup.git`
2. Access the project root directory
   `cd hn-user-lookup`
3. Push and run the docker containers
   `docker-compose up -d`
4. Access the box container
   `docker-compose exec box sh`
5. Access the server directory and install the dependencies
   `cd server && composer install`
6. Generate the server key
   `php artisan key:generate`
7. Copy the example environment file
   `cp .env.example .env`
8. Run the api server - It'll be available at http://localhost:8000/api
   `php artisan serve --host 0.0.0.0`
9.  Access the client directory and install the dependencies
   `cd ../client && yarn`
10. Copy the client example environment file
    `cp .env.example .env.local`
11. Run the client - It'll be available at http://localhost:3000
   `yarn run serve --port 3000`
12. Now it's ready! Access the above link in your preferred browser.

## DEMO

API: https://hn-user-lookup.herokuapp.com/api

Client: https://hn-user-lookup.surge.sh

## What was used?

- Laravel 5.8
- Vue CLI
- Vue
- Vuex
- Axios
- SASS
