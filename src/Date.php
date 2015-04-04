<?php


namespace KataBank;

class Date
{
    /**
     * @returns string The current day in format YYYY-mm-dd
     */
    public function now()
    {
        $date = new \DateTime();

        return $date->format('Y/m/d');
    }
}
