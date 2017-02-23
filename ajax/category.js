//user update//   
var category_events = {

    init : function(){
		
		// Category Add//
		
      	$('#caegory_add').on('submit', function(e){
        e.preventDefault();							 
		var CategoryName = $('[name="CategoryName"]').val();
        category.category_add(CategoryName);
        });
		
		//Category Edit//
		
		$('#caegory_edit').on('submit', function(e){
			
		 e.preventDefault();
		var cat_id = $('[name="cat_id"]').val();		 
		var CategoryName = $('[name="CategoryName"]').val();
		category.category_edit(cat_id,CategoryName);
			
		});
		
		//Auto Select Item When Category Change (Filtering by category)//
	
		 $('#category_select').change(function(e){
			 	 e.preventDefault();
            var cat_id = $(this).val();
           category.item_select(cat_id);
        }); 
        
    }
};
var category = {
	
	//Category Add
	
    category_add : function(CategoryName){
        	var dataString = 
		'CategoryName='+CategoryName;
  

       $.ajax({
			 type:'post',
			 url:'post_url/category_add',
			 data:dataString,
			 success:function(data){
				
				arr = new Array();
				arr = data.split("|");
				if(arr[0] == 0){
					alert(arr[1]);
					window.location = 'categoryAdd';
				}
				else {
					alert(arr[1]);
				}
				
			 },
			 error:function(){
			
			 }
			 
		});
    },
	
	//Category Edit
	
	category_edit : function(cat_id,CategoryName){
        
			var dataString = 'cat_id='+cat_id+
		'&CategoryName='+CategoryName;

      $.ajax({
			 type:'post',
			 url:'post_url/categoryEdit',
			 data:dataString,
			 success:function(data){
				//alert(data);
				arr = new Array();
				arr = data.split("|");
				if(arr[0] == 0){
					alert(arr[1]);
					window.location = 'categoryManage';
				}
				else {
					alert(arr[1]);
				}
				
			 },
			 error:function(){
				//alert('Error');
			 }
			 
		});
    },
	
	
	item_select : function(cat_id){
     
		var dataString = 
		'cat_id='+cat_id;
		//alert(dataString);
      $.ajax({
			 type:'post',
			 url:'post_url/catwiseItemshow',
			 data:dataString,
				success:function(res){
					$("#item_select").empty();
					$("#item_select").append(res);
					$('[name="item_code"]').val("");
					$('[name="pur_price"]').val("");
					$('[name="slaes_price"]').val("");
					$('[name="discount"]').val("");
					$('[name="promo_from"]').val("");
					$('[name="promo_to"]').val("");
					$('[name="size"]').val("");
					$('[name="unit"]').val("");
					$('[name="description"]').val("");
				
				},
			 error:function(){
				//alert('Error');
			 }
			 
		});
   }
};


$(function(){
    category_events.init();
}); 

