<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "hr";


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM vw_employee_full_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Full Details</title>
    <style>
        body {
            font-family: Arial;
            background:#f4f4f4;
            padding:20px;
        }
        table {
            width:100%;
            border-collapse:collapse;
            background:white;
        }
        th, td {
            padding:10px;
            border:1px solid #ddd;
            text-align:left;
        }
        th {
            background:#6A1B9A;
            color:white;
        }
        tr:hover {
            background:#f1f1f1;
        }
    </style>
</head>
<body>

<h2>Employee Details</h2>

<table>
    <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Job Title</th>
        <th>Employment Date</th>
        <th>Manager</th>
        <th>Department</th>
        <th>Location</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['employee_id']}</td>
                <td>{$row['employee_name']}</td>
                <td>{$row['job_title']}</td>
                <td>{$row['employment_date']}</td>
                <td>{$row['manager_name']}</td>
                <td>{$row['department_name']}</td>
                <td>{$row['full_location']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}
?>

</table>

</body>
</html>

<?php
$conn->close();

?>
