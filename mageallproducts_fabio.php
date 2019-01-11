<?php
require 'app/Mage.php';
ini_set('display_errors', 1);

    Mage::app();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Produtos.csv');
    header('Pragma: no-cache');

/* Seller               StoreID
1480, HID               1, menucomvc
5194, Menu              50, seugil
5207, Mr Veggy
5208, Paru
5221, BEB
5222, BEV
5224, ELF
5225, FTA
5226, IKS
5227, BHR
5228, MCA
5230, GAV
5529, KEL
5530, ROG
5531, RTC
5534, WRC
*/
    
    //$storeID = 1;  // Your store id here.
    //$store = Mage::app()->getStore($storeID);

    $products = Mage::getModel('catalog/product')->getCollection();
    //$products->addStoreFilter($store); //Filtro Store
    //$products->addAttributeToFilter('status', 1);  //Filtro Habilitado
    //$products->addAttributeToFilter('creator_id', 5225);  //Filtro Seller
    

    $totalData = array();
    
    $i=1;
    foreach ($products as $product) {
    
    $product = Mage::getModel('catalog/product')->load($product->getId());

    $categoryIds = $product->getCategoryIds();
        foreach ($categoryIds as $categoryId) {
            $catId = $categoryId;
    }


    $id = $product->getID();
    $sku = $product->getData('sku');
    $seller = $product->getAttributeText('vendido_entregue_por');
    $name = $product->getData('name');
    //$description = $product->getData('description');
    $ean = $product->getData('ean');
    $price = $product->getData('price');
    $qty = $product->getStockItem()->getQty();
    $in_stock = $product->getStockItem()->getData('is_in_stock');
    $increments = $product->getStockItem()->getData('qty_increments');
    $image = $product->getData('image');
    $url = $product->getData('url_key');
    $multiplo = $product->getData('multiplicador');
    $price = number_format($price, 2, ',', '');
    $qty = number_format($qty, 2, ',', '');
    $increments = number_format($increments, 2, ',', '');
    $marca = $product->getAttributeText('marca');
    $fabricante = $product->getAttributeText('fabricante');

    echo ".";
    $totalData[] = array($catId, $id, $sku, $seller, $name,/*$description,*/ $ean, $price, $qty, $in_stock, $increments, $multiplo, $image, $url, $marca, $fabricante);
        
    }

$totalData[] = array("category_ids", "id", "sku", "seller", "name",/* "description",*/ "ean", "price", "qty", "in_stock", "increments", "multiplicador", "image", "url_key", "marca", "fabricante");

$fp = fopen("produtos.csv", 'w');

foreach(array_reverse($totalData) as $td) {
    fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($fp, $td, ',');
}

fclose($fp);






