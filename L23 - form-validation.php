<?php
// All Countries in array
$countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'] ?? null;
    $skills = $_POST['skills'] ?? [];
    $country = $_POST['country'];

    if (empty($name)) {
        $errName = "Name is required";
    } elseif (strlen($name) < 3) {
        $errName = "Name must be at least 3 characters";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errName = "Only letters and white space allowed";
    } else {
        $crrName = $name;
    }

    if (empty($email)) {
        $errEmail = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        $crrEmail = $email;
    }

    if (empty($password)) {
        $errPassword = "Password is required";
    } elseif (strlen($password) < 8) {
        $errPassword = "Password must be 8 characters";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errPassword = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
    } else {
        $crrPassword = $password;
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

    if (isset($crrName, $crrEmail, $crrPassword, $crrGender, $crrSkills, $crrCountry)) {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row min-vh-100">
            <div class="col-md-4 m-auto border rounded shadow p-4">
                <h2 class="mb-3">Registration Form</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" placeholder="Your Names" class="form-control <?= isset($errName) ? "is-invalid" : null ?>" name="name">
                        <div class="invalid-feedback">
                            <?= $errName ?? null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Your Email" class="form-control <?= isset($errEmail) ? "is-invalid" : null ?>" name="email">
                        <div class="invalid-feedback">
                            <?= $errEmail ?? null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="password" placeholder="Your Password" class="form-control <?= isset($errPassword) ? "is-invalid" : null ?>" name="password">
                        <div class="invalid-feedback">
                            <?= $errPassword ?? null ?>
                        </div>
                    </div>
                    <div class="<?= isset($errGender) ? "mb-1 border border-danger" : null ?> rounded py-1">
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label">Gender :</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="male" class="form-check-label">
                                <input type="radio" class="form-check-input" value="Male" name="gender" id="male" /> Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="female" class="form-check-label">
                                <input type="radio" class="form-check-input" value="Female" id="female" name="gender"> Female
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 text-danger small">
                        <?= $errGender ?? null ?>
                    </div>
                    <div class="<?= isset($errSkills) ? "mb-1 border border-danger" : null ?> rounded py-1">
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label">Skills :</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="html" class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="HTML" name="skills[]" id="html"> HTML
                            </label>
                        </div>
                        <div class="form-checck form-check-inline">
                            <label for="css" class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="CSS" name="skills[]" id="css"> CSS
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="js" class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="JavaScript" name="skills[]" id="js"> JS
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="php" class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="PHP" name="skills[]" id="php"> PHP
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 text-danger small">
                        <?= $errSkills ?? null ?>
                    </div>
                    <div class="mb-3">
                        <select name="country" id="country" class="form-select <?= isset($errCountry) ? "is-invalid" : null ?>">
                            <option value="">--Select Country--</option>
                            <?php
                            foreach ($countries as $country) {
                            ?>
                                <option value="<?= $country ?>"><?= $country ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $errCountry ?? null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>