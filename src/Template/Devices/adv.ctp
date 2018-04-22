<?php
/**
 * @var \App\View\AppView $voucher_flag
 * @var \App\View\AppView $infor_devices
 * @var \App\View\AppView $device_group
 * @var \App\View\AppView $this
 * @var \App\View\AppView device
 * @var $partner_id
 *
 */
$this->layout = 'landing';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Modal Registration Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/form-elements.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
</head>

    <?php if (count($paths) > 1) {
        $value = reset($paths); ?>
            <body background="<?php echo '/'.$value ?>">
    <?php } else { ?>
        <body background="/img/1.jpg">
    <?php } ?>
<!-- Content -->
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Welcome to the Wi‑Fi network!</h1>
                    <div class="description">
                        <p>
                        </p>
                    </div>
                    <div class="top-big-link">
                        <?php if (count($paths) > 1) { ?>
                            <a class="btn btn-link-1 launch-modal" href="#" data-modal-id="modal-register">Click here to show</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                </div>
                    <div class="row">
                <div class="example">
                    <?php
                    $value = reset($paths);
                    $count = count($paths);
                    if ($count >= 4) {
                        foreach ($paths as $k => $path) {
                            if ($path != $value) {?>
                                <div class="col-md-4">
                                    <a href="<?php echo $urls[$k];?>"><img src="<?php echo '/'.$path?>"></a>
                                </div>
                            <?php }
                        }
                    } else if ($count == 3 ) {
                        foreach ($paths as $k => $path) {
                            if ($path != $value) {?>
                                <div class="col-md-6">
                                    <a href="<?php echo $urls[$k];?>"><img src="<?php echo '/'.$path?>"></a>
                                </div>
                            <?php }
                        }
                    } else if ($count == 2) {
                        foreach ($paths as $k => $path) {
                            if ($path != $value) {?>
                                <div class="col-md-12">
                                    <a href="<?php echo $urls[$k];?>"><img src="<?php echo '/'.$path?>"></a>
                                </div>
                            <?php }
                        } ?>
                    <?php } else {
                    foreach ($paths as $k => $path) { ?>
                            <div class="col-md-12">
                                <a href="<?php echo $urls[$k];?>"><img src="<?php echo '/'.$path?>"></a>
                            </div>
                        <?php }
                    }  ?>
                    </div>
                </div>
<!--                <a href="--><?php //echo $device['link_adv']?><!--" id="submit_adv" class="btn btn-success" >Click here to close</a>-->
            </div>

        </div>
    </div>
</div>


<!-- Javascript -->
<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.backstretch.min.js"></script>
<script src="/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="/assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>
<script>
    var val = '<?php echo  count($paths) ;?>';
    $(window).on('load', function () {
        if (val > 1) {
            $('#modal-register').modal('show');
        }
    });

</script>
<style>
    .example [class^="col-"] {
        padding: 10px 15px;
        margin-bottom: 10px;
         background-color: transparent !important;
         border-right: none !important;
    }
</style>
