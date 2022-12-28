<?php
session_start();

function display_notification()
{
    if ($_SESSION['alert']) {
        echo "<div class='dashboard__notification " . $_SESSION['type'] . "'>" . $_SESSION['alert'] . "</div>";
        unset($_SESSION['alert']);
        unset($_SESSION['type']);
    }
}
