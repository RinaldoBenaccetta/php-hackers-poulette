<?php

namespace hackers_poulette\controller;

const DEFAULT_STATUS = 'pending';

class validateInputs
{
    public static function validate($data) {
        if (!empty($data['name'])
            && !empty($data['first_name'])
            && !empty($data['e_mail'])
            && !empty($data['description'])
        ) {
            $validInputs = [
                'name' =>  self::isString($data['name']),
                'lastName' => self::isString($data['first_name']),
                'eMail' => self::isEmail($data['e_mail']),
                'description' => self::isString($data['description']),
                'status' => DEFAULT_STATUS,
            ];

            return self::validData($validInputs) ? $validInputs : NULL;
        } else {
            return NULL;
        }
    }

    private static function isString($input) {
        if (is_string($input) && $input != '') {
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
}