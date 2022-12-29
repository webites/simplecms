<?php require __DIR__ . '/vendor/autoload.php';
session_start();

use Simple\Core\View;
use Simple\Core\Pages;
use voku\helper\Hooks;
use Simple\Core\AddPage;
use Simple\Core\Database;
use Simple\Core\DeletePage;
use Simple\Core\EditPage;
use Simple\Core\Notification\Alert;
use Simple\Modules\Seo\SitemapGenerator;

require_once __DIR__ . '/router.php';


// Admin Basic

get('/admin', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        header('Location: /admin/dashboard');
    } else {
        header('Location: /login');
    }
});

get('/login', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        header('Location: /admin/dashboard');
    } else {
        require_once('admin/login-form/login-form.html');
    }
});

get('/logout', function () {
    $auth = Database::connect();
    $auth->logOut();
    header('Location: /login');
});

get('/admin/dashboard', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        require_once('admin/dashboard/dashboard.php');
    } else {
        header('Location: /login');
    }
});

post('/user-auth', function () {
    $auth = Database::connect();
    try {
        $auth->login($_POST['email'], $_POST['password']);

        header('Location: /admin/dashboard');
    } catch (\Delight\Auth\InvalidEmailException $e) {
        die('Wrong email address');
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Wrong password');
    } catch (\Delight\Auth\EmailNotVerifiedException $e) {
        die('Email not verified');
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
});

get('/admin/users/add-new', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        try {
            $userId = $auth->admin()->createUser('elgolabek@gmail.com', '5a466akK!', 'goli');

            echo 'We have signed up a new user with the ID ' . $userId;
        } catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
    } else {
        header('Location: /login');
    }
});

// Admin Pages

get('/admin/page/$id', function ($id) {
});

get('/admin/pages/add-new', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        require_once('admin/dashboard/page-new.php');
    } else {
        header('Location: /login');
    }
});

get('/admin/pages', function () {
    session_start();
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        require_once('admin/dashboard/pages.php');
    } else {
        header('Location: /login');
    }
});

post('/admin/pages/adding', function () {
    session_start();
    if (!is_csrf_valid()) {
        exit();
    } else {
        $new_page = new AddPage($_POST['title'], $_POST['slug'], $_POST['excerpt'], $_POST['content']);

        // echo 'added: ' . $new_page->title;
        // echo 'ID: ' . $new_page->id;
        // echo "<br><hr><br>";
        // echo $new_page->getContent();

        if ($new_page->inserted == false) {
            $alert = new Alert('/admin/pages', 'Coś poszło nie tak. Prawdopodobnie slug juz istnieje', 'fail');
        } else {
            $alert = new Alert('/admin/pages', 'Dodano stronę <strong>' . $new_page->title . '<strong>');
        }
    }
});

get('/admin/pages/edit/$id', function ($id) {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        require_once('admin/dashboard/page-edit.php');
    } else {
        header('Location: /login');
    }
});

post('/admin/pages/editing', function () {
    if (!is_csrf_valid()) {
        exit();
    } else {
        $edited_page = new EditPage($_POST['id'], $_POST['title'], $_POST['slug'], $_POST['excerpt'], $_POST['content']);

        // echo 'added: ' . $edited_page->title;
        // echo 'ID: ' . $edited_page->id;
        // echo "<br><hr><br>";
        // echo $edited_page->getContent();

        if ($edited_page->updated == false) {
            $alert = new Alert('/admin/pages/edit/' . $_POST['id'], 'Coś poszło nie tak. Prawdopodobnie slug juz istnieje', 'fail');
        } else {
            $alert = new Alert('/admin/pages/edit/' . $_POST['id'], 'Pomyślnie edytowano stronę <strong>' . $edited_page->title . '<strong>');
        }
    }
});

get('/admin/pages/delete/$id', function ($id) {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        $deleted_page = new DeletePage($id);
        $alert = new Alert('/admin/pages', 'Strona usunięta');
    } else {
        header('Location: /login');
    }
});

// Admin Global

get('/admin/global', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        require_once('admin/dashboard/global.php');
    } else {
        header('Location: /login');
    }
});

// Admin Modules

get('/admin/modules', function () {
    $auth = Database::connect();
    if ($auth->isLoggedIn()) {
        require_once('admin/dashboard/modules.php');
    } else {
        header('Location: /login');
    }
});


// Generate from pages
$pages = new Pages();
$all_pages = $pages->getAll();

foreach ($all_pages as $page) {
    $_SESSION['page_id'] = $page['id'];
    get('/' . $page['slug'], function () {
        $view = new View($_SESSION['page_id']);
        $view->renderView();
        unset($_SESSION['page_id']);
    });
}

// Generate sitemap

get('/generate-sitemap', function () {
    new SitemapGenerator();
});

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', 'views/404.php');
