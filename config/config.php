<?php
define('ADMIN', '1');
define('USER_DIA', '2');

$config['acl.aco.except'] = array(
    'Users' => array(
        'login' => true, 'logout' => true, 'update' => true, 'load' => true,
        'edit' => true, 'delete' => true, 'check' => true, 'index' => true, 'editUsername' => true, 'change_password' => true,
        'listSearchUsers' =>true,'checkLogin' =>true
    ),
    'Landingpages' => array(
        'index' => true
    ),
    'Errors' => array(
        'error404' => true, 'error400' => true, 'error500' => true, 'error403' => true
    )
);

$config['acl.aco.aro'] = array(
    'Users' => array(
        '-add' => array(USER_DIA),
        '*' => array(ADMIN),
    ),
    'Devices' => array(
        '*' => array(ADMIN, USER_DIA),
    ),
    'CampaignGroups' => array(
        '*' => array(ADMIN, USER_DIA),
    ),
    'ServiceGroups' => array(
        '*' => array(ADMIN, USER_DIA),
    ),
    'Adgroups' => array(
        '*' => array(ADMIN, USER_DIA),
    ),
    'Landingpages' => array(
        '*' => array(ADMIN, USER_DIA),
    ),
);