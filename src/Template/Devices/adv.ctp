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

    <?php if (count($adv) > 1) {
        foreach ($adv as $item) { ?>
            <body background="<?php echo '/'.$item ?>">
        <?php }
    } else { ?>
        <body >
    <?php } ?>
<!-- Content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
<!--                    <a class="logo" href="javascript:void (0);"></a>-->
                    <h1>Welcome to the Wi‑Fi network!</h1>
                    <div class="description">
                        <p>
                        </p>
                    </div>
                    <div class="top-big-link">
                        <a class="btn btn-link-1 launch-modal" href="#" data-modal-id="modal-register">Click here to show</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal">-->
<!--                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>-->
<!--                </button>-->
<!--                <h3 class="modal-title" id="modal-register-label">Sign up now</h3>-->
<!--            </div>-->

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <div class="example"><?php if (count($adv) > 1) { ?>
                    <img src="<?php echo '/'. $adv[1]?>">
                    <?php } else { ?>
                        <img src="<?php echo '/'.$adv[0]?>">
                    <?php } ?>
                </div>
                <a href="<?php echo $device['link_adv']?>" id="submit_adv" class="btn btn-success" >Click here to close</a>
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
    $(window).on('load', function () {
        $('#modal-register').modal('show');
    });

</script>
