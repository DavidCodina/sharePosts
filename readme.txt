


	sharePosts:
	

	Demo: https://tests.davidmcodina.com/shareposts/
	
	This project is based off of the Object Oriented PHP & MVC tutorial by Brad Traversy:
	https://www.udemy.com/object-oriented-php-mvc/
	
	The test user email is:    jdoe@gmail.com
	The test user password is: 123456

	In order to get this working you need to edit config.php.
	Set the values for URLROOT, SITENAME, DB_HOST (usually 'localhost'), DB_USER, DB_PASS, and DB_NAME	
	according to your use case:

		define('APPROOT', dirname(dirname(__FILE__)));
  		define('URLROOT', _YOUR_URL_);        		//e.g., 'http://localhost/shareposts'
  		define('SITENAME', _YOUR_SITENAME_);  		//e.g., 'SharePosts'

  		//Database Parameters:
  		define('DB_HOST', 'localhost');
  		define('DB_USER', _YOUR_USER_);       		//Will be 'root' by default if using XAMPP
  		define('DB_PASS', _YOUR_PASSWORD_);   		//Will be '' by default in XAMPP
  		define('DB_NAME', _YOUR_DB_NAME_);    		//Set up a database, in phpmyadmin, on computer, or remotely.


	Additionally, there are three .htaccess files in this project:

		One is at the root of the project folder.
		One is inside the app folder.
		One is inside the public folder.


	If you intend to change the name of the project folder then make sure to go to
	app/public/.htaccess and change this line:

		RewriteBase /shareposts/public

		
	Change shareposts to the name of your project folder
	Note also that the RewriteBase is assuming that your project is a direct child of htdocs.
	
	
	


	

