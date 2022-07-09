<?php

include 'dbconfig.php';

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `infos` WHERE `infos`.`id` = $sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $emp_id_edit = $_POST['emp_id_edit'];
        $first_name_edit = $_POST['first_name_edit'];
        $last_name_edit = $_POST['last_name_edit'];
        $dept_edit = $_POST['dept_edit'];
        $a_score_edit = $_POST['academic_score_edit'];
        $p_score_edit = $_POST['performance_score_edit'];
        $sno_edit = $_POST['snoEdit'];
        $sql = "UPDATE infos SET emp_id = '$emp_id_edit',first_name = '$first_name_edit', last_name = '$last_name_edit', dept = '$dept_edit', academic_score = '$a_score_edit', performance_score = 
        '$p_score_edit' WHERE id = '$sno_edit'";
        $result = mysqli_query($conn, $sql);
    } else {
        $emp_id = $_POST['emp_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dept = $_POST['dept'];
        $a_score = $_POST['academic_score'];
        $p_score = $_POST['performance_score'];
        $sql = "INSERT INTO infos (emp_id,first_name, last_name, dept, academic_score, performance_score) VALUES ('$emp_id','$first_name', '$last_name', '$dept','$a_score','$p_score')";
        $result = mysqli_query($conn, $sql);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/79129b46ef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">



    <title>VOLSEC</title>


    <style>
        .nonsense {
            /* background: red; */
            z-index: 10;
            padding-top: 2rem;
            padding-bottom: 2rem;
            position: relative;
            background: whitesmoke;
            display: none;
        }

        .exit-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;


        }

        .show_modal {
            display: block;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">VOLSEC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: flex; justify-content: space-between;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Me</a>
                    </li>

                </ul>
                <form class="d-flex" role="search" style="display: flex; gap: 10px">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <div style="margin: 1rem auto; border: 2px solid black; border-radius: 5px; width: 90%; position:fixed;top:15vh;left: 5vw;" class="nonsense" id="form-modal">

        <form action="/vols/index.php" method='post'>
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="field emp_id">
                <label for="emp_id_edit">Emp_ID</label>
                <input type="text" name="emp_id_edit" id="emp_id_edit" required>
            </div>
            <div class="field fname">
                <label for="first_name_edit">First Name</label>
                <input type="text" name="first_name_edit" id="first_name_edit" required>
            </div>
            <div class="field lname">
                <label for="last_name_edit">Last Name</label>
                <input type="text" name="last_name_edit" id="last_name_edit" required>
            </div>
            <div class="field dept">
                <label for="dept_edit">Department</label>
                <input type="text" name="dept_edit" id="dept_edit" required>
            </div>
            <div class="field a_score">
                <label for="a_score_edit">Academic Score</label>
                <input type="number" min="1" max="5" name="academic_score_edit" id="a_score_edit" required>
            </div>
            <div class="field p_score">
                <label for="p_score_edit">Performance Score</label>
                <input type="number" min="1" max="5" id="p_score_edit" name="performance_score_edit" id="p_score" required>
            </div>
            <button type="submit" name="submit">Update</button>
        </form>
        <span class="exit-close"><i class="fa-solid fa-xmark"></i></span>
    </div>

    <div class="container">
        <h4>Add data</h4>
        <form action="/vols/index.php" method="post">
            <div class="field emp_id">
                <label for="emp_id">Emp_ID</label>
                <input type="text" name="emp_id" id="emp_id" required>
            </div>
            <div class="field fname">
                <label for="first-name">First Name</label>
                <input type="text" name="first_name" id="first-name" required>
            </div>
            <div class="field lname">
                <label for="last-name">Last Name</label>
                <input type="text" name="last_name" id="last-name" required>
            </div>
            <div class="field dept">
                <label for="dept">Department</label>
                <input type="text" name="dept" id="dept" required>
            </div>
            <div class="field a_score">
                <label for="a_score">Academic Score</label>
                <input type="number" min="1" max="5" name="academic_score" id="a_score" required>
            </div>
            <div class="field p_score">
                <label for="p_score">Performance Score</label>
                <input type="number" min="1" max="5" name="performance_score" id="p_score" required>
            </div>
            <button type="submit">Submit</button>

        </form>
    </div>

    <div class="container my-4">
        <table class="table my-2" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Emp_ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Academic Score</th>
                    <th scope="col">Performance Score</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM infos ORDER BY id";
                $result = mysqli_query($conn, $sql);

                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
                    <th scope = 'row'> " . $sno . "</th>
                    <td> " . $row['emp_id'] . "</td>
                    <td> " . $row['first_name'] . "</td>
                    <td> " . $row['last_name'] . "</td>
                    <td> " . $row['dept'] . "</td>
                    <td> " . $row['academic_score'] . "</td>
                    <td> " . $row['performance_score'] . "</td>
                    <td><button id =" . $row['id'] . " class = 'delete btn btn-danger my-1'>Delete</button> <button class = 'edit btn btn-light' id = " . $row['id'] . ">Edit</button>
                </td>

                    </tr>";
                }

                ?>
            </tbody>
        </table>
    </div>

    <form action="excel.php" method="POST">
        <input type="submit" name="export_excel" class="btn btn-success" value="Export to Excel">
    </form>
    <hr>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        const modal = document.querySelector('.nonsense'),
            closeBtn = document.querySelector('.exit-close');
        updateBtn = document.getElementsByClassName('edit');

        Array.from(updateBtn).forEach((element) => {
            element.addEventListener('click', (e) => {
                tr = e.target.parentNode.parentNode;
                emp_id = tr.getElementsByTagName('td')[0].innerText;
                first_name = tr.getElementsByTagName('td')[1].innerText;
                last_name = tr.getElementsByTagName('td')[2].innerText;
                dept = tr.getElementsByTagName('td')[3].innerText;
                a_score = tr.getElementsByTagName('td')[4].innerText;
                p_score = tr.getElementsByTagName('td')[5].innerText;

                emp_id_edit.value = emp_id;
                first_name_edit.value = first_name;
                last_name_edit.value = last_name;
                dept_edit.value = dept;
                a_score_edit.value = a_score;
                p_score_edit.value = p_score;
                snoEdit.value = e.target.id;
                modal.classList.add('show_modal');

            })
        })
        closeBtn.addEventListener('click', () => {
            modal.classList.remove('show_modal');
        })
    </script>
    <script>
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                tr = e.target.parentNode.parentNode
                sno = e.target.id;
                console.log(e.target.id);

                if (confirm("Do you want to delete this !")) {
                    console.log("Yes")
                    window.location = `/vols/index.php?delete=${sno}`;
                } else {
                    console.log("No")
                }

            })
        })
    </script>
</body>

</html>