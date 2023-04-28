# php_assessment
Default Login:
- Username: admin
- Password: password

Planned Process:
1.	Initialize environment (“Hello World!” using XAMPP)
2.	Design database (“users” and “vehicles” table)
3.	Initialize database and tables
4.	Populate car picture table and directory (using entries from Long’s site)
5.	Create account creation/login page
6.	Create card list page
7.	Create individual car viewing page
8.	Clean up code and refine documentation

Future Goals/Improvement Ideas:
1.	Prevent data duplication
2.	Password requirements
3.	Visual cleanup and spacing
4.	Incorporate cookies to retain login information
5.	Email for validating account and resetting password
6.	Better incorporation of responsive design
7.	Input protection (SQL injection)
8.	AJAX to make account creation more usable (trouble when page reloads because POST)
9.	Numbered pages to easily navigate numerous entries
10.	Add a navigation bar to the top and info bar to the bottom
11.	Multiple Pictures per car to click through
12.	Expand the "Vehicle Listed __ Days Ago" functionality

The MySQL database was created using phpMyAdmin. The schema can be found in picture form (db_schema.png) and in exported SQL form (assessment_db.sql). It has two tables: one for storing user information and one for storing vehicle listing information. For the purposes of this assessment, there were no relations between tables. Serial values were used as primary keys so input for account creation needed to be protected within index.php.
