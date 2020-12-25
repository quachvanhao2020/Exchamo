<?php
namespace Exchamo\Api\Rest\Expense;
use Exchamo\Expense;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="expense")
 */
class Entity extends Expense{

}