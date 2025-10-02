<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Schedule</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .hidden-popup {
            display: none;
        }

        .menu-text.students-text {
    margin-left: -120px;  
}

.menu-item {
  display: flex;
  align-items: center;
  gap: 10px;   /* icon ar text er majhe spacing */
  padding-left: 50px;  /* pura group ta dane ene dibe */
}

.menu-text {
  font-size: 16px;
  color: black;
}

.menu-text.active {
  color: #1E90FF;
  font-weight: 600;
}
    </style>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'd') {
            header("location: ../login.php");
        } else {
            $useremail = $_SESSION["user"];
        }
    } else {
        header("location: ../login.php");
    }

    include("../connection.php");
    $userrow = $database->query("select * from doctor where docemail='$useremail'");
    $userfetch = $userrow->fetch_assoc();
    $userid = $userfetch["docid"];
    $username = $userfetch["docname"];
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
                                    <p class="profile-title"><?php echo $username; ?></p>
                                    <p class="profile-subtitle"><?php echo $useremail; ?></p>
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
    <td class="menu-btn menu-icon-dashbord">
        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
            <div style="display: flex; align-items: center;">
                <!-- Dashboard Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                     viewBox="0 0 24 24" fill="none" stroke="gray" 
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;margin-left:125px;">
                    <path d="M3 13h8V3H3v10zM13 21h8v-6h-8v6zM13 3v6h8V3h-8zM3 21h8v-6H3v6z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;">Dashboard</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-appoinment">
        <a href="appointment.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Appointment Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                     viewBox="0 0 24 24" fill="none" stroke="gray" 
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                     style="margin-right:8px;margin-left:125px;">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <p class="menu-text"style="margin-left:-125px;">My Appointments</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-session menu-active menu-icon-dashbord-active">
        <a href="schedule.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Sessions Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                     viewBox="0 0 24 24" fill="none" stroke="gray" 
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                     style="margin-right:8px;margin-left:125px;">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M16 3h-1a2 2 0 0 0-2 2v2h6V5a2 2 0 0 0-2-2z"></path>
                </svg>
                <p class="menu-text"style="margin-left:-125px;color: #1E90FF; font-weight: 600;">My Sessions</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-patient">
        <a href="student.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Students Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                     viewBox="0 0 24 24" fill="none" stroke="gray" 
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                     style="margin-right:8px;margin-left:125px;">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <p class="menu-text"style="margin-left:-125px;">My Students</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-settings">
        <a href="settings.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- ✅ Proper Full Gear Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                     viewBox="0 0 24 24" fill="none" stroke="gray" 
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                     style="margin-right:8px;margin-left:125px;">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06
                             a2 2 0 1 1-2.83 2.83l-.06-.06
                             a1.65 1.65 0 0 0-1.82-.33
                             1.65 1.65 0 0 0-1 1.51V21
                             a2 2 0 1 1-4 0v-.09
                             c0-.67-.39-1.27-1-1.51
                             a1.65 1.65 0 0 0-1.82.33l-.06.06
                             a2 2 0 1 1-2.83-2.83l.06-.06
                             c.46-.46.61-1.15.33-1.82
                             a1.65 1.65 0 0 0-1.51-1H3
                             a2 2 0 1 1 0-4h.09
                             c.67 0 1.27-.39 1.51-1
                             .28-.67.13-1.36-.33-1.82l-.06-.06
                             a2 2 0 1 1 2.83-2.83l.06.06
                             c.46.46 1.15.61 1.82.33
                             .61-.25 1-.84 1-1.51V3
                             a2 2 0 1 1 4 0v.09
                             c0 .67.39 1.27 1 1.51
                             .67.28 1.36.13 1.82-.33l.06-.06
                             a2 2 0 1 1 2.83 2.83l-.06.06
                             c-.46.46-.61 1.15-.33 1.82
                             .25.61.84 1 1.51 1H21
                             a2 2 0 1 1 0 4h-.09
                             c-.67 0-1.27.39-1.51 1z">
                    </path>
                </svg>
                <p class="menu-text"style="margin-left:-125px;">Settings</p>
            </div>
        </a>
    </td>
