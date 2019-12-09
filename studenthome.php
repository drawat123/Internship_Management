<?php
    session_start();
    include("header.php");
    include("connection.php");
    if(array_key_exists("id",$_SESSION))
    {
        include("connection.php");
        $r=$_SESSION['id'];
        $query="select * from users where id='$r'";
        $result=mysqli_query($link,$query);
        $r=mysqli_fetch_array($result);
    }
    else
    {
        header("location:index.php");
    }
?>
    <div class="container" style="margin-top:5%;">
        <p>
            <button class="btn btn-outline-light" style="margin-left: 8%;margin-right: 50%;font-size: 200%;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Your Info</button>
            
            
            <button class="btn btn-outline-light" style="font-size: 200%;" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Messages</button>
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body" style="width: 100%;">
                        <ul>
                            <?php
                            while ($row=mysqli_fetch_field($result))
                            {
                                if($r[$row->name]!='0' and $row->name!='Password' and $row->name!='Notify' and $row->name!='id' and $row->name!='deletemessage')
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
                                        echo '<li class="lead"><strong>Application Form:<br><img width="150px" src="data:image/jpeg;base64,'.base64_encode($r["Application Form"]).'"></strong></li>';
                                    }
                                    else
                                    {
                                        echo "<li class='lead'><strong>".$row->name."</strong>: ".$r[$row->name]."</li>";    
                                    }
                                    
                                }  
                            }
                            mysqli_free_result($result);
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <div class="card card-body" style="width: 100%;">
                        <?php
                            $r=$_SESSION['id'];
                            $query="select * from users where id='$r'";
                            $result=mysqli_query($link,$query);
                            $r=mysqli_fetch_array($result);
                            if($r['Notify']=="")
                            {
                                echo "<pre class='lead'>No Messages</pre>";
                            }
                            else if($r['Notify']==1)
                            {
                                echo "<pre class='lead'>You have been accepted and join from the date ".$r['Fromdate']."</pre>";   
                            }
                            else
                            {
                                echo "<pre class='lead'>You have been rejected</pre>";   
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="form-inline fixed">
        <a class="nav-link" href="index.php?logout=1"><button class="btn btn-danger my-2 my-sm-0" type="submit">Log Out</button></a>
    </div>

<?php
    include("footer.php");
?>