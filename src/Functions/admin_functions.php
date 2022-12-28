<?php
session_start();

function display_notification()
{
    if ($_SESSION['alert']) {
        echo "<div class='dashboard__notification dashboard__notification--" . $_SESSION['type'] . "'>" . $_SESSION['alert'] . "</div>";
        unset($_SESSION['alert']);
        unset($_SESSION['type']);
    }
}

function slug_creator($slug)
{
    return strtolower(str_replace(' ', '-', $slug));
}
