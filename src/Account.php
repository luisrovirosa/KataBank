<?php


namespace KataBank;

class Account
{

    /**
     * @var Repository
     */
    private $repository;
    /**
     * @var Printer
     */
    private $printer;

    public function __construct(Repository $repository, Printer $printer)
    {

        $this->repository = $repository;
        $this->printer = $printer;
    }

    public function deposit($amount)
    {
        $this->repository->deposit($amount);
    }

    public function withdraw($amount)
    {
        $this->repository->withdraw($amount);
    }

    public function printStatements()
    {
        $transactions = $this->repository->getTransactions();
        $this->printer->printTransactions($transactions);
    }
}
