<?php
session_start();
require_once 'autoload.php';
spl_autoload_register('autoLoadCore');
spl_autoload_register('autoLoadClass');
spl_autoload_register('autoLoadModel');
Route::run();








