<?php 
$selectmethode=$_POST["selectmethode"];
if($selectmethode == 1){
echo "Credit/Debit card <br>";
}if($selectmethode == 2){
echo "Sampath Vishwa <br>";
}if($selectmethode == 3){
echo "M Cash <br>";
}if($selectmethode == 4){
echo "Easy Cash <br>";
}
$product_id=$_POST["product_id"];
$product_Name=$_POST["product_Name"];
$unit_price=$_POST["unit_price"];
$quantity=$_POST["quantity"];
$service_charges=$_POST["service_charges"];
$Government_Taxes=$_POST["Government_Taxes"];
$Shipping_Charges=$_POST["Shipping_Charges"];
$Subtotal=$_POST["Subtotal"];
$Total=$_POST["Total"];
echo $selectmethode;
echo $product_id;
echo $product_Name;
echo $unit_price;
echo $quantity;
echo $service_charges;
echo $Government_Taxes;
echo $Shipping_Charges;
echo $Subtotal;
echo $Total;



?>