## Setup Guide
Clone/checkout from [repo](https://github.com/ParthRavani/crm_demo)

- Install php [composer](https://getcomposer.org/) dependency management <br />
    - [windows](https://getcomposer.org/doc/00-intro.md#installation-windows)<br />
    - [Linux / Unix / macOS](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)<br />

- Run Composer command everything you change branch or pull from server
    
        composer update

- Create .env similar to .env.example  *Don't delete this file make copy of this file*

- Set variables name in .env (and also create DB in your server) : <br/>
    >DB_DATABASE={DBName}<br/>
    >DB_DATABASE={DBUser}<br/>
    >DB_PASSWORD={DBUserPassword}<br/>

- Then generate API key by running bellow command in project directory.
    
        php artisan key:generate
        
- Run bellow command to cache config file
    
        php artisan config:cache

- Populate DB and all default value by bellow command
    
        php artisan migrate --seed

- Run bellow command to make storage as public
    
        php artisan storage:link
