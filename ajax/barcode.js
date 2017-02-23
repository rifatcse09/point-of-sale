//key validation//
function OnlyNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	
	if ((charCode < 48 || charCode > 57) && (charCode !== 8) && (charCode !== 9) && (charCode !== 46))
	
         return false;
}
//validation end//


var barcode_events = {

    init : function(){
        
        
        $('[name="bar_itemName"]').on('input', function(){
            var bar_itemName = $('[name="bar_itemName"]').val();
            barcode.item_change(bar_itemName);
        });
        
        
        $('[name="bar_item_code"]').on('input',function(){
            var bar_item_code = $('[name="bar_item_code"]').val();
            barcode.get_item_id(bar_item_code);
		 
        });
		$('#dis_supp').on('focus',function(){

            barcode.get_supplier();
		});
        
        
        
        /*item add*/
        
        // $('#bar_item_add_form').on('submit',function(e){
        //     e.preventDefault();
        //     if(item == ''){
        //         alert('Select an Item');
        //         return;
        //     }
        //
        //    var item = $('[name="bar_item_id"]').val();
        //    var item_name = $('#bar_item_name').text().trim();
        //
        //
        //
        //     $('#bar_item_id').val(item);
        //
        //
        //
        //    //barcode.bar_item_print(item,item_name);
        //    //barcode.pur_form_clear();
        //
        //});
        /*item add end */



        $('#bar_item_show').change(function(){
            var item = $(this).val();
            barcode.bar_item_select(item);
        });


        /*total price show*/
        $('[name="pur_quantity"]').on('input',function(){
            var pur_quantity = $('[name="pur_quantity"]').val();
            var pur_price = $('[name="pur_price"]').val();
           // alert(pur_price);

            barcode.item_total_price(pur_price, pur_quantity);
        });

        $('[name="pur_price"]').on('input',function(){
            var pur_quantity = $('[name="pur_quantity"]').val();
            var pur_price = $('[name="pur_price"]').val();
           // alert(pur_price);

            barcode.item_total_price(pur_price, pur_quantity);
        });

        /*total price show end*/

        /*amount calculation*/
        $('[name="pur_net_payable"]').on('input',function(){
            var pur_net_payable = $('[name="pur_net_payable"]').val();
            var pur_total_price = $('[name="pur_total_price"]').val();
           // alert(pur_price);

            barcode.pur_total_price(pur_total_price, pur_net_payable);
        });
        /*amount calculation end*/


        /*pur item update*/
        $('[name="bar_item_update"]').click(function(){
            var ind = $('[name="bar_tr_index"]').val();
            if(ind == ""){
                alert('Select Item for update');
                return;
            }
            $('#pur_item_table tr:eq('+ind+')').remove();
            var item = $('[name="bar_item_id"]').val();
            var item_name = $('#bar_item_name').text().trim();
         //   var item_name = $('#pur_item_show option:selected').text();
            var pur_price = $('[name="pur_price"]');
            var pur_quantity = $('[name="pur_quantity"]');
            var bonus_quantity = $('[name="bonus_quantity"]');
            var pur_subtotal_price = $('[name="pur_subtotal_price"]');


            //alert(item_name);
            barcode.bar_item_print(item);
            $('[name="bar_item_update"]').css('display', 'none');
             $('[name="bar_item_cancel"]').css('display', 'none');
             $('[name="bar_item_add"]').css('display', '');

            barcode.pur_form_clear();
            //barcode.bar_item_print_val();


        });

        /*update end*/

        $('[name="bar_item_cancel"]').click(function(){
            $('[name="bar_item_update"]').css('display', 'none');
             $('[name="bar_item_cancel"]').css('display', 'none');
             $('[name="bar_item_add"]').css('display', '');

            barcode.pur_form_clear();
        });


        /*barcode item insert*/
        $('[name="pur_item_insert"]').click(function(){
           // alert('Okay');
            barcode.barcode_item_insert();
        });
        /*barcode item insert end*/

        $('#datebarcode_form').on('submit',function(){

        });

    }
};


