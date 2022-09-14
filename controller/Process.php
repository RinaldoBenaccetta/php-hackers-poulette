<?php

namespace hackers_poulette\controller;

use hackers_poulette\controller\IssuesDatabase;

class Process
{
    public function __construct()
    {
        echo "hello";
        print_r($_POST);
        IssuesDatabase::createIssue($_POST);
    }

}