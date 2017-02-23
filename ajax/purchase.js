//key validation//
function OnlyNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode

    if ((charCode < 48 || charCode > 57) && (charCode !== 8) && (charCode !== 9) && (charCode !== 46))

        return false;
}
//validation end//


var purchase_events = {

    init : function(){


        $('[name="itemName"]').on('input', function(){
            var itemName = $('[name="itemName"]').val();
            purchase.item_change(itemName);
        });


        $('[name="pur_item_code"]').on('input',function(){
            var pur_item_code = $('[name="pur_item_code"]').val();
            purchase.get_item_id(pur_item_code);

        });
        $('#dis_supp').on('focus',function(){

            purchase.get_supplier();
        });



        /*item add*/

        $('#pur_item_add_form').on('submit',function(e){
            e.preventDefault();

            var item = $('[name="pur_item_id"]').val();
            var item_name = $('#pur_item_name').text().trim();
            //   var item_name = $('#pur_item_show option:selected').text();
            var pur_price = $('[name="pur_price"]');
            var pur_quantity = $('[name="pur_quantity"]');
            var bonus_quantity = $('[name="bonus_quantity"]');
            var pur_subtotal_price = $('[name="pur_subtotal_price"]');


            //alert(item_name);
            purchase.pur_item_add(item, item_name, pur_price.val(), pur_quantity.val(), bonus_quantity.val(), pur_subtotal_price.val());
            purchase.pur_form_clear();

        });
        /*item add end */



        $('#pur_item_show').change(function(){
            var item = $(this).val();
            purchase.item_select(item);
        });

        /*total price show*/
        $('[name="pur_quantity"]').on('input',function(){
            var pur_quantity = $('[name="pur_quantity"]').val();
            var pur_price = $('[name="pur_price"]').val();
            // alert(pur_price);

            purchase.item_total_price(pur_price, pur_quantity);
        });

        $('[name="pur_price"]').on('input',function(){
            var pur_quantity = $('[name="pur_quantity"]').val();
            var pur_price = $('[name="pur_price"]').val();
            // alert(pur_price);

            purchase.item_total_price(pur_price, pur_quantity);
        });

        /*total price show end*/

        /*amount calculation*/
        $('[name="pur_net_payable"]').on('input',function(){
            var pur_net_payable = $('[name="pur_net_payable"]').val();
            var pur_total_price = $('[name="pur_total_price"]').val();
            // alert(pur_price);

            purchase.pur_total_price(pur_total_price, pur_net_payable);
        });
        /*amount calculation end*/


        /*pur item update*/
        $('[name="pur_item_update"]').click(function(){
            var ind = $('[name="pur_tr_index"]').val();
            if(ind == ""){
                alert('Select Item for update');
                return;
            }
            $('#pur_item_table tr:eq('+ind+')').remove();
            var item = $('[name="pur_item_id"]').val();
            var item_name = $('#pur_item_name').text().trim();
            //   var item_name = $('#pur_item_show option:selected').text();
            var pur_price = $('[name="pur_price"]');
            var pur_quantity = $('[name="pur_quantity"]');
            var bonus_quantity = $('[name="bonus_quantity"]');
            var pur_subtotal_price = $('[name="pur_subtotal_price"]');


            //alert(item_name);
            purchase.pur_item_add(item, item_name, pur_price.val(), pur_quantity.val(), bonus_quantity.val(), pur_subtotal_price.val());
            $('[name="pur_item_update"]').css('display', 'none');
            $('[name="pur_item_cancel"]').css('display', 'none');
            $('[name="pur_item_add"]').css('display', '');

            purchase.pur_form_clear();

            var total_row = $('#pur_item_table tr').length;


            for(var i = 1; i< total_row-1; i++){
                $('#pur_item_table tr:eq('+i+') td:eq(1)').text(i);
            }

        });

        /*update end*/

        $('[name="pur_item_cancel"]').click(function(){
            $('[name="pur_item_update"]').css('display', 'none');
            $('[name="pur_item_cancel"]').css('display', 'none');
            $('[name="pur_item_add"]').css('display', '');

            purchase.pur_form_clear();
        });


        /*purchase item insert*/
        $('[name="pur_item_insert"]').click(function(){
            // alert('Okay');
            purchase.purchase_item_insert();
        });
        /*purchase item insert end*/

    }
};


