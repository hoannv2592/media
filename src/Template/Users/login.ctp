<?php $this->layout = 'login'; ?>
<div class="login-box">
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST">
                <div class="msg">Hãy đăng nhập để bắt đầu</div>
                <span class="text-center" style="color: red;"><?= $this->Flash->render();?></span>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" placeholder="Email" required >
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">ĐĂNG NHẬP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>