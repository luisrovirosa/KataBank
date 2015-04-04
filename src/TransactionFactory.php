<?php


namespace KataBank;

class TransactionFactory
{
    /**
     * @var Date
     */
    private $date;

    function __construct(Date $date)
    {
        $this->date = $date;
    }

    /**
     * @param $amount
     * @return Transaction
     */
    public function makeDeposit($amount)
    {
        return new Transaction($amount, $this->date->now());
    }

    /**
     * @param $amount
     * @return Transaction
     */
    public function makeWithdraw($amount)
    {
        throw new \Exception('Not implemented');
    }
}
