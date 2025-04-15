<?php
global $login_err;
?>
<div class="container" style="margin-top: 80px; margin-bottom: 50px;"> <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"> <div class="panel panel-primary"> <div class="panel-heading">
                    <h3 class="panel-title text-center">Student Login</h3> </div>
                <div class="panel-body">
                    
                    <?php if (!empty($login_err)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $login_err; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="index.php?info=login"> <div class="form-group"> <label for="login-email">Email Address</label>
                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                <input type="email" name="e" id="login-email" class="form-control" placeholder="Enter your email" required value="<?php echo isset($_POST['e']) ? htmlspecialchars($_POST['e']) : ''; ?>"> 
                                </div>
                        </div>
                        
                        <div class="form-group">
                             <label for="login-password">Password</label>
                             <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                <input type="password" name="p" id="login-password" class="form-control" placeholder="Enter your password" required>
                             </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="login_save" class="btn btn-primary btn-block"> <i class="fa fa-sign-in"></i> Login
                            </button>
                        </div>

                        </form> 
                </div> </div> </div> </div> </div> 