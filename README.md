# customer-loan-apis

This app is a demo API app that will give you an idea of the working of APIS in Laravel.

## Installation

```
git clone https://github.com/1urvashi/customer-loan-apis.git 
composer install
cp .env.example .env
php artisan key:generate
```

### **Database setup**

Please open your localhost phpmyadmin / adminer, etc.

Navigate to folder SQL Schema File in this project and you will find a file named `customer-loan-api.sql`. Import that SQL file in you DBs list.
copy file to [here](./customer-loan-api.sql) 

### **Request Format and type**

If you are using POSTMAN. Please follow the below process

1. Set request type to `POST`
2. Set your base request URL
3. Select body and then select x-www-form-urlencoded
4. Below are list of APIs with required fields

### **List of APIs**

PN: My local server was http://localhost/customer-loan-api/public You may change the settings as per you laravel environment.Available endpoints are-
```
1. /api/register

 Response: `{"status":"success","heading":"User created!","message":"Pleae login to continue."}`

2. /api/login

Response: `{"status":"success","heading":"User authenticated!","message":"Welcome to loan application.","data":{"secret":"8761246a220fff678b5bff65c47d6d0c5f0e4e88b4cc9fde550dfa4d5591b1cb"}}`

- secret and username, you will need this for every API request

3. /api/applyloan

Response: `{"status":"success","heading":"Loan applicaton successful!","message":"Your loan has been sent for approval, you will receive a confirmation post approval."}`

4. /api/approveloan

- loan_id ( You may take a look at `loans` and search for your relevant loan ID )

Response: `{"status":"success","heading":"Loan applicaton approved!","message":"User can start paying EMI now. You can set an email ( Using mailgun or any other ) \/ SMS notification ( If DLT Registration done ) to inform the user for further process."}`

5. /api/payemi

- meta_id ( You may take a look at `payment_metas` and search for relevant meta ID  )

Response ( For every valid EMI Payment ): `{"status":"success","heading":"EMI Paid successfully!","message":"Next EMI Payment on or before <your_responsed_date>"}`

Response ( When all the EMIs are completed ): `{"status":"success","heading":"EMIs Completed!","message":"All EMIs were paid were you, no EMIs pending"}`

```
These endpoints are also available as a [Postman](https://www.postman.com/) collection [here](./Customer-loan.postman_collection.json).


Feel free to email me, if you have any question.
