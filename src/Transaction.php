<?php


namespace KataBank;

class Transaction
{

    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $date;

    function __construct($amount, $date)
    {
        $this->amount = $amount;
        $this->date = $date;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function date()
    {
        return $this->date;
    }
}
