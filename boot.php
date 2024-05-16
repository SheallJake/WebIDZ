<?php
session_start();
function check_auth(): bool
{
    return !!($_SESSION['user_id'] ?? false);
}
?>