<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form SanberBook</title>
</head>
<body>
    <header><h1>Buat Account Baru!</h1></header>
    <section id="form">
        <h2>Sign Up Form</h2>
        <form action="/welcome" method="POST">
            @csrf
            <label for="firstName">First name:</label><br><br>
            <input type="text" name="firstName" id="firstName"><br><br>
            <label for="lastName">Last name:</label><br><br>
            <input type="text" name="lastName" id="lastName"><br><br>
            <label for="gender">Gender:</label><br><br>
            <input type="radio" name="gender" id="gender" value="male">Male<br>
            <input type="radio" name="gender" id="gender" value="female">Female<br>
            <input type="radio" name="gender" id="gender" value="other">Other<br><br>
            <label for="nationality">Nationality:</label><br><br>
            <select name="nationality" id="nationality">
                <option value="indonesian">Indonesian</option>
                <option value="Malaysian">Malaysian</option>
                <option value="Australian">Australian</option>
            </select><br><br>
            <label for="languageSpoken">Language Spoken:</label><br><br>
            <input type="checkbox" name="languageSpoken" id="languageSpoken" value="bahasaIndonesia">Bahasa Indonesia<br>
            <input type="checkbox" name="languageSpoken" id="languageSpoken" value="english">English<br>
            <input type="checkbox" name="languageSpoken" id="languageSpoken" value="other">Other<br><br>
            <label for="bio">Bio:</label><br><br>
            <textarea name="bio" id="bio" rows="10" cols="30"></textarea><br>
            <input type="submit" value="Sign Up">
        </form>
    </section>
</body>
</html>