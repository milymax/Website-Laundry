<?php

function warn($msg)
{
    echo "<script>alert('$msg');</script>";
}

function redirectTo($url)
{
    header("Location: $url");
    die();
}

function titleize($name)
{
    return ucwords(str_replace("_", " ", $name));
}

function ensure_logon()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['id'])) {
        redirectTo("/login.php");
    }
}

/* Prevents user with $role access to current page */
function redirectToLogin()
{
    redirectTo("/Laundry/login.php");
    exit();
}

function prevent_page_access($roles)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (gettype($roles) === "array") {
        foreach ($roles as $role) {
            if ($_SESSION['role'] === $role) {
                redirectToLogin();
            }
        }
    } else {
        if ($_SESSION['role'] === $roles) {
            redirectToLogin();
        }
    }
}

function allow_page_access_exclusive($roles)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ok = false;

    if (gettype($roles) === "array") {
        foreach ($roles as $role) {
            if ($_SESSION['role'] === $role) {
                $ok = true;
            }
        }
    } else {
        if ($_SESSION['role'] === $roles) {
            $ok = true;
        }
    }

    if (!$ok) {
        redirectToLogin();
    }
}
