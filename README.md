
# Carty-Craft

This project is a web application that contains some features of online shopping. With this application, users will be able to create, read, update, and delete products, view the product catalog, add products to the cart, view the products added to the cart where they can update the quantities or remove products, view the checkout page where they can see the summary of their order and a button to complete the order, and view a page containing all completed orders.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

For this project, you will need to set up a local development environment using XAMPP, MAMP, or a similar local server provider. XAMPP and MAMP are both free and open-source, and are popular choices for setting up a local development environment. They include a web server, a database, and other tools that developers need for creating and managing websites. Both packages are easy to install and set up, so you can get started quickly with creating your project.

In addition, you will also need to have Composer installed on your local machine. Composer is a dependency manager for PHP that is used to manage dependencies and libraries in your project. 

Once you have installed XAMPP or MAMP and Composer, you can proceed with setting up the project as described below.

[XAMPP](https://www.apachefriends.org/)

[Composer](https://getcomposer.org/)

### Installation

1. Begin by setting up Git on your local machine. To do this, go to the official Git website and download the latest version of the software.
    [GIT](https://git-scm.com/)

2. Navigate to the folder where you want to store the project.

3. Go to the project page on GitHub. On the project page, you will see a button ***<> CODE*** and a section labeled "SSH" inside with a long string of numbers and letters. Copy this SSH address to your clipboard. You will need this address in the next step.

4. Type the command “git clone [SSH address]” in Git Bash. This will download the project from GitHub onto your local machine.

5. Start Apache and MySQL in XAMPP (if not started already)

6. Navigate to ***Carty-Craft*** in Git Bash

7. Execute '***create_tables.php***' file inside database folder. Do it by typing command:
    `php database/create_tables.php`

    *This code is a PHP script that creates a database and adds products to a '***products***' table. It first reads an SQL file which is located in the same folder as this code and contains the necessary commands to create the database. Then, it establishes a connection to the database using a PDO (PHP Data Object). After that, it prompts the user if they would like to re-create the database. Finally, it executes the SQL commands from the file to create the database.*

8. Run the command `composer install` to install the project dependencies.
9. After that start the server on your local machine by typing:
    `php -S localhost:8888 -t public`

    *This code is a PHP command that starts a local server on your machine. The `php` command is used to start the server, and the `-S` flag is used to specify the hostname and port number to use (you can use any available port). The `-t` flag is used to specify the document's root directory, which is the '***public***' folder in this case. This command will start a local server which can be accessed at http://localhost:8888.*

10. Go to your browser and type 'http://localhost:8888' to access the app

11. Explore the app and enjoy


### Relevant Information

If you choose port other than ***8888***, you need to change that in the app, in '***src\Action\CartActions\AddToCartAction.php***' file:
    `  match ($_SERVER['HTTP_REFERER']) {
                 "http://localhost:[type your port here]/index.php?action=catalog" => header('Location: /index.php?action=catalog'),
                 "http://localhost:[type your port here]/index.php?action=cart" => header('Location: /index.php?action=cart')
    };`

