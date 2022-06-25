<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Employee Form</title>

    <link rel="stylesheet" href="./data.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

    <style>
        input::-webkit-datetime-edit {
            color: transparent;
        }

        input:focus::-webkit-datetime-edit {
            color: #000;
        }
    </style>
</head>

<body>


    <div class="text" style="height: max-content; padding-bottom: 4%;">
        <div class="container pb-4 mt-2 shadow-lg" id="addForm" style="width: 80%;">
            <h1 style="font-weight: 400; margin-top: 4%;">Add New Employee</h1>

            <div class="container form-center" style="width: 88%; margin-bottom: 50px;">
                <div style="width: 90%;">
                    <form action="./add.php" method="post" enctype="multipart/form-data">
                        <div class="formpage">
                            <div class="jobData ">
                                <!-- <h4 class="sp1">Employee and Job Data</h4> -->

                                <?php
                                require('./dbconnect.php');
                                $sql = "SELECT em_emp_id from EMPLOYEE ORDER BY em_emp_id DESC LIMIT 1;";
                                $result = mysqli_query($conn, $sql);
                                $id = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $id = $row["em_emp_id"] + 1;
                                }
                                ?>

                                <div class="row mb-2">
                                    <div class="col-md-12 mt-4">
                                        <label for="" class="mr-4">Employee ID</label>
                                        <input type="number" name="emp_id" id="" readonly style="background: #D3D3D3;" value="<?php echo $id; ?>">
                                    </div>
                                </div>


                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="" class="mr-4 ">Name</label>
                                        <input type="text" name="name" id="" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="" class="mr-4 ">Email</label>
                                        <input type="email" name="email" id="" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="" class="mr-4 ">Designation</label>
                                        <input type="text" name="design" id="" required>
                                    </div>
                                </div>
                            </div>


                            <hr>

                            <div class="Supervision">
                                <!-- <button type="submit" value="formSubmitBtn" id="formSubmitBtn"> Submit</button> -->
                                <input type="submit" value="Submit" name="submit" id="formSubmitBtn"></input>
                            </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>
    </section>

    <!-- <script src="../js/script.js"></script> -->

</body>

</html>