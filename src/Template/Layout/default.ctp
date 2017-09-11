<?php
/**
 * @var \App\View\AppView $this
 */
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
 */

$cakeDescription = 'Media ';
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $userData
 * @var \App\View\AppView $controller
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(array(
        'bootstrap.min',
        'waves.min',
        'animate.min',
        'style.min',
        'all-themes.min',
        'my_style',
        'dataTables.bootstrap.min',
        'sweetalert',
    )) ?>
    <?= $this->Html->script(array(
        'jquery.min',
        'bootstrap.min',
        'waves.min',
        'jquery.init',
        'admin',
        'common',
        'jquery.dataTables',
        'dataTables.bootstrap.min',
        'jquery-datatable',
        'jquery.validate',
        'autosize.min',
        'form-validation',
        'jquery.steps.min',
        'sweetalert.min',
        'form-wizard',
    ))?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo $this->Url->build(["controller" => "users", "action" => "index"]); ?>">WIFI MAKETTING</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "edit"."/". $userData['id']]); ?>" ><?php echo $userData['email'];?></a>
                </li>
                <li >
                    <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "logout"]); ?>" ><span>Logout</span></a>
                </li>
                <!-- Tasks -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">flag</i>
                        <span class="label-count">9</span>
                    </a>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <?php if ($controller == 'Users') { ?>
            <li class="left_menu active ac">
            <?php } else { ?>
                <li class="left_menu ac">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "index"]); ?>" >
                        <i class="material-icons">supervisor_account</i>
                        <span>Quản lý Users</span>
                    </a>
                </li>
                <?php if ($controller == 'Devices') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu ">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "Devices", "action" => "index"]); ?>"  class="waves-effect waves-block">
                        <i class="material-icons">business</i>
                        <span>Quản lý thiết bị</span>
                    </a>
                </li>
                <?php
                if ($controller == 'CampaignGroups') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="javascript:void(0);">
                        <i class="material-icons">trending_up</i>
                        <span>Quản lý chiến dịch</span>
                    </a>
                </li>
                <?php
                if ($controller == 'ServiceGroups') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="javascript:void(0);" >
                        <i class="material-icons">widgets</i>
                        <span>Quản lý nhóm dịch vụ</span>
                    </a>
                </li>
                <?php if ($controller == 'Adgroups') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu ">
                    <?php } ?>
                    <a href="javascript:void(0);">
                        <i class="material-icons">view_list</i>
                        <span>Quản lý mhóm quáng cáo</span>
                    </a>
                </li>
                <?php if ($controller == 'Landingpages') { ?>
                <li class="left_menu active ">
                    <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "Landingpages", "action" => "index"]); ?>" >
                        <i class="material-icons">swap_calls</i>
                        <span>Quản lý màn hình quảng cáo</span>
                    </a>
                </li>
                <?php if ($controller == 'Landingpages') { ?>
                <li class="left_menu active ">
                    <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="javascript:void(0);" >
                        <i class="material-icons">swap_calls</i>
                        <span>Báo cáo</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
        </div>
        <!-- #Footer -->
    </aside>
</section>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
</body>
</html>
<script type="application/javascript">
    $('.left_menu a').click(function () {
        $('.left_menu').removeClass("active");
        $(this).parent().addClass("active");
    });
</script>
<style>
    .sidebar .menu .list a:hover {
        color: #2196f3;
    }
    .sidebar .menu .list a span:hover {
        color: #2196f3;
    }
</style>