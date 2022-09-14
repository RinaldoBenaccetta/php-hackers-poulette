<?php

namespace hackers_poulette\controller;

use hackers_poulette\controller\IssuesDatabase;
use hackers_poulette\controller\validateInputs;

class Process
{
    public function __construct()
    {
        $validData = validateInputs::validate($_POST);

        if ($validData) {
            IssuesDatabase::createIssue($validData);
        }
    }
}