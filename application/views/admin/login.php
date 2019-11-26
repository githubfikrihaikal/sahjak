        <!-- Page Container -->
        <div class="page-container">
            <div class="login">
                <div class="login-bg"></div>
                <div class="login-content">
                    <div class="login-box">
                        <div class="login-header">
                            <h3>Log In</h3>
                            <p>Welcome back, Please login to continue.</p>
                            <div class="divider"></div>
                        </div>
                        <div class="login-body">
                            <form  method="POST" action="<?=site_url('admin')?>" id="login-form" name="login-form">
                                <div class="form-group">
                                    <input type="text" id="login-username" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="login-password" class="form-control login-input" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <!-- <div class="custom-control custom-checkbox form-group">
                                    <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">Remember password</label>
                                </div> -->
                                <p id="login-message" style="color:red"></p>
                                <div id='div_session_write'> </div>
                                
                                <input type="hidden" name="userid" id="userid" class="form-control" value="">
                                
                                <button type="button" class="btn btn-primary" id="login-btn">Login</button>
                            </form>
                            <!-- <p class="m-t-sm"><a href="#">Forgot password?</a><br><a href="register.html">Create an account</a></p> -->
                        </div>

                        <div class="login-footer">
                            <br>
                            <p>Copyright @SMARTDIGIPRO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /Page Container -->
        <script src="<?= $asset ?>firebase/crypto-js/crypto-js.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.2.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.2.2/firebase-database.js"></script>
        <script type="text/javascript" src="<?= $asset ?>firebase/login.js"></script>