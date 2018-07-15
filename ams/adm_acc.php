<?php
    include_once 'header.php';
?>
    <!--body_part-->

    <div class="container-fluid" style="margin-bottom: 5px; height: 600px;">
        <div class="row" style="background-color: #9E9E9E; height: 100%;">
            <div class="col-sm-12" style="margin-bottom: 50px;">
                <p><h2 style="text-align: center; color: #ffffff">Welcome 
                <?php
                    echo $first_name."!!";
                ?>
                </h2></p>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <a href="profile_page.php" style="text-decoration: none;"><h4 style="color: #ffffff; margin-left: 50px;">View Your Profile</h4></a>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <a href="update_acc.php" style="text-decoration: none;"><h4 style="color: #ffffff; margin-left: 50px;">Update Your Profile</h4></a>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <a href="reg_student.php" style="text-decoration: none;"><h4 style="color: #ffffff; margin-left: 50px;">Register Students</h4></a>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <a href="reg_cancel.php" style="text-decoration: none;"><h4 style="color: #ffffff; margin-left: 50px;">Cancel Registration</h4></a>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <a href="new_subjects.php" style="text-decoration: none;"><h4 style="color: #ffffff; margin-left: 50px;">Introduce New Subjects</h4></a>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <a href="adm_update.php" style="text-decoration: none;"><h4 style="color: #ffffff; margin-left: 50px;">Add or Remove Admin</h4></a>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <a href="fac_update.php" style="text-decoration: none;"><h4 style="color: #ffffff; margin-left: 50px;">Add or Remove Faculty</h4></a>
            </div>
        </div>
    </div>
    
<?php
    include_once 'footer.php';
    include_once 'script.php';
?>