<?php

if (isset($_GET['r']) && !empty($_GET['r'])) {
    require 'display.php';
} else {
    require 'generate.php';
}