<!DOCTYPE html>
<html>

<head>
    <title>Insert page</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
    <center>
        <?php
        require('./dbconnect.php');

        // $emp_id = $_REQUEST["emp_id"];
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $design=$_REQUEST["design"];
        $i = 5;
        $counter = $i + 1;
        // Performing insert query execution
        // here our table name is college

            


                // Insert image content into database 
                $sql = "INSERT INTO employee (em_name,em_email,em_deign)
                            VALUES (\"$name\", \"$email\",\"$design\")";
                // it is adding the data in the Database
                // But we have to see for the value of i, how we have to update it and keep cross checking it against the order_id value of the table
                    if ($conn->query($sql) === TRUE) {

                        echo '<script>
                                        setTimeout(function() {
                                            swal({
                                                title: "Success!",
                                                text: "The Data has been added successfully!",
                                                type: "success"
                                            }, function() {
                                                window.location = "./data.php";
                                            });
                                        }, 1000);
                                    </script>';
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
        


        mysqli_close($conn);
        // header("Location: ../hrms/employee_final.php");
        // exit();
        ?>
    </center>

</body>

</html>