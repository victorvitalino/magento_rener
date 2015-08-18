<?php
require_once ("app/Mage.php");
ini_set("error_reporting",E_ALL);
ini_set("display_errors",true);
umask(0);
Mage::app('admin');

// function getQtyOrdered($order)
// {
//     $totalQty = 0;
//     foreach($order->getItemsCollection() as $item)
//     {
//         $qty = $item->getQtytoInvoice();
//         $totalQty = $totalQty + $qty;
//     }
//     return $totalQty;
// }

//grab orders in the past 7 days that are NOT complete.
$yesterday = date('Y-m-d', strtotime("yesterday"));
$orders = Mage::getModel('sales/order')->getCollection()
->addAttributeToFilter('created_at', array('from' => $yesterday))
->addAttributeToFilter('status', array('neq' => Mage_Sales_Model_Order::STATE_COMPLETE));

//get data from each order
$m = "";
foreach($orders as $order)
{
$m = $order;
echo 'pedido ' . $order->getIncrementId();
echo ' status' . $order->getStatus();
}

echo "<pre>";
var_dump($order);
 ?>
