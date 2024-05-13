<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](https://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

1. **Install via Composer:**

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](https://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```


2. **Database Configuration**: Configure your database connection in the `config/db.php` file. Replace the placeholders with your actual database credentials:

   ```php
   return [
       'class' => 'yii\db\Connection',
       'dsn' => 'mysql:host=localhost;dbname=your_database_name',
       'username' => 'your_username',
       'password' => 'your_password',
       'charset' => 'utf8',
   ];
   ```

3. **Model Generation**: Create your User model (if it doesn't already exist) and migration. You can use Yii2's Gii tool for this purpose. Run the following command in your terminal:

   ```
   php yii gii/model --tableName=user --modelClass=User
   ```

   This command will generate the User model class in the `models` directory.

4. **Controller Generation**: Generate the UserController which will handle your API endpoints. Run the following command:

   ```
   php yii gii/controller --controllerClass=UserController
   ```

   This command will create the UserController in the `controllers` directory.

5. **Implement the Endpoints**: Implement the endpoints in your UserController as shown in the previous code snippets.

6. **URL Routing**: Configure URL rules to map endpoints to actions in your `config/urlManager.php` file:

   ```php
   'rules' => [
       [
           'class' => 'yii\rest\UrlRule',
           'controller' => 'user',
           'extraPatterns' => [
               'POST signup' => 'signup',
               'POST login' => 'login',
               'POST logout' => 'logout',
               'POST reset-password' => 'reset-password',
               'POST refresh-token' => 'refresh-token',
           ],
       ],
   ],
   ```

7. **JWT Authentication (Optional)**: If you're using JWT for authentication, you can install the `yiisoft/yii2-authclient` extension via Composer and configure it according to your needs.

8. **Run Migration**: Apply the migration to create the necessary database tables:

   ```
   php yii migrate
   ```

9. **Testing**: You can now test your APIs using tools like Postman or curl.


 **User Signup Endpoint**:
   - Set the request type to POST.
   - Enter the URL for the signup endpoint (e.g., `http://localhost:8080/users/signup`).
   - In the Body tab, select `raw` and choose `JSON (application/json)` from the dropdown.
   - Enter the JSON data for the new user account, including `username`, `email`, and `password`.

**User Login Endpoint**:
   - Set the request type to POST.
   - Enter the URL for the login endpoint (e.g., `http://localhost:8080/users/login`).
   - In the Body tab, select `form-data`.
   - Add the `username` and `password` as key-value pairs.

**User Logout Endpoint**:
   - Set the request type to POST.
   - Enter the URL for the logout endpoint (e.g., `http://localhost:8080/users/logout`).
   - Include the access token in the request headers.

**Password Reset Endpoint**:
   - Set the request type to POST.
   - Enter the URL for the password reset endpoint (e.g., `http://localhost:8080/users/reset-password`).
   - In the Body tab, select `form-data`.
   - Add the `email` of the user whose password you want to reset.


10. **Security Considerations**: Ensure you implement proper security measures such as input validation, token validation, rate limiting, etc.
