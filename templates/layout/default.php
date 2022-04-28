<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
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

                <?php if($this->request->getSession()->read('Auth.email')){ ?>
                    <a class="color-white text-decoration-none text-uppercase">Hi <?= $this->request->getSession()->read('Auth.email') ?>!! </a>
                    <?php } ?>
            
                <!-- //echo $this->request->getSession()->read('Auth.User')['email']
                // debug($this->request->getSession()->read('Auth'));
                // debug($this->request->getSession()->read('Auth.email'));
                ; -->
                
            </div>
        <nav class="ml-auto mb-0 d-flex position-sm-absolute" id="site-header-menu">
            
            <div class="ml-lg-auto w-100 d-lg-flex justify-content-end">
              
            <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/articles">Articles</a>
                
                
                <?php if($this->request->getSession()->read('Auth.email')){ ?>
                    <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/articles/add">Add
                    article</a>
                    <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/users">Users</a>
                    <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/users/logout">Logout</a>
                <?php } else { ?>
                    <a class="font-08-05 mx-4 color-white text-decoration-none text-uppercase d-block" rel="noopener" href="/users/login">Login</a>
                <?php } ?>

            </div>
            <label for="menu" class="d-lg-none">
                <div class="container-menu position-absolute w-30vw h-100vh" id="fall-white">
                </div>
            </label>
        </nav>

        
    </header>
    <main class="main">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
    </main>
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
