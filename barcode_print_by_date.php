<?php
//require_once("include/header.php");
require_once('functions/cls_dbconfig.php');
function __autoload($classname){
    require_once("functions/$classname.class.php");
}

$print_quentity=0;
if(!empty($_REQUEST['from_date']) && !empty($_REQUEST['to_date'])) {
    $from_date = $_REQUEST['from_date'];
    $to_date = $_REQUEST['to_date'];

    $query = DB::query("SELECT tbl_purchase.item_id,(select tbl_item_price.price from tbl_item_price where tbl_item_price.item_id=tbl_items.id order by tbl_item_price.id desc limit 0,1) as price, tbl_items.item_code, tbl_items.item_name, sum(tbl_purchase.quantity) as qnty,tbl_purchase.pur_date FROM `tbl_purchase` inner join tbl_items on tbl_items.id = tbl_purchase.item_id   where pur_date between '$from_date' and '$to_date' group by tbl_items.item_code desc");

}else{
    header("Location:barcode_print");
}
?>
<html>
<head>
    <script src="js/jquery.js"></script>
    <!-- income statement print only-->
    <script type="text/javascript">
        $("#btnPrint").live("click", function() {

            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes' // only works in IE, but here for completeness
            ].join(',');

            var divContents = $("#barcode").html();
            // var companyName = $("#cname").html();

            var printWindow = window.open('', '', params);
            printWindow.document.write('<html><head><title>Barcode List</title>');
            printWindow.document.write('</head><body >');
            // printWindow.document.write(companyName);
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
    <title>

    </title>
</head>
<body style="font-size:10px;font-family:verdana;">
<button class="btn btn-success" id="btnPrint">Print</button>
<div  id="barcode" style="width:100%;height: 842px;">

    <?php

    while($row = $query->fetch_assoc())
    {
        for($i=0;$i<$row['qnty'];$i++) {


            ?>
            <!--            --><?php //echo "<pre>"; print_r($row); echo "</pre>";
            ?>

            <figure style="float:left;text-align:center;margin:3px;">
                <figcaption style="font-size:11px;font-weight: bold;">Sumana Bastraloy</figcaption>
                <figcaption
                    style="font-size:11px"><?php echo(isset($row['item_name']) ? $row['item_name'] : ''); ?></figcaption>
                <img src="functions/barcode.php?codetype=code25&size=40&text=<?php echo $row['item_code']; ?>"/>
                <figcaption style="font-size:11px"> <?php echo $row['item_code']; ?></figcaption>
                <figcaption style="font-size:11px;font-weight: bold;">
                    <b>Tk. <?php echo(!empty($row['price']) ? $row['price'] : ' '); ?></b></figcaption>
            </figure>
            <?php
        }
    }
    ?>
</div>


</body>
</html>
