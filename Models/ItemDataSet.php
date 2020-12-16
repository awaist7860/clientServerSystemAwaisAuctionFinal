<?php
require_once ('SearchModel.php');
require_once ('Models/Database.php');
class ItemDataSet
{
    protected $_dbHandle;
    protected $_dbInstance;

    //userdataset constructor
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
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



}