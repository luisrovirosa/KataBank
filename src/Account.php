<?php


namespace KataBank;

class Account
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {

        $this->repository = $repository;
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
        $this->repository->getTransactions();
    }
}
