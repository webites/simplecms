<?php
session_start();

function display_notification()
{
    if ($_SESSION['alert']) {
        echo "<div class='dashboard__notification dashboard__notification--" . $_SESSION['type'] . "'>" . $_SESSION['alert'] . "
        <button id='dashboard__notification__close' class='dashboard__notification__close'><i class='bi bi-x-circle'></i></button>
        </div>";
        unset($_SESSION['alert']);
        unset($_SESSION['type']);
    }
}

function slug_creator($slug)
{
    return strtolower(str_replace(' ', '-', $slug));
}
