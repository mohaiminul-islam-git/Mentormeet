<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/signup.css">

    <title>Create Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            transition: background-color 0.5s ease;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .header-text {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .sub-text {
            font-size: 16px;
            color: #666;
            text-align: center;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #444;
            display: block;
            margin-bottom: 5px;
        }

        .input-text {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-btn {
            width: 48%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .btn-primary {
            background-color: #0047ab;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #003580;
            transform: scale(1.05);
        }

        .btn-primary-soft {
            background-color: #e0e0e0;
            color: #333;
        }

        .btn-primary-soft:hover {
            background-color: #ccc;
            transform: scale(1.05);
        }

        .hover-link1 {
            color: #0047ab;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .hover-link1:hover {
            text-decoration: underline;
            color: #002f6c;
        }

        .error-text {
            color: #ff3e3e;
            text-align: center;
            font-size: 14px;
        }

        /* Eye SVG button inside input */
        .password-container {
            position: relative;
            margin-bottom: 15px;
        }

        .password-container input {
            padding-right: 40px; /* space for the icon */
        }

        .password-container .toggle-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            width: 24px;
            height: 24px;
            padding: 0;
        }

        .password-container .toggle-btn svg {
            width: 100%;
            height: 100%;
            fill: #666;
        }

        .password-container .toggle-btn:hover svg {
            fill: #0047ab;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";

    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    $_SESSION["date"] = $date;

    include("connection.php");

    if ($_POST) {
        $fname = $_SESSION['personal']['fname'];
        $lname = $_SESSION['personal']['lname'];
        $name = $fname . " " . $lname;
        $address = $_SESSION['personal']['address'];
        $nic = $_SESSION['personal']['nic'];
        $dob = $_SESSION['personal']['dob'];
        $email = $_POST['newemail'];
        $country_code = $_POST['country_code'];
        $tele = $_POST['tele'];
        $full_number = $country_code . $tele;
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];

        if ($newpassword == $cpassword) {
            $stmt = $database->prepare("SELECT * FROM webuser WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $error = "An account with this email already exists.";
            } else {
                $database->query("INSERT INTO patient (pemail, pname, ppassword, paddress, pnic, pdob, ptel) VALUES ('$email', '$name', '$newpassword', '$address', '$nic', '$dob', '$full_number')");
                $database->query("INSERT INTO webuser VALUES ('$email', 'p')");

                $_SESSION["user"] = $email;
                $_SESSION["usertype"] = "p";
                $_SESSION["username"] = $fname;

                header('Location: student/index.php');
                exit;
            }
        } else {
            $error = "Password Confirmation Error! Please re-confirm the password.";
        }
    } else {
        $error = "";
    }
    ?>

    <div class="container">
        <p id="greeting" class="header-text"></p>
        <form action="" method="POST">
            <p class="sub-text">Create your account to continue.</p>

            <label for="newemail" class="form-label">Email:</label>
            <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>

            <label for="tele" class="form-label">Mobile Number:</label>
            <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 15px;">
                <select name="country_code" class="input-text" style="width: 40%;">
                    <option value="+1">🇺🇸 +1 USA</option>
                    <option value="+44">🇬🇧 +44 UK</option>
                    <option value="+61">🇦🇺 +61 Australia</option>
                    <option value="+1">🇨🇦 +1 Canada</option>
                    <option value="+91">🇮🇳 +91 India</option>
                    <option value="+880">🇧🇩 +880 Bangladesh</option>
                    <option value="+92">🇵🇰 +92 Pakistan</option>
                    <option value="+977">🇳🇵 +977 Nepal</option>
                    <option value="+94">🇱🇰 +94 Sri Lanka</option>
                    <option value="+60">🇲🇾 +60 Malaysia</option>
                    <option value="+65">🇸🇬 +65 Singapore</option>
                    <option value="+62">🇮🇩 +62 Indonesia</option>
                    <option value="+63">🇵🇭 +63 Philippines</option>
                    <option value="+84">🇻🇳 +84 Vietnam</option>
                    <option value="+86">🇨🇳 +86 China</option>
                    <option value="+81">🇯🇵 +81 Japan</option>
                    <option value="+82">🇰🇷 +82 South Korea</option>
                    <option value="+7">🇷🇺 +7 Russia</option>
                    <option value="+49">🇩🇪 +49 Germany</option>
                    <option value="+33">🇫🇷 +33 France</option>
                    <option value="+39">🇮🇹 +39 Italy</option>
                    <option value="+34">🇪🇸 +34 Spain</option>
                    <option value="+31">🇳🇱 +31 Netherlands</option>
                    <option value="+41">🇨🇭 +41 Switzerland</option>
                    <option value="+43">🇦🇹 +43 Austria</option>
                    <option value="+46">🇸🇪 +46 Sweden</option>
                    <option value="+47">🇳🇴 +47 Norway</option>
                    <option value="+45">🇩🇰 +45 Denmark</option>
                    <option value="+358">🇫🇮 +358 Finland</option>
                    <option value="+48">🇵🇱 +48 Poland</option>
                    <option value="+420">🇨🇿 +420 Czech Republic</option>
                    <option value="+36">🇭🇺 +36 Hungary</option>
                    <option value="+40">🇷🇴 +40 Romania</option>
                    <option value="+90">🇹🇷 +90 Turkey</option>
                    <option value="+20">🇪🇬 +20 Egypt</option>
                    <option value="+212">🇲🇦 +212 Morocco</option>
                    <option value="+971">🇦🇪 +971 UAE</option>
                    <option value="+966">🇸🇦 +966 Saudi Arabia</option>
                    <option value="+968">🇴🇲 +968 Oman</option>
                    <option value="+974">🇶🇦 +974 Qatar</option>
                    <option value="+973">🇧🇭 +973 Bahrain</option>
                    <option value="+962">🇯🇴 +962 Jordan</option>
                    <option value="+961">🇱🇧 +961 Lebanon</option>
                    <option value="+98">🇮🇷 +98 Iran</option>
                    <option value="+55">🇧🇷 +55 Brazil</option>
                    <option value="+54">🇦🇷 +54 Argentina</option>
                    <option value="+56">🇨🇱 +56 Chile</option>
                    <option value="+57">🇨🇴 +57 Colombia</option>
                    <option value="+51">🇵🇪 +51 Peru</option>
                    <option value="+64">🇳🇿 +64 New Zealand</option>
                    <option value="+27">🇿🇦 +27 South Africa</option>
                </select>
                <input type="tel" name="tele" class="input-text" style="width: 60%;" placeholder="Mobile Number"
                    pattern="[0-9]{5,15}" required>
            </div>

            <label for="newpassword" class="form-label">Create New Password:</label>
            <div class="password-container">
                <input type="password" name="newpassword" class="input-text" placeholder="New Password" required
                    pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}"
                    title="Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*)"
                    id="newpassword">
                <button type="button" class="toggle-btn" onclick="togglePassword('newpassword', this)">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13c-3.04 0-5.5-2.46-5.5-5.5S8.96 6.5 12 6.5s5.5 2.46 5.5 5.5-2.46 5.5-5.5 5.5zm0-9a3.5 3.5 0 100 7 3.5 3.5 0 000-7z" />
                    </svg>
                </button>
            </div>

            <label for="cpassword" class="form-label">Confirm Password:</label>
            <div class="password-container">
                <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" required
                    id="cpassword">
                <button type="button" class="toggle-btn" onclick="togglePassword('cpassword', this)">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13c-3.04 0-5.5-2.46-5.5-5.5S8.96 6.5 12 6.5s5.5 2.46 5.5 5.5-2.46 5.5-5.5 5.5zm0-9a3.5 3.5 0 100 7 3.5 3.5 0 000-7z" />
                    </svg>
                </button>
            </div>

            <?php if (!empty($error)) { ?>
                <p class="error-text"><?php echo $error; ?></p>
            <?php } ?>

            <div style="display: flex; justify-content: space-between;">
                <input type="reset" value="Reset" class="login-btn btn-primary-soft">
                <input type="submit" value="Sign Up" class="login-btn btn-primary">
            </div>

            <p class="sub-text" style="margin-top: 20px;">
                Already have an account? <a href="login.php" class="hover-link1">Login</a>
            </p>
        </form>
    </div>

    <script>
        // Dynamic Greeting and Background
        const hour = new Date().getHours();
        const greeting = document.getElementById('greeting');
        const body = document.body;

        if (hour >= 5 && hour < 12) {
            greeting.innerText = "Good Morning! 🌞";
            body.style.backgroundColor = "#FFDEE9";
        } else if (hour >= 12 && hour < 18) {
            greeting.innerText = "Good Afternoon! ☀️";
            body.style.backgroundColor = "#D4FC79";
        } else {
            greeting.innerText = "Good Evening! 🌙";
            body.style.backgroundColor = "#A1C4FD";
        }

        // Toggle Password Visibility
        function togglePassword(id, element) {
            const input = document.getElementById(id);
            const svg = element.querySelector('svg path');
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>

</html>
