<?php

include 'controllers/Search.php';


class getSpecificSearchItem
{
    protected $searchItem = SpecificSearchDataSet;

    public function getSearchItem()
    {

        return $this->searchItem;
    }
}