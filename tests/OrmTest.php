<?php
declare(strict_types=1);

use Exchamo\Orm;
use PHPUnit\Framework\TestCase;
use \Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Exchamo\Expense;
use Exchamo\Income;
use Exchamo\Money;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\NullOutput;
use YPHP\Entity;

final class OrmTest extends TestCase
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var EntityManager
     */
    protected $em;

    protected function setUp(): void
    {
        $em = Orm::getEntityManager();
        $helperSet = \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
        $app = ConsoleRunner::createApplication($helperSet);
        $app->setAutoExit(false);
        $this->em = $em;
        $this->app = $app;
        try {
            //$app->run(new StringInput("orm:schema-tool:create --dump-sql"));
            $app->run(new StringInput("orm:schema-tool:update --force"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function tearDown(): void {
        //$this->app->run(new StringInput("orm:schema-tool:drop --full-database --force"));
    }

    public function testEmpty(): void
    {
        $this->assertInstanceOf(EntityManager::class,$this->em);
    }
    
    public function testIncome(): void
    {
        $em = $this->em;
        $income = new Income();
        $income->setMoney(new Money(3232));
        $income->setOwned(new Entity());
        $income->setTarget(new Entity());
        $em->persist($income);
        $em->flush();
        $incomeRepository = $em->getRepository(Income::class);
        $_income = $incomeRepository->find($income->getId());
        $this->assertEquals($income,$_income);
    }

    public function testExpense(): void
    {
        $em = $this->em;
        $income = new Expense();
        $income->setMoney(new Money(3232));
        $income->setOwned(new Entity());
        $income->setTarget(new Entity());
        $em->persist($income);
        $em->flush();
        $incomeRepository = $em->getRepository(Expense::class);
        $_income = $incomeRepository->find($income->getId());
        $this->assertEquals($income,$_income);
    }
}