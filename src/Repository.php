<?php


namespace KataBank;

class Repository
{

    /**
     * @var TransactionFactory
     */
    private $transactionFactory;

    function __construct(TransactionFactory $transactionFactory)
    {
        $this->transactionFactory = $transactionFactory;
    }

    public function deposit($amount)
    {
        $this->transactionFactory->makeDeposit($amount);
    }

    public function withdraw($amount)
    {
        $this->transactionFactory->makeWithdraw($amount);
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
    }
}
