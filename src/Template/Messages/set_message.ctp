<?php
$this->layout = 'message';
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

<body>
<div class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
            $list_path = array(
                'upload/files/9def510b4dd9e66e126ba4c0c05120768150a034f57b430f86954b1f913c84a8.jpg',
                'upload/files/10ee73c5a29e9272a1d81f9c150f020d660b367f6eaa1a40b101c1396fab7685.jpg',
                'upload/files/34c8b07918e3b93306e3dfc1a9feda8c49a003bbd255d0d0a12f492e24c1b1ef.jpg'
            );
        foreach ($list_path as $k => $vl) {
            if ($k == 0) { ?>
                <div class="item active"
                     style="
                             background: url('/<?php echo $vl; ?>');
                             -webkit-background-size: cover;
                             -moz-background-size: cover;
                             -o-background-size: cover;
                             background-size: cover;
                             ">

                </div>
            <?php } else { ?>
                <div class="item" style="
                        background: url('/<?php echo $vl; ?>');
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        ">
                </div>
            <?php }
        }?>
    </div>
</div>
<!-- Content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <div class="top-big-link">
                        <a class="btn btn-link-1 launch-modal" href="#" data-modal-id="modal-register">Chọn dịch vụ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title" id="modal-register-label">Lựa chọn phương thức thanh toán</h3>
            </div>
            <div class="modal-body">
                <div class="example">
                    <?php echo $this->Form->create('Messages', [
                        'type' => 'file',
                        'url' => ['controller' => 'Messages', 'action' => 'setMessage'],
                        'id' => 'uploadForm'
                    ]); ?>
                    <div>
                        <input id="radio1" type="radio" name="option" value="1" checked="checked"><label for="radio1"><span><span></span></span>Option 1</label>
                    </div>
                    <div>
                        <input id="radio2" type="radio" name="option" value="2"><label for="radio2"><span><span></span></span>Option 2</label>
                    </div>
                    <div>
                        <input id="radio3" type="radio" name="option" value="3"><label for="radio3"><span><span></span></span>Option 3</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" style= "cursor:pointer">Submit</button>
                <?php echo $this->Form->end(); ?>
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
    $('.carousel').carousel();
    $(window).on('load',function(){
        $('#modal-register').modal('show');
    });
</script>
<style>
    html {
        position: relative;
        min-height: 100%;
    }
    .carousel-fade .carousel-inner .item {
        opacity: 0;
        transition-property: opacity;
    }
    .carousel-fade .carousel-inner .active {
        opacity: 1;
    }
    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        left: 0;
        opacity: 0;
        z-index: 1;
    }
    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
    }
    .carousel-fade .carousel-control {
        z-index: 2;
    }
    @media all and (transform-3d),
    (-webkit-transform-3d) {
        .carousel-fade .carousel-inner > .item.next,
        .carousel-fade .carousel-inner > .item.active.right {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.prev,
        .carousel-fade .carousel-inner > .item.active.left {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.next.left,
        .carousel-fade .carousel-inner > .item.prev.right,
        .carousel-fade .carousel-inner > .item.active {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    .carousel {
        z-index: -99;
    }
    .carousel .item {
        position: fixed;
        width: 100%;
        height: 100%;
    }
    .title {
        text-align: center;
        padding: 10px;
        color: #FFF;
    }
    .title_show {
        font-size: 1em;
    }
</style>