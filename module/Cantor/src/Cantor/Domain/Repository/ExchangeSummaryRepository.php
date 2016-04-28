<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 23.04.16
 * Time: 11:45
 */
namespace Cantor\Domain\Repository;

use Cantor\Domain\ExchangeSummary;

/**
 * Interface ExchangeSummary
 * @package Cantor\Domain\Repository
 */
interface ExchangeSummaryRepository{


    public function confirm(ExchangeSummary $exchangeSummary);

}