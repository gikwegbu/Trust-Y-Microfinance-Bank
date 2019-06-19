
# Usage:

1.Install XAMPP, WAMP or something similar.

2.Copy all the files to c:/xampp/htdocs/mbank/
3.Create a db named as 'bank_db' and import the bank_db.sql from phpMyAdmin.

4.change the password in _inc/dbconn.php file accordingly.

5.visit localhost/microfinance/index (customer index page)

6.visit localhost/microfinance/admin/index.php (admin login)
username:admin
password:control

7.visit localhost/microfinance/staff/index.php (staff login)

Note: The customer passwords are hashed and stored in the database.
they are currently 123456 and username is customers email.

