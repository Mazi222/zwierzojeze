# Employee Magaging System

This project was created to support drivers management in a local pizza restaurant that I worked in. It gives you a possibility to register as a manager, then add your list of drivers to the database and after each working day you make a report who has worked on this day and how many hours have they worked. Those shifts are also stored in a DB and you can request the website to generate a summary from selected time period.

## Technologies
  * HTML 5
  * CSS 3
  * PHP 7
 * jQuery 3.2.1
 * Bootstrap 4
 
I have also used a basic MVC framework written by myself

## Configuration
After you clone my repo into "workers" directoryt there are some things that you must set to make it work.
* Create a new database (name it "workers") and then import workers.sql file into it.
* In app/config/config.php change the DB params and the URL root.
* You also have to make sure that .htaccess files are supported on your server.

After all that you should be able to succesfully run the webpage.
