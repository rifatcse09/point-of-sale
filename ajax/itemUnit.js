var itemUnit_events = {

    init : function(){
		    $('#itemunit_add').on('submit', function(e){
			   e.preventDefault();
            var unit_name = $('[name="unit_name"]').val();

            itemUnit.itemUnit_add(unit_name);

        });
        
        $('#unit_edit').on('submit', function(e){
			 e.preventDefault();
            var unit_id = $('[name="unit_id"]').val();
            var unit_name = $('[name="unit_name"]').val();

            itemUnit.itemUnit_update(unit_id, unit_name);
        });

    }
};


var itemUnit = {
    itemUnit_add : function(unit_name){
        var dataString = 
            'unit_name='+encodeURIComponent(unit_name);

       // alert(dataString);

        $.ajax({
            type:'post',
            url:'post_url/itemunit_add',
            data:dataString,
            success:function(data){
                
                if(data == 2)
                {
                    alert("Unit already exist!");
                    return;
                }
                
                //alert(data);
                 arr = new Array();
                arr = data.split("|");
                if(arr[0] == 0){
                    alert(arr[1]);
                    window.location = 'itemUnit';
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
    
    itemUnit_update : function(unit_id, unit_name){
        var dataString = 
            'unit_id='+encodeURIComponent(unit_id)+
            '&unit_name='+encodeURIComponent(unit_name);

       // alert(dataString);

        $.ajax({
            type:'post',
            url:'post_url/unit_update',
            data:dataString,
            success:function(data){
                if(data == 2)
                {
                    alert("Unit already exist!");
                    return;
                }
                //alert(data);
                arr = new Array();
                arr = data.split("|");
                if(arr[0] == 0){
                    alert(arr[1]);
                    window.location = 'itemUnitManage';
                }
                else {
                    alert(arr[1]);
                }

            },
            error:function(){
                //alert('Error');
            }

        });
    }
    
};
$(function(){
    itemUnit_events.init();
});
