<?php
    session_start();
    $Notify="";
    $s1="";
    include("header.php");
    include("connection.php");
    if(array_key_exists("departmentid",$_SESSION) and array_key_exists("studentid",$_GET))
    {
        include("connection.php");
        if(isset($_POST['notify']))
        {
            $q=$_GET['studentid'];
            $query = "select * from users where id='$q'";
            $r=mysqli_fetch_array(mysqli_query($link,$query));
            $s=1;
            $r=$_GET['studentid'];
            $query = "update users set Notify='$s' where id='$r'";
            mysqli_query($link, $query);
            $Notify="Student Accepted";
        }
        else if(isset($_POST['reject']))
        {
            $q=$_GET['studentid'];
            $query = "select * from users where id='$q'";
            $r=mysqli_fetch_array(mysqli_query($link,$query));
            $s=0;
            $r=$_GET['studentid'];
            $query = "update users set Notify='$s' where id='$r'";
            mysqli_query($link, $query);
            $Notify="Student Rejected";
        }
        $r=$_GET['studentid'];
        $query="select * from users where id='$r'";
        $result=mysqli_query($link,$query);
        $r=mysqli_fetch_array($result);
    }
    
    else
    {
        header("location:index.php");
    }
?>
<div class=container id="departmentinfocontainer">
    <p><?php if($Notify!=""){echo '<div class="alert alert-success" role="alert">'.$Notify.'</div>';} ?>
    <?php
        while ($row=mysqli_fetch_field($result))
        {
            if($row->name!='Notify' and $row->name!='id' and $row->name!='Password' and $row->name!='Notify' and $row->name!='deleteNotify' and $r[$row->name]!='0')
            {
                $str="".$row->name."";
                                    $str1="Photo";
                                    $str2="Application Form";
                                    if(strcmp($str, $str1)==0)
                                    {
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($r["Photo"]).'" width="150px" ><br>';
                                    }
                                    else if(strcmp($str, $str2)==0)
                                    {
                                        echo "<li style='color:white;font-size:180%;'><strong>".$row->name."</strong>: "."</li>";
                                        echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode($r["Application Form"]).'"></strong>';
                                    }
                                    else
                                    {
                echo "<li style='color:white;font-size:180%;'><strong>".$row->name."</strong>: "."</li>"; 
                echo "<p style='color:white;font-size:120%;'>".$r[$row->name]."</p>";
                                    }
            }
        }
        mysqli_free_result($result);
    ?>
</div>
<form method="POST">
    <div class="form-group fixed">
        <input type="submit" name="notify" value="Accept" style="margin-left:5%;" class="btn btn-success">
        <input type="submit" name="reject" value="Reject" style="margin-left:5%;margin-top:2%;" class="btn btn-danger">
    </div>
    
</form>
<form method="POST">
    <div class="form-group ">
        
    </div>
</form>
<?php
    include("footer.php");
?>