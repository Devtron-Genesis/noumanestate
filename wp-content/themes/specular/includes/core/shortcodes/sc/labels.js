scnShortcodeMeta={
	attributes:[
		{
			label:"Label content",
			id:"content",
			isRequired:true
		},
         {
		label:"Label or Badget",
		id:"type",
		help:"", 
		controlType:"select-control", 
		selectValues:['label','badge']
   		 },
         {
		label:"Style",
		id:"style",
		help:"", 
		controlType:"select-control", 
		selectValues:['default','success', 'warning', 'important', 'info', 'inverse']
   		 },
        
         
		],
		
		shortcode:"label_badget"
		
};