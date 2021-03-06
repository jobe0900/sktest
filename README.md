# sktest.app

A small Laravel web app with BDD testing using Behat.

## To try out

1. Clone the repo somewhere on your Laravel machine

    ```bash
    laravel $ git clone https://github.com/jobe0900/sktest.git new_test
    ```

2. Move into the webapp folder

    ```bash
    laravel $ cd new_test/webapp
    ```

3. Install needed packages

    ```bash
    laravel $ composer install
    ```

4. Get the database up

    ```bash
    laravel $ php artisan migrate --seed
    ```

5. Run the test

    ```bash
    laravel $ vendor/bin/behat
    ```

6. If you want to run serve the webapp, make it available to the webserver as 'sktest.app'

    ```bash
    laravel $ serve sktest.app $PWD/public/
    ```

7. Make that domain known on your client machine. (If your laraval-machine has ip 10.11.1.100:)

    ```bash
    local $ sudo vim /etc/hosts
    10.11.1.100  sktest.app
    ```

8. Point your browser at "sktest.app". Try logging in with:

   ```
    E-mail: test@email.com
    Password: secret_pass
    ```
