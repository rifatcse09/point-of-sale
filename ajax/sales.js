//key validation//
function OnlyNumberKey(evt)
{	
	var charCode = (evt.which) ? evt.which : event.keyCode
	
	if ((charCode < 48 || charCode > 57) && (charCode !== 8) && (charCode !== 9) && (charCode !== 46))
	
         return false;
}
//validation end//


var sale_events = {

    init : function(){
        
        
        $('[name="itemName"]').on('input', function(){
            var itemName = $('[name="itemName"]').val();
           sale.item_change(itemName);
        });
        
        
        $('[name="sale_item_code"]').on('input',function(){
            var sale_item_code = $('[name="sale_item_code"]').val();
            
             var auto_cart_chk = $('[name="auto_cart"]').prop("checked");
            
           sale.get_item_id(sale_item_code);
        });
		
		//transaction field hide and show//
		$('[name="pay_type1"]').change(function(){
            var pay_type1 = $('[name="pay_type1"]').val();
			if(pay_type1 != 'Cash')
			{
				$('#trans_num1').show();
				
			} else {
				$('#trans_num1').hide();
			}
			
        });
		$('[name="pay_type2"]').change(function(){
            var pay_type2 = $('[name="pay_type2"]').val();
           // alert(pay_type2);
		
			 if(pay_type2 == 'Cash')
			{
				$('#trans_amt2').show();
				$('#trans_num2').hide();
				
			}
			
			 else if(pay_type2 == '')
			{
				$('#trans_num2').hide();
				$('#trans_amt2').hide();
				
			}
			else {
				$('#trans_num2').show();
				$('#trans_amt2').show();
			}
			
        });
        
        /*payable amount calculation*/
        $('[name="trans_amt1"]').on('input', function(){
            //if($(this).val() == ""){
			////	$(this).val(0.00);
			//}
            var total_trans_amt1 = 0.00;
            var trans_amt11 = 0.00;
            var trans_amt22 = 0.00;
            var sale_net_payable = 0.00;
            var return_amount = 0.00;
            
            sale_net_payable = $('[name="sale_net_payable"]').val().trim();
            var trans_amt11 = $('[name="trans_amt1"]').val().trim();
            var trans_amt22 = $('[name="trans_amt2"]').val().trim();
            
          /*ternary operator*/
            trans_amt22 = (trans_amt22 == "")?0.00:trans_amt22;
            
            /*return amount*/
            
            
            if(parseFloat(trans_amt11) > parseFloat(sale_net_payable))
             {
                 return_amount = parseFloat(trans_amt11) - parseFloat(sale_net_payable);
                // if(parseFloat(return_amount) > '0.00')
                // {
                $('[name="return_amt"]').val(parseFloat(return_amount).toFixed(2));
                 //alert('boro');
               //  } 
                // else { 
                     ////$('[name="return_amt"]').val(''); }
                 
             }
            if(parseFloat(trans_amt11) < parseFloat(sale_net_payable))
            {
                 $('[name="return_amt"]').val('0.00');
            }
            /*else if(return_amount < 0) {
              //$('[name="return_amt"]').val('');
             }*/
             
            /*end*/
            
           if(parseFloat(trans_amt11) + parseFloat(trans_amt22) < parseFloat(sale_net_payable))
              {
            var total_trans_amt1 = parseFloat(sale_net_payable) - (parseFloat(trans_amt11) + parseFloat(trans_amt22));
            
            $('[name="sale_amt_due"]').val(parseFloat(total_trans_amt1).toFixed(2)); 
        } else {
            $('[name="sale_amt_due"]').val('');
           
        }
            //sale.item_change(itemName);
        });
        
        $('[name="trans_amt2"]').on('input', function(){
			if($(this).val() == ""){
				$(this).val(0.00);
			}
            var total_trans_amt2 = 0.00;
            var trans_amt1 = 0.00;
            var trans_amt2 = 0.00;
            
            var trans_amt1 = $('[name="trans_amt1"]').val();
          //  alert(trans_amt1);
            var trans_amt2 = $('[name="trans_amt2"]').val();
            var sale_net_payable1 = $('[name="sale_net_payable"]').val();
            
    
            trans_amt1 = (trans_amt1 == "")?0.00:trans_amt1;
            
            if(parseFloat(trans_amt1) + parseFloat(trans_amt2) < parseFloat(sale_net_payable1))
            {
            var total_trans_amt2 = parseFloat(sale_net_payable1) - (parseFloat(trans_amt1) + parseFloat(trans_amt2));
            
           // alert(total_trans_amt2);
            
            $('[name="sale_amt_due"]').val(parseFloat(total_trans_amt2).toFixed(2)); 
            } else {
            $('[name="sale_amt_due"]').val('');
            }
            //sale.item_change(itemName);
        });
        
        
        /*item add*/
         $('#sale_item_form').on('submit', function(e){
        // $('[name="sale_item_add"]').click(function(){
               e.preventDefault();
            var item = $('[name="sale_item_id"]').val();
            var item_name = $('#sale_item_name').text().trim();
         //   var item_name = $('#sale_item_show option:selected').text();
            var sale_price = $('[name="sale_price"]');
            var sale_quantity = $('[name="sale_quantity"]');
            var sale_subtotal_price = $('[name="sale_subtotal_price"]');
			var sale_discount = $('[name="sale_discount"]');
			var stock = $('[name="stock_quantity"]').val();
			
             if(parseFloat(sale_discount.val()) >parseFloat(sale_price.val())){
             alert('Discount will be less then Sales Price');
            //alert(item_name);
          
			 }
			 else if(parseFloat(sale_quantity.val()) > parseFloat(stock))
			 {
				 alert('Insufficient Stock');
			 }
			 else {
				   sale.sale_item_add(item, item_name, sale_price.val(), sale_quantity.val(), sale_subtotal_price.val(), sale_discount.val());
            sale.sale_form_clear();
				 
			 }
            
        });
        /*item add end */
        
        
        
        
        
        
        
        $('#sale_item_show').change(function(){
            var item = $(this).val();
            sale.item_select(item,0);
        });
        
        /*total price show*/
        $('[name="sale_quantity"]').on('input',function(){
            var sale_quantity = $('[name="sale_quantity"]').val();
            var sale_price = $('[name="sale_price"]').val();
            var discount = $('[name="sale_discount"]').val();
           // alert(sale_price);
            
            sale.item_total_price(sale_price, sale_quantity, discount);
        });
        
        $('[name="sale_price"]').on('input',function(){
            var sale_quantity = $('[name="sale_quantity"]').val();
            var sale_price = $('[name="sale_price"]').val();
           var discount = $('[name="sale_discount"]').val();
           // alert(sale_price);
            
            sale.item_total_price(sale_price, sale_quantity, discount);
        });
		
		  
    $('[name="sale_discount"]').on('input',function(){
            var sale_quantity = $('[name="sale_quantity"]').val();
            var sale_price = $('[name="sale_price"]').val();
           var discount = $('[name="sale_discount"]').val();
           // alert(sale_price);
            
            sale.item_total_price(sale_price, sale_quantity, discount);
        });

        /*total price show end*/
        
        /*amount calculation*/
        $('[name="sale_net_payable"]').on('input',function(){
            var sale_net_payable = $('[name="sale_net_payable"]').val();
            var sale_total_price = $('[name="sale_total_price"]').val();
           // alert(sale_price);
            
            sale.sale_total_price(sale_total_price, sale_net_payable);
        });
        /*amount calculation end*/
        
        
        /*sale item update*/
        $('[name="sale_item_update"]').click(function(){
            var ind = $('[name="sale_tr_index"]').val();
            if(ind == ""){
                alert('Select Item for update');
                return;
            }
			
			
			 $('[name="auto_cart"]').prop("checked", true);
           
            var item = $('[name="sale_item_id"]').val();
            var item_name = $('#sale_item_name').text().trim();
         //   var item_name = $('#sale_item_show option:selected').text();
            var sale_price = $('[name="sale_price"]');
            var sale_quantity = $('[name="sale_quantity"]');
            var sale_subtotal_price = $('[name="sale_subtotal_price"]');
			 var sale_discount = $('[name="sale_discount"]');
			 
			 var stock = $('[name="stock_quantity"]').val();
			
			 if(parseFloat(sale_quantity.val()) > parseFloat(stock))
			 {
				 alert('Insufficient Stock');
				 return;
			 }
              $('#sale_item_table tr:eq('+ind+')').remove();
             
            //alert(item_name);
            sale.sale_item_add(item, item_name, sale_price.val(), sale_quantity.val(), sale_subtotal_price.val(),sale_discount.val());
            $('[name="sale_item_update"]').css('display', 'none');
             $('[name="sale_item_cancel"]').css('display', 'none');
             $('[name="sale_item_add"]').css('display', '');
            
            sale.sale_form_clear();
            
            var total_row = $('#sale_item_table tr').length;
        
           
            for(var i = 1; i< total_row-1; i++){
                $('#sale_item_table tr:eq('+i+') td:eq(1)').text(i);
            }
            
        });
        
        /*update end*/
        
        $('[name="sale_item_cancel"]').click(function(){
            $('[name="sale_item_update"]').css('display', 'none');
             $('[name="sale_item_cancel"]').css('display', 'none');
             $('[name="sale_item_add"]').css('display', '');
            
            sale.sale_form_clear();
        });
        
        
        /*sale item insert*/
        $('#item_sale_form').on('submit', function(e){
			 e.preventDefault();
            //alert('Okay');
           sale.sale_item_insert();
        });
        /*sale item insert end*/
		
		/* Customer List */
		$('#cus_id_dis').on('focus',function(){
			
			sale.get_customer();
		});
		
		/*Customer List */
        
    }
};


