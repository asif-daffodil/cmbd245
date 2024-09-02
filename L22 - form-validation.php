<?php
// country inline array
$countries = ["Bangladesh", "India", "Pakistan", "Sri Lanka", "Nepal", "Bhutan", "Maldives", "Afghanistan", "Myanmar", "Thailand", "Vietnam", "Laos", "Cambodia", "Malaysia", "Singapore", "Indonesia", "Philippines", "Brunei", "East Timor", "China", "Mongolia", "North Korea", "South Korea", "Japan", "Taiwan", "Hong Kong", "Macau", "Russia", "Kazakhstan", "Uzbekistan", "Turkmenistan", "Tajikistan", "Kyrgyzstan", "Iran", "Iraq", "Syria", "Jordan", "Lebanon"];

if (isset($_POST['signup'])) {
    $yourName = $_POST['yourName'];
    $yourEmail = $_POST['yourEmail'];
    $yourPassword = $_POST['yourPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $skills = isset($_POST['skills']) ? $_POST['skills'] : [];
    $country = $_POST['country'];

    if (empty($yourName)) {
        $errName = "Name is required";
    } elseif (strlen($yourName) < 3) {
        $errName = "Very Small name";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $yourName)) {
        $errName = "Only letters and white space allowed";
    } else {
        $crrName = $yourName;
    }

    if (empty($yourEmail)) {
        $errEmail = "Email is required";
    } elseif (!filter_var($yourEmail, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        $crrEmail = $yourEmail;
    }

    if (empty($yourPassword)) {
        $errPassword = "Password is required";
    } elseif (strlen($yourPassword) < 8) {
        $errPassword = "Password must be 8 characters";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $yourPassword)) {
        $errPassword = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
    } elseif ($yourPassword !== $confirmPassword) {
        $errPassword = "Password does not match";
    } else {
        $crrPassword = $yourPassword;
    }

    if (empty($gender)) {
        $errGender = "Please select your gender";
    } else {
        $crrGender = $gender;
    }

    if (empty($skills)) {
        $errSkills = "Please select your skills";
    } else {
        $crrSkills = $skills;
    }

    if (empty($country)) {
        $errCountry = "Please select your country";
    } else {
        $crrCountry = $country;
    }

    if (isset($crrName) && isset($crrEmail) && isset($crrPassword) && isset($crrGender) && isset($crrSkills) && isset($crrCountry)) {
        $yourName = $yourEmail = $yourPassword = $confirmPassword = $gender = $skills = $country = null;
    }
}

?>
<h2>Sign-up Form</h2>
<form action="" method="post">
    <input type="text" placeholder="Your name" name="yourName" value="<?= $yourName ?? null ?>">
    <span style="color: red"><?= $errName ?? null ?></span>
    <br><br>
    <input type="text" placeholder="Your email" name="yourEmail" value="<?= $yourEmail ?? null ?>">
    <span style="color: red"><?= $errEmail ?? null ?></span>
    <br><br>
    <input type="password" placeholder="Your password" name="yourPassword" value="<?= $yourPassword ?? null ?>" id="pass">
    <span style="color: red"><?= $errPassword ?? null ?></span>
    <br><br>
    <input type="password" placeholder="Confirm password" name="confirmPassword" value="<?= $confirmPassword ?? null ?>" id="cpass">
    <br><br>
    <label for="">Gender</label>
    <label for="genderMale">
        <input type="radio" value="Male" name="gender" id="genderMale" <?= isset($gender) && $gender == "Male" ? "checked" : null ?>>Male
    </label>
    <label for="genderFemale">
        <input type="radio" value="Female" name="gender" id="genderFemale" <?= isset($gender) && $gender == "Female" ? "checked" : null ?>>Female
    </label>
    <span style="color: red"><?= $errGender ?? null ?></span>
    <br><br>
    <label for="Skills">Skills</label>
    <label for="skill1">
        <input type="checkbox" name="skills[]" value="HTML" id="skill1" <?= isset($skills) && in_array("HTML", $skills) ? "checked" : null ?>>HTML
    </label>
    <label for="skill2">
        <input type="checkbox" name="skills[]" value="CSS" id="skill2" <?= isset($skills) && in_array("CSS", $skills) ? "checked" : null ?>>CSS
    </label>
    <label for="skill3">
        <input type="checkbox" name="skills[]" value="JavaScript" id="skill3" <?= isset($skills) && in_array("JavaScript", $skills) ? "checked" : null ?>>JavaScript
    </label>
    <label for="skill4">
        <input type="checkbox" name="skills[]" value="PHP" id="skill4" <?= isset($skills) && in_array("PHP", $skills) ? "checked" : null ?>>PHP
    </label>
    <span style="color: red"><?= $errSkills ?? null ?></span>
    <br><br>
    <label for="country">Country</label>
    <select name="country" id="">
        <option value="">--Sellect Country--</option>
        <?php
        foreach ($countries as $ctr) {
        ?>
            <option value='<?= $ctr ?>' <?= isset($country) && $ctr == $country ? "selected" : null ?>><?= $ctr ?></option>
        <?php
        } ?>
    </select>
    <span style="color: red"><?= $errCountry ?? null ?></span>
    <br><br>
    <input type="checkbox" id="showPass"> Show Password
    <br><br>
    <button type="submit" name="signup">Submit</button>
</form>

<?php
if (isset($crrName) && isset($crrEmail) && isset($crrPassword) && isset($crrGender) && isset($crrSkills) && isset($crrCountry)) {
    echo "<h2>Your Information</h2>";
    echo "Name: " . $crrName . "<br>";
    echo "Email: " . $crrEmail . "<br>";
    echo "Gender: " . $crrGender . "<br>";
    echo "Skills: " . implode(", ", $crrSkills) . "<br>";
    echo "Country: " . $crrCountry . "<br>";
}
?>

<script>
    const showPass = document.getElementById('showPass');
    const pass = document.getElementById('pass');
    const cpass = document.getElementById('cpass');

    showPass.addEventListener('click', () => {
        if (showPass.checked) {
            pass.setAttribute('type', 'text');
            cpass.setAttribute('type', 'text');
        } else {
            pass.setAttribute('type', 'password');
            cpass.setAttribute('type', 'password');
        }
    })
</script>