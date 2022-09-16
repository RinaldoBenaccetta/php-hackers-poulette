<?php

namespace hackers_poulette\controller;

use hackers_poulette\controller\IssuesDatabase;
use hackers_poulette\controller\validateInputs;
use hackers_poulette\controller\image;


class Process
{
    public function __construct()
    {
        $imageDestination = image::upload();

        $validData = validateInputs::validate($_POST);

        if ($validData && $imageDestination) {
            $validData['imageDestination'] = $imageDestination;
            IssuesDatabase::createIssue($validData);

            header ('location: /success.html');
        } else{
            header ('location: /error.html');
        }
    }
}