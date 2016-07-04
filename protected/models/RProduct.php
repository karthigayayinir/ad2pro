<?php

class RProduct extends Product {

    public static function addProduct($data) {
        $productObj = new Product('RProduct');
        $productObj->Name = $data['productName'];
        $productObj->Description = $data['productDescription'];
        $productObj->Status = 1;
        $productObj->LocationID = $data['locationID'];
        $productObj->VendorID = $data['vendorid'];
        $productObj->Quantity = $data['quantity'];
        $productObj->Stock = $data['stock'];
        $productObj->StartDate = $data['startDate'];
        $productObj->EndDate = $data['endDate'];
        $productObj->save(FALSE);
        $pdtID = $productObj->ProductID;
        
        return $pdtID;
    }
    
    public static function getProducts()
    {
        $crit = new CDbCriteria();
        $crit->select = 't.ProductID, t.Name,t.Description,t.LocationID,t.VendorID,t.Quantity,t.Stock,t.StartDate,t.EndDate';
        $crit->condition = 't.Status = 1';
        
        try
        {
             return Product::model('RProduct')->findAll($crit);
        }
        catch (Exception $e)
        {
            Yii::trace($e->getTraceAsString(), 'Product.models.Product');
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, 'Product.models.Product');
            return null;
        }
    }
}
