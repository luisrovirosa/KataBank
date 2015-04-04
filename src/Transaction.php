<?php


namespace KataBank;

class Transaction
{

    /**
     * @var int
     */
    private $amount;

    function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function amount()
    {
        return $this->amount;
    }
}
