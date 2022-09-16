<?php

use hackers_poulette\controller\Process;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';

new Process();
