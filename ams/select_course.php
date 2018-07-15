<?php
    include_once 'header.php';
?>
    <!--body_part-->

    <div class="container-fluid" style="margin-bottom: 5px; height: 600px;">
        <div class="row" style="background-color: #9E9E9E; height: 100%;">
            <div class="col-sm-12" style="margin-bottom: 50px;">
                <p><h2 style="text-align: center; color: #ffffff"> Enter Course and Date</h2></p>
            </div>
            <div class="col-sm-12">
                <a href='fac_acc.php' style='text-decoration: none;'><h3 style='color: #2d2d2d; margin: 30px;'><span class='glyphicon glyphicon-backward'></span> Go back</h3></a>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form role="form" action="take_attendance.php" method="POST">
                    <div class="form-group">
                        <label for="branchname"><span class="glyphicon glyphicon-user"></span> Branch</label>
                        <input list="branch" type="text" class="form-control" name="branch_id" placeholder="Select branch">
                        <datalist id="branch">
                            <option value="Civil">
                            <option value="Computer Science">
                            <option value="Electrical">
                            <option value="Mechanical">
                            <option value="Metallurgy">
                            <option value="Production">
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="semester"><span class="glyphicon glyphicon-user"></span> Semester</label>
                        <input list="semester" type="text" class="form-control" name="sem_id" placeholder="Select semester">
                        <datalist id="semester">
                            <option value="I">
                            <option value="II">
                            <option value="III">
                            <option value="IV">
                            <option value="V">
                            <option value="VI">
                            <option value="VII">
                            <option value="VIII">
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="course-id"><span class="glyphicon glyphicon-book"></span> Course</label>
                        <?php
                            echo "<input list='course_id' type='text' class='form-control' name='course_id' placeholder='Select course'>";
                            echo "<datalist id='course_id'>";
                            $sql="SELECT *FROM subjects WHERE uid='$var1'";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo "<option value='".$row["course_id"]."'>";
                            }
                            echo "</datalist>";
                        ?>

                    </div>
                    <div class="form-group">
                        <label for="username"><span class="glyphicon glyphicon-user"></span> Date</label>
                        <input type="text" class="form-control" name="date" placeholder="Enter date">
                    </div>
                    <button type="submit" name="stud_list" class="btn btn-success btn-block">Next</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    
<?php
    include_once 'footer.php';
    include_once 'script.php';
?>