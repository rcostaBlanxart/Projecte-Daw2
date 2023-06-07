<?php
$conn=mysqli_connect("localhost","rcosta","586P316f261","rcosta");

if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
}