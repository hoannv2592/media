<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 * @var \App\View\AppView $infor_devices
 * @var $partner_id
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Hệ thống wifi-Maketting</title>
    <meta name="description" content="Login form in Boostrap Modal" />
    <!-- Bootstrap CSS -->
    <link href="/new/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/new/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/new/assets/css/custom.css" rel="stylesheet" />
    <link href="/new/assets/css/open-iconic-bootstrap.min.css" rel="stylesheet" />
    <link href="/new/assets/css/styles.css" rel="stylesheet" />
    <link href="/new/assets/css/pikaday.css" rel="stylesheet" />
    <link href="/new/assets/css/site.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-8 text-center align-self-center logo">
            <img src="img/test.jpg" alt="logo_image" style="height: 100px;">
        </div>
        <div class="col-md-3 col-sm-8 text-center align-self-center card-title" style="visibility: visible; animation-name: fadeInLeft;">
            <h5 class="title">MailChimp Subscription Form</h5>
        </div>
        <div class="col-md-3 col-sm-8 text-center align-self-center button">
            <a href="#_" class="btn btn-primary button_connect form-group" data-toggle="modal" data-target="#modal_login"> LOGIN</a>
            <a href="#_" class="btn btn-primary button_connect subscribe" data-toggle="modal" data-target="#modal_login"> CONNECT NOW - SLOW</a>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="modal_form_login" novalidate="novalidate">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mg-0-at">
                        LOGIN
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Điền họ, tên" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                   <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                            <input type="number" id="phone" name="phone" class="form-control" placeholder="Điền số điện thoại" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                </span>
                            <input type="text" id="birthday" name="birthday" class="form-control" placeholder="Ngày sinh" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                </span>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Địa chỉ" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold " data-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">ĐĂNG KÝ</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/new/assets/js/jquery-3.2.1.min.js"></script>
<script src="/new/assets/js/popper.min.js"></script>
<script src="/new/assets/js/bootstrap.min.js"></script>
<script src="/new/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/new/assets/js/pikaday.js"></script>
<script src="/new/assets/js/app.js"></script>
</body>
</html>
<script type="application/javascript">

</script>
<style>

</style>