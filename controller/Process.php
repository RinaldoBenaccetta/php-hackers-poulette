<?php

namespace hackers_poulette\controller;

use hackers_poulette\controller\IssuesDatabase;
use hackers_poulette\controller\validateInputs;
use hackers_poulette\controller\image;


class Process
{
    public function __construct()
    {
        $validData = validateInputs::validate($_POST);
        image::upload();

        if ($validData) {
            IssuesDatabase::createIssue($validData);
        }
    }
}