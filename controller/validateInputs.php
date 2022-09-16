<?php

namespace hackers_poulette\controller;

const DEFAULT_STATUS = 'pending';

class validateInputs
{
    public static function validate($data) {
        if (self::isNotSpam($data)
            && !empty($data['name'])
            && !empty($data['first_name'])
            && !empty($data['e_mail'])
            && !empty($data['description'])
        ) {
            $validInputs = [
                'name' =>  self::isString($data['name']),
                'lastName' => self::isString($data['first_name']),
                'eMail' => self::isEmail($data['e_mail']),
                'description' => self::isString($data['description'], ['min' => 2, 'max' => 1000]),
                'status' => DEFAULT_STATUS,
            ];

            return self::validData($validInputs) ? $validInputs : NULL;
        } else {
            return NULL;
        }
    }

    private static function isString($input, $minMaxCharacters = ['min' => 2, 'max' => 255]) {
        if (is_string($input) && strlen($input) >= $minMaxCharacters['min'] && strlen($input) <= $minMaxCharacters['max']) {
            return $input;
        } else {
            return NULL;
        }
    }

    private static function isEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        } else {
            return NULL;
        }
    }

    private static function validData($data) {
        foreach ($data as $value) {
            if (!$value) {
                return NULL;
            }
        }

        return $data;
    }

    private static function isNotSpam($data) {
        $honeyPotValue = $data['age'];

        return !$honeyPotValue;
    }
}