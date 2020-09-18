featherz


Pinx documentation
https://phinx.readthedocs.io/en/latest/migrations.html

Migration:
vendor/bin/phinx create CreateUserTable
vendor/bin/phinx migrate

Seeding:
vendor/bin/phinx seed:create UserSeeder
vendor/bin/phinx seed:run
