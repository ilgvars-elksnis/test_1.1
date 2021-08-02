# Usage
Steps to make this web page work.

## XAMPP
This task utilizes [XAMPP 8.0.6](https://www.apachefriends.org/index.html) to launch local server and database.

### Database Setup

First in phpMyAdmin we create new databse **test**. Inside we make new table **registration** with 3 columns, id, emails, date
|id|emails|date|
|--|-----|----|
|1|test@example.lv|2021-03-24 12:23:43|

```
structure is as follows

id - auto increment should set Type as int 
emails - Type varchar(50)
date - Type datetime
```

### Launch

On XAMPP control panel start apache and mysql servers.

After local servers are online there are 2 options to launch webpage

Primary - in terminal go to directory where webpage is located. If user is windows it's possible there will be need to manually add path to php command. 
Use command
```
php -S localhost:8000 (any other free port should work too)
```

Secondary - put the webpage directory in **...\xampp\htdocs** then in url insert **localhost/(directories name which contains files, by default should be test)/**

### Database

Can be accessed depending on launch method

Primary - in url after port just type in **/database.php**, example **localhost:86/database.php**

Secondary - in url **localhost/test/database.php**
