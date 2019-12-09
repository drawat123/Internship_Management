<?php
    session_start();
    if(array_key_exists("adminid",$_SESSION))
    {
        include("connection.php");
    }
    else
    {
        header("location:index.php");
    }
?>
    <!doctype html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
            crossorigin="anonymous">
        <style>
            html {
                background: url(bg.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            body {
                font-family: "Lato", sans-serif;
                background: none;
            }

            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: #f1f1f1;
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {
                    padding-top: 15px;
                }
                .sidenav a {
                    font-size: 18px;
                }
            }

            .hide {
                display: none;
            }

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 2px solid black;
                text-align: left;
                padding: 8px;
            }
        </style>
    </head>

    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a onclick="showhide('users');" href="adminhome.php" class="name">Home</a>
            <a onclick="showhide('users');" href="#" class="name">Student</a>
            <a onclick="showhide('departmentdata');" href="#" class="name">Department</a>
            <a onclick="showhide('settings');" href="index.php?logout=1" class="name">Logout</a>
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
        </span>
        <div class="container">
            <h1 style="text-align:center;margin-top:15%;font-size:80px;" id="adminheading">Welcome To The Admin Panel</h1>
        </div>
        <div style="margin-top:2%;">
            <div class="hide" id="users">
                <h1 style="text-align:center;font-size:80px;">STUDENT DATA</h1>
                <table>
                    <?php
                    $query="select * from users";
                    $result=mysqli_query($link,$query);
                    echo "<tr>";
                    while($row=mysqli_fetch_field($result))
                    {
                        echo "<th>$row->name</th>";
                    }
                    echo "<th colspan='2'>Action</th>";
                    echo "</tr>";
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        $query1="select * from users";
                        $result1=mysqli_query($link,$query1);            
                        while($r=mysqli_fetch_field($result1))
                        {
                            $str="".$r->name."";
                            $str1="Photo";
                            $str2="Application Form";
                            if(strcmp($str, $str1)==0)
                            {
                                echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row["Photo"]).'" width="150px" ></td>';
                            }
                            else if(strcmp($str, $str2)==0)
                            {
                                echo '<td><img width="150px" src="data:image/jpeg;base64,'.base64_encode($row["Application Form"]).'"></td>';
                            }
                            else
                            {
                                echo "<td>".$row[$r->name]."</td>";
                                
                            }
                        }
                        echo "<td><a class='btn btn-danger delete' href='editadminstudent.php?id=".$row['id']."'>Edit</td>";
                        echo "<td><a class='btn btn-danger delete' href='deleteadminstudent.php?id=".$row['id']."'>Delete</td>";
                        echo "</tr>";
                    }
                ?>
                </table>
                
            </div>
            <div class="hide" id="departmentdata">
                <table>
                    <?php
                    $query="select * from departmentdata";
                    $result=mysqli_query($link,$query);
                    echo "<tr>";
                    while($row=mysqli_fetch_field($result))
                    {
                        echo "<th>$row->name</th>";
                    }
                    echo "<th colspan='2'>Action</th>";
                    echo "</tr>";
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        $query1="select * from departmentdata";
                        $result1=mysqli_query($link,$query1);            
                        while($r=mysqli_fetch_field($result1))
                        {
                            echo "<td>".$row[$r->name]."</td>";
                        }
                        echo "<td><a class='btn btn-danger delete' href='editadmindepartment.php?id=".$row['id']."'>Edit</td>";
                        echo "<td><a class='btn btn-danger delete' href='deleteadmindepartment.php?id=".$row['id']."'>Delete</td>";
                        echo "</tr>";
                    }
                ?>
                </table>
                <a href="updateadmindepartment.php" class="btn btn-success">ADD</a>
            </div>
            <div class="hide" id="settings">
                hello
            </div>
        </div>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
            function showhide(id) {
                if (document.getElementById) {
                    var divid = document.getElementById(id);
                    var divs = document.getElementsByClassName("hide");
                    for (var i = 0; i < divs.length; i++) {
                        divs[i].style.display = "none";
                    }
                    divid.style.display = "block";
                    $("#adminheading").hide();
                }
                return false;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("a.delete").click(function (e) {
                    if (!confirm('Are You Sure?')) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
            });
        </script>
    </body>

    </html>