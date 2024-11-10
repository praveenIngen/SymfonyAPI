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
API endpoint for Product
    GET /api/products: Returns all products.
    POST /api/products: Creates a new product.
    PUT /api/products/{id}: Updates the product with the specified ID.
    DELETE /api/products/{id}: Deletes the product with the specified ID.

API endpoint for Category
    GET /api/category: Returns all Category.
    POST /api/category: Creates a new Category.
    PUT /api/category/{id}: Updates the Category with the specified ID.
    DELETE /api/category/{id}: Deletes the Category with the specified ID.

API endpoint for Customer
    GET /api/customer: Returns all Customer.
    POST /api/customer: Creates a new Customer.
    PUT /api/customer/{id}: Updates the Customer with the specified ID.
    DELETE /api/customer/{id}: Deletes the Customer with the specified ID.
