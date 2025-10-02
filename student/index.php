<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Dashboard</title>
    <style>
        .dashbord-tables {
            animation: transitionIn-Y-over 0.5s;
        }

        .filter-container {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .sub-table,
        .anime {
            animation: transitionIn-Y-bottom 0.5s;
        }
        p, h1, h2, h3 {
            color: #000; 
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8); 
        }

        /* 🔹 Water Drop Effect for Highlight Box */
.highlight-text {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px); 
    -webkit-backdrop-filter: blur(10px); 
    border-radius: 20px; 
    border: 1px solid rgba(255, 255, 255, 0.12); 
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2); 
    padding: 15px;
    line-height: 1.6; 
    width: 70%;              
    margin: 0 auto;        
    text-align: center;     
    word-wrap: break-word;  
    transition: all 0.3s ease-in-out; 
}

.highlight-text:hover {
    transform: translateY(-5px); 
    box-shadow: 0 12px 40px rgba(31, 38, 135, 0.35);
}
        /* 🔹 Water Drop Effect for Dashboard Items */
        .dashboard-items {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        width: 220px;         
        height: 140px;        
        margin: 10px auto;    
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        transition: all 0.3s ease-in-out;
        }

        .dashboard-items:hover {
        transform: translateY(-7px) scale(1.03);
        box-shadow: 0 14px 45px rgba(31, 38, 135, 0.45);
        }
          /* 🔹 Dashboard Row Gap */
         .dashboard-row {
         margin-bottom: 30px; 
             }

         .dashboard-row td {
         padding: 10px; 
           }

         .h3-dashboard {
         font-size: 15px;  
         font-weight: 450; 
            }
         .connect-title {
          text-align: left;
          margin-left: 40px;
        }
        .connect-form {
            margin-left: 40px; 
            display: flex;
            align-items: center;
        }

        /* Highlight the Scheduled Sessions menu item */
.active-line {
    border-right: 4px solid #1E90FF; /* blue vertical line */
    padding-right: 10px; /* optional spacing */
}
    </style>


</head>

<body>
    <?php


    session_start();

    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {
            header("location: ../login.php");
        } else {
            $useremail = $_SESSION["user"];
        }
    } else {
        header("location: ../login.php");
    }


    //import database
    include("../connection.php");

    $sqlmain = "select * from patient where pemail=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch = $userrow->fetch_assoc();

    $userid = $userfetch["pid"];
    $username = $userfetch["pname"];


    //echo $userid;
    //echo $username;

    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo $username;  ?></p>
                                    <p class="profile-subtitle"><?php echo $useremail;  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php"><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
               <tr class="menu-row">
    <td class="menu-btn menu-icon-home menu-active menu-icon-home-active">
        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
            <div style="display:flex; align-items:center;">
                <!-- Student Dashboard Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="gray" stroke-width="1.8" viewBox="0 0 24 24" width="24" height="24" style="margin-right:10px;margin-left:100px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                <p class="menu-text" style="margin-left:-125px;color: #1E90FF; font-weight: 600;">Student Dashboard</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-doctor">
        <a href="faculty.php" class="non-style-link-menu">
            <div style="display:flex; align-items:center;">
                <!-- All Faculties Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="gray" stroke-width="1.8" viewBox="0 0 24 24" width="24" height="24" style="margin-right:10px;margin-left:100px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                <p class="menu-text" style="margin-left:-125px;">All Faculties</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-session">
        <a href="schedule.php" class="non-style-link-menu">
            <div style="display:flex; align-items:center;">
                <!-- Calendar Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="gray" stroke-width="1.8" viewBox="0 0 24 24" width="24" height="24" style="margin-right:10px;margin-left:100px;">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Scheduled Sessions</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-appoinment">
        <a href="appointment.php" class="non-style-link-menu">
            <div style="display:flex; align-items:center;">
                <!-- Appointment Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="gray" stroke-width="1.8" viewBox="0 0 24 24" width="24" height="24" style="margin-right:10px;margin-left:100px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M4 19h16" />
                    <rect x="4" y="5" width="16" height="14" rx="2" />
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Appointment History</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-settings">
        <a href="settings.php" class="non-style-link-menu">
            <div style="display:flex; align-items:center;">
                <!-- Settings Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="gray" stroke-width="1.8" viewBox="0 0 24 24" width="24" height="24" style="margin-right:10px;margin-left:100px;">
                    <circle cx="12" cy="12" r="3" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.09a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.09a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Settings</p>
            </div>
        </a>
    </td>
