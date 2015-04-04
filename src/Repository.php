<?php


namespace KataBank;

class Repository
{

    /**
     * @var TransactionFactory
     */
    private $transactionFactory;

    private $transactions = array();

    function __construct(TransactionFactory $transactionFactory)
    {
        $this->transactionFactory = $transactionFactory;
        $this->transactions = array();
    }

    public function deposit($amount)
    {
        $transaction = $this->transactionFactory->makeDeposit($amount);
        $this->transactions[] = $transaction;
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
        return $this->transactions;
    }
}
