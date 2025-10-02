<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MentorMeet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            transition: background-color 0.5s ease;
            background: #1e1e2f;
        }

        .container {
            max-width: 500px;
            padding: 30px;
            background: rgba(30, 30, 47, 0.8); /* Semi-transparent background for better visibility */
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px); /* Add blur effect to the background */
            position: relative;
            z-index: 10;
        }

        .header-text {
            font-size: 32px;
            font-weight: bold;
            color: #64ffda;
            text-align: center;
            margin-bottom: 15px;
        }

        .greeting-text {
            font-size: 20px;
            color: #90caf9;
            text-align: center;
            margin-bottom: 10px;
        }

        .sub-text {
            font-size: 14px;
            color: #b0bec5;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #81d4fa;
            display: block;
            margin-bottom: 5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-text {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #37474f;
            border-radius: 5px;
            font-size: 14px;
            background: #263238;
            color: #fff;
            box-sizing: border-box;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 40%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #90caf9;
            font-size: 16px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #64ffda;
            color: #121212;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #00e676;
        }

        .hover-link1 {
            color: #64ffda;
            text-decoration: none;
        }

        .hover-link1:hover {
            text-decoration: underline;
        }

        .error-text {
            color: #ff5252;
            text-align: center;
            font-size: 14px;
        }
        
        /* New Animated Background Styles */
        .area {
            background: linear-gradient(to bottom, #4e54c8, #2c3e50);
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: -1;
        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
            z-index: -1;
        }

        .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .circles li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; }
        .circles li:nth-child(9) { left: 20%; width: 55px; height: 55px; animation-delay: 2s; animation-duration: 35s; }
        .circles li:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }

        @keyframes animate {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const body = document.body;
            const greetingElement = document.getElementById('dynamic-greeting');
            const hour = new Date().getHours();
            
            let greetingMessage = "Welcome!";
            let bodyBackground = null;

            if (hour >= 5 && hour < 12) {
                greetingMessage = "Good Morning! 🌥️";
                bodyBackground = "#FFFAF0";
            } else if (hour >= 12 && hour < 18) {
                greetingMessage = "Good Afternoon! ☀️";
                bodyBackground = "#FFE4B5";
            } else if (hour >= 18 && hour < 22) {
                greetingMessage = "Good Evening! 🌙";
                bodyBackground = "#2C3E50";
            }

            greetingElement.innerText = greetingMessage;
            if (bodyBackground) {
                body.style.backgroundColor = bodyBackground;
                body.style.backgroundImage = 'none';
                body.style.animation = 'none';
            }

            // Password toggle
            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("passwordInput");

            togglePassword.addEventListener("click", function() {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });
        });
    </script>
</head>

<body>
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    
    <?php
    session_start();
    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";

    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    $_SESSION["date"] = $date;

    include("connection.php");

    $error = "";

    if ($_POST) {
        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];

        $result = $database->query("SELECT * FROM webuser WHERE email='$email'");
        if ($result->num_rows == 1) {
            $utype = $result->fetch_assoc()['usertype'];
            if ($utype == 'p') {
                $checker = $database->query("SELECT * FROM patient WHERE pemail='$email' AND ppassword='$password'");
                if ($checker->num_rows == 1) {
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'p';
                    header('Location: student/index.php');
                    exit;
                } else {
                    $error = "Invalid email or password.";
                }
            } elseif ($utype == 'a') {
                $checker = $database->query("SELECT * FROM admin WHERE aemail='$email' AND apassword='$password'");
                if ($checker->num_rows == 1) {
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'a';
                    header('Location: admin/index.php');
                    exit;
                } else {
                    $error = "Invalid email or password.";
                }
            } elseif ($utype == 'd') {
                $checker = $database->query("SELECT * FROM doctor WHERE docemail='$email' AND docpassword='$password'");
                if ($checker->num_rows == 1) {
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'd';
                    header('Location: faculty/index.php');
                    exit;
                } else {
                    $error = "Invalid email or password.";
                }
            }
        } else {
            $error = "No account found with this email.";
        }
    }
    ?>

    <div class="container">
        <form action="" method="POST">
            <p id="dynamic-greeting" class="greeting-text"></p>
            <p class="header-text">Login to MentorMeet</p>
            <p class="sub-text">Your Go-to platform for seamless mentorship.🚀</p>

            <label for="useremail" class="form-label">Email:</label>
            <input type="email" name="useremail" class="input-text" placeholder="Enter your email" required>

            <label for="userpassword" class="form-label">Password:</label>
            <div class="input-wrapper">
                <input type="password" id="passwordInput" name="userpassword" class="input-text" placeholder="Enter your password" required>
                <i id="togglePassword" class="fa-solid fa-eye toggle-password"></i>
            </div>

            <?php if (!empty($error)) { ?>
                <p class="error-text"><?php echo $error; ?></p>
            <?php } ?>

            <input type="submit" value="Login" class="login-btn">

            <p class="sub-text" style="margin-top: 20px;">
                Don't have an account? <a href="signup.php" class="hover-link1">Sign Up here!</a>
            </p>
        </form>
    </div>
</body>

</html>
<?php /* optional */ ob_end_flush(); ?>