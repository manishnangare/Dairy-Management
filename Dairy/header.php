<?php

    session_start();
    echo <<<_INIT
    <!DOCTYPE html>
    <html>
        <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>

                a
                { 
                    background-color:red;
                }
   
        </style>

_INIT;

    require_once    'functions.php';
    $user = 'Guest';
    $userstr = '';

    if(isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr  = "Logged in as : $user";

    }
    else
    {
        $loggedin = FALSE;
    }

    echo <<<_MAIN

        <title>Dairy Management</title>
    </head>

    <body>
    <div class='container'>
        <div class='row'>
            <div class='col-12'>
                    <h1>Dairy Management System</h1>
                    <div class='username'>$userstr</div>
            </div>
        </div>    

_MAIN;

    if($loggedin)
    {
        echo <<<_LOGGEDIN
        <div class='row'>
            <div class='header '>
                <a href='home.php?view=$user'>Home</a>
                <a href='invoice.php?view=$user'>Invoices   hello</a>
                <a href='product.php?view=$user'>Products</a>
                <a href='company.php?view=$user'>Company</a>
                <a href='category.php?view=$user'>Category</a>

            </div>
        </div>        

    
_LOGGEDIN;
    }

    else
    {
        echo <<<_GUEST
        <div class='row'>
            <div class='col-6'>
                <img src ='https://images.unsplash.com/photo-1605106702734-205df224ecce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cGF0dGVybnN8ZW58MHx8MHx8fDA%3D&w=1000&q=80' width='100%'>
            </div>
            <div class='col-6'>    
                <a data-role='button' data-inline='true' data-icon='home' href='login.php'>Login</a>
                <a data-role='button' data-inline='true' href='signup.php'>Signup</a> 

_GUEST;        
    }