var sale = {
    
    data:{
        sale_chk:0,
        round_amt:0,
        payable_amt:0
    },
    test:function(){
        alert('okay');
    },
    
    /*item input show*/
    item_change : function(itemName){
        var dataString = 
            'itemName='+encodeURIComponent(itemName);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/sale_item_show',
				data:dataString,
				success:function(res){
					$("#sale_item_show").empty();
					$("#sale_item_show").append(res);
				}
			});
    },
    /*item input show end*/
    
    item_select : function(item_id, edit){
		
		
        var dataString = 'item_id='+item_id;
 
        $.ajax({
				type:'post',
				url:'post_url/sale_item_select',
				data:dataString,
				success:function(res){
                    var res_j = JSON.parse(res);
                    //alert(res_j.price);
					if( res_j.stock==null || res_j.stock=='0.00')
					{
						//alert('Stock Empty');
                        $("#stock_empty").css('color','red').html('Stock Empty');
                       sale.sale_form_clear();
						return;
					}
					if(res_j.price==null || res_j.price=='0.00')
					{
						alert('Sales Price not Fixed Yet');
						$('[name="sale_item_code"]').select();
						return;
					}
                    
                    var auto_cart_chk = $('[name="auto_cart"]').prop("checked");
                    if(auto_cart_chk == true){
                    
                        
                        //if(parseFloat(res_j.discount.val()) >parseFloat(res_j.price.val())){
                        // alert('Discount will be less then Sales Price')
                      

                        // }
                        // else if(parseFloat(sale_quantity.val()) > parseFloat(stock))
                         //{
                             //alert('Insufficient Stock')
                        // }
                         //else {
                            
                        //item, item_name, sale_price, sale_quantity, sale_subtotal_price , sale_discount
                             
                               sale.sale_item_add(item_id, res_j.item_name, res_j.price, 1, res_j.price, res_j.discount);
                        sale.sale_form_clear();
                        $("#sale_item_code").val('');

                        // }
                    } 
                    
                    else {
                        
                    $("#sale_item_code").val('');    
                    $("#stock_empty").empty();
                    $('[name="sale_item_id"]').val(item_id);
                    $('#sale_item_name').html(res_j.item_name);
                    $("#sale_item_catname").html(res_j.cat_name);
                    $("#sale_item_code").html(res_j.item_code);
                    $("#sale_item_des").html(res_j.description);
                    $("#sale_item_photo").html('<img src="images/itemimages/'+res_j.photo+'" style="width:100px;border:1px solid #ccc!important;" />');
                    $('[name="sale_item_unit"]').html(res_j.unit);
                    $('[name="sale_item_unit"]').html(res_j.unit);

					
                    $("#sale_item_barcode").html('<figure><img style="margin-left:-4px;" src="functions/barcode.php?codetype=code25&size=40&text='+res_j.item_code+'" /><br><figcation style="font-size:10px;">'+res_j.item_code+'</figcaption></figure>');
                if(edit==0)
				{
    				$('[name="purchase_price"]').val(res_j.pur_price);
    				$('[name="sale_price"]').val(res_j.price);
					$('[name="sale_discount"]').val(res_j.discount);
					$('[name="sale_quantity"]').val(1);
						sale.item_total_price(res_j.price,'1',res_j.discount);
				}
					$('[name="stock_quantity"]').val(res_j.stock);
                    
                    }  
                
                
					
				}
			});
     
    },
     /*item total price show show*/
    item_total_price : function(price, qnty, discount){
        //var total_price = (price - discount) * qnty;
		var total_price = price  * qnty;
        
        $('[name="sale_subtotal_price"]').val(total_price);

    },
    /*item input show end*/
    
    
    /*total price show show*/
    sale_total_price : function(sale_total_price, sale_net_payable){
        
        var due_balance = parseFloat(sale_total_price)- parseFloat(sale_net_payable);
        if(sale_net_payable == "") {
            
            due_balance = 0.00;
        }
        
        $('[name="sale_amt_due"]').val(due_balance);

    },
    /*total price show end*/
    
    
    
     /*sale item add*/
    sale_item_add : function(item, item_name, sale_price, sale_quantity, sale_subtotal_price , sale_discount){
        if(item == ""){
            alert('Select an Item');
            return;
        }
        var total_row = $('#sale_item_table tr').length;
        
        /*for item chk */
		var item_ind = 0;
        for(var i = 1; i < total_row-1; i++){
          var table_item =  parseInt($('#sale_item_table tr:eq('+i+') td:eq(0)').html());
            
            if(table_item == item)
            {
				item_ind = i;
				
            }
        
        }
        //
 
       
        var last_row = total_row - 2;
        var sl = last_row + 1;
        var recent_row = total_row - 1;
		
		if(item_ind != 0){
			var item_qnty = $('#sale_item_table tr:eq('+item_ind+') td:eq(4)').html();
			var new_item_qnty = parseInt(item_qnty) + parseInt(sale_quantity);
			var new_subtotal = parseInt(new_item_qnty * sale_price);
			
			$('#sale_item_table tr:eq('+item_ind+') td:eq(4)').html(new_item_qnty);
			$('#sale_item_table tr:eq('+item_ind+') td:eq(7)').html(new_subtotal.toFixed(2));
            //alert('Item already exists.');
		} else {
        
        $('<tr>'+
          '<td style="display:none;">'+item+'</td>'+
          '<td class="text-center"><strong>'+sl+'</strong></td>'+
          '<td>'+item_name+'</td>'+
          '<td id>'+item_name+'</td>'+
          '<td>'+sale_quantity+'</td>'+
          '<td>'+sale_price+'</td>'+
		  '<td>'+sale_discount+'</td>'+
          '<td>'+sale_subtotal_price+'</td>'+
          '<td><a style="line-height:15px!important;" onclick="sale.sale_table_edit($(this).parent().parent().index());" class="btn btn-primary">Edit</a>&nbsp;&nbsp;<a style="line-height:15px!important;background:#f00;" onclick="sale.sale_table_remove($(this).parent().parent().index());" class="btn btn-primary">Remove</a></td>'+
          '</tr>'
          ).insertAfter($('#sale_item_table tr:eq('+last_row+')'));
		}
		
		var total_row = $('#sale_item_table tr').length;
           
      var ttl_price = 0.00;
	  var discount_total = 0.00;
        for(var i = 1; i< total_row - 1; i++)
        {
            var ttrprc = $('#sale_item_table tr:eq('+i+') td:eq(7)').text().trim();
			
	        var qty=$('#sale_item_table tr:eq('+i+') td:eq(4)').text().trim();
			var discountt=$('#sale_item_table tr:eq('+i+') td:eq(6)').text().trim();
            ttl_price += parseFloat(ttrprc);
            discount_total += parseFloat(discountt) * parseFloat(qty); 
        }
		var discount = parseFloat(sale_discount)*parseFloat(sale_quantity);
        //var total_price = parseFloat(ttl_price) + parseFloat(sale_subtotal_price);
        var total_price = parseFloat(ttl_price);
        var total_discount =  parseFloat(discount_total) + parseFloat(discount);
		
		var vat_h =  $('[name="vat_hidden"]').val();
		var total_vat = (vat_h * total_price)/100;
		
        var payable_amt = (total_price + total_vat) - total_discount;
       // alert(payable_amt);
        
        var round_pamt = Math.round(payable_amt);
        
        //var round_amt = parseFloat(round_pamt - payable_amt);
        var round_amt_pos = payable_amt.toString().indexOf('.');
       // alert(round_amt_pos);
        
        var round_amt = payable_amt.toString().substr(round_amt_pos, 3);
    //    alert(round_amt);
		//var payable = (total_price + total_vat) - total_discount;
		
       $('#sale_total_price').text(total_price.toFixed(2));
       $('[name="sale_total_price"]').val(total_price.toFixed(2));
	   $('[name="discount"]').val(parseFloat(total_discount).toFixed(2));
	   $('[name="vat"]').val(parseFloat(total_vat).toFixed(2));
	   $('[name="sale_net_payable"]').val(parseFloat(round_pamt).toFixed(2));
	   $('[name="rounding_amt"]').val(parseFloat(round_amt).toFixed(2));
	   $('[name="sale_amt_due"]').val(parseFloat(round_pamt).toFixed(2));
        
        sale.sale_inv_control_dis();
        
       // alert(total_row);
    },
    /*sale item add end*/
    
    get_item_id : function(item_code){
       
        var dataString = 'item_code='+item_code;
        $.ajax({
				type:'post',
				url:'post_url/sale_item_by_code',
				data:dataString,
				success:function(res){
                    
                    var res_j = JSON.parse(res);
                    if(res_j.id == null)
                    {
                        sale.sale_form_clear();
                        return;
                    }
                    $('#sale_item_show').empty().append(res_j.option);
                    $('#purchase_price').val(res_j.pur_price);

                    sale.item_select(res_j.id,0);
                   
				}
			});
    },
    
    /*sale form clear after item add*/
    
    sale_form_clear : function(){
        
        $('#sale_item_name').html('Product Name');
        $("#sale_item_catname").html('');
        //$("#sale_item_code").val('');
        $("#sale_item_des").html('Product Description');
        $("#sale_item_photo").html('<img src="images/itemimages/no_image.png" style="width:100%;border:1px solid #ccc!important;" />');
        $("#sale_item_unit").html('');
        $("#sale_item_barcode").html('');

        $('[name="purchase_price"]').val('');
        $('[name="sale_price"]').val('');
        $('[name="sale_quantity"]').val('');
		$('[name="sale_discount"]').val('');
		$('[name="stock_quantity"]').val('');
        $('[name="sale_subtotal_price"]').val('');
        $('[name="sale_tr_index"]').val('');
        $('[name="sale_item_id"]').val('');
        
    },
    /*form clear end here*/
    
    /*sale table edit*/
    sale_table_edit : function(ind){
	
	$('[name="auto_cart"]').prop('checked', false);
     
	 var item_id = $('#sale_item_table tr:eq('+ind+') td:eq(0)').html().trim();
     var item_price = $('#sale_item_table tr:eq('+ind+') td:eq(5)').html().trim();
     var quantity = $('#sale_item_table tr:eq('+ind+') td:eq(4)').html().trim();
	 var discount = $('#sale_item_table tr:eq('+ind+') td:eq(6)').html().trim();
     var total_price = $('#sale_item_table tr:eq('+ind+') td:eq(7)').html().trim();
	 
	
        
        $('[name="sale_tr_index"]').val(ind);
        $('[name="sale_price"]').val(item_price);
        $('[name="sale_quantity"]').val(quantity);
		$('[name="sale_discount"]').val(discount);
        $('[name="sale_subtotal_price"]').val(total_price);
           
        sale.item_select(item_id,1);
       
         $('[name="sale_item_update"]').css('display', '');
         $('[name="sale_item_cancel"]').css('display', '');
         $('[name="sale_item_add"]').css('display', 'none');
    },
    
    /*table edit end*/
    
    
    /*table remove transaction*/
    sale_table_remove : function(ind){
     var rev_r =   $('#sale_item_table tr:eq('+ind+') td:eq(7)').html().trim();
       
     var rev_dis =   $('#sale_item_table tr:eq('+ind+') td:eq(6)').html().trim();
     var rev_qty =   $('#sale_item_table tr:eq('+ind+') td:eq(4)').html().trim();
	 
	 var ttl_dis = rev_dis * rev_qty;
	 
     var rev_total_price = $('#sale_total_price').text();
	 var rev_discount = $('[name="discount"]').val();
        
	var sub_total_price = rev_total_price - rev_r;
	var sub_discount = rev_discount - ttl_dis;
	
	var vat_h =  $('[name="vat_hidden"]').val();
	var remove_vat = (vat_h * sub_total_price)/100;
	
	//alert(remove_vat);
        
        $('#sale_total_price').text(sub_total_price);
        $('[name="sale_total_price"]').val(sub_total_price);
		$('[name="discount"]').val(sub_discount);
		$('[name="vat"]').val(remove_vat);
        
        //alert(rev_total_price);
       // return;
        $('#sale_item_table tr:eq('+ind+')').remove();
    },
    
    /*table remove end*/
    
    
    /*field disabled*/
    sale_inv_control_dis : function(){
        var total_rows = $('#sale_item_table tr').length;
       // alert(total_rows);
        if(total_rows < 3){
            $('#cus_id_dis').prop('disabled', true);
            $('#pay_type1_dis').prop('disabled', true);
            $('[name="trans_amt1"]').prop('disabled', true);
            $('[name="pay_type2"]').prop('disabled', true);
            $('[name="trans_amt2"]').prop('disabled', true);
			$('[name="sale_item_insert"]').prop('disabled', true);
        } else {
           $('#cus_id_dis').prop('disabled', false);
           $('#pay_type1_dis').prop('disabled', false);
           $('[name="trans_amt1"]').prop('disabled', false);
            $('[name="pay_type2"]').prop('disabled', false);
            $('[name="trans_amt2"]').prop('disabled', false);
			$('[name="sale_item_insert"]').prop('disabled', false);
        }
    },
    /*field disabled end here*/
    
    
    /*sale item insert*/
    sale_item_insert : function(){
    
        var cus_id = $('[name="cus_id"]').val();
        var sale_total_price_in = $('[name="sale_total_price"]').val();
		var total_vat = ($('[name="vat"]').val()=="")? 0.00 : $('[name="vat"]').val();
		var total_discount = ($('[name="discount"]').val()=="")? 0.00 : $('[name="discount"]').val();
		var sale_net_payable = $('[name="sale_net_payable"]').val();
		var rounding_amt = $('[name="rounding_amt"]').val();
        var pay_type1 = $('[name="pay_type1"]').val();
        var trans_num1 = $('[name="trans_num1"]').val();
        var trans_amt1 = $('[name="trans_amt1"]').val();
        var pay_type2 = $('[name="pay_type2"]').val();
        var trans_num2 = $('[name="trans_num2"]').val();
        var trans_amt2 = $('[name="trans_amt2"]').val();
        var return_amt = $('[name="return_amt"]').val();
        var sale_amt_due = $('[name="sale_amt_due"]').val();
		
		var two_tranamt = parseFloat(trans_amt1) + parseFloat(trans_amt2);
        
        
		
	/*	if(sale_net_payable < two_tranamt)
		{
			alert('Amount can not be larger then Paybale amount');
			return;
		}*/
		if(sale_amt_due>0 && cus_id=="")
		{
			alert('Select Customer');
			
			return false;
		}
		if(trans_amt1=='0.00')
		{
			alert('Input Amount');
			return;
		}
        
        var total_row  = $('#sale_item_table tr').length;
        var arr = new Array();
        for(var i = 1; i<total_row-1; i++)
        {
            var val_arr = new Array();
            val_arr.push($('#sale_item_table tr:eq('+i+') td:eq(0)').text().trim());
            val_arr.push($('#sale_item_table tr:eq('+i+') td:eq(4)').text().trim());
            val_arr.push($('#sale_item_table tr:eq('+i+') td:eq(5)').text().trim());
            val_arr.push($('#sale_item_table tr:eq('+i+') td:eq(6)').text().trim());
			val_arr.push($('#sale_item_table tr:eq('+i+') td:eq(7)').text().trim());
            arr.push(val_arr);

        }
        var json = JSON.stringify(arr);
        $.ajax({

            type:'post',
            url:'post_url/sale_item_insert',
            data:{'arr':json, 'cus_id':cus_id, 'sale_total_price_in':sale_total_price_in, 'total_vat':total_vat, 'total_discount':total_discount, 'sale_net_payable':sale_net_payable,'rounding_amt':rounding_amt,'pay_type1':pay_type1, 'trans_num1':trans_num1, 'trans_amt1':trans_amt1, 'pay_type2':pay_type2, 'trans_num2':trans_num2, 'trans_amt2':trans_amt2,'return_amt':return_amt,'sale_amt_due':sale_amt_due},
            success:function(resp){
                //alert(data);
                arr = new Array();
                arr = resp.split("|");
                if(arr[0] == 0){
                    alert(arr[1]);
				    
					var link = 'invoice_print/invoice/'+arr[2];
					var mywindow = window.open(link);
                      
					setTimeout(function(){
						mywindow.print();
						window.location = 'sales';
						mywindow.close();
						//window.reload();
					
						
					}, 1000);
				
					
                   
                }
                else {
                    alert(arr[1]);
                }

            },
            error:function(){
                alert('Ajax Error');
            }
        });
    
    
    }, 
	 get_customer : function(){

        $.ajax({
				type:'post',
				url:'post_url/customerList',
				//data:dataString,
				success:function(res){
					$("#cus_id_dis").empty();
					$("#cus_id_dis").append(res);
				}
			});
    },
	
	
    
    /*sale item insert end here*/
    
    
};
$(function(){
    sale_events.init();
});
