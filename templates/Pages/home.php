<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\Controller\Component\AuthComponent;
use Cake\Controller\UsersController;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Besley:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'cake', 'home', 'styles.min']) ?>
    <?= $this->Html->script('main.min') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>

<body>
    <header class="position-fixed fixed-top bg-black p-4 d-flex">
    <div class="d-lg-none text-right position-absolute mr-5 top-right">
            <input class="d-none" type="checkbox" id="menu" onclick="OpenMenu()">

            <label for="menu">
                <svg aria-hidden="true" width="25" height="25" focusable="false" data-prefix="fas" data-icon="bars"
                    class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512">
                    <path fill="#fff"
                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                    </path>
                </svg>
            </label>

        </div>
        <div class="mr-auto w-50">
                <a class="font-08-05 color-white text-decoration-none text-uppercase" href="<?= $this->Url->build('/') ?>">Bentley</a>
                Hi <?php 
                echo $this->request->getSession()->read('Auth.email');
                ?>
            </div>
        <nav class="mx-auto mb-0 d-flex position-sm-absolute" id="site-header-menu">
            
            <div class="ml-lg-auto w-100 d-lg-flex justify-content-end">
                <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" target="_blank" rel="noopener"
                    href="https://book.cakephp.org/4/">Documentation</a>
                <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" target="_blank" rel="noopener"
                    href="https://api.cakephp.org/">API</a>
                <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/articles">Articles</a>
                <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/articles/add">Add
                    article</a>
                <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/users">Users</a>
                <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/users/logout">Logout</a>

            </div>
            <label for="menu" class="d-lg-none">
                <div class="container-menu position-absolute w-30vw h-100vh" id="fall-white">
                </div>
            </label>
        </nav>

        
    </header>
   <!--- <main class="main-section-container w-100 background-center background-cover background-fixed h-100vh">
        <div class="position-absolute w-100 h-100vh top-0 dark-background"> </div>
        <div class="d-flex align-items-center justify-content-center h-100 position-relative">
            <h1 class="text-center text-uppercase color-white font-h1">Be<span class="border-bottom">ntl</span>ey</h1>
        </div>
    </main>

    <section class="bg-transparent container-fluid transform-top">
        <div class="row">
            <div class="col-6 col-md-4 mb-3">
                <div class="box-advant bg-black py-4 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100  unrotate-text">
                        <div class="box">
                            <div class="d-flex justify-content-center mb-3">
                                <svg class="text-center" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="cog" class="svg-inline--fa fa-cog fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="40">
                                    <path fill="#fff"
                                        d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="color-white text-uppercase text-center font-1-05">Dynamic</h2>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-6 col-md-4 mb-3">
                <div class="box-advant bg-black py-4 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100  unrotate-text">
                        <div class="box">
                            <div class="d-flex justify-content-center mb-3">
                                <svg class="text-center" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="cog" class="svg-inline--fa fa-cog fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="40">
                                    <path fill="#fff"
                                        d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="color-white text-uppercase text-center font-1-05">Dynamic</h2>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <div class="box-advant bg-black py-4 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100  unrotate-text">
                        <div class="box">
                            <div class="d-flex justify-content-center mb-3">
                                <svg class="text-center" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="cog" class="svg-inline--fa fa-cog fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="40">
                                    <path fill="#fff"
                                        d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="color-white text-uppercase text-center font-1-05">Dynamic</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="container-car">
        <div class="box">
            <div class="mr-auto w-sm-75">
                <h2 class="font-2-2 text-left color-white text-uppercase px-3 w-50">
                    Car modification
                </h2>
                <div class="font-04-05 px-3 color-white w-sm-75">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur.
                </div>
            </div>

            <div class="d-flex align-items-center">
                <img src="./img/pexels-pixabay-261985.jpg" class="img-fluid">

            </div>

        </div>
    </section>

    <section class="container-slider-diamonds py-4">
        <div class="box">

            <div class="ml-auto mr-0 order-2 w-sm-75">
                <h2 class="font-2-2 text-right color-white text-uppercase px-3 w-80 mr-0 ml-auto">
                    Choose your car interior
                </h2>
                <div class="font-04-05 px-3 color-white w-75 mr-0 text-right ml-auto">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </div>
            </div>
            <div class="mr-auto w-60 d-flex align-items-end order-1 my-3 w-65 background-car background-cover background-center background-fixed h-80vh p-0 justify-content-center"
                id="background-car">
                <div class="row dark-background-top-bottom w-100 h-100 d-flex align-items-end">
                    <div class="col-6 col-md-3 d-flex justify-content-center h-50 m-0 align-items-center">
                        <div class="box-diamond color-white bg-black" onclick="changeInteriorCarRed()">
                            <div class="d-flex align-items-center justify-content-center h-100 unrotate-text">
                                Red
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 d-none d-sm-block">
                    </div>

                    <div class="col-6 col-md-3 d-flex justify-content-center h-50 m-0 align-items-center">
                        <div class="box-diamond color-white bg-black" onclick="changeInteriorCar()">
                            <div class="d-flex align-items-center justify-content-center h-100 unrotate-text">
                                Brown
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>

    <section class="container-slider-touch py-4">
        <div class="mr-auto ml-0 order-2 w-sm-75 py-4">
                    <h2 class="font-2-2 text-left color-white text-uppercase px-3 w-75 mr-0 mr-auto">
                        Good to know
                    </h2>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide"  data-touch="true">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="./img/hood-ornament-4459117_1920.jpg" class="img-slide">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="box">
                                <h3 class="color-white font-2-2">Excepteur sint occaecat</h3>
                                <p class="color-white font-04-05">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="carousel-item container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="./img/bentley-3696330_1920.jpg" class="img-slide">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="box">
                                    <h3 class="color-white font-2-2">Excepteur sint occaecat</h3>
                                    <p class="color-white font-04-05">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="carousel-item container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="./img/bentley-1874192_1920.jpg" class="img-slide">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="box">
                                <h3 class="color-white font-2-2">Excepteur sint occaecat</h3>
                                <p class="color-white font-04-05">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        
                            </div>
                           </div>
                    </div>
                    
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    --->

    <footer class="footer container-fluid py-4">
        <div class="row color-white">
            <div class="col text-center">
                Terms
            </div>
            <div class="col text-center">
                Copyright
            </div>
            <div class="col text-center">
                Privacy
            </div>
            <div class="col text-center">
                Contact
            </div>
        </div>
    </footer>


</body>

</html>
