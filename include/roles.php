<?php
    if (($UserData['rol'])>$lvl) {
        require_once($_SERVER["DOCUMENT_ROOT"]."/admin/redir.php");
    }
?>