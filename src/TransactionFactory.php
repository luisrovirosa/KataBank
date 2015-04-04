<?php


namespace KataBank;

class TransactionFactory
{
    /**
     * @param $amount
     * @return Transaction
     */
    public function makeDeposit($amount)
    {
        throw new \Exception('Not implemented');
    }

    public function makeWithdraw($amount)
    {
        throw new \Exception('Not implemented');
    }
}
