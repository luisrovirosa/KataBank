# KataBank
Kata proposed by [Sandro Mancuso](https://twitter.com/sandromancuso) at [SoCraTes Canaries 2015](http://socrates-conference.es/).

## Goal
Develop the Kata doing BDD Outside-in Mockist style. 

##Acceptance test

	@Test
	public void should_print_statement_containing_all_transactions() {
		account.deposit(1000);
		account.withdraw(100);
		account.deposit(500);

		account.printStatement();

		verify(console).printLine("DATE | AMOUNT | BALANCE");
		verify(console).printLine("10/04/2014 | 500 | 1400");
		verify(console).printLine("02/04/2014 | -100 | 900");
		verify(console).printLine("01/04/2014 | 1000 | 1000");
	}
## Main class definition
### Requirement
You cannot change anything in the public interface.
### Code
	public class AccountService {
		public void deposit(int amount) {
		}

		public void withdraw(int amount) {
		}

		public void printStatement() {
		}
	}
## My solution
I have 3 main classes:

	- Account: Public interface
	- Repository: For persistence
	- Printer: To print according to the format

I also have other classes:

	- Transaction: Model class to store the amount and the date.
	- TransactionFactory: To create the Transaction.
	- Date: To be able to fake the date responses from the system.
	- Output: Interface with printLine method.
	- Console: Implementation of the Output interface printing on the console.
## How to use it
1.- Install the dependencies using [composer](http://getcomposer.org)

	composer install
2.- Execute the tests

	phpunit
3.- View code coverage

	phpunit --coverage-text