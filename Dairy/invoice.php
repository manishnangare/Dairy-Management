<?php

    require_once 'header.php';


    $error = $id = $pid = $quantity = $ino = $cname = $cphone = $pmode = $igd = '';
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        $quantity = $_POST['quantity'];
        $ino = $_POST['ino'];
        $cname = $_POST['cname'];
        $cphone = $_POST['cphone'];
        $pmode = $_POST['pmode'];
        $igd = $_POST['igd'];

        if($id == ''||$pid ==''|| $quantity ==''|| $ino ==''|| $cname ==''|| $cphone ==''|| $pmode ==''|| $igd == '')
        {
            $error = 'Not all fields were entered<br><br>';
        }
        else
        {
            $result = queryMysql("SELECT * FROM INVOICE WHERE ID = '$i'");
            if($result->num_rows) 
                $error = 'The invoice is already added';
            else
            {
                $result = queryMysql("INSERT INTO INVOICE 
                    VALUES('$id','$pid','$quantity','$ino','$cname','$cphone','$pmode','$igd')");
                die('<h4>Invoice Added</h4></div></div></body></html>');
                
            }
        }
    }

    echo <<<_END

    <div class='row'>
        <div class='col-6'>
        <img src ='https://images.unsplash.com/photo-1605106702734-205df224ecce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cGF0dGVybnN8ZW58MHx8MHx8fDA%3D&w=1000&q=80' width='100%' >
        </div>
        <div class='col-6'>
            
            <h1>Add Invoice</h1>
            <form method='post' action='invoice.php'>$error
                <div data-role='fieldcontain'>
                    <label></label>
                    Enter the invoice detail : 
                </div>
                
            <div data-role='fieldcontain'>
            <label>ID</label>
            <input type='text' maxlength='16' name='id' value='$id'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Product ID</label>
            <input type='text' maxlength='16' name='pid' value='$pid'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Quantity</label>
            <input type='text' maxlength='16' name='quantity' value='$quantity'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Invoice No.</label>
            <input type='text' maxlength='16' name='ino' value='$ino'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Customer Name</label>
            <input type='text' maxlength='16' name='cname' value='$cname'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Customer Phone</label>
            <input type='text' maxlength='16' name='cphone' value='$cphone'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Payment Mode</label>
            <input type='text' maxlength='16' name='pmode' value='$pmode'
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain'>
            <label>Invoice Generation Date</label>
            <input type='text' maxlength='16' name='igd' value='$igd' 
            onBlur='checkUser(this)'>
            </div><br>

            <div data-role='fieldcontain' >
            <label></label>
            <input data-transition='slide' type='submit' value='Invoice up'> 
            </div> 
            </form>
        </div>
        </div>


_END;

    $result = queryMysql("SELECT * FROM INVOICE");
    $num = $result->num_rows;


    echo <<<_END
    <br><br><br>
    <div class='row'>
    <div class='col-12'>
    <h1>Invoices</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>  
                <th scope='col'>ID</th>
                <th scope='col'>P_ID</th>
                <th scope='col'>Quantity</th>
                <th scope='col'>Invoice_no</th>
                <th scope='col'>Cust_Name</th>
                <th scope='col'>Cust_Phno</th>
                <th scope='col'>Payment Mode</th>
                <th scope='col'>Invoice date</th>
            </tr>
        </thead>
        <tbody>        
_END;

while($row = $result->fetch_assoc())
{
    echo "<tr><th scope=\"row\">".$row['ID']."</th><td>".$row['P_ID']."</td><td>".$row['QUANTITY']."</td><td>".$row['INVOICE_NO'].
    "</td><td>".$row['CUST_NAME']."</td><td>".$row['CUST_PHNO']."</td><td>".$row['PAYMENT_MODE']."</td><td>".$row['INVOICE_GEN_DATE']."</td></tr>";
}
echo "</tbody></table></div></div></div></html>"
?>    