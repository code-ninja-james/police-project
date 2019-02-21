<?php
//security
session_start();
if ( ! isset($_SESSION["user"]))
{
    header("location:login.php");

}