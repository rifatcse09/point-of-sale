
var purchasereport_events = {

    init : function(){
        /*item show*/
      $('[name="itemName"]').on('input', function(){
		  
            var itemName = $('[name="itemName"]').val();
            purchase_rep.item_select(itemName);
        });
        /*item show end*/
        
        $('#supplier_show').change(function(){
            var supplier_id = $('#supplier_show option:selected').val();
            purchase_rep.supplier_select(supplier_id);
        });
        
        
        /*view purchase report*/
        $('[name="view_pur_report"]').click(function(){
            
            var supplier_id = $('[name="supplier_id"]').val();
            var item_id = $('[name="item_id"]').val();
            var from_date = $('[name="from_date"]').val();
            var to_date = $('[name="to_date"]').val();
            
            purchase_rep.report_view(supplier_id, item_id, from_date, to_date);
            //alert(item_id);
                                        
        });
        /*end*/
        
        /*view purchase invoice report*/
        $('[name="view_purinv_report"]').click(function(){
            
            var supplier_id = $('[name="supplier_id"]').val();
            var from_date = $('[name="from_date"]').val();
            var to_date = $('[name="to_date"]').val();
            
            purchase_rep.invoice_report_view(supplier_id, from_date, to_date);
            //alert(item_id);
                                        
        });
        /*end*/
    }
};

var purchase_rep = {	
		supplier_change : function(supplierName){
        var dataString = 
            'supplierName='+encodeURIComponent(supplierName);
			//alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/supplierShow',
				data:dataString,
				success:function(res){
					$("#supplier_show").empty();
					$("#supplier_show").append(res);
					$('#search_div').show();
				}
			});
    },
	
    /*supplier select*/
	 supplier_select : function(supplier_id){
      //  var dataString =supplier_id;
		  var dataString = 'supplier_id='+supplier_id;
        
        //alert(supplier_id);
        $.ajax({
				type:'post',
				url:'post_url/supplierTransaction',
				data:dataString,
				success:function(res){
                    var res_j = JSON.parse(res);
                    $('#total_amount').val(res_j.total_amount);
                    $("#paid").val(res_j.paid);
                    $("#due").val(res_j.balance);

					
				}
			});
     
    },
    
    /*supplier select*/
    
    /*item select*/    
     item_select : function(itemName){
        var dataString = 
            'itemName='+encodeURIComponent(itemName);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/itemShow',
				data:dataString,
				success:function(res){
					$("#item_show").empty();
					$("#item_show").append(res);
					//$('#search_div').show();
				}
			});
    },
    /*item select*/
    
    /*view purchase report**/
    report_view : function(supplier_id, item_id, from_date, to_date){
        var dataString = 
            'supplier_id='+encodeURIComponent(supplier_id)+
            '&item_id='+encodeURIComponent(item_id)+
            '&from_date='+encodeURIComponent(from_date)+
            '&to_date='+encodeURIComponent(to_date);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/viewReport',
				data:dataString,
				success:function(res){
					$("#pur_report_show").empty().append(res);
					
				}

			});
    },
    /*report view end*/
    
     /*view purchase report**/
    invoice_report_view : function(supplier_id, from_date, to_date){
        var dataString = 
            'supplier_id='+encodeURIComponent(supplier_id)+
            '&from_date='+encodeURIComponent(from_date)+
            '&to_date='+encodeURIComponent(to_date);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/pur_invoice_report',
				data:dataString,
				success:function(res){
					$("#pur_invreport_show").empty().append(res);
					
				}

			});
    }
    /*report view end*/
    
};
$(function(){
    purchasereport_events.init();
});
