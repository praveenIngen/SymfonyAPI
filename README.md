Before running this project we should have the PHP setup as a form of wamp or xampp.
I am using xampp for this project and configured the Symfony CLI as we as required configuration to run the symfony project.

Its configured in .env file 

DATABASE_URL="mysql://root:Saloveeb@12345@127.0.0.1:3306/apidata"

You need to create one databse as name as apidata.
here root is the username and Saloveeb@12345 as password for database 

After this creating database , you just need to run the migration files that will create  all required tables automatically in database 
php bin/console make:migration
php bin/console doctrine:migrations:migrate


Then you can use the AppURL plus api endpoint to perform the functionality.
i am using the local setup so:

AppUrl: http://localhost:8000

A. API endpoint for Product
   1. GET /api/products: Returns all products.
   2. POST /api/products: Creates a new product.
   3. PUT /api/products/{id}: Updates the product with the specified ID.
   4. DELETE /api/products/{id}: Deletes the product with the specified ID.

B. API endpoint for Category
  1. GET /api/category: Returns all Category.
  2. POST /api/category: Creates a new Category.
  3. PUT /api/category/{id}: Updates the Category with the specified ID.
  4. DELETE /api/category/{id}: Deletes the Category with the specified ID.

C. API endpoint for Customer
   1. GET /api/customer: Returns all Customer.
   2. POST /api/customer: Creates a new Customer.
   3. PUT /api/customer/{id}: Updates the Customer with the specified ID.
   4. DELETE /api/customer/{id}: Deletes the Customer with the specified ID.
