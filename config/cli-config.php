<?php
use Exchamo\Orm;
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(Orm::getEntityManager());
