var item_events = {

    init : function(){
		
		// Item Add//
		
      	 $('#item_add').on('submit', function(e){
		
           var fd = new FormData(this);			
			item.item_add(fd);
        });
		
		//Item Edit//
		
	    $('#item_edit').on('submit', function(e){
			
		 e.preventDefault();
		  var fd = new FormData(this);
		 item.item_edit(fd);
			
		});
		
		//Auto Select Item When Category Change (Filtering by category)//
	
		 $('#item_select').change(function(){
			// e.preventDefault();
			//  var fd = new FormData(this);
            item.item_select();
        }); 
		 $('#item_price_add').on('submit', function(e){
			  e.preventDefault();
			   var fd = new FormData(this);
            item.item_price_add(fd);
		 });
        
    }
};


var item = {

	
	//Category Add
	
    item_add : function(fd){
              
        // These extra params aren't necessary but show that you can include other data.
		var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/itemAdd', true);

        xhr.upload.onprogress = function(fd) {
            if (fd.lengthComputable) {
                var percentComplete = (fd.loaded / fd.total) * 100;
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
    },
	
	//Category Edit
	
	item_edit : function(fd){
        
        //var file = this.files[0];
 
        // These extra params aren't necessary but show that you can include other data.
		var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/itemEdit', true);

        xhr.upload.onprogress = function(fd) {
            if (fd.lengthComputable) {
                var percentComplete = (fd.loaded /fd.total) * 100;
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
    },
	
	
	item_select : function(){
   
        
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
   },
   
   	item_price_add : function(fd){
    
      
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
   }
};	

$(function(){
    item_events.init();
}); 
