<?php


namespace KataBank\Test;

use KataBank\Repository;
use Prophecy\PhpUnit\ProphecyTestCase;

class RepositoryTest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function deposit_creates_a_transaction()
    {
        $transactionFactoryProphecy = $this->prophesize('KataBank\TransactionFactory');
        $repository = new Repository($transactionFactoryProphecy->reveal());

        $repository->deposit(100);

        $transactionFactoryProphecy->makeDeposit(100)->shouldBeCalled();
    }
}
