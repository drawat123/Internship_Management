<?php
    session_start();
    include("header.php");
    include("connection.php");
    if(array_key_exists("departmentid",$_SESSION))
    {
        include("connection.php");
    }
    else
    {
        header("location:index.php");
    }
?>
    <div class="container" style="margin-top:4%;">
        <p>
            <button class="btn btn-outline-light" style="margin-left: 40%;margin-right: 38%;font-size: 200%;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Student</button>
            
        </p>

                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body" style="width: 100%;">
                        <?php
                            $s=$_SESSION['departmentid'];
                            $query="select * from departmentdata where id='$s'";
                            $result1=mysqli_query($link,$query);
                            $r = mysqli_fetch_array($result1);
                            $s=$r['name'];
                            $query="select * from users where branch='$s'";
                            $result=mysqli_query($link,$query);
                            while($r = mysqli_fetch_array($result))
                            {
                                echo "<a class='badge badge-dark' style='font-size:20px; margin-bottom:8px;' href='studentinfo.php?studentid=".$r['id']."'>".$r['Name']." (".$r['Email'].")"."</a>";
                                echo "<br>";
                            }
                        ?>
                    </div>
                </div>
            
    <div class="form-inline fixed">
        <a href="index.php?logout=1"><button class="btn btn-danger my-2 my-sm-0" type="submit">Log Out</button></a>
    </div>
<?php
    include("footer.php");
?>
