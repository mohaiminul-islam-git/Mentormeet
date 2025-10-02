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
    <td class="menu-btn menu-icon-dashbord ">
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
    <td class="menu-btn menu-icon-doctor ">
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
    <td class="menu-btn menu-icon-schedule ">
        <a href="schedule.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Schedule Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-2 .89-2 2v16c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2V5c0-1.11-.89-2-2-2zm0 18H5V8h14v13z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px; ">Schedule</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-appoinment ">
        <a href="appointment.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Appointment Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px; ">Appointment</p>
            </div>
        </a>
    </td>
</tr>

<tr class="menu-row">
    <td class="menu-btn menu-icon-patient menu-active menu-icon-dashbord-active">
        <a href="student.php" class="non-style-link-menu">
            <div style="display: flex; align-items: center;">
                <!-- Students Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="gray" viewBox="0 0 24 24" style="margin-right:8px;margin-left:125px;">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <p class="menu-text" style="margin-left:-125px;color: #1E90FF; font-weight: 600;">Students</p>
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
                        <a href="student.php"><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                            <font class="tn-in-text">Back</font>
                        </button></a>
                    </td>
                    <td>
                        <form action="" method="post" class="header-search">
                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Student name or Email" list="patient">&nbsp;&nbsp;
                            <?php
                            echo '<datalist id="patient">';
                            $list11 = $database->query("select  pname,pemail from patient;");
                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                $row00 = $list11->fetch_assoc();
                                $d = $row00["pname"];
                                $c = $row00["pemail"];
                                echo "<option value='$d'><br/>";
                                echo "<option value='$c'><br/>";
                            };
                            echo ' </datalist>';
                            ?>
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        </form>
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('Y-m-d');
                            echo $date;
                            ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Students (<?php echo $list11->num_rows; ?>)</p>
                    </td>
                </tr>
                <?php
                if ($_POST) {
                    $keyword = $_POST["search"];
                    $sqlmain = "select * from patient where pemail='$keyword' or pname='$keyword' or pname like '$keyword%' or pname like '%$keyword' or pname like '%$keyword%' ";
                } else {
                    $sqlmain = "select * from patient order by pid desc";
                }
                ?>
                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <form action="delete-bulk.php" method="POST" id="bulk-delete-form">
                                    <table width="93%" class="sub-table scrolldown" style="border-spacing:0;">
                                        <thead>
                                            <tr>
                                                <th class="table-headin">
                                                    <input type="checkbox" id="select-all" onclick="toggle(this);">
                                                    <label for="select-all" style="font-size: 14px; cursor: pointer;">Select All</label>
                                                </th>
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
                                                <td colspan="7">
                                                <br><br><br><br>
                                                <center>
                                                <img src="../img/notfound.svg" width="25%">
                                                <br>
                                                <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We couldn\'t find anything related to your keywords !</p>
                                                <a class="non-style-link" href="student.php"><button class="login-btn btn-primary-soft btn" style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Patients &nbsp;</font></button>
                                                </a>
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
                                                    $address = $row["paddress"];
                                                    
                                                    // Sanitize data for JavaScript
                                                    $name_js = htmlspecialchars($name, ENT_QUOTES);
                                                    $email_js = htmlspecialchars($email, ENT_QUOTES);
                                                    $nic_js = htmlspecialchars($nic, ENT_QUOTES);
                                                    $dob_js = htmlspecialchars($dob, ENT_QUOTES);
                                                    $tel_js = htmlspecialchars($tel, ENT_QUOTES);
                                                    $address_js = htmlspecialchars($address, ENT_QUOTES);
                                                    echo '<tr>
                                                        <td><input type="checkbox" name="pids[]" value="' . $pid . '"></td>
                                                        <td> &nbsp;' . $name . '</td>
                                                        <td>' . substr($nic, 0, 12) . '</td>
                                                        <td>' . $tel . '</td>
                                                        <td>' . $email . '</td>
                                                        <td>' . substr($dob, 0, 10) . '</td>
                                                        <td>
                                                            <div style="display:flex;justify-content: center;">
                                                                <button class="btn-primary-soft btn button-icon btn-view" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;" 
                                                                    onclick="showViewPopup(\'' . $pid . '\', \'' . $name_js . '\', \'' . $email_js . '\', \'' . $nic_js . '\', \'' . $dob_js . '\', \'' . $tel_js . '\', \'' . $address_js . '\'); event.preventDefault();">
                                                                    <font class="tn-in-text">View</font>
                                                                </button>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <button class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;" 
                                                                    onclick="showDeletePopup(\'' . $pid . '\', \'' . $name_js . '\'); event.preventDefault();">
                                                                    <font class="tn-in-text">Delete</font>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                                <div style="text-align: right; padding-right: 3.5%; padding-top: 10px;">
                                    <button type="button" onclick="confirmBulkDelete();" class="login-btn btn-primary btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
                                        Delete Selected
                                    </button>
                                </div>
                            </div>
                        </center>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="viewPopup" class="overlay hidden-popup">
        <div class="popup">
            <center>
                <a class="close" href="#" onclick="hidePopup('viewPopup'); event.preventDefault();">&times;</a>
                <div class="content"></div>
                <div style="display: flex;justify-content: center;">
                    <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr><td><p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br></td></tr>
                        <tr><td class="label-td" colspan="2"><label class="form-label">Student ID: </label></td></tr>
                        <tr><td class="label-td" colspan="2"><span id="view-pid"></span><br><br></td></tr>
                        <tr><td class="label-td" colspan="2"><label class="form-label">Name: </label></td></tr>
                        <tr><td class="label-td" colspan="2"><span id="view-name"></span><br><br></td></tr>
                        <tr><td class="label-td" colspan="2"><label class="form-label">Email: </label></td></tr>
                        <tr><td class="label-td" colspan="2"><span id="view-email"></span><br><br></td></tr>
                        <tr><td class="label-td" colspan="2"><label class="form-label">NID: </label></td></tr>
                        <tr><td class="label-td" colspan="2"><span id="view-nic"></span><br><br></td></tr>
                        <tr><td class="label-td" colspan="2"><label class="form-label">Telephone: </label></td></tr>
                        <tr><td class="label-td" colspan="2"><span id="view-tel"></span><br><br></td></tr>
                        <tr><td class="label-td" colspan="2"><label class="form-label">Address: </label></td></tr>
                        <tr><td class="label-td" colspan="2"><span id="view-address"></span><br><br></td></tr>
                        <tr><td class="label-td" colspan="2"><label class="form-label">Date of Birth: </label></td></tr>
                        <tr><td class="label-td" colspan="2"><span id="view-dob"></span><br><br></td></tr>
                        <tr><td colspan="2"><button onclick="hidePopup('viewPopup');" class="login-btn btn-primary-soft btn" >OK</button></td></tr>
                    </table>
                </div>
            </center>
            <br><br>
        </div>
    </div>

    <div id="deletePopup" class="overlay hidden-popup">
        <div class="popup">
            <center>
                <h2>Are you sure?</h2>
                <a class="close" href="#" onclick="hidePopup('deletePopup'); event.preventDefault();">&times;</a>
                <div class="content">
                    You want to delete this record?<br><span id="delete-name"></span>
                </div>
                <div style="display: flex;justify-content: center;">
                    <a href="#" id="delete-confirm-link" class="non-style-link"><button class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><label class="btn-primary-label" style="display: flex;justify-content: center;align-items: center;" >Yes</label></button></a>&nbsp;&nbsp;&nbsp;
                    <button onclick="hidePopup('deletePopup');" class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><label class="btn-primary-label" style="display: flex;justify-content: center;align-items: center;" >&nbsp;&nbsp;No&nbsp;&nbsp;</label></button>
                </div>
            </center>
        </div>
    </div>

    <script>
        function toggle(source) {
            checkboxes = document.querySelectorAll('input[type="checkbox"][name="pids[]"]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
        function confirmBulkDelete() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"][name="pids[]"]:checked');
            if (checkboxes.length === 0) {
                alert("Please select at least one student to delete.");
                return;
            }
            if (confirm("Are you sure you want to delete the selected students? This action cannot be undone.")) {
                document.getElementById('bulk-delete-form').submit();
            }
        }
        function showViewPopup(pid, name, email, nic, dob, tel, address) {
            document.getElementById('view-pid').innerText = 'P-' + pid;
            document.getElementById('view-name').innerText = name;
            document.getElementById('view-email').innerText = email;
            document.getElementById('view-nic').innerText = nic;
            document.getElementById('view-dob').innerText = dob;
            document.getElementById('view-tel').innerText = tel;
            document.getElementById('view-address').innerText = address;
            document.getElementById('viewPopup').style.display = 'block';
        }
        function showDeletePopup(pid, name) {
            document.getElementById('delete-name').innerText = name;
            document.getElementById('delete-confirm-link').href = 'delete-student.php?id=' + pid;
            document.getElementById('deletePopup').style.display = 'block';
        }
        function hidePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }
    </script>
</body>
</html>