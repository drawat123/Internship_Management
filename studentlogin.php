<?php
    session_start();
    include("header.php");
    include("connection.php");
    $error="";
    $success="";
    if(array_key_exists("id",$_SESSION))
    {
        header("location:studenthome.php");
    }
    if(isset($_POST['submit']))
    {
        if($_POST['signup']==0)
        {
            $query = "SELECT * FROM users WHERE `Email` = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link, $query);
            $row=mysqli_fetch_array($result);
            if(isset($row))
            {
                $email=$_POST['email'];
                $pass=md5(md5($row['id']).$_POST['password']);
                if($pass==$row['Password'])
                {
                    $_SESSION['id']=$row['id'];
                    header("location:studenthome.php");
                }
                else
                {
                    $error="Email/password combination cannot be found";
                }
            }
            else
            {
                $error="Email/password combination cannot be found";
            }
        }
        else
        {
            $query = "SELECT id FROM users WHERE `Email` = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0 && $result!=false)
            {
                $error = "Account already exist";
            }
            else
            {
                $token='qwertyuiopzxcvbnm1234567890$/()*';
	            $token=str_shuffle($token);
                $token= substr($token,0,10);
                $imagetmp=addslashes (file_get_contents($_FILES['photo']['tmp_name']));
                $imagetmp1=addslashes (file_get_contents($_FILES['applicationform']['tmp_name']));
                $query="insert into users(`Fromdate`,`Todate`,`Name`,`Father's Name`,`Gender`,`Address`,`Date Of Birth`,`Email`,`10th Board`,`10th Percentage`,`12th Board`,`12th Percentage`,`Semester Percentage`,`Branch`,`Current Semester`,`Password`,`Phone Number`,`Photo`,`Application Form`) values ('".mysqli_real_escape_string($link,$_POST['fromdate'])."','".mysqli_real_escape_string($link,$_POST['todate'])."','".mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['fathername'])."','".mysqli_real_escape_string($link,$_POST['gender'])."','".mysqli_real_escape_string($link,$_POST['address'])."','".mysqli_real_escape_string($link,$_POST['dob'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['10thboard'])."','".mysqli_real_escape_string($link,$_POST['10thpercentage'])."','".mysqli_real_escape_string($link,$_POST['12thboard'])."','".mysqli_real_escape_string($link,$_POST['12thpercentage'])."','".mysqli_real_escape_string($link,$_POST['sem'])."','".mysqli_real_escape_string($link,$_POST['branch'])."','".mysqli_real_escape_string($link,$_POST['currsem'])."','".mysqli_real_escape_string($link,$_POST['password'])."','".mysqli_real_escape_string($link,$_POST['phone'])."','$imagetmp','$imagetmp1')";
                if(!mysqli_query($link,$query))
                {
                    $error="<p>Could not create account</p>";
                }
                else
                {
                    $query = "UPDATE users SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
                    mysqli_query($link,$query);
                    $success="Your account has been created!";
                }
            }
        }
    }
?>
<div class="container" id="logincontainer">
    <div id="error"><?php
                    if($error!=""){echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}
                    if($success!=""){echo '<div class="alert alert-success" role="alert">'.$success.'</div>';}
    ?>
    <form method="post" id="studentlogin">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
        <a class="btn btn-outline-success toggleform" style="margin-left:41%;">Create Account</a>
        <input type="hidden" name="signup" value="0">
    </form>
    <form method="post" id="studentcreate" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="fathername">Father's Name</label>
            <input type="text" class="form-control" id="fathername" name="fathername" required>
        </div>
        <div class="form-group">
            <p>Gender</p>
            <input type="radio"  name="gender" value="male"> Male<br>
            <input type="radio"  name="gender" value="female"> Female<br>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="10thboard">10th Board</label>
            <input type="text" class="form-control" id="10thboard" name="10thboard" required>
        </div>
        <div class="form-group">
            <label for="10thpercentage">10th Percentage</label>
            <input type="text" class="form-control" id="10thpercentage" name="10thpercentage" required>
        </div>
        <div class="form-group">
            <label for="12thboard">12th Board</label>
            <input type="text" class="form-control" id="12thboard" name="12thboard" required>
        </div>
        <div class="form-group">
            <label for="12thpercentage">12th Percentage</label>
            <input type="text" class="form-control" id="12thpercentage" name="12thpercentage" required>
        </div>
        <div class="form-group">
            <label>Semester Percentage</label>
            <input type="text" class="form-control" placeholder="Semester Percentage" name="sem">
        </div>
        <div class="form-group">
            <label for="branch">Branch</label>
            <select class="form-control" name="branch">
                <?php
                    $query = "SELECT * FROM departmentdata";
                    $result = mysqli_query($link, $query);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="currsem">Current Semester</label>
            <input type="text" class="form-control" id="cursem" placeholder="eg. Sem 1" name="currsem" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="number" class="form-control" placeholder="Phone No." id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="fromdate">From</label>
            <input type="date" class="form-control" id="fromdate" name="fromdate" required>
        </div>
        <div class="form-group">
            <label for="todate">To</label>
            <input type="date" class="form-control" id="todate" name="todate" required>
        </div>
            <p>Photo</p>
            <input type="file" name="photo">
            <p>Application Form</p>
            <input type="file" name="applicationform">
        
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
        <input type="hidden" name="signup" value="1">
    </form>
</div>
<?php
    include("footer.php");
?>