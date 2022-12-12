<?php require __DIR__ . '/vendor/autoload.php';

use PDO;
use Delight\Auth\Auth;
use Delight\Db\PdoDsn;
use Delight\Db\PdoDatabase;
use Delight\Auth\Administration;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;
use Simple\Core\Database;

require_once __DIR__ . '/router.php';
require_once __DIR__ . '/config.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/', 'views/index.php');

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
get('/user/$id', 'views/user');

// Dynamic GET. Example with 2 variables
// The $name will be available in full_name.php
// The $last_name will be available in full_name.php
// In the browser point to: localhost/user/X/Y
get('/user/$name/$last_name', 'views/full_name.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
get('/product/$type/color/$color', 'product.php');

// A route with a callback
get('/callback', function () {
    echo 'test';
    require_once __DIR__ . '/config.php';
    echo ' try';
    // try {
    //     // $db = new \PDO('mysql:dbname=my-database;host=localhost;charset=utf8mb4', 'my-username', 'my-password');

    //     $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
    //     $auth = new Auth($db);
    //     var_dump($auth);
    // } catch (PDOException $e) {
    //     echo $e;
    // }
    // try {
    //     $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
    //     $auth = new Auth($db);

    //     $userId = $auth->admin()->createUser('lgolabek@outlook.com', '5aaaa466akK!', 'Goli');

    //     echo 'We have signed up a new user with the ID ' . $userId;
    // } catch (InvalidEmailException $e) {
    //     die('Invalid email address');
    // } catch (InvalidPasswordException $e) {
    //     die('Invalid password');
    // } catch (UserAlreadyExistsException $e) {
    //     die('User already exists');
    // } catch (TooManyRequestsException $e) {
    //     die('Too many requests');
    // } catch (PDOException $e) {
    //     echo $e;
    // }
    // $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
    $db = PdoDatabase::fromDsn(new PdoDsn("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8mb4", DB_USER, DB_PASSWORD));

    var_dump($db);
    $auth = new Auth($db);
    var_dump($auth);
    try {
        $userId = $auth->register('lgolabek@outlook.com', '5aaaa466akK!', 'Goli', function ($selector, $token) {
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
            echo '  For SMS, consider using a third-party service and a compatible SDK';
        });

        echo 'We have signed up a new user with the ID ' . $userId;
    } catch (\Delight\Auth\InvalidEmailException $e) {
        die('Invalid email address');
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Invalid password');
    } catch (\Delight\Auth\UserAlreadyExistsException $e) {
        die('User already exists');
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    } catch (PDOException $e) {
        echo $e;
    }
});

// A route with a callback passing a variable
// To run this route, in the browser type:
// http://localhost/user/A
get('/callback/$name', function ($name) {
    echo "Callback executed. The name is $name";
});

// A route with a callback passing 2 variables
// To run this route, in the browser type:
// http://localhost/callback/A/B
get('/callback/$name/$last_name', function ($name, $last_name) {
    echo "Callback executed. The full name is $name $last_name";
});

// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs


get('/admin', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        echo 'User is signed in';
    } else {
        header('Location: /login');
    }
});

get('/login', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        header('Location: /admin');
    } else {
        echo 'User is not signed in yet';
    }
});

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', 'views/404.php');
