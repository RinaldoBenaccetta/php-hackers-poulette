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

        if ($validData === "spam") {
            // Tell to bot that all is ok.
        header ('location: /success.html');
        } elseif ($validData && $imageDestination) {
            $validData['imageDestination'] = $imageDestination;
            IssuesDatabase::createIssue($validData);

            header ('location: /success.html');
        }
        else{
            header ('location: /error.html');
        }
    }
}