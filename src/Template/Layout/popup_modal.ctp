<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 * @var \App\View\AppView $infor_devices
 * @var $partner_id
 */
?>
<?php
$type = isset($infor_devices->type) ? $infor_devices->type : '';
$list_path_old = explode(',', $infor_devices->path);
foreach ($list_path_old as $k => $item) {
    if ($item != '') {
        $list_path[] = $item;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Hệ thống wifi-Maketting</title>
    <meta name="description" content="Login form in Boostrap Modal"/>
    <?php
    echo $this->Html->css([
        '/new/assets/css/bootstrap.min.css',
        '/new/assets/css/font-awesome.min.css',
        '/new/assets/css/custom.css',
        '/new/assets/css/open-iconic-bootstrap.min.css',
        '/new/assets/css/styles.css',
        '/new/assets/css/pikaday.css',
        '/new/assets/css/site.css'
    ]);
    echo $this->Html->script([
            'back_end/jquery-1.11.0.min',
            'bootstrap.min',
            'md5/md5.js',
            'back_end/md5.js'
        ]
    );
    echo $this->Html->script([
        '/new/assets/js/jquery-3.2.1.min.js',
        '/new/assets/js/popper.min.js',
        '/new/assets/js/bootstrap.min.js',
        '/new/assets/js/plugins/jquery-validation/jquery.validate.min.js',
        '/new/assets/js/pikaday.js',
        '/new/assets/js/app.js'
    ]);
    ?>
</head>
<body>

<div class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        if (empty($list_path)) { ?>
            <div class="item active" style="
                    background: url('/webroot/images/bg4.jpg'); -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>
        <?php } else {
            foreach ($list_path as $k => $vl) {
                if ($k == 0) { ?>
                    <div class="item active" style="
                            background: url('/<?php echo $vl; ?>');
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                            "></div>
                <?php } else { ?>
                    <div class="item" style="
                            background: url('/<?php echo $vl; ?>');
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                            "></div>
                <?php }
            }
        } ?>
    </div>
</div>
<?php
if (isset($infor_devices->type) && $infor_devices->type == 1) {
    echo $this->element('Landing/tplink');
} else {
    echo $this->element('Landing/mikrotic');
}
?>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('.carousel').carousel();
    })
</script>