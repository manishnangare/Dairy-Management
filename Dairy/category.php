<?php
    require_once 'header.php';

    $error = $cid = $cname = $ccode = $pdate = '';
    if(isset($_POST['cid']))
    {
        $cid = $_POST['cid'];
        $cname = $_POST['cname'];
        $ccode = $_POST['ccode'];
        $pdate = $_POST['pdate'];

        if($cid == '' || $cname =='' || $pdate =='' ||$ccode =='')
        {
            $error = 'Not all fields are entered<br><br>';
        }
        else 
        {
            $result = queryMysql("SELECT * FROM CATEGORY WHERE CAT_ID='$cid");
            if($result->num_rows)
                $error = '<h4>Category already entered</h4>';
            else
            {
                $result = queryMysql("INSERT INTO CATEGORY VALUES('$cid','$cname','$ccode','$pdate')");
                die("<h4>Category Added</h4></body></html>");

            }
        }
    }

    echo <<<_END

    <div class='row'>
        <div class='col-6'>
            <img src ='https://images.unsplash.com/photo-1605106702734-205df224ecce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cGF0dGVybnN8ZW58MHx8MHx8fDA%3D&w=1000&q=80' width='100%' >
        </div>
        <div class='col-6'>
            <h1>Add Category</h1>
            <form method='post' action='company.php'>$error
            <div data-role='fieldcontain'>
            <label></label>
            Enter the category details : 
            </div>

            <div data-role='fieldcontain'>
            <label>Category ID</label>
            <input type='text' maxlength='16' name='cid' value='$cid'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Category Name</label>
            <input type='text' maxlength='16' name='cname' value='$cname'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Category Code</label>
            <input type='text' maxlength='16' name='ccode' value='$ccode'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Posting Date</label>
            <input type='text' maxlength='16' name='pdate' value='$pdate'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain' >
                <label></label>
                 <input data-transition='slide' type='submit' value='Add Category'> 
            </div> 
            </form>
        </div>
        </div>
_END;

$result = queryMysql("SELECT * FROM CATEGORY");
    $num = $result->num_rows;


    echo <<<_END
    <br><br><br>
    <div class='row'>
    <div class='col-12'>
    <h1>Categories</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>  
                <th scope='col'>CAT_ID</th>
                <th scope='col'>CAT_NAME</th>
                <th scope='col'>CAT_CODE</th>
                <th scope='col'>POSTING_DATE</th>
            </tr>
        </thead>
        <tbody>        
_END;

while($row = $result->fetch_assoc())
{
    echo "<tr><th scope=\"row\">".$row['CAT_ID']."</th><td>".$row['CAT_NAME']."</td><td>".$row['CAT_CODE']."</tf><td>".$row['POSTING_DATE']."</td></tr>";
}
echo "</tbody></table></div></div></div></html>"
?>