var barcode = {
    test:function(){
        alert('okay');
    },

    /*item input show*/
    item_change : function(bar_itemName){
        var dataString =
            'itemName='+encodeURIComponent(bar_itemName);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/pur_item_show',
				data:dataString,
				success:function(res){
					$("#bar_item_show").empty();
					$("#bar_item_show").append(res);
				}
			});
    },
    /*item input show end*/

    item_select : function(item_id){
        var dataString = 'item_id='+item_id;

        $.ajax({
				type:'post',
				url:'post_url/pur_item_select',
				data:dataString,
				success:function(res){
                    var res_j = JSON.parse(res);
                    //alert(res_j.item_code);
                    $('[name="bar_item_id"]').val(item_id);
                    $('#bar_item_name').html(res_j.item_name);
                    $("#bar_item_catname").html(res_j.cat_name);
                    $("#bar_item_code").html(res_j.item_code);
                    $("#bar_item_des").html(res_j.description);
                    $("#pur_item_photo").html('<img src="images/itemimages/'+res_j.photo+'" style="width:100px;border:1px solid #ccc!important;" />');
                    $("#pur_item_unit").html(res_j.unit);
                    $("#pur_item_barcode").html('<figure><img style="margin-left:-7px;" src="functions/barcode.php?codetype=code39&size=40&text='+res_j.item_code+'" /><br><figcation style="font-size:10px;">'+res_j.item_code+'</figcaption></figure>');


				}
			});

    },

    /*item input show end*/

    bar_item_select : function(item_id){
        var dataString = 'item_id='+item_id;

        $.ajax({
            type:'post',
            url:'post_url/pur_item_select',
            data:dataString,
            success:function(res){
                var res_j = JSON.parse(res);
                //alert(res_j.item_code);
                $('[name="bar_item_id"]').val(item_id);
                $('#bar_item_name').html(res_j.item_name);
                $("#bar_item_catname").html(res_j.cat_name);
                $("#bar_item_code").html(res_j.item_code);
                $("#bar_item_des").html(res_j.description);
                $("#pur_item_photo").html('<img src="images/itemimages/'+res_j.photo+'" style="width:100px;border:1px solid #ccc!important;" />');
                $("#pur_item_unit").html(res_j.unit);
                $("#pur_item_barcode").html('<figure><img style="margin-left:-7px;" src="functions/barcode.php?codetype=code39&size=40&text='+res_j.item_code+'" /><br><figcation style="font-size:10px;">'+res_j.item_code+'</figcaption></figure>');


            }
        });

    },

   



     /*item total price show show*/
    item_total_price : function(price, qnty){
        var total_price = price * qnty;

        $('[name="pur_subtotal_price"]').val(total_price);

    },
    /*item input show end*/


    /*total price show show*/
    pur_total_price : function(pur_total_price, pur_net_payable){

        var due_balance = 0.00;
       var due_balance = parseFloat(pur_total_price)- parseFloat(pur_net_payable);
        if(parseFloat(pur_net_payable) < parseFloat(pur_total_price) || parseFloat(pur_net_payable) == parseFloat(pur_total_price) ) {

            $('[name="pur_amt_due"]').val(due_balance);
        } else {
            $('[name="pur_amt_due"]').val(pur_total_price);

        }

        //$('[name="pur_amt_due"]').val(due_balance);

    },
    /*total price show end*/



     /*barcode item add*/
    bar_item_print : function(item,item_name){

      alert(item);
      alert(item_name);

        var dataString = 'item_id='+item;
        $.ajax({
            type:'post',
            url:'post_url/pur_item_by_code',
            data:dataString,
            success:function(res){

                var res_j = JSON.parse(res);
                if(res_j.id == null)
                {
                    barcode.pur_form_clear();
                    return;
                }
                $('#pur_item_show').empty().append(res_j.option);
                barcode.item_select(res_j.id);

            }
        });


        barcode.bar_inv_control_dis();
    },
    /*barcode item add end*/

    get_item_id : function(item_code){

        var dataString = 'item_code='+item_code;
        $.ajax({
				type:'post',
				url:'post_url/pur_item_by_code',
				data:dataString,
				success:function(res){

                    var res_j = JSON.parse(res);
                    if(res_j.id == null)
                    {
                        barcode.pur_form_clear();
                        return;
                    }
                    $('#pur_item_show').empty().append(res_j.option);
                    barcode.item_select(res_j.id);

				}
			});
    },

    /*barcode form clear after item add*/

    pur_form_clear : function(){

        $('#bar_item_name').html('Product Name');
        $("#bar_item_catname").html('');
        $("#bar_item_code").val('');
        $("#bar_item_des").html('Product Description');
        $("#pur_item_photo").html('<img src="images/itemimages/no_image.png" style="width:100%;border:1px solid #ccc!important;" />');
        $("#pur_item_unit").html('');
        $("#pur_item_barcode").html('');

        $('[name="pur_price"]').val('');
        $('[name="pur_quantity"]').val('');
        $('[name="bonus_quantity"]').val('');
        $('[name="pur_subtotal_price"]').val('');
        $('[name="bar_tr_index"]').val('');
        $('[name="bar_item_id"]').val('');

    },
    /*form clear end here*/

    /*barcode table edit*/
    pur_table_edit : function(ind){

     var item_id = $('#pur_item_table tr:eq('+ind+') td:eq(0)').html().trim();
     var item_price = $('#pur_item_table tr:eq('+ind+') td:eq(6)').html().trim();
     var quantity = $('#pur_item_table tr:eq('+ind+') td:eq(4)').html().trim();
     var bonus_quantity = $('#pur_item_table tr:eq('+ind+') td:eq(5)').html().trim();
     var total_price = $('#pur_item_table tr:eq('+ind+') td:eq(7)').html().trim();

        $('[name="bar_tr_index"]').val(ind);
        $('[name="pur_price"]').val(item_price);
        $('[name="pur_quantity"]').val(quantity);
        $('[name="bonus_quantity"]').val(bonus_quantity);
        $('[name="pur_subtotal_price"]').val(total_price);

        barcode.item_select(item_id);

         $('[name="bar_item_update"]').css('display', '');
         $('[name="bar_item_cancel"]').css('display', '');
         $('[name="bar_item_add"]').css('display', 'none');
    },

    /*table edit end*/


    /*table remove*/
    pur_table_remove : function(ind){
     var rev_r =   $('#pur_item_table tr:eq('+ind+') td:eq(7)').html().trim();

     //var rev_r =   $('#pur_item_table tr:eq('+ind+') td:eq(6)').html().trim();
     var rev_total_price = $('#pur_total_price').text();

        var sub_total_price = rev_total_price - rev_r;

        $('#pur_total_price').text(sub_total_price);
        $('[name="pur_total_price"]').val(sub_total_price);

        //alert(rev_total_price);
       // return;
        $('#pur_item_table tr:eq('+ind+')').remove();
    },

    /*table remove end*/


    /*field disabled*/
    bar_inv_control_dis : function(){
        var total_rows = $('#pur_item_table tr').length;
        if(total_rows < 3){
            $('#dis_supp').prop('disabled', true);
            $('#abcd').prop('disabled', true);
            $('[name="inovice_num"]').prop('disabled', true);
           // $('[name="pur_ID"]').prop('disabled', true);
        } else {
            $('#dis_supp').prop('disabled', false);
            $('#abcd').prop('disabled', false);
            $('[name="inovice_num"]').prop('disabled', false);
            //$('[name="pur_ID"]').prop('disabled', false);
        }
    },
    /*field disabled end here*/

    /* Get Supplier List*/

	 get_supplier : function(){
        //var dataString =
           // 'itemName='+encodeURIComponent(itemName);
        //alert(dataString);

        $.ajax({
				type:'post',
				url:'post_url/supplier_list',
				//data:dataString,
				success:function(res){
					$("#dis_supp").empty();
					$("#dis_supp").append(res);
				}
			});
    },

    /*barcode item insert*/
    barcode_item_insert : function(){

        var supplier_id = $('[name="sup_id"]').val();
        var inovice_num = $('[name="inovice_num"]').val();
       // var pur_ID = $('[name="pur_ID"]').val();
        var pur_total_price_in = $('[name="pur_total_price"]').val();
        var pur_net_payable = $('[name="pur_net_payable"]').val();
        var pur_amt_due = $('[name="pur_amt_due"]').val();

        var total_row  = $('#pur_item_table tr').length;
        var arr = new Array();
        for(var i = 1; i<total_row-1; i++)
        {
            var val_arr = new Array();
            val_arr.push($('#pur_item_table tr:eq('+i+') td:eq(0)').text().trim());
            val_arr.push($('#pur_item_table tr:eq('+i+') td:eq(4)').text().trim());
            val_arr.push($('#pur_item_table tr:eq('+i+') td:eq(5)').text().trim());
            val_arr.push($('#pur_item_table tr:eq('+i+') td:eq(6)').text().trim());
            val_arr.push($('#pur_item_table tr:eq('+i+') td:eq(7)').text().trim());
            arr.push(val_arr);

        }
        var json = JSON.stringify(arr);
        $.ajax({

            type:'post',
            url:'post_url/barcode_item_insert',
            data:{'arr':json, 'supplier_id':supplier_id, 'inovice_num':inovice_num, 'pur_total_price_in':pur_total_price_in, 'pur_net_payable':pur_net_payable, 'pur_amt_due':pur_amt_due},
            success:function(resp){
                //alert(data);
                arr = new Array();
                arr = resp.split("|");
                if(arr[0] == 0){
                    alert(arr[1]);
                    window.location = 'barcode_print';
                }
                else {
                    alert(arr[1]);
                }

            },
            error:function(){
                alert('Ajax Error');
            }
        });
    
    
    }
    
    /*barcode item insert end here*/
    
    
};
$(function(){
    barcode_events.init();
});
