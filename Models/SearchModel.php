<?php


class SearchModel
{
    protected $ItemID,$ItemTitle,$ItemImage,$ItemDes,$itemPrice;


    /**
     * User constructor.
     * @param $dbRow
     */
    public function __construct($dbRow)
    {
        $this->ItemID =$dbRow['ItemID'];
        $this->ItemTitle =$dbRow['ItemTitle'];
        $this->ItemImage =$dbRow['ItemImage'];
        $this->ItemDes =$dbRow['ItemDescription'];
        $this->itemPrice =$dbRow['ItemStartPrice'];
    }

    /**
     * @return mixed
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @return mixed
     */

    public function getItemID()
    {
        return $this->ItemID;
    }

    public function getItemTitle()
    {
        return $this->ItemTitle;
    }

    public function getItemImage()
    {
        return $this->ItemImage;
    }
    public function getItemDes()
    {
        return $this->ItemDes;
    }


}