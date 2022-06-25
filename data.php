<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Employee-HR</title>

  <link rel="stylesheet" href="./data.css">
  <!-- Boxicons CDN Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.1.4.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />


  <style>
    tbody tr:hover {
      background-color: rgb(225, 250, 241);
    }
  </style>
</head>

<body>

  <section class="home-section">
    <div style="padding: 0;">

      <!-- Top navbar -->


      <!-- ------------------ add employees----------------- -->
      <div class="text">
        <a href="./form.php" class="text-success" id="promolink" style="font-size: 1.28rem; float:inherit; margin-left: 4%;">

          <i class="bx bxs-user-plus" style="color:#00c851"></i>
          Add New Employee</a>
      </div>


      <!-- ----------- edit employee----------- -->

      <div class="container text-center mt-5 mb-4">
        <form action="./update.php">
          <div id="data">
            <input type="number" inputmode="numeric" pattern="[0-9]*" id="deptId" name="employee_id" class=" rounded mb-2 " style=" height: 40px; border: none; padding-left: 1%;" placeholder="Employee-id">
            <input type="text" id="deptName" name="employee_name" class=" rounded mb-2   " style=" height: 40px; border: none;  padding-left: 1%;" placeholder="Name">
            <input type="text" id="empNm" name="employee_email" class=" rounded mb-2  " style=" height: 40px; border: none;  padding-left: 1%;" placeholder="Email-id">
            <input type="text" id="designation" name="employee_design" class=" rounded mb-2 " style=" height: 40px; border: none;  padding-left: 1%;" placeholder="Designation">

            <!-- <button type="button" id="addButton" class="btn btn-outline-primary">+ Add</button> -->


            <!-- <button type="submit" value="forSubmitBtn" class="btn  btn-primary text-white" onclick="editHtmlTbleSelectedRow();">Edit</button> -->
            <input type="submit" value="Edit" class="btn  btn-primary text-white" onclick="editHtmlTbleSelectedRow();">
          </div>
        </form>
      </div>


      <!------------ search bar------------>
      <div class="text-center">

        <input type="text" id="inputSearch" class=" rounded  " style="width:80%; height: 40px; border: none; margin-top: 2%; padding: 1%; margin-bottom: 2%;" placeholder="   Search for employee (by name)...">

      </div>

      <!-- --------------table---------------- -->
      <div class="container shadow-lg pt-2 pb-2 mb-5 bg-white rounded mt-3 text-center" style="background-color: black;">
        <table class="table table-responsive-lg table-bordered" style="width: 100%;" id="departmentsTable">
          <!-- <div class=" ml-4 container shadow-lg p-3 mb-5 mt-4 bg-white rounded" >
        <table class="table table-responsive-lg table-bordered" id="employeeTable"> -->
          <thead>
            <tr>
              <th scope="col" class="text-size text-secondary">Employee-Id</th>
              <th scope="col" class="text-size text-secondary">Name</th>
              <th scope="col" class="text-size text-secondary">Email id</th>
              <th scope="col" class="text-size text-secondary">Designation</th>
            </tr>
          </thead>
          <tbody>

            <?php
            require('./dbconnect.php');
            $sql = "SELECT * FROM employee";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                  
                  <td><?php echo $row["em_emp_id"] ?></td>
                  <td><?php echo $row["em_name"] ?></td>
                  <td><?php echo $row["em_email"] ?></td>
                  <td><?php echo $row["em_deign"] ?></td>
                </tr>

              <?php
                $i++;
              }
              ?>

          </tbody>
        </table>

      <?php
            } else {
              echo "No result found";
            }
      ?>
      </div>

    </div>
  </section>



  <!-- Chart.js
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


  <script src="../js/script.js"></script>
  <script src="js/graphs.js"></script> -->


  <script>
    var rIndex,
      table = document.getElementById("departmentsTable");

    // check the empty input
    function checkEmptyInput() {
      var isEmpty = false,
        idInput = document.getElementById("deptId").value,
        nameInput = document.getElementById("deptName").value,
        nameEmInput = document.getElementById("empNm").value;
      balanceInput = document.getElementById("employee_dept").value;
      designationInput = document.getElementById("designation").value;

      if (idInput === "") {
        alert("ID Connot Be Empty");
        isEmpty = true;
      } else if (nameInput === "") {
        alert("Name Connot Be Empty");
        isEmpty = true;
      } else if (nameEmInput === "") {
        alert("Email Connot Be Empty");
        isEmpty = true;
      } else if (balanceInput === "") {
        alert("Department Connot Be Empty");
        isEmpty = true;
      } else if (designationInput === "") {
        alert("Designation Connot Be Empty");
        isEmpty = true;
      }
      return isEmpty;
    }

    // add Row
    function addHtmlTableRow() {
      // get the table by id
      // create a new row and cells
      // get value from input text
      // set the values into row cell's
      if (!checkEmptyInput()) {
        var newRow = table.insertRow(table.length),
          cell1 = newRow.insertCell(0),
          cell2 = newRow.insertCell(1),
          cell3 = newRow.insertCell(2),
          cell5 = newRow.insertCell(3),
          idInput = document.getElementById("deptId").value,
          nameInput = document.getElementById("deptName").value,
          nameEmInput = document.getElementById("empNm").value;
        designationInput = document.getElementById("designation").value;


        cell1.innerHTML = idInput;
        cell2.innerHTML = nameInput;
        cell3.innerHTML = nameEmInput;
        cell5.innerHTML = designationInput;
        // call the function to set the event to the new row
        selectedRowToInput();
      }
    }
    // display selected row data into input text
    function selectedRowToInput() {

      for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
          // get the seected row index
          rIndex = this.rowIndex;
          document.getElementById("deptId").value = this.cells[0].innerHTML;
          document.getElementById("deptName").value = this.cells[1].innerHTML;
          document.getElementById("empNm").value = this.cells[2].innerHTML;
          document.getElementById("designation").value = this.cells[3].innerHTML;
        };
      }
    }
    selectedRowToInput();

    function editHtmlTbleSelectedRow() {
      var idInput = document.getElementById("deptId").value,
        nameInput = document.getElementById("deptName").value,
        nameEmInput = document.getElementById("empNm").value;
      designationInput = document.getElementById("designation").value;
      if (!checkEmptyInput()) {
        table.rows[rIndex].cells[0].innerHTML = idInput;
        table.rows[rIndex].cells[1].innerHTML = nameInput;
        table.rows[rIndex].cells[2].innerHTML = nameEmInput;
        table.rows[rIndex].cells[3].innerHTML = designationInput;
      }
    }

    // <!-- -------------- search bar----------------- -->
    const search_input = document.getElementById("inputSearch");
    const rows = document.querySelectorAll(" tbody tr");

    search_input.addEventListener("keyup", function(event) {
      const q = event.target.value.toLowerCase();
      rows.forEach((row) => {
        row.querySelector("td:nth-child(2)").textContent.toLowerCase().startsWith(q) ?
          (row.style.display = "table-row") :
          (row.style.display = "none")
      });
    });
  </script>



</body>

</html>