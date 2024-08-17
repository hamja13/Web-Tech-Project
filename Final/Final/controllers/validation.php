<?php

function isValidEmail($email) {
    $pos = strpos($email, "@");
    if ($pos === false) {
        return false;
    }

    $localPart = substr($email, 0, $pos);
    $domainPart = substr($email, $pos + 1);

    if (strpos($domainPart, ".") === false) {
        return false;
    }

    if (empty($localPart) || empty($domainPart)) {
        return false;
    }

    return true;
}

function isValidName($name) {
    if (empty($name)) { return false; }

    $nameChars = str_split($name);
    $allowedChars = array_merge(range('a', 'z'), range('A', 'Z'), [' ', '-']);

    foreach ($nameChars as $char) {
        if (!in_array($char, $allowedChars)) {
            return false;
        }
    }

    return true;
}

function isValidPhoneNumber($phone) {
    if (!ctype_digit($phone)) {
        return false;
    }
    return true;
}
