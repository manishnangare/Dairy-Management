<?php
    require_once 'header.php';

    $error = $pid = $pname = $pprice = $catname = $compname = $pdate = $udate = '';
    if(isset($_POST['pid']))
    {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $catname = $_POST['catname'];
        $compname = $_POST['compname'];
        $pdate = $_POST['pdate'];
        $udate = $_POST['udate'];

        if($pid==''||$pname==''||$pprice==''||$catname==''||$compname==''||$pdate=='')
            $error = 'Not all fields were entered<br><br>';
        else
        {
            $result = queryMysql("SELECT * FROM PRODUCT WHERE P_ID='$pid'");
            if($result->num_rows)
                $error = '<h4>Product already entered</h4>';
            else
            {
                $result = queryMysql("INSERT INTO PRODUCT VALUES('$pid','$pname','$pprice','$catname','$compname','$pdate','$udate')");
                die("<h4>Product inserted</h4></body></html>");

            }

        }
    }


    echo <<<_END
    <div class='row'>
        <div class='col-6'>
            <img src ='https://images.unsplash.com/photo-1605106702734-205df224ecce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cGF0dGVybnN8ZW58MHx8MHx8fDA%3D&w=1000&q=80' width='100%' >
        </div>
        <div class='col-6'>
            <h1>Add Product</h1>
            <form method='post' action='product.php'>$error
                <div data-role='fieldcontain'>
                <label></label>
                Enter the product detail : 
                </div>

                <div data-role='fieldcontain'>
                <label>Product ID</label>
                <input type='text' maxlength='16' name='pid' value='$pid'
                onBlur='checkUser(this)'>
                </div><br>

                <div data-role='fieldcontain'>
                <label>Product Name</label>
                <input type='text' maxlength='16' name='pname' value='$pname'
                onBlur='checkUser(this)'>
                </div><br>

                <div data-role='fieldcontain'>
                <label>Product Price</label>
                <input type='text' maxlength='16' name='pprice' value='$pprice'
                onBlur='checkUser(this)'>
                </div><br>

                <div data-role='fieldcontain'>
                <label>Category Name</label>
                <input type='text' maxlength='16' name='catname' value='$catname'
                onBlur='checkUser(this)'>
                </div><br>

                <div data-role='fieldcontain'>
                <label>Company Name</label>
                <input type='text' maxlength='16' name='compname' value='$compname'
                onBlur='checkUser(this)'>
                </div><br>

                <div data-role='fieldcontain'>
                <label>Posting Date</label>
                <input type='text' maxlength='16' name='pdate' value='$pdate'
                onBlur='checkUser(this)'>
                </div><br>

                <div data-role='fieldcontain'>
                <label>Updation Date</label>
                <input type='text' maxlength='16' name='udate' value='$udate'
                onBlur='checkUser(this)'>
                </div><br>

                <div data-role='fieldcontain' >
                <label></label>
                 <input data-transition='slide' type='submit' value='Add Product'> 
            </div> 
            </form>
        </div>
        </div>
_END;

$result = queryMysql("SELECT * FROM PRODUCT");
    $num = $result->num_rows;


    echo <<<_END
    <br><br><br>
    <div class='row'>
    <div class='col-12'>
    <h1>Products</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>  
                <th scope='col'>P_ID</th>
                <th scope='col'>PROD_NAME</th>
                <th scope='col'>PROD_PRICE</th>
                <th scope='col'>CAT_NAME</th>
                <th scope='col'>COMP_NAME</th>
                <th scope='col'>POSTING_DATE</th>
                <th scope='col'>UPDATION_DATE</th>
            </tr>
        </thead>
        <tbody>        
_END;

while($row = $result->fetch_assoc())
{
    echo "<tr><th scope=\"row\">".$row['P_ID']."</th><td>".$row['PROD_NAME']."</td><td>".$row['PROD_PRICE']."</td><td>".$row['CAT_NAME'].
    "</td><td>".$row['COMP_NAME']."</td><td>".$row['POSTING_DATE']."</td><td>".$row['UPDATION_DATE']."</td></tr>";
}
echo "</tbody></table></div></div></div></html>"
?>


