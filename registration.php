<?php

global $reg_msg; // Make message variable available


$current_year = date('Y');
$dob_years = range($current_year - 70, $current_year - 15); // Example range for age
$dob_months = range(1, 12);
$dob_days = range(1, 31);

?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3"> <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title text-center">Student Registration</h3> 
            </div>
            <div class="panel-body">
                
                <?php if (!empty($reg_msg)): ?>
                    <?php echo $reg_msg; // Output the message (contains alert div) ?>
                <?php endif; ?>

                <form method="post" action="index.php?info=registration" id="registrationForm"> 
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group"> 
                                <label for="reg-name">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="n" id="reg-name" class="form-control" placeholder="Enter your full name" required> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group"> 
                                <label for="reg-rollno">Roll Number <span class="text-danger">*</span></label>
                                <input type="text" name="roll_no" id="reg-rollno" class="form-control" placeholder="Enter your roll number" required> 
                            </div>
                        </div>
                    </div><div class="row">
                        <div class="col-sm-6">
                            <div class="form-group"> 
                                <label for="reg-email">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="e" id="reg-email" class="form-control" placeholder="Enter your email" required> 
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group"> 
                                <label for="reg-father-email">Father's Email (Optional)</label>
                                <input type="email" name="father_email" id="reg-father-email" class="form-control" placeholder="Enter father's email"> 
                            </div>
                        </div>
                    </div><div class="row">
                        <div class="col-sm-6">
                            <div class="form-group"> 
                                <label for="reg-password">Password <span class="text-danger">*</span></label>
                                <input type="password" name="p" id="reg-password" class="form-control" placeholder="Choose a password" required> 
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group"> 
                                <label for="reg-mobile">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" name="mob" id="reg-mobile" class="form-control" placeholder="Enter 10-digit mobile number" required pattern="[0-9]{10}" title="Please enter a 10-digit mobile number"> 
                            </div>
                        </div>
                    </div><div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="reg-branch">Branch / Programme <span class="text-danger">*</span></label>
                                <select name="pro" id="reg-branch" class="form-control" required>
                                    <option value="" disabled selected>-- Select Branch --</option>
                                    <option>Computer Science & Engineering</option>
                                    <option>Electronics & TeleComunication Engineering</option>
                                    <option>Mechanical Engineering</option>
                                    <option>Electrical Engineering</option>
                                    <option>Civil Engineering</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-sm-6">
                             <div class="form-group">
                                <label for="reg-semester">Current Semester <span class="text-danger">*</span></label>
                                <select name="sem" id="reg-semester" class="form-control" required>
                                     <option value="" disabled selected>-- Select Semester --</option>
                                     <?php for($i=1; $i<=8; $i++) { echo "<option value='$i'>$i</option>"; } // Example up to 8 semesters ?>
                                </select>
                            </div>
                        </div>
                    </div><div class="row">
                         <div class="col-sm-6">
                             <div class="form-group">
                                <label>Gender <span class="text-danger">*</span></label>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="gen" value="m" required> Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gen" value="f" required> Female
                                    </label>
                                     <label class="radio-inline">
                                        <input type="radio" name="gen" value="o" required> Other
                                    </label>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <select name="dd" class="form-control" required title="Day">
                                            <option value="">Day</option>
                                            <?php foreach ($dob_days as $day) { echo "<option value='$day'>$day</option>"; } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                         <select name="mm" class="form-control" required title="Month">
                                            <option value="">Month</option>
                                             <?php foreach ($dob_months as $month) { echo "<option value='$month'>".date('M', mktime(0, 0, 0, $month, 1))."</option>"; } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                         <select name="yy" class="form-control" required title="Year">
                                            <option value="">Year</option>
                                             <?php foreach ($dob_years as $year) { echo "<option value='$year'>$year</option>"; } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div><hr>

                    <div class="form-group text-center">
                        <button type="submit" name="reg_save" class="btn btn-primary btn-lg"> 
                            <i class="fa fa-user-plus"></i> Register
                        </button>
                        <button type="reset" class="btn btn-default btn-lg">
                             <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>

                </form> 
            </div> </div> </div> </div> 