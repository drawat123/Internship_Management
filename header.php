<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        html
        { 
           background: url(img1.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; 
        }
        body
        {
           background: none;
        }
        #mainheading{
            margin-top: 8%;margin-left: 22%;color: white;font-size: 400%;
        }
        #mainbutton1{
            margin-left: 40%;margin-top: 1%;
        }
        #mainbutton2{
            margin-top: 1%;
        }
        #logincontainer{
            margin-top: 5%;
            width: 400px;
            color: white;
            font-size: 120%;
        }
        #about{
            margin-top: 10%;
            color:white;
            width: 82%;
        }
        #studentcreate{
            display: none;
        }
        #departmentinfocontainer{
            margin-top: 10%;
            width:60%;
        }
        .fixed{
            position: fixed; 
            bottom: 0;
            left: 0;
        }
        @media only screen and (max-width: 420px) {
            .navbar{
                width:115%;
            }
            #mainbutton2
            {
                margin-left: 32%;
            }
            #mainheading{
                margin-top: 5%;margin-left: 10%;color: white;font-size: 400%;
            }
        }
        .navbar.transparent.navbar-inverse .navbar-inner {
    border-width: 0px;
    -webkit-box-shadow: 0px 0px;
    box-shadow: 0px 0px;
    background-color: rgba(0,0,0,0.0);
    background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(0,0,0,0.00)),color-stop( 100% , rgba(0,0,0,0.00)));
    background-image: -webkit-linear-gradient(270deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
    background-image: linear-gradient(180deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg transparent navbar-dark sticky-top" style="padding: 1px;">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" width="90" height="70"  alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:70%;">
            <ul class="navbar-nav mr-auto " style="font-size: 130%;">
                <li class="nav-item">
                    <a class="nav-link" href="studentlogin.php">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="departmentlogin.php">Department</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminlogin.php">Admin</a>
                </li>
            </ul>
        </div>
    </nav>