# MeMart

![MeMart reseller dashboard](https://i.imgur.com/txh5s4B.png)
**MeMart** is a web application that functions to supervise resellers who work with the **Mimake** minimarket at my school.

## Installation Guide

 1. Clone or download this repository
	> `git clone https://github.com/rafiseptian90/MeMart.git`
	
 2. Rename .env.example into .env
 3. Run composer install command on your terminal
	 > `composer install`
	 
 4. Generate the key of laravel application
	  > `php artisan key:generate`
	  
 5. Import the database dump inside folder **db-dump** to your database
 6. Change env database with your own configuration
	 > DB_DATABASE=your_db_name_after_import_db-dump.sql <br />
       DB_USERNAME=your_db_username <br /> 
       DB_PASSWORD=your_db_password
 7. Run the with command `php artisan serve` and enjoy
