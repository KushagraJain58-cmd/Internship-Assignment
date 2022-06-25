<!DOCTYPE html>
<html>

<head>
    <title>Update page</title>
</head>

<body>
    <center>
        <?php
        require('./dbconnect.php');


        $employee_id = $_REQUEST['employee_id'];
        $employee_name = $_REQUEST['employee_name'];
        $employee_email = $_REQUEST['employee_email'];
        $employee_design = $_REQUEST['employee_design'];


        $query = "UPDATE employee SET em_emp_id='$employee_id',em_name='$employee_name',em_email='$employee_email',
                                    em_deign='$employee_design' 
                WHERE em_emp_id='$employee_id'";
        $data = mysqli_query($conn, $query);

        if ($data) {
        ?>
            <meta HTTP-EQUIV="Refresh" content="0; URL=http://localhost/internship_form/data.php">
        <?php
            echo "Record updated";
        } else {
        ?>
            <meta HTTP-EQUIV="Refresh" content="0; URL=http://localhost/internship_form/data.php">
        <?php
            echo "Failed to update record";
        }
        ?>
    </center>
</body>

</html>