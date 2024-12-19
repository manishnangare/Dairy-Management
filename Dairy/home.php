<?php
    require_once 'header.php';

    $error = $aid = $aname = $un =$email = $password = $mobile = $adminreg = $udate = '';
    $un = $_SESSION['user'];
    $result = queryMysql("SELECT * FROM ADMIN WHERE USERNAME='$un'");
    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
        $aid = $row['A_ID'];
        $aname = $row['ANAME'];
        $email = $row['EMAIL_ID'];
        $mobile = $row['MOBILE_NO'];
        $adminreg = $row['ADMINREG_DATE'];
        echo <<<_END
        <div class='row'>
        <div class='col-6'></div>
        <div class=col-6>
            <br><br>
            <h1>User Details : </h1>
            <br>
            <h2>AID : $aid</h2>
            <h2>Name : $aname</h2>
            <h2>Email : $email</h2>
            <h2>Mobile : $mobile</h2>
            <h2>Registration Date : $adminreg</h2>
            
        </div>
        </div>
        </div>
        </body>
        </html>



_END;        
    }

 ?>   