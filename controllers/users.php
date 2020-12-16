<?php

require_once ('Models/AuctionDataSet.php');
require_once ('Models/AuctionData.php');
require_once ('Models/Database.php');

$view = new stdClass();
$view->pageTitle = 'Users';

$auctionDataSet = new AuctionDataSet();

$view->AuctionDataSet = $auctionDataSet->fetchAllStudents();

require_once ('Views/index.phtml');