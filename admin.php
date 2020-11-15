<?php

/*
 * Kim Vallido
 * admin.php
 * Display guest database.
 */

////Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Include files
include ('includes/head.html');
require ('includes/dbcreds.php');
?>

<body>
<div class="container-fluid" id="main">

    <!-- Jumbotron header -->
    <div class="jumbotron text-center mb-0">
        <h1 id="title">Guestbook Entries</h1>
    </div>
    <table id="order-table" class="display" style="width:100%">
        <thead>
        <tr>
            <td>Guest ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Job Title</td>
            <td>Company</td>
            <td>How We Met</td>
            <td>(cont)</td>
            <td>Message</td>
            <td>Mailing List</td>
            <td>Format</td>
            <td>Timestamp</td>
        </tr>
        </thead>
        <tbody>


        <?php
        $sql = "SELECT * FROM guestbook";
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            //var_dump($row);
            $guest_id = $row['guest_id'];
            $fullname = $row['fname'] . " " . $row['lname'];
            $email = $row['email'];
            $job_title = $row['job_title'];
            $company = $row['company'];
            $how_met = $row['how_met'];
            $other = $row['other'];
            $message = $row['message'];
            $mail_list = $row['mail_list'];
            $format = $row['format'];
            $timestamp = date("M d, Y g:i a", strtotime($row['input_date']) );

            echo "<tr>";
            echo "<td>$guest_id</td>";
            echo "<td>$fullname</td>";
            echo "<td>$email</td>";
            echo "<td>$job_title</td>";
            echo "<td>$company</td>";
            echo "<td>$how_met</td>";
            echo "<td>$other</td>";
            echo "<td>$message</td>";
            echo "<td>$mail_list</td>";
            echo "<td>$format</td>";
            echo "<td>$timestamp</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <br>
    <a href="index.html" class="btn btn-lg btn-block mt-1" role="button" id="button">Return to form</a>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="scripts/guestbook.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
    $('#order-table').DataTable( {
        "order": [[ 10, "desc" ]]
    } );
</script>

</body>
</html>
