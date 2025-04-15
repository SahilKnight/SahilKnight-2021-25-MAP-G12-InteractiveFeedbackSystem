<?php
// This file ONLY displays the faculty login form. 
// Processing is handled in index.php before HTML output.
// The $faculty_login_err variable is passed from index.php if there was an error.
global $faculty_login_err; // Make error variable available
?>
<div class="container" style="margin-top: 80px; margin-bottom: 50px;"> <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"> <div class="panel panel-primary"> <div class="panel-heading">
                    <h3 class="panel-title text-center">Faculty Login</h3> 
                </div>
                <div class="panel-body">
                    
                    <?php if (!empty($faculty_login_err)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $faculty_login_err; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="index.php?info=faculty_login"> 
                        
                        <div class="form-group"> 
                            <label for="faculty-login-email">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                <input type="email" name="f_e" id="faculty-login-email" class="form-control" placeholder="Enter your email" required value="<?php echo isset($_POST['f_e']) ? htmlspecialchars($_POST['f_e']) : ''; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                             <label for="faculty-login-password">Password</label>
                             <div class="input-group"> 
                                <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                <input type="password" name="f_p" id="faculty-login-password" class="form-control" placeholder="Enter your password" required>
                             </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="faculty_login_save" class="btn btn-primary btn-block"> 
                                <i class="fa fa-sign-in"></i> Login
                            </button>
                        </div>

                    </form> 
                </div> </div> </div> </div> </div> 