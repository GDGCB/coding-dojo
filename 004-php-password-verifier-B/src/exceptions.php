<?php

abstract class PasswordVerifierException extends Exception {
    const NOT_ENOUGH_CHARS = 1;
}

class MinLengthException extends PasswordVerifierException {

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "Not enough chars";
        }
        parent::__construct($message, self::NOT_ENOUGH_CHARS, $previous);
    }
};


class MaxLengthException extends PasswordVerifierException {

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "Too much chars!";
        }
        parent::__construct($message, null, $previous);
    }
};


class NullException extends PasswordVerifierException {

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "Is null or empty";
        }
        parent::__construct($message, null, $previous);
    }
};


class LowerCaseException extends PasswordVerifierException {

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "at least one lower case";
        }
        parent::__construct($message, null, $previous);
    }
};


class UpperCaseException extends PasswordVerifierException {

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "at least one upper case";
        }
        parent::__construct($message, null, $previous);
    }
};


class SpecialCharException extends PasswordVerifierException {

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "Special char is expected";
        }
        parent::__construct($message, null, $previous);
    }
};

class FirstSpecialCharException extends SpecialCharException
{

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "Special char at first place is not expected";
        }
        parent::__construct($message, $previous);
    }
}

class LastCharIsNotNumberException extends PasswordVerifierException  {

    function __construct($message = null, Exception $previous = null) {
        if (!$message) {
            $message = "Last char is a number";
        }
        parent::__construct($message, $previous);
    }

};
