<?php

$app->map(['GET', 'POST'], '/login', '\App\Controller\LoginController:loginAction')->setName('login');

$app->get('/about', '\App\Controller\HomeController:aboutAction')->setName('about');
$app->get('/phpInfo', '\App\Controller\HomeController:phpInfoAction')->setName('phpInfo');



$app->group('', function () {

    $this->get('/forum', '\App\Controller\ForumController:showForumAction')->setName('forum');
    $this->get('/privacidade', '\App\Controller\HomeController:privacidadeAction')->setName('privacidade');
    $this->map(['GET', 'POST'],'/', '\App\Controller\HomeController:indexAction')->setName('home');
    $this->get('/list-profiles', '\App\Controller\LoginController:listProfilesAction')->setName('listProfiles');
    $this->get('/logout', '\App\Controller\LoginController:logoutAction')->setName('logout');

    $this->map(['GET', 'POST'], '/list-certificates', '\App\Controller\CertificateController:listAction')->setName('listCertificates');
    $this->get('/certificate/{id:[0-9]+}/delete', '\App\Controller\CertificateController:deleteAction')->setName('deleteCertificate');

    $this->map(['GET', 'POST'], '/informacoes', '\App\Controller\UserController:informacoesPessoaisAction')->setName('informacoesPessoais');

    $this->map(['GET', 'POST'], '/forum/novaCategoria', '\App\Controller\ForumController:novaCategoriaAction')->setName('novaCategoria');
    $this->map(['GET', 'POST'], '/forum/novoTopico', '\App\Controller\ForumController:novoTopicoAction')->setName('novoTopico');

    $this->get('/forum/categorias/{id:[0-9]+}', '\App\Controller\ForumController:showCategoryAction')->setName('showCategory');
    $this->map(['GET', 'POST'], '/forum/categorias', '\App\Controller\ForumController:listCategoriesAction')->setName('listCategories');


    $this->group('/admin', function () {

        $this->get('/grade', '\App\Controller\UserController:periodMedalsVerification')->setName('checkPeriodos');

        $this->get('/medals', '\App\Controller\UserController:assignMedalsAction')->setName('assignMedals');

        $this->get('/test', '\App\Controller\UserController:adminTestAction')->setName('adminTest');

        $this->map(['GET', 'POST'], '/list-users', '\App\Controller\UserController:adminListAction')->setName('adminListUsers');
        $this->get('/user/{id:[0-9]+}', '\App\Controller\UserController:adminUserAction')->setName('adminUser');

        $this->get('/certificate/{id:[0-9]+}/delete', '\App\Controller\CertificateController:adminDeleteAction')->setName('adminDeleteCertificate');

        $this->map(['GET', 'POST'], '/data-load', '\App\Controller\AdminController:dataLoadAction')->setName('adminDataLoad');

        $this->map(['GET', 'POST'], '/grade-load', '\App\Controller\AdminController:gradeLoadAction')->setName('gradeLoadAction');

        $this->get('/data', '\App\Controller\AdminController:adminData')->setName('adminData');

        $this->get('/exportPDF', '\App\Controller\AdminController:exportPDFAction')->setName('exportPDF');

    })->add('\App\Middleware\AdminMiddleware');

    $this->group('/admin', function () {
        $this->map(['GET', 'POST'],'/certificate/{id:[0-9]+}/change/{state}', '\App\Controller\CertificateController:adminChangeAction')->setName('adminChangeCertificate');
        $this->map(['GET', 'POST'],'/certificates', '\App\Controller\CertificateController:adminListReviewAction')->setName('adminListReviewCertificates');
    })->add('\App\Middleware\BolsistaMiddleware');

})->add('\App\Middleware\AuthMiddleware');

