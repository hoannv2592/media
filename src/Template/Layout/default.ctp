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
//            'demo',
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
                        <a href="javascript:void(0);" ><?php echo $userData['email'];?></a>
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
                        <a href="<?php echo $this->Url->build(["controller" => "CampaignGroups", "action" => "index"]); ?>">
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
                        <a href="<?php echo $this->Url->build(["controller" => "ServiceGroups", "action" => "index"]); ?>" >
                            <i class="material-icons">widgets</i>
                            <span>Quản lý nhóm dịch vụ</span>
                        </a>
                    </li>
                    <?php if ($controller == 'Adgroups') { ?>
                <li class="left_menu active ">
                <?php } else { ?>
                    <li class="left_menu ">
                        <?php } ?>
                        <a href="<?php echo $this->Url->build(["controller" => "Adgroups", "action" => "index"]); ?>">
                            <i class="material-icons">view_list</i>
                            <span>Quản lý mhóm quáng cáo</span>
                        </a>
                    </li>
                    <?php
                    if ($controller == 'Landingpages') { ?>
                    <li class="left_menu active ">
                        <?php } else { ?>
                    <li class="left_menu">
                        <?php } ?>
                        <a href="<?php echo $this->Url->build(["controller" => "Landingpages", "action" => "index"]); ?>" >
                            <i class="material-icons">swap_calls</i>
                            <span>Quản lý màn hình quảng cáo</span>
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
<!--        <div class="navbar navbar-default navbar-fixed-bottom">-->
<!--            <div class="container text-center top10 " id="footer">-->
<!--                Copyright © | JVB Vietnam. All Rights Reserved-->
<!--            </div>-->
<!--        </div>-->
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
    /* cyrillic-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url('/webroot/font_gg/ek4gzZ-GeXAPcSbHtCeQI_esZW2xOQ-xsNqO47m55DA.woff2') format('woff2');
        unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
    }
    /* cyrillic */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url('/webroot/font_gg/mErvLBYg_cXG3rLvUsKT_fesZW2xOQ-xsNqO47m55DA.woff2') format('woff2');
        unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url('/webroot/font_gg/-2n2p-_Y08sg57CNWQfKNvesZW2xOQ-xsNqO47m55DA.woff2') format('woff2');
        unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url('/webroot/font_gg/u0TOpm082MNkS5K0Q4rhqvesZW2xOQ-xsNqO47m55DA.woff2') format('woff2');
        unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url('/webroot/font_gg/NdF9MtnOpLzo-noMoG0miPesZW2xOQ-xsNqO47m55DA.woff2') format('woff2');
        unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url('/webroot/font_gg/Fcx7Wwv8OzT71A3E1XOAjvesZW2xOQ-xsNqO47m55DA.woff2') format('woff2');
        unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url('/webroot/font_gg/CWB0XYA8bzo0kSThX0UTuA.woff2') format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
    }
    /* cyrillic-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url('/webroot/font_gg/77FXFjRbGzN4aCrSFhlh3hJtnKITppOI_IvcXXDNrsc.woff2') format('woff2');
        unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
    }
    /* cyrillic */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url('/webroot/font_gg/isZ-wbCXNKAbnjo6_TwHThJtnKITppOI_IvcXXDNrsc.woff2') format('woff2');
        unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url('/webroot/font_gg/UX6i4JxQDm3fVTc1CPuwqhJtnKITppOI_IvcXXDNrsc.woff2') format('woff2');
        unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url('/webroot/font_gg/jSN2CGVDbcVyCnfJfjSdfBJtnKITppOI_IvcXXDNrsc.woff2') format('woff2');
        unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url('/webroot/font_gg/PwZc-YbIL414wB9rB1IAPRJtnKITppOI_IvcXXDNrsc.woff2') format('woff2');
        unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url('/webroot/font_gg/97uahxiqZRoncBaCEI3aWxJtnKITppOI_IvcXXDNrsc.woff2') format('woff2');
        unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url('/webroot/font_gg/d-6IYplOFocCacKzxwXSOFtXRa8TVwTICgirnJhmVJw.woff2') format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
    }




    /* fallback */
    @font-face {
        font-family: 'Material Icons';
        font-style: normal;
        font-weight: 400;
        src: url('/webroot/fonts/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2') format('woff2');
    }

    .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -webkit-font-feature-settings: 'liga';
        -webkit-font-smoothing: antialiased;
    }
</style>