var purchase = {
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
            url:'post_url/pur_item_show',
            data:dataString,
            success:function(res){
                $("#pur_item_show").empty();
                $("#pur_item_show").append(res);
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
                $('[name="pur_item_id"]').val(item_id);
                $('#pur_item_name').html(res_j.item_name);
                $("#pur_item_catname").html(res_j.cat_name);
                $("#pur_item_code").html(res_j.item_code);
                $("#pur_item_des").html(res_j.description);
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



    /*purchase item add*/
    pur_item_add : function(item, item_name, pur_price, pur_quantity, bonus_quantity, pur_subtotal_price){
        if(item == ""){
            alert('Select an Item');
            return;
        }
        var total_row = $('#pur_item_table tr').length;

        /*for item chk */
        for(var i = 1; i< total_row-1; i++){
            var table_item =  parseInt($('#pur_item_table tr:eq('+i+') td:eq(0)').html());

            if(table_item == item)
            {
                alert('Item already exists.');
                return;
            }

        }
        //


        var last_row = total_row - 2;
        var sl = last_row + 1;
        var recent_row = total_row - 1;

        $('<tr>'+
            '<td style="display:none;">'+item+'</td>'+
            '<td class="text-center"><strong>'+sl+'</strong></td>'+
            '<td>'+$("#pur_item_name").html()+'</td>'+
            '<td id>'+item_name+'</td>'+
            '<td>'+pur_quantity+'</td>'+
            '<td>'+bonus_quantity+'</td>'+
            '<td>'+pur_price+'</td>'+
            '<td>'+pur_subtotal_price+'</td>'+
            '<td><a style="line-height:15px!important;" onclick="purchase.pur_table_edit($(this).parent().parent().index());" class="btn btn-primary">Edit</a>&nbsp;&nbsp;<a style="line-height:15px!important;background:#f00;" onclick="purchase.pur_table_remove($(this).parent().parent().index());" class="btn btn-primary">Remove</a></td>'+

            '</tr>'
        ).insertAfter($('#pur_item_table tr:eq('+last_row+')'));


        /*
         $('<tr>'+
         '<td style="display:none;">'+item+'</td>'+
         '<td class="text-center"><strong>'+sl+'</strong></td>'+
         '<td>'+$("#pur_item_name").html()+'</td>'+
         '<td>'+item_name+'</td>'+
         '<td>'+pur_quantity+'<input type="hidden" name="pur_quantity'+recent_row+'" value="'+pur_quantity+'"></td>'+
         '<td>'+pur_price+'<input type="hidden" name="pur_price'+recent_row+'" value="'+pur_price+'"></td>'+
         '<td><span id="pur_subtotal_price">'+pur_subtotal_price+'</span><input type="hidden" name="pur_subtotal_price'+recent_row+'" value="'+pur_subtotal_price+'"></td>'+
         '<td><a style="line-height:15px!important;" onclick="purchase.pur_table_edit($(this).parent().parent().index());" class="btn btn-primary">Edit</a>&nbsp;&nbsp;<a style="line-height:15px!important;background:#f00;" onclick="purchase.pur_table_remove($(this).parent().parent().index());" class="btn btn-primary">Remove</a></td>'+

         '</tr>'
         ).insertAfter($('#pur_item_table tr:eq('+last_row+')'));

         */

        var ttl_price = 0.00;
        for(var i = 1; i< total_row - 1; i++)
        {
            var ttrprc = $('#pur_item_table tr:eq('+i+') td:eq(6)').text().trim();
            ttl_price += parseFloat(ttrprc);



        }
        var total_price = parseFloat(ttl_price) + parseFloat(pur_subtotal_price);

        $('#pur_total_price').text(total_price);
        $('[name="pur_total_price"]').val(total_price);
        $('[name="pur_amt_due"]').val(total_price);

        purchase.pur_inv_control_dis();

        // alert(total_row);
    },
    /*purchase item add end*/

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
                    purchase.pur_form_clear();
                    return;
                }
                $('#pur_item_show').empty().append(res_j.option);
                purchase.item_select(res_j.id);

            }
        });
    },

    /*purchase form clear after item add*/

    pur_form_clear : function(){

        $('#pur_item_name').html('Product Name');
        $("#pur_item_catname").html('');
        $("#pur_item_code").val('');
        $("#pur_item_des").html('Product Description');
        $("#pur_item_photo").html('<img src="images/itemimages/no_image.png" style="width:100%;border:1px solid #ccc!important;" />');
        $("#pur_item_unit").html('');
        $("#pur_item_barcode").html('');

        $('[name="pur_price"]').val('');
        $('[name="pur_quantity"]').val('');
        $('[name="bonus_quantity"]').val('');
        $('[name="pur_subtotal_price"]').val('');
        $('[name="pur_tr_index"]').val('');
        $('[name="pur_item_id"]').val('');

    },
    /*form clear end here*/

    /*purchase table edit*/
    pur_table_edit : function(ind){

        var item_id = $('#pur_item_table tr:eq('+ind+') td:eq(0)').html().trim();
        var item_price = $('#pur_item_table tr:eq('+ind+') td:eq(6)').html().trim();
        var quantity = $('#pur_item_table tr:eq('+ind+') td:eq(4)').html().trim();
        var bonus_quantity = $('#pur_item_table tr:eq('+ind+') td:eq(5)').html().trim();
        var total_price = $('#pur_item_table tr:eq('+ind+') td:eq(7)').html().trim();

        $('[name="pur_tr_index"]').val(ind);
        $('[name="pur_price"]').val(item_price);
        $('[name="pur_quantity"]').val(quantity);
        $('[name="bonus_quantity"]').val(bonus_quantity);
        $('[name="pur_subtotal_price"]').val(total_price);

        purchase.item_select(item_id);

        $('[name="pur_item_update"]').css('display', '');
        $('[name="pur_item_cancel"]').css('display', '');
        $('[name="pur_item_add"]').css('display', 'none');
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
    pur_inv_control_dis : function(){
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

    /*purchase item insert*/
    purchase_item_insert : function(){

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
            url:'post_url/purchase_item_insert',
            data:{'arr':json, 'supplier_id':supplier_id, 'inovice_num':inovice_num, 'pur_total_price_in':pur_total_price_in, 'pur_net_payable':pur_net_payable, 'pur_amt_due':pur_amt_due},
            success:function(resp){
                //alert(data);
                arr = new Array();
                arr = resp.split("|");
                if(arr[0] == 0){
                    alert(arr[1]);
                    window.location = 'purchase';
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

    /*purchase item insert end here*/


};
$(function(){
    purchase_events.init();
});
