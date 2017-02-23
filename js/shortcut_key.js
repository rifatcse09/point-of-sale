	var short_key = {
		events : function(){
			shortcut.add("Ctrl+S", function(e) { 
				e.preventDefault();
				window.location = "sales";
			},{ 'type':'keydown', 'propagate':true, 'target':document}); 
			
			shortcut.add("Ctrl+P", function(e) { 
				e.preventDefault();
				window.location = "purchase";
			},{ 'type':'keydown', 'propagate':true, 'target':document}); 
			
			shortcut.add("Ctrl+I", function(e) { 
				e.preventDefault();
				window.location = "itemAdd";
			},{ 'type':'keydown', 'propagate':true, 'target':document}); 
		}
		
	};
	
    $(function(){
		short_key.events();
		
	});