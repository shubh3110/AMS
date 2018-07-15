<?php
    include_once 'header.php';
?>  
    <!--body part-->
    <div class="row">
        <div class="col-sm-12" style="margin-bottom: 50px;">
            <p><h2 style="text-align: center; color: #2d2d2d;">My Subjects</h2></p>
        </div>
        <div class="col-sm-12" style="margin-bottom: 20px;">
            <a href="user_acc.php" style="text-decoration: none;"><h3 style="color: #2d2d2d; margin: 30px;"><span class="glyphicon glyphicon-backward"></span> Go back</h3></a>
        </div>
    </div>
    <div class="container" style="height: 400px;">    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align: center;">Subjects</th>
                    <th style="text-align: center;">Faculty</th>
                    <th style="text-align: center;">Email-id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //include_once 'dbh.inc.php';
                    //session_start();
                    /*$dbServername="localhost";
                    $dbUsername="root";
                    $dbPassword="";
                    $dbName="ams";
                    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);*/
                    //
                    $sql="SELECT *FROM users WHERE regid='$var1'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    $var=$row['semid'];
                    $sql="SELECT subjects.subname, subjects.semid, faculty.firstname, faculty.lastname, faculty.emailid FROM subjects NATURAL JOIN faculty WHERE subjects.uid=faculty.username AND subjects.semid='$var'";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo "<tr><td style='text-align: center'>" . $row["subname"]. "</td><td style='text-align: center'>" . $row["firstname"]. " " . $row["lastname"]. "</td><td style='text-align: center'>" .$row["emailid"]. "</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>