<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$values = $_SESSION['values'] ?? [];
session_destroy(); // Clear session after use
?>

<form action="validation.php" method="post">
    <h2>Registration Form</h2>

    User ID: * <input type="text" name="userid" value="<?= htmlspecialchars($values['userid'] ?? '') ?>">
    <span style="color:red"><?= $errors['userid'] ?? '' ?></span><br><br>

    Password: * <input type="password" name="password">
    <span style="color:red"><?= $errors['password'] ?? '' ?></span><br><br>

    First Name: * <input type="text" name="firstname" value="<?= htmlspecialchars($values['firstname'] ?? '') ?>">
    <span style="color:red"><?= $errors['firstname'] ?? '' ?></span><br><br>

    Address: <input type="text" name="address" value="<?= htmlspecialchars($values['address'] ?? '') ?>">
    <span style="color:red"><?= $errors['address'] ?? '' ?></span><br><br>

    Country: *
    <select name="country">
        <option value="">(Please select a country)</option>
        <option value="USA" <?= ($values['country'] ?? '') == 'USA' ? 'selected' : '' ?>>USA</option>
        <option value="India" <?= ($values['country'] ?? '') == 'India' ? 'selected' : '' ?>>India</option>
        <option value="Nepal" <?= ($values['country'] ?? '') == 'Nepal' ? 'selected' : '' ?>>Nepal</option>
    </select>
    <span style="color:red"><?= $errors['country'] ?? '' ?></span><br><br>

    ZIP Code: * <input type="text" name="zipcode" value="<?= htmlspecialchars($values['zipcode'] ?? '') ?>">
    <span style="color:red"><?= $errors['zipcode'] ?? '' ?></span><br><br>

    Email: * <input type="text" name="email" value="<?= htmlspecialchars($values['email'] ?? '') ?>">
    <span style="color:red"><?= $errors['email'] ?? '' ?></span><br><br>

    Sex: *
    <input type="radio" name="sex" value="Male" <?= ($values['sex'] ?? '') == 'Male' ? 'checked' : '' ?>> Male
    <input type="radio" name="sex" value="Female" <?= ($values['sex'] ?? '') == 'Female' ? 'checked' : '' ?>> Female
    <span style="color:red"><?= $errors['sex'] ?? '' ?></span><br><br>

    Language:
    <input type="checkbox" name="language" value="English" <?= ($values['language'] ?? '') == 'English' ? 'checked' : '' ?>> English
    <input type="checkbox" name="language" value="Non-English" <?= ($values['language'] ?? '') == 'Non-English' ? 'checked' : '' ?>> Non English<br><br>

    About:<br>
    <textarea name="about"><?= htmlspecialchars($values['about'] ?? '') ?></textarea><br><br>

    <input type="submit" value="Register">
</form>
