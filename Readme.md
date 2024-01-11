# Instructions for all the Task for the internship

## Prerequisites

Web server (e.g., Apache, Nginx)
PHP 8.0 or higher
MySQL database

## Installation

1. Clone the repository:

```Bash
git clone https://github.com/ranjan3nov/erc_max_internship_task.git
```

2. Create the database:

Import the SQL file located in the root of the project into your MySQL database.

3. Configure the database connection:

Open config/Database.php of the Task1 and Task3 and update the following with your database credentials:

```php
private $host = "";
private $username = '';
private $password = '';
private $db_name = '';
```

## Usage

Task 1: Login and Registration

Access the login page at http://{host}/code/login.php.
Access the registration page at http://{host}/code/register.php.
The main user page is located at http://{host}/code/user.php

- config directory only contains the Databse setup
- code directory contains the code logic for login and register
- login.php in the code directory just check and redirect to user.php
- register.php in the code directory just check and redirect to user.php
- User.php in the code contains the actual logic to register and login
- Some Custom Css is added in the css/style.css

Task 2: Picture Upload

Open index.php in a web browser.
Upload a picture (maximum size: 2 MB can be increased).
The uploaded picture will be saved in the uploads directory.
To adjust the maximum file size, modify upload.php.

Task 3: Data API

Add Data:
Use the POST method to http://{host}/add_data.php.
Pass data in JSON format in the request body.
Get Data:
Use the GET method to http://{host}/get_data.php.
The response will be a JSON array of data.

Task 4: Client-Side Setup

Open index.html.
Update the values of url_add_data and url_get_data on lines 49 and 50, respectively, to match your server's hostname.

## Additional Notes

Custom CSS: The css/style.css file contains custom CSS styles.
Directory Structure:

### Task 1 -

- config/: Database configuration.
- code/: PHP code for login, registration, and user functionality.
- Index.php View of login
- home.php View of welcome message
- register.php For registration
- logout.php For logout

### Task 2 -

- uploads/: Directory for uploaded pictures.
- index.php: Home page for uploading and to show the uploaded image.
- upload.php: PHP Script to upload.

### Task 3 -

- config/: Database configuration.
- add_data.php/: PHP script which add the Produc_name.
- get_data.php/: PHP script which get all the product_name.

### Task 4 -

- index.html: Consumes the API and Show all the product_name using JS