</tr>

    </table>
    </div>
    <div class="dash-body" style="margin-top: 15px">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

            <tr>

                <td colspan="1" class="nav-bar">
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>

                </td>
                <td width="25%">

                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        Today's Date
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php
                        date_default_timezone_set('Asia/Kolkata');

                        $today = date('Y-m-d');
                        echo $today;


                        $patientrow = $database->query("select  * from  patient;");
                        $doctorrow = $database->query("select  * from  doctor;");
                        $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                        $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                        ?>
                    </p>
                </td>
                <td width="10%">
                    <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                </td>


            </tr>
            <tr>
                <td colspan="4">

                                <center>
                                       <div class="highlight-text">
        <h3>Welcome!</h3>
        <h1><?php echo $username; ?>.</h1>
        <p>
            Not sure which faculty member to consult? Don’t worry! Just visit the 
            <a href="faculty.php" class="non-style-link"><b>"Our Faculty"</b></a> section  
            or check <a href="schedule.php" class="non-style-link"><b>"Scheduled Sessions"</b></a> for details.<br><br>
            Easily keep track of your past and upcoming sessions.<br>
            You can also view when your faculty or consultant is expected to be available.
        </p>
    </div>
</center>

                                        <h3 class="connect-title">Connect with Faculty Here</h3>
                                        <form action="schedule.php" method="post" class="connect-form">
                                        <input type="search" name="search" class="input-text"
                                        placeholder="Search Faculties and We will Find The Session Available" list="doctors"
                                        style="width:45%;">&nbsp;&nbsp;
                                        <?php
                                        echo '<datalist id="doctors">';
                                        $list11 = $database->query("select  docname,docemail from  doctor;");

                                        for ($y = 0; $y < $list11->num_rows; $y++) {
                                            $row00 = $list11->fetch_assoc();
                                            $d = $row00["docname"];

                                            echo "<option value='$d'><br/>";
                                        };

                                        echo ' </datalist>';
                                        ?>


                                        <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                                        <br>
                                        <br>

                                </td>
                            </tr>
                        </table>
                    </center>

                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table border="0" width="100%"">
                            <tr>
                                <td width=" 50%">






                        <center>
                            <table class="filter-container" style="border: none;" border="0">
                                <tr>
                                    <td colspan="4">
                                        <p style="font-size: 20px;font-weight:600;padding-left: 16px;">Status</p>
                                    </td>
                                </tr>
                                <tr class="dashboard-row">
                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php echo $doctorrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    All Faculties &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php echo $patientrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    All Students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="dashboard-row">
                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex; ">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php echo $appointmentrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    New Booking &nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');"></div>
                                        </div>

                                    </td>

                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;padding-top:21px;padding-bottom:21px;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php echo $schedulerow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Today Sessions
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </center>








                </td>
                <td>



                    <p style="font-size: 20px;font-weight:600;padding-left: 42px;margin-top: -50px;" class="anime">Your Upcoming Booking</p>
                    <center>
                        <div class="abc scroll" style="height: 250px;padding: 0;margin-top: 25px;">
                            <table width="85%" class="sub-table scrolldown" border="0">
                                <thead>

                                    <tr>
                                        <th class="table-headin">


                                            Appoint. Number

                                        </th>
                                        <th class="table-headin">


                                            Session Title

                                        </th>

                                        <th class="table-headin">
                                            Faculties
                                        </th>
                                        <th class="table-headin">

                                            Sheduled Date & Time

                                        </th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $nextweek = date("Y-m-d", strtotime("+1 week"));
                                    $sqlmain = "select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  patient.pid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
                                    //echo $sqlmain;
                                    $result = $database->query($sqlmain);

                                    if ($result->num_rows == 0) {
                                        echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Search Your Mentor &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                    } else {
                                        for ($x = 0; $x < $result->num_rows; $x++) {
                                            $row = $result->fetch_assoc();
                                            $scheduleid = $row["scheduleid"];
                                            $title = $row["title"];
                                            $apponum = $row["apponum"];
                                            $docname = $row["docname"];
                                            $scheduledate = $row["scheduledate"];
                                            $scheduletime = $row["scheduletime"];

                                            echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;' .
                                                $apponum
                                                . '</td>
                                                        <td style="padding:20px;"> &nbsp;' .
                                                substr($title, 0, 60)
                                                . '</td>
                                                        <td>
                                                        ' . substr($docname, 0, 60) . '
                                                        </td>
                                                        <td style="text-align:center;">
                                                            ' . substr($scheduledate, 0, 10) . ' & ' . substr($scheduletime, 0, 5) . '
                                                        </td>

                
                                                       
                                                    </tr>';
                                        }
                                    }

                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </center>

                </td>
            </tr>
        </table>
        </td>
        <tr>
            </table>
    </div>
    </div>


</body>

</html>