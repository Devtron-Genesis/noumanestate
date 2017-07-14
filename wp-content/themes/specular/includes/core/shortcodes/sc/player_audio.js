scnShortcodeMeta={
	attributes:[
		{
			label:"Title",
			id:"title",
			isRequired:true
		},
   		 {
		label:"Audio Link",
		id:"link",
		isRequired:true
		
   		 },
         {
		label:"Audio Types",
		id:"audio_type",
		help:"", 
		controlType:"select-control", 
		selectValues:['mp3','wma', 'wmv']
   		 }
        
         
		],
		
		shortcode:"player_audio"
		
};