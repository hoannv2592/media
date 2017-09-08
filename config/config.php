<?php
define('ADMIN', '1');
define('USER_H45', '5');
define('USER_DIA', '10');

$config['acl.aco.except'] = array(
    'Users' => array(
        'login' => true, 'logout' => true, 'update' => true, 'load' => true,
        'edit' => true, 'delete' => true, 'check' => true, 'index' => true, 'editUsername' => true, 'change_password' => true,
        'listSearchUsers' =>true,'checkLogin' =>true
    ),
    'Errors' => array(
        'error404' => true, 'error400' => true, 'error500' => true, 'error403' => true
    )
);

$config['acl.aco.aro'] = array(
    'Users' => array(
        '-add' => array(USER_H45, USER_DIA),
        '*' => array(ADMIN),
    ),
    'Phong6' => array(
        '*' => array(ADMIN, USER_H45, USER_DIA),
    ),
    'BaoCao' => array(
        '*' => array(ADMIN, USER_H45, USER_DIA),
    ),
);