<?php
    session_start();
    if(array_key_exists("adminid",$_SESSION) and isset($_GET['id']))
    {
        include("connection.php");
        $id=$_GET['id'];
        $query="select * from users where id='$id'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $s="Father's name";
        if(isset($_POST['submit']))
        {
            $query="update users set `Name`='".mysqli_real_escape_string($link,$_POST['name'])."' ,`Father's Name`='".mysqli_real_escape_string($link,$_POST['fathername'])."' ,`Gender`='".mysqli_real_escape_string($link,$_POST['gender'])."' ,`Address`='".mysqli_real_escape_string($link,$_POST['address'])."' ,`Date Of Birth`='".mysqli_real_escape_string($link,$_POST['dob'])."' ,`Email`='".mysqli_real_escape_string($link,$_POST['email'])."' ,`10th Board`='".mysqli_real_escape_string($link,$_POST['10thboard'])."' ,`10th Percentage`='".mysqli_real_escape_string($link,$_POST['10thpercentage'])."' ,`12th Board`='".mysqli_real_escape_string($link,$_POST['12thboard'])."' ,`12th Percentage`='".mysqli_real_escape_string($link,$_POST['12thpercentage'])."' ,`Semester Percentage`='".mysqli_real_escape_string($link,$_POST['sem'])."',`Branch`='".mysqli_real_escape_string($link,$_POST['branch'])."' ,`Current Semester`='".mysqli_real_escape_string($link,$_POST['currsem'])."' ,`Phone Number`='".mysqli_real_escape_string($link,$_POST['phone'])."' ,`Fromdate`='".mysqli_real_escape_string($link,$_POST['fromdate'])."',`Todate`='".mysqli_real_escape_string($link,$_POST['todate'])."'   where id='$id'";
            mysqli_query($link,$query);
            if($_FILES['photo']['name']==true)
            {
                $imagetmp=addslashes (file_get_contents($_FILES['photo']['tmp_name']));
                $query="update users set `Photo`='$imagetmp' where id='$id'";
                mysqli_query($link,$query);
            }
            if($_FILES['applicationform']['name']==true)
            {
                $imagetmp1=addslashes (file_get_contents($_FILES['applicationform']['tmp_name']));
                $query="update users set `Application Form`='$imagetmp1' where id='$id'";
                mysqli_query($link,$query);
            }
            $r1="".$row['Password']."";
            $r2="".$_POST['password']."";
            if(strcmp($r1,$r2)!=0)
            {
                $re=$row['id'];
                $query = "UPDATE users SET Password = '".md5(md5($re).$_POST['password'])."' WHERE id = '$re' LIMIT 1";
                mysqli_query($link,$query);
            }
            header("location:adminhome.php");
        }
    }
    else
    {
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
    <div class="container">
    <form method="post" id="studentcreate" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['Name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="fathername">Father's Name</label>
            <input type="text" class="form-control" id="fathername" name="fathername" value="<?php echo $row[$s]; ?>" required>
        </div>
        <div class="form-group">
            <p>Gender</p>
            <input type="radio"  name="gender" value="male" <?php $str="".$row['Gender'].""; if(strcmp($str,"male")==0){echo "checked";} ?> > Male<br>
            <input type="radio"  name="gender" value="female" <?php $str="".$row['Gender'].""; if(strcmp($str,"female")==0){echo "checked";} ?> > Female<br>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" value="<?php echo $row['Address']; ?>" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['Date Of Birth']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="10thboard">10th Board</label>
            <input type="text" class="form-control" id="10thboard" name="10thboard" value="<?php echo $row['10th Board']; ?>" required>
        </div>
        <div class="form-group">
            <label for="10thpercentage">10th Percentage</label>
            <input type="text" class="form-control" id="10thpercentage" name="10thpercentage" value="<?php echo $row['10th Percentage']; ?>" required>
        </div>
        <div class="form-group">
            <label for="12thboard">12th Board</label>
            <input type="text" class="form-control" id="12thboard" name="12thboard" value="<?php echo $row['12th Board']; ?>" required>
        </div>
        <div class="form-group">
            <label for="12thpercentage">12th Percentage</label>
            <input type="text" class="form-control" id="12thpercentage" name="12thpercentage" value="<?php echo $row['12th Percentage']; ?>" required>
        </div>
        <div class="form-group">
            <label>Semester Percentage</label>
            <input type="text" class="form-control" placeholder="Semester Percentage" name="sem" value="<?php echo $row['Semester Percentage']; ?>">
        </div>
        <div class="form-group">
            <label for="branch">Branch</label>
            <select class="form-control" name="branch">
            <?php
                    $query = "SELECT * FROM departmentdata";
                    $result = mysqli_query($link, $query);
                    $str="".$row['Branch']."";
                    while($r=mysqli_fetch_array($result))
                    {
                        $str1="".$r['name']."";
                        if(strcmp($str,$str1)==0)
                        {?>
                            <option value="<?php echo $r['name'] ?>" selected><?php echo $r['name'] ?></option>
                            <?php
                        }
                        else
                        {?>
                            <option value="<?php echo $r['name'] ?>"><?php echo $r['name'] ?></option>
                            <?php
                        }
                    }
            ?>    
            </select>
        </div>
        <div class="form-group">
            <label for="currsem">Current Semester</label>
            <input type="text" class="form-control" id="cursem" placeholder="eg. Sem 1" name="currsem" value="<?php echo $row['Current Semester'];?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="number" class="form-control" placeholder="Phone No." id="phone" name="phone" value="<?php echo $row['Phone Number'];?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['Password']; ?>" required>
        </div>
        <div class="form-group">
            <label for="fromdate">From</label>
            <input type="date" class="form-control" id="fromdate" name="fromdate" value="<?php echo $row['Fromdate'];?>" required>
        </div>
        <div class="form-group">
            <label for="todate">To</label>
            <input type="date" class="form-control" id="todate" name="todate" value="<?php echo $row['Todate'];?>" required>
        </div>
        <p>Photo
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["Photo"]).'" width="150px" ><br>';?></p>
        <input type="file" name="photo">
        <p>Application Form
        <?php echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode($row["Application Form"]).'">' ?></p>
        <input type="file" name="applicationform">
        <br><input type="submit" class="btn btn-success" name="submit" value="Submit">
        <input type="hidden" name="signup" value="1">
    </form>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>