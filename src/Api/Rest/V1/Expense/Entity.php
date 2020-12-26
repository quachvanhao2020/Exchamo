<?php
namespace Exchamo\Api\V1\Rest\Expense;
use Exchamo\Expense;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="expenses")
 */
class Entity extends Expense{

}