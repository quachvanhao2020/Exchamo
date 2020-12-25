<?php
namespace Exchamo;

use DateTime;
use YPHP\EntityLife;
use Doctrine\ORM\Mapping as ORM;
use Exchamo\Money;
use YPHP\Entity;
use YPHP\EntityInterface;

/** 
 * \@ORM\Entity 
 * \@ORM\Table(name="exchanges")
 */
class Exchange extends EntityLife{

    const MONEY = "money";
    const OWNED = "owned";
    const TARGET = "target";

    public function __toArray(){
        return array_merge([
            self::MONEY => $this->getMoney(),
            self::OWNED => $this->getOwned(),
            self::TARGET => $this->getTarget(),
        ],parent::__toArray());
    }

    /**
     * 
     * @ORM\Id
     * @ORM\Column(type="string",name="id")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Doctrine\ORM\Id\UuidGenerator")
     * @var string
     */
    protected $id;

    /** 
     * @ORM\Embedded(class = "Exchamo\Money")
     * @var Money
     */
    protected $money;

    /**
     * @ORM\Embedded(class = "YPHP\Entity")
     * @var EntityInterface
     */
    protected $owned;

    /**
     * @ORM\Embedded(class = "YPHP\Entity")
     * @var EntityInterface
     */
    protected $target;

    public function __construct(string $id = null)
    {
        $this->name = "";
        $this->note = "";
        $this->status = "";
        $this->ref = "";
        $this->dateCreated = new DateTime();
        $this->money = new Money();
        parent::__construct($id);
    }

    /**
     * Get the value of money
     *
     * @return  Money
     */ 
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * 
     *
     * @param  Money  $money
     *
     * @return  self
     */ 
    public function setMoney(Money $money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get the value of target
     *
     * @return  EntityInterface
     */ 
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set the value of target
     *
     * @param  EntityInterface  $target
     *
     * @return  self
     */ 
    public function setTarget(EntityInterface $target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get the value of owned
     *
     * @return  EntityInterface
     */ 
    public function getOwned()
    {
        return $this->owned;
    }

    /**
     * Set the value of owned
     *
     * @param  EntityInterface  $owned
     *
     * @return  self
     */ 
    public function setOwned(EntityInterface $owned)
    {
        $this->owned = $owned;

        return $this;
    }
}