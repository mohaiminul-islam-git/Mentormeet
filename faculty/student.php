<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Students</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
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

    $selecttype = "My";
    $current = "My students Only";
    $sqlmain = "select * from appointment inner join patient on patient.pid=appointment.pid inner join schedule on schedule.scheduleid=appointment.scheduleid where schedule.docid=$userid;";

    if ($_POST) {
        if (isset($_POST["search"])) {
            $keyword = $_POST["search12"];
            $sqlmain = "select * from patient where pemail='$keyword' or pname='$keyword' or pname like '$keyword%' or pname like '%$keyword' or pname like '%$keyword%'";
            $selecttype = "Search";
            $current = "Search Results";
        } elseif (isset($_POST["show_all_students"])) {
            $sqlmain = "select * from patient";
            $selecttype = "All";
            $current = "All Students";
        } elseif (isset($_POST["filter"])) {
            if (isset($_POST["showonly"]) && $_POST["showonly"] == 'all') {
                $sqlmain = "select * from patient";
                $selecttype = "All";
                $current = "All Students";
            } else {
                $sqlmain = "select * from appointment inner join patient on patient.pid=appointment.pid inner join schedule on schedule.scheduleid=appointment.scheduleid where schedule.docid=$userid;";
                $selecttype = "My";
                $current = "My Students Only";
            }
        }
    }
    
    $list11 = $database->query($sqlmain);
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
    <td class="menu-btn menu-icon-session ">
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
                <p class="menu-text"style="margin-left:-125px;">My Sessions</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-patient menu-active menu-icon-dashbord-active">
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
                <p class="menu-text"style="margin-left:-125px;color: #1E90FF; font-weight: 600;">My Students</p>
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
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0; margin-top: 25px;">
                <tr>
                    <td width="13%">
                        <a href="student.php"><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px; padding-bottom:11px; margin-left:20px; width:125px">
                                <font class="tn-in-text">Back</font>
                            </button></a>
                    </td>
                    <td>
                        <form action="" method="post" class="header-search">
                            <input type="search" name="search12" class="input-text header-searchbar" placeholder="Search Student name or Email" list="patient">&nbsp;&nbsp;
                            <?php
                            echo '<datalist id="patient">';
                            $list11_datalist = $database->query("select * from patient;");
                            for ($y = 0; $y < $list11_datalist->num_rows; $y++) {
                                $row00 = $list11_datalist->fetch_assoc();
                                $d = $row00["pname"];
                                $c = $row00["pemail"];
                                echo "<option value='$d'><br/>";
                                echo "<option value='$c'><br/>";
                            }
                            echo ' </datalist>';
                            ?>
                            <input type="Submit" value="Search" name="search" class="login-btn btn-primary btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
                        </form>
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px; color: rgb(119, 119, 119); padding: 0; margin: 0; text-align: right;">Today's Date</p>
                        <p class="heading-sub12" style="padding: 0; margin: 0;">
                            <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('Y-m-d');
                            echo $date;
                            ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label" style="display: flex; justify-content: center; align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px; font-size:18px; color:rgb(49, 49, 49)"><?php echo $selecttype . " Students (" . $list11->num_rows . ")"; ?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:0px; width: 100%;">
                        <center>
                            <table class="filter-container" border="0">
                                <form action="" method="post">
                                    <td style="text-align: right;">Show Details About : &nbsp;</td>
                                    <td width="30%">
                                        <select name="showonly" id="showonly" class="box filter-container-items" style="width:90% ;height: 37px; margin: 0;">
                                            <option value="my" <?php if ($current == "My Students Only") echo 'selected'; ?>>My Students Only</option>
                                            <option value="all" <?php if ($current == "All Students") echo 'selected'; ?>>All Students</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <input type="submit" name="filter" value=" Filter" class="btn-primary-soft btn button-icon btn-filter" style="padding: 15px; margin: 0; width:100%">
                                    </td>
                                </form>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <table width="93%" class="sub-table scrolldown" style="border-spacing:0;">
                                    <thead>
                                        <tr>
                                            <th class="table-headin">Name</th>
                                            <th class="table-headin">NID</th>
                                            <th class="table-headin">Telephone</th>
                                            <th class="table-headin">Email</th>
                                            <th class="table-headin">Date of Birth</th>
                                            <th class="table-headin">Events</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $database->query($sqlmain);
                                        if ($result->num_rows == 0) {
                                            echo '<tr>
                                                <td colspan="6">
                                                    <br><br><br><br>
                                                    <center>
                                                        <img src="../img/notfound.svg" width="25%">
                                                        <br>
                                                        <p class="heading-main12" style="margin-left: 45px; font-size:20px; color:rgb(49, 49, 49)">We couldn\'t find anything related to your keywords !</p>
                                                        <form action="student.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="show_all_students" value="1">
                                                            <button type="submit" class="login-btn btn-primary-soft btn" style="display: flex; justify-content: center; align-items: center; margin-left:20px;">
                                                                &nbsp; Show all Students &nbsp;
                                                            </button>
                                                        </form>
                                                    </center>
                                                    <br><br><br><br>
                                                </td>
                                            </tr>';
                                        } else {
                                            for ($x = 0; $x < $result->num_rows; $x++) {
                                                $row = $result->fetch_assoc();
                                                $pid = $row["pid"];
                                                $name = $row["pname"];
                                                $email = $row["pemail"];
                                                $nic = $row["pnic"];
                                                $dob = $row["pdob"];
                                                $tel = $row["ptel"];

                                                echo '<tr>
                                                    <td> &nbsp;' . $name . '</td>
                                                    <td>' . $nic . '</td>
                                                    <td>' . $tel . '</td>
                                                    <td>' . $email . '</td>
                                                    <td>' . substr($dob, 0, 10) . '</td>
                                                    <td>
                                                        <div style="display:flex; justify-content: center;">
                                                            <a href="?action=view&id=' . $pid . '" class="non-style-link">
                                                                <button class="btn-primary-soft btn button-icon btn-view" style="padding-left: 40px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">
                                                                    <font class="tn-in-text">View</font>
                                                                </button>
                                                            </a>
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
    <?php
    if ($_GET) {
        $id = $_GET["id"];
        $action = $_GET["action"];
        $sqlmain = "select * from patient where pid='$id'";
        $result = $database->query($sqlmain);
        $row = $result->fetch_assoc();
        $name = $row["pname"];
        $email = $row["pemail"];
        $nic = $row["pnic"];
        $dob = $row["pdob"];
        $tele = $row["ptel"];
        $address = $row["paddress"];

        echo '
            <div id="popup1" class="overlay">
                <div class="popup">
                    <center>
                        <a class="close" href="student.php">&times;</a>
                        <div class="content"></div>
                        <div style="display: flex; justify-content: center;">
                            <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                    <td colspan="2">
                                        <p style="padding: 0; margin: 0; text-align: left; font-size: 25px; font-weight: 500;">View Details.</p><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600;">Student ID:</td>
                                    <td>P-' . $id . '</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600;">Name:</td>
                                    <td>' . $name . '</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600;">Email:</td>
                                    <td>' . $email . '</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600;">NID:</td>
                                    <td>' . $nic . '</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600;">Telephone:</td>
                                    <td>' . $tele . '</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600;">Address:</td>
                                    <td>' . $address . '</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600;">Date of Birth:</td>
                                    <td>' . $dob . '</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <a href="student.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn"></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </center>
                </div>
            </div>';
    }
    ?>
</body>
</html>