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
        'multi-select',
        'bootstrap-select.min',
        'prism',
        'chosen',
        'bootstrap-datetimepicker',
        'daterangepicker',

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
        'messages_vi',
        'autosize.min',
        'form-validation',
        'jquery.steps.min',
        'sweetalert.min',
        'form-wizard',
        'jquery.multi-select',
        'bootstrap-datetimepicker',
        'moment',
        'daterangepicker'
    )) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php

    ?>
</head>
<body class="theme-blue">
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
<div class="overlay"></div>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand"
               href="<?php echo $this->Url->build(["controller" => "users", "action" => "index"]); ?>">WIFI
                MAKETTING</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <?php echo $userData['email']; ?>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "change_password" . "/" . UrlUtil::_encodeUrl($userData['id'])]); ?>">Đổi
                                mật khẩu</a></li>
                        <li>
                            <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "profile_user" . "/" . UrlUtil::_encodeUrl($userData['id'])]); ?>">Thông
                                tin acount</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "logout"]); ?>"><span>Đăng xuất</span></a>
                </li>
                <!-- Tasks -->
                <!-- #END# Tasks -->

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
                <?php if ($controller == 'Users') { ?>
            <li class="left_menu active ac">
            <?php } else { ?>
                <li class="left_menu ac">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "index"]); ?>">
                        <i class="material-icons">supervisor_account</i>
                        <span>Quản lý người dùng</span>
                    </a>
                </li>
                <?php if ($controller == 'Devices') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu ">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "Devices", "action" => "index"]); ?>"
                       class="waves-effect waves-block">
                        <i class="material-icons">devices</i>
                        <span>Quản lý thiết bị</span>
                    </a>
                </li>
                <?php if ($controller == 'Adgroups') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu ">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "Adgroups", "action" => "index"]); ?>">
                        <i class="material-icons">group_work</i>
                        <span>Quản lý nhóm thiết bị</span>
                    </a>
                </li>
                <?php if ($controller == 'CampaignGroups') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "CampaignGroups", "action" => "index"]); ?>">
                        <i class="material-icons">trending_up</i>
                        <span>Nhóm chiến dịch</span>
                    </a>
                </li>
                <?php if ($controller == 'reports' || $controller == 'Reports') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "reports", "action" => "index"]); ?>">
                        <i class="material-icons">present_to_all</i>
                        <span>Báo cáo chiến dịch</span>
                    </a>
                </li>
                <?php if ($controller == 'Partners') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "Partners", "action" => "index"]); ?>">
                        <i class="material-icons">account_box</i>
                        <span>Danh sách khách hàng</span>
                    </a>
                </li>
                <?php if ($controller == 'ServiceGroups') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "ServiceGroups", "action" => "index"]); ?>">
                        <i class="material-icons">group_add</i>
                        <span>Chăm sóc khách hàng</span>
                    </a>
                </li>
                <?php if ($controller == 'AdgroupChangeHistories') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "AdgroupChangeHistories", "action" => "index"]); ?>">
                        <i class="material-icons">history</i>
                        <span>History nhóm thiết bị</span>
                    </a>
                </li>
                <?php if ($controller == 'Landingpages') { ?>
            <li class="left_menu active ">
            <?php } else { ?>
                <li class="left_menu">
                    <?php } ?>
                    <a href="<?php echo $this->Url->build(["controller" => "Landingpages", "action" => "index"]); ?>">
                        <i class="material-icons">pages</i>
                        <span>Màn hình quảng cáo</span>
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
<script src="/js/chosen.jquery.js"></script>
<script src="/js/prism.js"></script>
<script src="/js/init.js"></script>