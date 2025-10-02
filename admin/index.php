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

        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
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
         font-size: 17px;  
         font-weight: 450; 
            }

            .sub-table td {
    word-break: break-word;
    overflow: hidden;
    white-space: nowrap;
}

.menu-text.students-text {
margin-left: -120px;
}
    </style>


</head>

<body>
    <?php

    session_start();

    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
            header("location: ../login.php");
        }
    } else {
        header("location: ../login.php");
    }

    include("../connection.php");


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
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@mentormeet.com</p>
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
    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
            <div style="display: flex; align-items: center;">
                <!-- Dashboard Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Dashboard</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-doctor">
        <a href="faculty.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Faculty Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Faculties</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-schedule">
        <a href="schedule.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Schedule Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-2 .89-2 2v16c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2V5c0-1.11-.89-2-2-2zm0 18H5V8h14v13z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Schedule</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-appoinment">
        <a href="appointment.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Appointment Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Appointment</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-patient ">
        <a href="student.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Students Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Students</p>
            </div>
        </a>
    </td>
</tr>

    </table>
    </div>
    <div class="dash-body" style="margin-top: 15px">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

            <tr>

                <td colspan="2" class="nav-bar">

                    <form action="faculty.php" method="post" class="header-search">

                        <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Faculty name or Email" list="faculty">&nbsp;&nbsp;

                        <?php
                        echo '<datalist id="faculty">';
                        $list11 = $database->query("select  docname,docemail from  doctor;");

                        for ($y = 0; $y < $list11->num_rows; $y++) {
                            $row00 = $list11->fetch_assoc();
                            $d = $row00["docname"];
                            $c = $row00["docemail"];
                            echo "<option value='$d'><br/>";
                            echo "<option value='$c'><br/>";
                        };

                        echo ' </datalist>';
                        ?>


                        <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                    </form>

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
                        $appointmentrow = $database->query("
    SELECT * 
    FROM appointment a
    INNER JOIN schedule s ON a.scheduleid = s.scheduleid
    WHERE s.scheduledate >= '$today'
");

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
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                            <div class="h1-dashboard">
                                                <?php echo $doctorrow->num_rows  ?>
                                            </div><br>
                                            <div class="h3-dashboard">
                                                Faculties &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                                Students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                    </div>
                                </td>
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
                                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">
                                        <div>
                                            <div class="h1-dashboard">
                                                <?php echo $schedulerow->num_rows  ?>
                                            </div><br>
                                            <div class="h3-dashboard" style="font-size: 17px">
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
            </tr>






            <tr>
                <td colspan="4">
                    <table width="100%" border="0" class="dashbord-tables">
                        <tr>
                            <td>
                                <p style="padding:10px;padding-left:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                    Upcoming Appointments until Next <?php
                                                                        echo date("l", strtotime("+1 week"));
                                                                        ?>
                                </p>
                                <p style="padding-bottom:19px;padding-left:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                    Here's Quick access to Upcoming Appointments until 7 days<br>
                                    More details available in @Appointment section.
                                </p>

                            </td>
                            <td>
                                <p style="padding:10px;padding-left:45px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                    Upcoming Sessions until Next <?php
                                                                    echo date("l", strtotime("+1 week"));
                                                                    ?>
                                </p>
                                <p style="margin-top:5px;padding-bottom:19px;padding-left:45px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                    Here's Quick access to Upcoming Sessions that Scheduled until 7 days.<br>
                                    Add,Remove and Many features available in @Schedule section.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <center>
                                    <div class="abc scroll" style="height: 200px;">
                                        <table width="85%" class="sub-table scrolldown" border="0">
                                            <thead>
                                                <tr>
                                                    <tr>
                    <th class="table-headin" style="width:5%; text-align:center;">Appointment number</th> <!-- CHANGED: set width -->
                    <th class="table-headin" style="width:30%;">Student Name</th> <!-- CHANGED: set width -->
                    <th class="table-headin" style="width:30%;">Faculty Name</th> <!-- CHANGED: set width -->
                    <th class="table-headin" style="width:20%;">Session Title</th> <!-- CHANGED: set width -->
                </tr>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $nextweek = date("Y-m-d", strtotime("+1 week"));
                                                $sqlmain = "select appointment.appoid,schedule.scheduleid,schedule.title,doctor.docname,patient.pname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where schedule.scheduledate>='$today'  and schedule.scheduledate<='$nextweek' order by schedule.scheduledate desc";

                                                $result = $database->query($sqlmain);

                                                if ($result->num_rows == 0) {
                                                    echo '<tr>
                                                    <td colspan="3">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                    <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                } else {
                                                    for ($x = 0; $x < $result->num_rows; $x++) {
                                                        $row = $result->fetch_assoc();
                                                        $appoid = $row["appoid"];
                                                        $scheduleid = $row["scheduleid"];
                                                        $title = $row["title"];
                                                        $docname = $row["docname"];
                                                        $scheduledate = $row["scheduledate"];
                                                        $scheduletime = $row["scheduletime"];
                                                        $pname = $row["pname"];
                                                        $apponum = $row["apponum"];
                                                        $appodate = $row["appodate"];
                                                        echo '<tr>


                                                        <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);padding:20px;">
                                                            ' . $apponum . '
                                                            
                                                       </td>
                        <td style="font-weight:400; word-break: break-word; max-width:30%;"> &nbsp;' . substr($pname, 0, 60) . '</td> <!-- CHANGED -->
                        <td style="font-weight:400; word-break: break-word; max-width:30%;"> &nbsp;' . substr($docname, 0, 60) . '</td> <!-- CHANGED -->
                        <td style="word-break: break-word; max-width:25%;">' . substr($title, 0, 60) . '</td> <!-- CHANGED -->
                        </tr>';
                                                    }
                                                }

                                                ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </center>
                            </td>
                            <td width="50%" style="padding: 0;">
                                <center>
                                    <div class="abc scroll" style="height: 200px;padding: 0;margin: 0;">
                                        <table width="85%" class="sub-table scrolldown" border="0">
                                            <thead>
                                                <tr>
                                                    <th class="table-headin">

                                                        Session Title

                                                    </th>

                                                    <th class="table-headin">

                                                        Faculty

                                                    </th>
                                                    <th class="table-headin">

                                                        Scheduled Date & Time

                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $nextweek = date("Y-m-d", strtotime("+1 week"));
                                                $sqlmain = "select schedule.scheduleid,schedule.title,doctor.docname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join doctor on schedule.docid=doctor.docid  where schedule.scheduledate>='$today' and schedule.scheduledate<='$nextweek' order by schedule.scheduledate desc";
                                                $result = $database->query($sqlmain);

                                                if ($result->num_rows == 0) {
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</font></button>
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
                                                        $docname = $row["docname"];
                                                        $scheduledate = $row["scheduledate"];
                                                        $scheduletime = $row["scheduletime"];
                                                        $nop = $row["nop"];
                                                        echo '<tr>
                                                        <td style="padding:20px;"> &nbsp;' .
                                                            substr($title, 0, 60)
                                                            . '</td>
                                                        <td>
                                                        ' . substr($docname, 0, 60) . '
                                                        </td>
                                                        <td style="text-align:center;">
                                                            ' . substr($scheduledate, 0, 10) . ' | ' . substr($scheduletime, 0, 5) . '
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
                        <tr>
                            <td>
                                <center>
                                    <a href="appointment.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Appointments</button></a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="schedule.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Sessions</button></a>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>
        </table>
        </center>
        </td>
        </tr>
        </table>
    </div>
    </div>

</body>

</html>