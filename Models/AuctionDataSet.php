<?php

require_once (__DIR__ . '/Database.php');
require_once (__DIR__ . '/AuctionData.php');

class AuctionDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function storeAucTimes($startDate, $endDate)
    {
        $sqlQuery = "INSERT INTO Auctions (AuctionStartDate, AuctionEndahDate) VALUES ('$startDate','$endDate')";

        //echo $sqlQuery; //helpful for debugging

        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet =[];
        while ($row=$statement->fetch())
        {
            $dataSet[] = new User($row);
        }
        return $dataSet;
    }

    public function validateDate($date, $format ='Y-m-d')   //date validation
    {
        $d = DateTime::createFromFormat($format,$date);
        return $d && $d->format($format) === $date;
    }



}