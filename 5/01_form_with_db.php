<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form with db</title>
    <style>
        div {
            background: gray;
        }

        #green {
            color: green;
        }

        #red {
            color: red;
        }
    </style>
</head>

<body>
    <div style="height: 200px; width: 300px;">
        <fieldset>
            <form method="post" style="justify-content: center;display: flex;flex-direction:column;">
                <label>Name</label>
                <input type="text" name="Name">
                <label>Address</label>
                <input type="text" name="Address">
                <label>Email</label>
                <input type="email" name="Email">
                <label>Phone</label>
                <input type="tel" name="phoneno">
                <input type="submit" name="submit" value="submit">
            </form>
        </fieldset>
    </div>

    <?php
    // for db connection
    //in your case db_connect can be different db_connect=database name of your sql.
    $sai = mysqli_connect('localhost', 'root', '', 'db_connect');

    // Check connection
    if (!$sai) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // taking form info
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $textName = $_POST['Name'];
        $textAddress = $_POST['Address'];
        $textEmail = $_POST['Email'];
        $textPhone = $_POST['phoneno'];

        // sql query
        $sql = "INSERT INTO info (Name, Address, Email, Phone) VALUES ('$textName', '$textAddress', '$textEmail', '$textPhone')";

        // executing query
        $insert = mysqli_query($sai, $sql);
        if ($insert) {
            echo "<p id='green'>Record inserted</p>";
        } else {
            echo "<p id='red'>Error occurred: " . mysqli_error($sai) . "</p>";
        }
    }

    // Close the connection
    mysqli_close($sai);
    ?>
</body>

</html>
