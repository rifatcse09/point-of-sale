
var supplier_events = {

    init : function(){
          $('#supplier_add').on('submit', function(e){
			   e.preventDefault();
            var company_name = $('[name="company_name"]').val();
            var address = $('[name="address"]').val();
            var mobile = $('[name="mobile"]').val();
            var email = $('[name="email"]').val();
            var contact_person = $('[name="contact_person"]').val();
            var contact_person_mobile = $('[name="contact_person_mobile"]').val();
            var payable_amount = $('[name="payable_amount"]').val();
            var saved_by = $('[name="saved_by"]').val();
            var remarks = $('[name="remarks"]').val();

            supplier.supplier_add(company_name, address, mobile, email, contact_person, contact_person_mobile, payable_amount, saved_by, remarks);
        });

        $('#supplier_edit').on('submit', function(e){
			   e.preventDefault();
            var supp_id = $('[name="supp_id"]').val();
            var company_name = $('[name="company_name"]').val();
            var address = $('[name="address"]').val();
            var mobile = $('[name="mobile"]').val();
            var email = $('[name="email"]').val();
            var contact_person = $('[name="contact_person"]').val();
            var contact_person_mobile = $('[name="contact_person_mobile"]').val();
            var saved_by = $('[name="saved_by"]').val();

            supplier.supplier_edit(supp_id, company_name, address, mobile, email, contact_person, contact_person_mobile, saved_by);
        });	

      $('[name="supplierName"]').on('input', function(){
		  
            var supplierName = $('[name="supplierName"]').val();
           
            supplier.supplier_change(supplierName);
        });
        
        $('#supplier_show').change(function(){
            var supplier_id = $('#supplier_show option:selected').val();
            supplier.supplier_select(supplier_id);
        });	

        $('#payment_add').on('submit', function(e){
			  e.preventDefault();
			  var fd = new FormData(this);
			  supplier.supplier_payment_add(fd);
			
        });		

    }
};

var supplier = {
    supplier_add : function(company_name, address, mobile, email, contact_person, contact_person_mobile, payable_amount, saved_by, remarks){
        var dataString = 
            'company_name='+encodeURIComponent(company_name)+
            '&address='+encodeURIComponent(address) +
            '&mobile='+mobile +
            '&email='+email +
            '&contact_person='+encodeURIComponent(contact_person) +
            '&contact_person_mobile='+contact_person_mobile +
            '&payable_amount='+payable_amount +
            '&saved_by='+saved_by+
            '&remarks='+remarks;

        //alert(dataString);

        $.ajax({
            type:'post',
            url:'post_url/supplierAdd',
            data:dataString,
            success:function(data){
                //alert(data);
                arr = new Array();
                arr = data.split("|");
                if(arr[0] == 0){
                    alert(arr[1]);
                    window.location = 'supplierAdd';
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

    supplier_edit : function(supp_id, company_name, address, mobile, email, contact_person, contact_person_mobile, saved_by){
        var dataString = 
            'supp_id='+supp_id+
            '&company_name='+encodeURIComponent(company_name)+
            '&address='+encodeURIComponent(address) +
            '&mobile='+mobile +
            '&email='+email +
            '&contact_person='+encodeURIComponent(contact_person) +
            '&contact_person_mobile='+contact_person_mobile +
            '&saved_by='+saved_by;

        //alert(dataString);

        $.ajax({
            type:'post',
            url:'post_url/supplierEdit',
            data:dataString,
            success:function(data){
                //alert(data);
                arr = new Array();
                arr = data.split("|");
                if(arr[0] == 0){
                    alert(arr[1]);
                    window.location = 'supplierManage';
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
	 supplier_payment_add : function(fd){
       //  var fd = new FormData(this);

		var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post_url/supplierPayment', true);

        xhr.onload = function() {
            if (this.status == 200) {
             
                alert(this.response);
				if(this.response=='Payment Inserted Successfully')
				{
						window.location = 'supplierPayment'; 
				}
			 
            };
        };

        xhr.send(fd);
     
    }
    
};
$(function(){
    supplier_events.init();
});


