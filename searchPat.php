<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Filter Appointment By IC Number</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            color: #555555;
            text-align: center;
            font-family: sans-serif;
            margin: 0;
        }

        .topnav {
            overflow: hidden;
            background-color: transparent;
            margin-left: 22%;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 12px 16px;
            text-decoration: none;
            font-size: 17px;
            color: #111111;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        table {
            background: #f7f7f7;
            text-align: center;
            margin-left: 5px;
            margin-right: 5px;
            border-collapse: collapse;
            border-width: 2px;
            margin-left: auto;
            margin-right: auto;
        }

        .but {
            background-color: #CED6E0;
            padding: 4px 8px;
            color: #555555;
        }

        .but:hover, .fil:hover {
            cursor: pointer;
            color: #111111;
        }

        .button, .fil {
            background-color: #CED6E0;
            border: none;
            padding: 8px 12px;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            color: #555555;
            border-radius: 4px;
        }

        .txtfield {
            padding: 8px 12px;
        }

        h1 {
            text-align: center;
            color: #414c6b;
            font-size: 40px;
        }

        a {
            color: #555555;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            color: black;
        }

        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <a href="home.php">Home</a>
        <a href="addPat.php">Register Patient</a>
        <a href="listPat.php">List Of Patient</a>
        <a href="addAppt.php">Create Appointment</a>
        <a href="listAppt.php">List Of Appointment</a>
    </div>
    <form action="" method="POST">
        <input class="txtfield" type="text" name="search" placeholder="IC Number"> <input class="button" name="submit" type="submit" value="SEARCH">
        <a class="fil" href="listPat.php" action="">BACK</a>
    </form>



    <?php
    if (isset($_POST["submit"])) {
        $search = $_POST["search"];
        //echo $search;
        $conn = oci_connect('demo', 'system', 'localhost:1521/xe');
        $query = "SELECT * FROM patients WHERE PATIENT_IC='" . $search . "'";
        $stid = oci_parse($conn, $query);
        $row = oci_execute($stid); ?>
        <table id="myTable" border="1">
            <tr>
                <th>PATIENT ID</th>
                <th>PATIENT NAME</th>
                <th>PATIENT IC</th>
                <th>PATIENT CONTACT</th>
                <th>PATIENT ADDRESS</th>
                <th colspan="2">ACTION</th>
            </tr><?php
                    while ($row = oci_fetch_assoc($stid)) { ?>
                <tr class="item">
                    <td><?php echo $row["PATIENT_ID"]; ?></td>
                    <td><?php echo $row["PATIENT_NAME"]; ?></td>
                    <td><?php echo $row["PATIENT_IC"]; ?></td>
                    <td><?php echo $row["PATIENT_CONTACT"]; ?></td>
                    <td><?php echo $row["PATIENT_ADDRESS"]; ?></td>
                    <td><a class="but" href="updatePat.php?PATIENT_ID=<?= $row["PATIENT_ID"]; ?>">Update</a></td>
                    <td><a class="but" href="deletePat.php?PATIENT_ID=<?= $row["PATIENT_ID"]; ?>">Delete</a></td>
                </tr><?php
                    } ?>
        </table><?php
            }
                ?>
</body>

</html>