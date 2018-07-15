<?php
    include_once 'header.php';
?>
    <!--body_part-->

    <div class="container-fluid" style="margin-bottom: 5px; height: 600px;">
        <div class="row" style="background-color: #9E9E9E; height: 100%;">
            <div class="col-sm-12" style="margin-bottom: 50px;">
                <p><h2 style="text-align: center; color: #ffffff">My Subjects</h2></p>
            </div>
            <div class="col-sm-12">
                <a href='fac_acc.php' style='text-decoration: none;'><h3 style='color: #2d2d2d; margin: 30px;'><span class='glyphicon glyphicon-backward'></span> Go back</h3></a>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Subject Name</th>
                            <th style="text-align: center;">Course Code</th>
                            <th style="text-align: center;">Sem-id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql="SELECT *FROM users WHERE regid='$var1'";
                            $result=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            $sql="SELECT subname,course_id,semid FROM subjects WHERE uid='$var1'";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo "<tr><td style='text-align: center'>" . $row["subname"]. "</td><td style='text-align: center'>" . $row["course_id"]. "</td><td style='text-align: center'>" .$row["semid"]. "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    
<?php
    include_once 'footer.php';
    include_once 'script.php';
?>