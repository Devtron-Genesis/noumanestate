scnShortcodeMeta={
	attributes:[
		{
			label:"Title",
			id:"title",
            help:"",
			isRequired:true
		},
        {
			label:"Launch Button Text",
			id:"button_text",
            help:"",
			isRequired:true
		},
        {
		label:"Button Type",
		id:"type",
		help:"", 
		controlType:"select-control", 
		selectValues:['anchor', 'button']
        },
        {
			label:"Style",
			id:"style",
			help:"Select the color style from the list",
            controlType:"select-control", 
			selectValues:['default', 'primary', 'info', 'success', 'warning', 'danger', 'inverse', 'link']
        },
        {
			label:"Size",
			id:"size",
			help:"Select the size from the list",
            controlType:"select-control", 
			selectValues:['default', 'large', 'small', 'mini']
        }
         
		],
		defaultContent: "Content popover here",
		shortcode:"popover"
		
};