<?php


class AuctionData
{
    protected $auctionID,  $auctionStartTime, $auctionEndTime;

    public function __construct($dbRow) {
        $this->auctionID = $dbRow['AuctionID'];
        $this->auctionStartTime = $dbRow['AuctionStartSDate'];
        $this->auctionEndTime = $dbRow['AuctionEndSDate'];

    }

    public function getAuctionID()
    {
        return $this->auctionID;
    }

    public function getAuctionStartDate()
    {
        return $this->auctionStartTime;
    }

    public function getAuctionEndTime()
    {
        return $this->auctionEndTime;
    }
}