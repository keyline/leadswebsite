<?php

namespace App\Validation;

class FormatRules extends \CodeIgniter\Validation\FormatRules
{
    public function valid_date(?string $str = null, ?string $format = null): bool
    {
        if (empty($format)) {
            return parent::valid_date($str, $format);
        }

        if ($str === null || $str === '') {
            return false;
        }

        try {
            $date = \DateTime::createFromFormat($format, $str);
        } catch (\ValueError $e) {
            return false;
        }
        $errors = \DateTime::getLastErrors();

        // PHP 8.2 returns false when parsing succeeds without warnings or errors.
        return $date !== false && ($errors === false
            || ($errors['warning_count'] === 0 && $errors['error_count'] === 0));
    }
}
