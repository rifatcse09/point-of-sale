var profit_loss_events = {

    init : function(){
        /*item show*/
      $('[name="itemNamee"]').on('input', function(){
		  
            var itemNamee = $('[name="itemNamee"]').val();
            profit_loss_rep.item_select(itemNamee);
        });
        /*item show end*/
        
          /*item show*/
      $('[name="emplName"]').on('input', function(){  
            var emplName = $('[name="emplName"]').val();
         // alert(empName);
            profit_loss_rep.emp_select(emplName);
        });
        /*item show end*/
        
        
        /*view purchase report*/
        $('[name="view_profit_report"]').click(function(){
            
            var emp_id = $('[name="empe_id"]').val();
            var item_id = $('[name="iteme_id"]').val();
            var from_date = $('[name="from_date"]').val();
            var to_date = $('[name="to_date"]').val();
            
            profit_loss_rep.report_view(emp_id, item_id, from_date, to_date);
            //alert(item_id);
                                        
        });
        /*end*/
    }
};

var profit_loss_rep = {	
	  emp_select : function(emplName){
        var dataString = 
            'empName='+encodeURIComponent(emplName);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/emp_show',
				data:dataString,
				success:function(res){
					$("#emp_show").empty();
					$("#emp_show").append(res);
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
     item_select : function(itemNamee){
        var dataString = 
            'itemName='+encodeURIComponent(itemNamee);
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
    report_view : function(emp_id, item_id, from_date, to_date){
        var dataString = 
            'emp_id='+encodeURIComponent(emp_id)+
            '&item_id='+encodeURIComponent(item_id)+
            '&from_date='+encodeURIComponent(from_date)+
            '&to_date='+encodeURIComponent(to_date);
       // alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/viewProfitlossReport',
				data:dataString,
				success:function(res){
					$("#profitloss_report_show").empty().append(res);
					
				}

			});
    }
    /*report view end*/
    
};
$(function(){
    profit_loss_events.init();
});
