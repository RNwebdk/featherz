featherz

when changing the env config file
composer dumpautoload

Pinx documentation
https://phinx.readthedocs.io/en/latest/migrations.html


Migration:
vendor/bin/phinx create CreateUserTable
vendor/bin/phinx migrate


Seeding:
vendor/bin/phinx seed:create UserSeeder
vendor/bin/phinx seed:run


Mailhog:
https://github.com/mailhog/MailHog
http://featherz.local:8025/


Mailcatcher setup:
https://dor.ky/install-mailcatcher-on-laravel-homestead/
https://blog.bobbyallen.me/2014/10/21/installing-mailcatcher-support-in-laravel-homestead/
sudo apt install ruby2.5 ruby2.5-dev
sudo apt-get install ruby2.3-dev

sudo nano /etc/init/mailcatcher.conf

<!-- 
description "Mailcatcher"

start on runlevel [2345]
stop on runlevel [!2345]

respawn

exec /usr/bin/env $(which mailcatcher) --foreground --http-ip=0.0.0.0 
-->

sudo service mailcatcher start

