<?php
    require_once 'header.php';

    $error = $user = $pass = ''; 

    if (isset($_POST['user']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if ($user == "" || $pass == "")
            $error = 'Not all fields were entered';
        else
        {
            $result = queryMySQL("SELECT USERNAME,PASSWORD FROM ADMIN
            WHERE USERNAME='$user' AND PASSWORD='$pass'");
            if ($result->num_rows == 0)
            {
                $error = "Invalid login attempt";
            }
            else
            {
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                die("<br><br>You are now logged in. Please <a data-transition='slide'
                href='home.php?view=$user'>click here</a> to continue.</div>
                </body></html>");
            }
        }
    }


    echo <<<_END

    <div class='col-6'>
        <h1>Login</h1>
        <form method='post' action='login.php'>
            <div data-role='fieldcontain' '>
                <label></label>
                Please enter your login details 
            </div>

            <div data-role='fieldcontain' >
                <label>Username</label>
                <input type='text' maxlength='32' name='user' value='$user'>
            </div>
            
            <div data-role='fieldcontain' >
                <label>Password</label>
                <input type='password' maxlength='32' name='pass' value='$pass'>
            </div>
            
            <div data-role='fieldcontain' >
                <label></label>
                <input data-transition='slide' type='submit' value='Login'>
            </div>
            
    </div></div>
    </body>
    </html>        

_END;    

?>