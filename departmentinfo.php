<?php
    session_start();
    $message="";
    $s1="";
    include("header.php");
    include("connection.php");
    if(array_key_exists("id",$_SESSION) and array_key_exists("Name",$_GET))
    {
        include("connection.php");
        if(isset($_POST['notify']))
        {
            $q=$_GET['Name'];
            $query = "select * from departmentdata where Name ='$q'";
            $r=mysqli_fetch_array(mysqli_query($link,$query));
            if($r['message']!="")
            {
                $s1=$r['message'].",";
            }
            $s=$s1.$_SESSION['id'];
            $r=$_GET['Name'];
            $query1="select * from departmentdata where name='$r'";
            $result1=mysqli_query($link,$query1);
            $r1=mysqli_fetch_array($result1);
            $str1 = $r1['deletemessage'];
            $str=explode(",",$str1);
            $k=0;
            for($i=0;$i<sizeof($str);$i++)
            {
                if($str[$i]==$_SESSION['id'])
                {
                    $k++;
                    break;
                }
            }
            if($k==0)
            {
                $query = "update departmentdata set message='$s' where name='$r'";
                mysqli_query($link, $query);
                $message="Applied for Interview";
            }
            else
            {
                $message="Cannot Apply";
            }
        }
        $r=$_GET['Name'];
        $query="select * from departmentdata where name='$r'";
        $result=mysqli_query($link,$query);
        $r=mysqli_fetch_array($result);
    }
    else
    {
        header("location:index.php");
    }
?>
<div class=container id="departmentinfocontainer">
    <p><?php if($message!=""){echo '<div class="alert alert-success" role="alert">'.$message.'</div>';} ?>
    <?php
        while ($row=mysqli_fetch_field($result))
        {
            if($row->name!='id' and $row->name!='password' and $row->name!='message' and $row->name!='deletemessage')
            {
                echo "<li style='color:white;font-size:180%;'><strong>".$row->name."</strong>: "."</li>"; 
                echo "<p style='color:white;font-size:120%;'>".$r[$row->name]."</p>";
            }
        }
        mysqli_free_result($result);
    ?>
</div>
<form method="POST">
    <div class="form-group fixed">
        <input type="submit" name="notify" value="Notify Them" class="btn btn-success">
    </div>
</form>
<?php
    include("footer.php");
?>