<?php
include 'dbconfig.php';
$output = '';
if (isset($_POST['export_excel'])) {
    $sql = "SELECT * FROM infos ORDER BY id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
                <table class = "table" bordered = "1">
                    <tr>
                        <th>S.No</th>
                        <th>Emp_ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Academic Score</th>
                        <th>Performance Score</th>
                    </tr>
            ';
        $sno = 0;
        while ($row = mysqli_fetch_array($result)) {
            $sno += 1;
            $output .= '
                    <tr>
                        <td>' . $sno . '</td>
                        <td>' . $row["emp_id"] . '</td>
                        <td>' . $row["first_name"] . '</td>
                        <td>' . $row["last_name"] . '</td>
                        <td>' . $row["dept"] . '</td>
                        <td>' . $row["academic_score"] . '</td>
                        <td>' . $row["performance_score"] . '</td>
                    </tr>
                ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=info.xls");
        echo $output;
    }
}
