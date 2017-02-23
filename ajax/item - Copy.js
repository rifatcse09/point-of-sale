$(function(){
    $('#item_add').on('submit', function(e){
        e.preventDefault();
        //var file = this.files[0];
        var fd = new FormData(this);
        // These extra params aren't necessary but show that you can include other data.
		var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/itemAdd', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                var percentComplete = (e.loaded / e.total) * 100;
                //$('#per_outer').empty().append(Math.round(percentComplete) + '% uploaded');
                 $('#per_inner').css('width', Math.round(percentComplete) + '%');
                 $('#per_inner').empty().append(Math.round(percentComplete) + '%');
            }
        };

        xhr.onload = function() {
            if (this.status == 200) {
              
                alert(this.response);
				 if((this.response =='Inserted Successfully'))
				{
					window.location = 'itemAdd'; 
				}
						
            };
        };

        xhr.send(fd);

    });
	
	    $('#item_edit').on('submit', function(e){
        e.preventDefault();
        //var file = this.files[0];
        var fd = new FormData(this);
        // These extra params aren't necessary but show that you can include other data.
		var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/itemEdit', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                var percentComplete = (e.loaded / e.total) * 100;
                //$('#per_outer').empty().append(Math.round(percentComplete) + '% uploaded');
                 $('#per_inner').css('width', Math.round(percentComplete) + '%');
                 $('#per_inner').empty().append(Math.round(percentComplete) + '%');
            }
        };

        xhr.onload = function() {
            if (this.status == 200) {
             
                alert(this.response);
				if(this.response=='Item Name or Code Already Exist' || this.response=='Not Possible Updated' )
				{
				}
				else{
				window.location = 'itemManage';  
				}
            };
        };

        xhr.send(fd);

    });
	
	 $('#item_select').change(function(e){
			 	 e.preventDefault();
            var item_id = $(this).val();
        
		   	var dataString = 
		'item_id='+item_id;
		//alert(dataString);
      $.ajax({
			 type:'post',
			 url:'post_url/item_price',
			 data:dataString,
				success:function(res){
					var res_j = JSON.parse(res);
                    $('[name="item_code"]').val(res_j.item_code);
					$('[name="pur_price"]').val(res_j.price);
					$('[name="slaes_price"]').val(res_j.sales_price);
					$('[name="discount"]').val(res_j.discount);
					$('[name="promo_from"]').val(res_j.promo_from);
					$('[name="promo_to"]').val(res_j.promo_to);
					$('[name="size"]').val(res_j.size);
					$('[name="unit"]').val(res_j.unit);
					$('[name="description"]').val(res_j.description);
                 
				},
			 error:function(){
				//alert('Error');
			 }
			 
		 });
        }); 
    
    
    /*item code wise item details*/
    
    /*end*/
		
		/*item price add*/
		 $('[name="item_price_add"]').on('submit', function(e){
        e.preventDefault();

        var fd = new FormData(this);
      
		var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/itemPriceAdd', true);

   
        xhr.onload = function() {
            if (this.status == 200) {
             
                alert(this.response);
				if(this.response=='Item Price Inserted Successfully')
				{
					window.location = 'itemPrice'; 
				}
				else{
				 
				}
            };
        };

        xhr.send(fd);

    });
    
    /*item price add end*/
	
	$('#supplier_id').change(function(){
            var supplier_id = $('#supplier_id option:selected').val();
			//alert(supplier_id);
			
			 var dataString = 
            'supplier_id='+encodeURIComponent(supplier_id);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/itemList',
				data:dataString,
				success:function(res){
					$("#item_list").empty();
					$("#item_list").append(res);
				}
			});
            //customer.invoice_select(customer_id);
        });
	$('#item_list').change(function(){
            var item_id = $('#item_list option:selected').val();
			//alert(supplier_id);
			
			 var dataString = 
            'item_id='+encodeURIComponent(item_id);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/itemInfo',
				data:dataString,
				success:function(res){
					var res_j = JSON.parse(res);
                    $('[name="size"]').val(res_j.size);
					$('[name="unit"]').val(res_j.unit);
					$('[name="stock_qnty"]').val(res_j.available_stock);
				}
			});
            //customer.invoice_select(customer_id);
        });		
		

});