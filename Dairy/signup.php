<?php
    require_once 'header.php';

    $error = $pass = $name = $user = $email= $mobile = $regdate ='';
    if (isset($_SESSION['user'])) destroySession();
    if (isset($_POST['user']))
    {
    
        $user = $_POST['user'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $regdate = $_POST['regdate'];
        if ($user == "" || $pass == "" || $email == "" || $name == "" || $mobile == "" || $regdate == "")
            $error = 'Not all fields were entered<br><br>';
        else
        {
            $result = queryMysql("SELECT * FROM ADMIN WHERE USERNAME='$user'");
            if ($result->num_rows)
                $error = 'That username already exists<br><br>';
            else
            {
                queryMysql("INSERT INTO ADMIN(ANAME,USERNAME,EMAIL_ID,PASSWORD,MOBILE_NO,ADMINREG_DATE)
                 VALUES('$name', '$user','$email','$pass','$mobile','$regdate')");
                die('<h4>Account created</h4>Please log in.</div></div></body></html>');
            }
        }
    }


    echo <<<_END

        <div class='col-6'>
            <h1>Sign up</h1>
            <form method='post' action='signup.php'>$error
            <div data-role='fieldcontain' >
            <label></label>
            Please enter your details to sign up
            </div>

            <div data-role='fieldcontain'>
            <label>Name</label>
            <input type='text' maxlength='16' name='name' value='$name'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain' >
            <label>Username</label>
            <input type='text' maxlength='16' name='user' value='$user'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain' >
            <label>Email</label>
            <input type='text' maxlength='16' name='email' value='$email'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain' >
            <label>Mobile</label>
            <input type='text' maxlength='16' name='mobile' value='$mobile'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain' >
            <label>Reg Date</label>
            <input type='text' maxlength='16' name='regdate' value='$regdate'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain' >
            <label>Password</label>
            <input type='password' maxlength='16' name='pass' value='$pass'>
            </div><br>

            <div data-role='fieldcontain' >
            <label></label>
            <input data-transition='slide' type='submit' value='Sign Up'> 
            </div> 
            </form>  
        </div>
    </div>
    </body>
    </html>            

_END;