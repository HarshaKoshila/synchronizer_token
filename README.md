Synchronizer Token 
blog post url -> https://fsocietylk.wordpress.com/2018/05/27/csrf-protection-via-synchronizer-token/
Instructions for locally setting up the website

Prerequisites
web server installed in local computer(apache, tomcat or iis etc.)
if not download apache web server at http://directory.apache.org/studio/download/download-windows.html
import user.sql find in the source repository, to the newly created database ‘user’ in mySQL.

Windows
1.go to the web server directory
for apache c:/program files/apache/htdocs (if it is the wamp server this would be c:/wamp/www)
2.place csrf_protection folder inside htdocs directory
3.start the apache http server
  a.start cmd and cd into the c:\program files\apache software foundation\apache2.4\bin
  b.type httpd.exe
4.start the web browser and type http://localhost/csrf_protection/login.php

Linux environment
1.go to /var/www/html directory
2.place csrf_protection directory inside html direcotry
3.start the terminal and type service apache2 start
4.start the web browser and type http://localhost/csrf_protection/login.php
