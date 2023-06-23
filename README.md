# SalaryManagement

<b> Scenario : </b> Suppose a company has some employees and every employee take leaves monthly and does overtime, so instead of calculation manually, we have to provide a laravel app by which admin can calculate their salary by providing input of total working days, leaves taken and how many overtimes an employee has done.
<br>
For completion of above task, do: <br>

• Create an authentication for admin, for that first create a migration for admin, in migration write code for adding following columns
name - varchar, email - varchar, password - varchar, profile - varchar
<br>

Migrate above migration <br>


Create a seeder for default admin, in default admin, insert a record for a admin with following data : <br>
Name - Admin, Email : admin@email.com, Password = Hash of 12345678 <br>

Create a route for the admin file and use it in RouteServiceProvider. <br>

Create a login page for admin, After login, redirect to dashboard page where we could display total no. of employees, this month attendance percent, last month attendance percent. <br>


In the sidebar, add 1 link for employees by which we can view all employees. <br>

Also create a CRUD operation  for Employee, for that you have to create a another migration for employees with following fields : 
name, email, mobile, address, base_salary <br>

Create a migration for salaries, with following fields: <br>
employee_id, month, year, total_working_days, total_leave_taken, overtime <br>
Total_salary_made - double - default 0, Is_salary_calcualated - tinyint - default 0 <br>

Add a form to insert salary of the month. Employee should be select box in that form. Do not take input for total_salary_made and is_salary_calculated.
Make sure salary of an employee should not be inserted twice for the same employee with same month and year.
Create a console command which will run in every second day month, in which we get all the salaries which has Is_salary_calcualated is 0 from salaries table. 
Loop from all salaries and calculate the salary of every row by formula : 
Total_salary = ($per_day_salary * (total_working_days - leaves_taken + overtime/8));
$per_day_salary is calculated by employee base salary / total working days.
After calculating salary, update the calculated in same row and also update is is_salary_calculated = 1;
After calculating each salary, mail that employee his salary details, 
Send every mail using queue.
Create another link for salary details in which I can get all calculated salary with pagination of 10




## Laravel Multi Authentication System (Admin) in Laravel 10

<li> composer require laravel/breeze </li>
<li> php artisan breeze:install </li>
<li> npm install </li>
<li> npm run build </li>
<li> php artisan serve </li>

# Steps to Run the application on local system

1. Clone this repository in your local system.
2. To download the <b>node_modules</b> folders in a Laravel application, you can use the following steps: <br>
• Open your command-line interface (CLI) or terminal. <br>
• Navigate to the root directory of your Laravel application. <br>
• `npm install` and `composer install` <br>
• `php artisan schedule:run` execute this console command and see the result in storage/logs/laravel.log file

3. Run this command `php artisan serve` to start the server.
4. Start the application from `http://127.0.0.1:8000/` using local server.
5. To access the admin dashboard go to `http://127.0.0.1:8000/admin/login` using local server.

--- 
<h3 align='center'>Hope you like this application :)</h3>
<h4 align='center'>Show some ❤️ by giving ⭐ to this repository !!</h4>