</tr>
            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr>
                    <td width="13%">
                        <a href="schedule.php"><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                            <font class="tn-in-text">Back</font>
                        </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">My Sessions</p>
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
                            $list110 = $database->query("select * from schedule where docid=$userid;");
                            ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">My Sessions (<?php echo $list110->num_rows; ?>) </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;">
                        <center>
                            <table class="filter-container" border="0">
                                <tr>
                                    <td width="10%"></td>
                                    <td width="5%" style="text-align: center;">Date:</td>
                                    <td width="30%">
                                        <form action="" method="post">
                                            <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">
                                    </td>
                                    <td width="12%">
                                        <input type="submit" name="filter" value=" Filter" class="btn-primary-soft btn button-icon btn-filter" style="padding: 15px; margin: 0;width:100%">
                                        </form>
                                    </td>
                                    <td style="width: 10%;">
                                        <a href="#" onclick="showAddSessionPopup(); event.preventDefault();" class="non-style-link"><button class="login-btn btn-primary-soft btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
                                            <font class="tn-in-text">Add a Session</font>
                                        </button></a>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </td>
                </tr>
                <?php
                $sqlmain = "select schedule.scheduleid,schedule.title,doctor.docname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join doctor on schedule.docid=doctor.docid where doctor.docid=$userid ";
                if ($_POST) {
                    if (!empty($_POST["sheduledate"])) {
                        $sheduledate = $_POST["sheduledate"];
                        $sqlmain .= " and schedule.scheduledate='$sheduledate' ";
                    }
                }
                ?>
                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <table width="93%" class="sub-table scrolldown" border="0">
                                    <thead>
                                        <tr>
                                            <th class="table-headin">Session Title</th>
                                            <th class="table-headin">Scheduled Date & Time</th>
                                            <th class="table-headin">Max num that can be booked</th>
                                            <th class="table-headin">Events</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $database->query($sqlmain);
                                        if ($result->num_rows == 0) {
                                            echo '<tr>
                                                <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                        <img src="../img/notfound.svg" width="25%">
                                                        <br>
                                                        <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We couldn\'t find anything related to your keywords!</p>
                                                        <a class="non-style-link" href="schedule.php"><button class="login-btn btn-primary-soft btn" style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</button></a>
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
                                                        <td> &nbsp;' . substr($title, 0, 60) . '</td>
                                                        <td style="text-align:center;">' . substr($scheduledate, 0, 10) . ' ' . substr($scheduletime, 0, 5) . '</td>
                                                        <td style="text-align:center;">' . $nop . '</td>
                                                        <td>
                                                            <div style="display:flex;justify-content: center;">
                                                                <a href="?action=view&id=' . $scheduleid . '" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-view" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <a href="?action=drop&id=' . $scheduleid . '&name=' . $title . '" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Cancel Session</font></button></a>
                                                            </div>
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
        </div>
    </div>

    <div id="addSessionPopup" class="overlay hidden-popup">
        <div class="popup">
            <center>
                <a class="close" href="#" onclick="hidePopup('addSessionPopup'); event.preventDefault();">&times;</a>
                <div class="content">
                    <form action="add-session.php" method="POST" style="text-align: left;">
                        <input type="hidden" name="docid" value="<?php echo $userid; ?>">
                        <input type="hidden" name="docname" value="<?php echo $username; ?>">
                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Session</p>
                        <br>
                        <label for="title" class="form-label">Session Title : </label>
                        <input type="text" name="title" class="input-text" placeholder="Name of Session" required><br>
                        <label for="sheduledate" class="form-label">Session Date : </label>
<input type="date" name="sheduledate" class="input-text" required min="<?php echo date('Y-m-d'); ?>"><br>
                        <label for="scheduletime" class="form-label">Session Time : </label>
                        <input type="time" name="scheduletime" class="input-text" required><br>
                        <label for="nop" class="form-label">Maximum Number of Students : </label>
                        <input type="number" name="nop" class="input-text" min="1" max="100" required>
<br>
                        <div style="display: flex;justify-content: center;">
                            <input type="submit" value="Add Session" class="login-btn btn-primary-soft btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px; margin-right: 15px; background-color: rgb(240, 240, 240); color: black;">
                            <button type="button" onclick="hidePopup('addSessionPopup');" class="login-btn btn-primary-soft btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px; background-color: rgb(240, 240, 240); color: black;">Cancel</button>
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>

    <?php
    if ($_GET) {
        $id = $_GET["id"];
        $action = $_GET["action"];
        if ($action == 'drop') {
            $nameget = $_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br>(' . substr($nameget, 0, 40) . ').
                        </div>
                        <div style="display: flex;justify-content: center;">
                            <a href="delete-session.php?id=' . $id . '" class="non-style-link"><button class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                            <a href="schedule.php" class="non-style-link"><button class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>
                        </div>
                    </center>
                </div>
            </div>';
        } elseif ($action == 'view') {
            $sqlmain = "select schedule.scheduleid,schedule.title,doctor.docname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join doctor on schedule.docid=doctor.docid where schedule.scheduleid=$id";
            $result = $database->query($sqlmain);
            $row = $result->fetch_assoc();
            $docname = $row["docname"];
            $scheduleid = $row["scheduleid"];
            $title = $row["title"];
            $scheduledate = $row["scheduledate"];
            $scheduletime = $row["scheduletime"];
            $nop = $row['nop'];
            $sqlmain12 = "select * from appointment inner join patient on patient.pid=appointment.pid inner join schedule on schedule.scheduleid=appointment.scheduleid where schedule.scheduleid=$id;";
            $result12 = $database->query($sqlmain12);
            echo '
            <div id="popup1" class="overlay">
                <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content"></div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                            <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label class="form-label"><b>Session Title:</b> ' . $title . '</label><br><br>
                                        <label class="form-label"><b>Faculty of this session:</b> ' . $docname . '</label><br><br>
                                        <label class="form-label"><b>Scheduled Date:</b> ' . $scheduledate . '</label><br><br>
                                        <label class="form-label"><b>Scheduled Time:</b> ' . substr($scheduletime, 0, 5) . '</label><br><br>
                                        <label class="form-label"><b>Students already registered:</b> (' . $result12->num_rows . '/' . $nop . ')</label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <center>
                                            <div class="abc scroll">
                                                <table width="100%" class="sub-table scrolldown" border="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="table-headin">Student ID</th>
                                                            <th class="table-headin">Student name</th>
                                                            <th class="table-headin">Appointment number</th>
                                                            <th class="table-headin">Student Telephone</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
            $result = $database->query($sqlmain12);
            if ($result->num_rows == 0) {
                echo '<tr>
                        <td colspan="7">
                            <br><br><br><br>
                            <center>
                                <img src="../img/notfound.svg" width="25%">
                                <br>
                                <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We couldn\'t find anything related to your keywords !</p>
                                <a class="non-style-link" href="appointment.php"><button class="login-btn btn-primary-soft btn" style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button></a>
                            </center>
                            <br><br><br><br>
                        </td>
                    </tr>';
            } else {
                for ($x = 0; $x < $result->num_rows; $x++) {
                    $row = $result->fetch_assoc();
                    $apponum = $row["apponum"];
                    $pid = $row["pid"];
                    $pname = $row["pname"];
                    $ptel = $row["ptel"];
                    echo '<tr style="text-align:center;">
                            <td>' . substr($pid, 0, 15) . '</td>
                            <td style="font-weight:600;padding:25px">' . substr($pname, 0, 60) . '</td>
                            <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">' . $apponum . '</td>
                            <td>' . substr($ptel, 0, 25) . '</td>
                        </tr>';
                }
            }
            echo '
                                                    </tbody>
                                                </table>
                                            </div>
                                        </center>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </center>
                    <br><br>
                </div>
            </div>';
        }
    }
    ?>
    <script>
        function showAddSessionPopup() {
            document.getElementById('addSessionPopup').style.display = 'block';
        }
        function hidePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }
    </script>
</body>
</html>