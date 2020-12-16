<?php
session_start();
require_once ('Models/SearchDataset.php');
require_once ('Models/AuctionDataSet.php');
require_once('Views/template/header.phtml');

$view = new stdClass();
$view->pageTitle = 'Homepage';
//Move as much php code into the php file
//require_once(__DIR__ . '/../Models/AuctionDataSet.php');
require_once(__DIR__ . '/Models/AuctionDataSet.php');//This is mvc
//$AuctionDataSet1 = (new AuctionDataSet())->fetchAllStudents();
require_once(__DIR__ . '/Models/SearchDataset.php');//This is mvc
$SearchDataSet1 = (new SearchDataset())->getAllItems();


if(isset($_POST["enterTitle"])) {

    $itemTitle = $_POST['titleName'];
    $itemDesc = $_POST['titleDescription'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    //creating the itemdataset and auctiondataset
    $itemDataSet = new SearchDataset();
    $auctionDataSet = new AuctionDataSet();

    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES['image']['name']);

    //selecting the file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //valid file extensions
    $extensions_arr = array("jpg", "jpeg","png", "gif");

    $TESTtITLE = "MGS";
    $itemImageTestSource = "images/MirrorsEdge.jpg";
    $testDes = "Very good game";

    if (in_array($imageFileType,$extensions_arr))
    {
        //insert the record
        $view->itemDataSet = $itemDataSet->addItem($itemTitle,$image, $itemDesc);
        //$view->itemDataSet = $itemDataSet->addItem($TESTtITLE,$itemImageTestSource, $testDes);
    }

    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);

    //TODO write the code to validate the date
    if ($auctionDataSet->validateDate($startDate) && $auctionDataSet->validateDate($endDate))
    {
        $view->auctionDataSet = $auctionDataSet->storeAucTimes($startDate,$endDate);
    }
    else
        $view->message = 'Please put in the start and end date for the auction: help:XXXX-XX-XX';

}

//Search code
$SpecificSearchDataSet = "";

$itemName = "";

if (isset($_POST['searchTextBox'])) {
$itemName = $_POST['searchTextBox'];
$testItem = "Bytecard";

$itemName = preg_replace("#[^0-9a-z,;,',:]#i", "", $itemName);
//echo '<tr> <td>' . $Search->getItemTitle();
$SearchDataSet = new SearchDataset();
$SpecificSearchDataSet = (new SearchDataset())->getItemTitle($itemName);?>
<div class="container" style="color: #1b1e21">
    <div class="row">
        <?php

        foreach ($SpecificSearchDataSet as $Key => $Search) {?>
            <div class="col-md-3 col-md-6">
                <div class="card text-center">
                    <div class="card-block">
                        <h4>Lot Number <?php echo $Search->getItemID()?></h4>
                    </div>
                    <div class="card-title">
                        <h4><?php echo $Search->getItemTitle()?></h4>
                    </div>
                    <div class="card-text">
                        <p><?php echo $Search->getItemDes()?></p>
                    </div>
                    <div>
                        <?php echo '<img src="images/' . $Search->getItemImage() . ' " alt="" style= width: 258px; height:120px; class="img-fluid" />' ?>
                    </div>
                    <div class="card-text"><h2>£<?php echo $Search->getItemPrice()?></h2></div>
                </div>
            </div>

        <?php }
        }



//$SpecificSearchDataSet1 = (new SearchDataset())->getItemTitle();
//if (isset($_POST['searchButton']))
//{
//    $SpecificSearchDataSet1 = (new SearchDataset())->getItemTitle("Sonair");
//}
//else
//{
//    $SearchDataSet1 = (new SearchDataset())->getAllItems();
//}
require_once('Views/index.phtml');
?>