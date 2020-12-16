<?php
require_once('Models/SearchModel.php');
require_once ('Models/Database.php');

class SearchDataset
{
    protected $_dbHandle;
    protected $_dbInstance;

    //userdataset constructor
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function getAllItems()
        //public function getSpecificItem($ItemTitle)
    {
        //$sqlQuery = "SELECT ItemID,ItemTitle,ItemImage,ItemDescription FROM items WHERE ItemTitle = $$ItemTitle";
        $sqlQuery = "SELECT * FROM items";

        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet =[];
        while ($row=$statement->fetch())
        {
            $dataSet[] = new SearchModel($row);
        }
        return $dataSet;
    }

    public function getItemTitle($itemName)
    {
        $sqlQuery = "SELECT * FROM items WHERE ItemTitle LIKE '$itemName'";

        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet =[];
        while ($row=$statement->fetch())
        {
            $dataSet[] = new SearchModel($row);
        }
        return $dataSet;
    }

    public function addItem($itemTitle, $itemImage, $itemDesc)
    {
        $sqlQuery = "INSERT INTO items (ItemTitle,ItemImage, ItemDescription) VALUES ('$itemTitle','$itemImage','$itemDesc')";


        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet =[];
        while ($row=$statement->fetch())
        {
            $dataSet[] = new SearchModel($row);
        }
        return $dataSet;
    }

//    public function getSpecificSearchDataSet1()
//    {
//        return $this->SpecificSearchDataSet1;
//    }
}