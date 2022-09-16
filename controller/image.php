<?php

namespace hackers_poulette\controller;
// https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/
//https://www.simplilearn.com/tutorials/php-tutorial/image-upload-in-php
//
//https://stackoverflow.com/questions/19083175/generate-random-string-in-php-for-file-name

const IMAGE_FOLDER = './images/';

class image
{
    public static function upload() {
        $fileName = $_FILES["image"]["name"];
        $tempName = $_FILES["image"]["tmp_name"];


        if (self::validate($tempName)) {
            $destination = self::getRandomName($fileName);

            // https://stackoverflow.com/questions/20652487/move-uploaded-file-permission-denied
            // chmod -R 777 images
            if (move_uploaded_file($tempName, $destination)) {
                return $destination;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    private static function getRandomName($sourceFileName) {
        $fileName = tempnam(IMAGE_FOLDER, '');
        unlink($fileName);
        $file_parts = pathinfo($sourceFileName);
        $extension = $file_parts['extension'];

        return $fileName.'.'.$extension;
    }

    private static function validate($file) {
//            $file = $_FILES['file']['tmp_name'];
        if (file_exists($file))
        {
            $imageSizeData = getimagesize($file);
            return $imageSizeData ? TRUE : FALSE;
        }
        else
        {
            return FALSE;
        }
    }
}