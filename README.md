
##Setting up
1. Copy over the composer.json and run `composer install` at the docroot
1. Copy over the .gitignore
1. Make README.md
1. Duplicate setup
  * Make `tests`, `app`, `src`, `views`, `web` folders
  * Make `web/index.php`, `views/index.html.twig`, and `app/app.php` files and copy over the data
  * Test and debug the home page
  * Copy over setup info. for src, tests, and views files

------
# COPIED OVER FROM MY TODO APP
##Desription

This is a basic To-Do app written in PHP and MySQL with Silex and Twig. Locally, I used Acquia DevDesktop for MySQL and ran a PHP/Apache server .

It is an MVP and should be considered a work-in-progress. For information on how it was created checkout:

https://www.learnhowtoprogram.com/php/object-oriented-php/web-apps-with-silex

##Instructions

From the `web/` folder, start a PHP server: `php -S localhost:8000` and navigate to http://localhost:8000 on your browser.

If you are using on this project on a different setup than described above, you may see an error when testing that looks like this:


`PHP Fatal error:  Uncaught exception 'PDOException'...`

This is a sign that the PDO object you've instantiated does not match the location or credentials of your test database. Most likely the localhost port number in your app.php, TestTest.php, and CategoryTest.php file doesn't match the MySQL port number in your MAMP/LAMP/WAMP preferences. To fix the error in MAMP, open MAMP, click Prefer

#### Create a database
Create a database, open MySQL and enter the following:
> CREATE DATABASE to_do;
> USE to_do;
> CREATE TABLE tasks (id serial PRIMARY KEY, description VARCHAR (255));

#### MySQL

I was able to get MySQL working as follows:

```
$server = 'mysql:host=localhost:33067;dbname=to_do';
```

I found that number on the phpMyAdmin page where it stated:

```
127.0.0.1:33067
```


##Copyright

Copyright (c) <year> <copyright holders>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
