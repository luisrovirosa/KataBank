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
}
