<?php
declare(strict_types = 1);

class PasswordVerifier
{
    const MIN_LENGTH = 10;
    const MAX_LENGTH = 100;
    const SPECIAL_CHARS = '@#$%^&-*()_+!?.';

    public function verify($password) {
        $this->verifyNotNullNorEmpty($password);
        $this->verifyMinLength($password);
        $this->verifyMaxLength($password);
        $this->verifyAtLeastOneUpperCase($password);
        $this->verifyAtLeastOneLowerCase($password);
        $this->verifyAtLeastOneSpecialChar($password);
        $this->verifyFirstSpecialChar($password);
        $this->verifyLastCharIsNotNumber($password);
        sleep(1);
        return true;
    }

    private function verifyMinLength($password) {
        $inputPassLength = strlen($password);
        !($inputPassLength < self::MIN_LENGTH) || $this->raiseException(new MinLengthException());
    }

    private function verifyMaxLength($password) {
        $inputPassLength = strlen($password);
        !($inputPassLength > self::MAX_LENGTH) || $this->raiseException(new MaxLengthException());
    }

    private function verifyNotNullNorEmpty($password) {
        !($password === null || empty($password)) || $this->raiseException(new NullException());
    }

    private function verifyAtLeastOneLowerCase($password) {
        $pattern = '/[[:lower:]]/u';
        preg_match($pattern, $password) || $this->raiseException(new LowerCaseException());
    }

    private function verifyAtLeastOneUpperCase($password) {
        $pattern = '/[[:upper:]]/u';
        preg_match($pattern, $password) || $this->raiseException(new UpperCaseException());
    }

    private function verifyAtLeastOneSpecialChar($password) {
        $pattern = '/[' . self::SPECIAL_CHARS . ']/u';
        preg_match($pattern, $password) || $this->raiseException(new SpecialCharException());
    }

    private function verifyFirstSpecialChar($password) {
        $pattern = '/^[' . self::SPECIAL_CHARS . ']/';
        !preg_match($pattern, $password) || $this->raiseException(new FirstSpecialCharException());
    }

    private function verifyLastCharIsNotNumber($password) {
        $pattern = '/[\d]$/';
        !preg_match($pattern, $password) || $this->raiseException(new LastCharIsNotNumberException());
    }

    private function raiseException($exception) {
        throw $exception;
    }
}
