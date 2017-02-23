<?php
//require_once("include/header.php"); 
require_once('functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("functions/$classname.class.php");
	}

    $query = DB::query("select tbl_items.id, tbl_items.item_code, tbl_items.item_name, tbl_item_price.price  from tbl_items left join tbl_item_price on tbl_items.id=tbl_item_price.item_id");
//    $query = DB::query("select id, item_code, item_name from tbl_items");
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
?>
<!--            --><?php //echo "<pre>"; print_r($row); echo "</pre>"; ?>

            <figure style="float:left;text-align:center;margin:3px;">
                <figcaption style="font-size:11px;font-weight: bold;">Sumana Bastraloy</figcaption>
                <figcaption style="font-size:11px"><?php echo (isset($row['item_name'])?$row['item_name']:''); ?></figcaption>
                <img src="functions/barcode.php?codetype=code25&size=40&text=<?php echo $row['item_code']; ?>"/>
                <figcaption style="font-size:11px"> <?php echo $row['item_code']; ?></figcaption>
                <figcaption style="font-size:11px;font-weight: bold;"><b>Tk. <?php echo  (!empty($row['price'])?$row['price']:' '); ?></b></figcaption>
            </figure>
       <?php
        }
?>
        </div>
                        

    </body>
</html>
