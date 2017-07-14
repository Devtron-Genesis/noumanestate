scnShortcodeMeta={

	attributes:[

		{

			label:"Button Title",

			id:"content",

			isRequired:true

		},

		{

			label:"Button type",

			id:"type",

			help:"Select the type of the button you will use.(The style values can be changed in Theme Option)",

            controlType:"select-control", 

			selectValues:['default', 'business', 'no_padding', 'rounded', 'big', 'with_icon', 'gradient']

        },

        {

            label:"Button align",

            id:"align",

            help:"Set the button text align",

            controlType:"select-control", 

            selectValues:['left', 'right']

        },


        {

			label:"Button target (link window mode)",

			id:"target",

			help:"Do you want target attributes?(only for anchor)",

            controlType:"select-control", 

			selectValues:['_self', '_blank', '_parent', '_top']

        },

        {

			label:"Link (for anchor)",

			id:"link",

			help:"Enter the link if you want for anchor",

            

        },


      

        {

			label:"Background Color",

			id:"color",

			help:"Select the color for your button"

			

        },

        {

            label:"Background Color Hover",

            id:"bg_color_hover",

            help:"Select the bg color for your button on hover"

        },

         {

			label:"Border Color",

			id:"bordercolor",

			help:"Select the color for your border button"

			

        },

        {

            label:"Border Color Hover",

            id:"bordercolor_hover",

            help:"Select the color for your border button hover"

            

        },
  

        {

			label:"Select icon",

			id:"icon",

			help:"",

            controlType:"select-control", 

			selectValues:[

                'none',

                    "moon-home",
                "moon-home-2",
                "moon-home-3",
                "moon-home-4",
                "moon-home-5",
                "moon-home-6",
                "moon-home-7",
                "moon-home-8",
                "moon-home-9",
                "moon-home-10",
                "moon-home-11",
                "moon-office",
                "moon-newspaper",
                "moon-pencil",
                "moon-pencil-2",
                "moon-pencil-3",
                "moon-pencil-4",
                "moon-pencil-5",
                "moon-pencil-6",
                "moon-quill",
                "moon-quill-2",
                "moon-quill-3",
                "moon-pen",
                "moon-pen-2",
                "moon-pen-3",
                "moon-pen-4",
                "moon-pen-5",
                "moon-marker",
                "moon-home-12",
                "moon-marker-2",
                "moon-blog",
                "moon-blog-2",
                "moon-brush",
                "moon-palette",
                "moon-palette-2",
                "moon-eyedropper",
                "moon-eyedropper-2",
                "moon-droplet",
                "moon-droplet-2",
                "moon-droplet-3",
                "moon-droplet-4",
                "moon-paint-format",
                "moon-paint-format-2",
                "moon-image",
                "moon-image-2",
                "moon-image-3",
                "moon-images",
                "moon-image-4",
                "moon-image-5",
                "moon-image-6",
                "moon-images-2",
                "moon-image-7",
                "moon-camera",
                "moon-camera-2",
                "moon-camera-3",
                "moon-camera-4",
                "moon-music",
                "moon-music-2",
                "moon-music-3",
                "moon-music-4",
                "moon-music-5",
                "moon-music-6",
                "moon-piano",
                "moon-guitar",
                "moon-headphones",
                "moon-headphones-2",
                "moon-play",
                "moon-play-2",
                "moon-movie",
                "moon-movie-2",
                "moon-movie-3",
                "moon-film",
                "moon-film-2",
                "moon-film-3",
                "moon-film-4",
                "moon-camera-5",
                "moon-camera-6",
                "moon-camera-7",
                "moon-camera-8",
                "moon-camera-9",
                "moon-dice",
                "moon-gamepad",
                "moon-gamepad-2",
                "moon-gamepad-3",
                "moon-pacman",
                "moon-spades",
                "moon-clubs",
                "moon-diamonds",
                "moon-king",
                "moon-queen",
                "moon-rock",
                "moon-bishop",
                "moon-knight",
                "moon-pawn",
                "moon-chess",
                "moon-bullhorn",
                "moon-megaphone",
                "moon-new",
                "moon-connection",
                "moon-connection-2",
                "moon-podcast",
                "moon-radio",
                "moon-feed",
                "moon-connection-3",
                "moon-radio-2",
                "moon-podcast-2",
                "moon-podcast-3",
                "moon-mic",
                "moon-mic-2",
                "moon-mic-3",
                "moon-mic-4",
                "moon-mic-5",
                "moon-book",
                "moon-book-2",
                "moon-books",
                "moon-reading",
                "moon-library",
                "moon-library-2",
                "moon-graduation",
                "moon-file",
                "moon-profile",
                "moon-file-2",
                "moon-file-3",
                "moon-file-4",
                "moon-file-5",
                "moon-file-6",
                "moon-files",
                "moon-file-plus",
                "moon-file-minus",
                "moon-file-download",
                "moon-file-upload",
                "moon-file-check",
                "moon-file-remove",
                "moon-file-7",
                "moon-file-8",
                "moon-file-plus-2",
                "moon-file-minus-2",
                "moon-file-download-2",
                "moon-file-upload-2",
                "moon-file-check-2",
                "moon-file-remove-2",
                "moon-file-9",
                "moon-copy",
                "moon-copy-2",
                "moon-copy-3",
                "moon-copy-4",
                "moon-paste",
                "moon-paste-2",
                "moon-paste-3",
                "moon-stack",
                "moon-stack-2",
                "moon-stack-3",
                "moon-folder",
                "moon-folder-download",
                "moon-folder-upload",
                "moon-folder-plus",
                "moon-folder-plus-2",
                "moon-folder-minus",
                "moon-folder-minus-2",
                "moon-folder8",
                "moon-folder-remove",
                "moon-folder-2",
                "moon-folder-open",
                "moon-folder-3",
                "moon-folder-4",
                "moon-folder-plus-3",
                "moon-folder-minus-3",
                "moon-folder-plus-4",
                "moon-folder-remove-2",
                "moon-folder-download-2",
                "moon-folder-upload-2",
                "moon-folder-download-3",
                "moon-folder-upload-3",
                "moon-folder-5",
                "moon-folder-open-2",
                "moon-folder-6",
                "moon-folder-open-3",
                "moon-certificate",
                "moon-cc",
                "moon-tag",
                "moon-tag-2",
                "moon-tag-3",
                "moon-tag-4",
                "moon-tag-5",
                "moon-tag-6",
                "moon-tag-7",
                "moon-tags",
                "moon-tags-2",
                "moon-tag-8",
                "moon-barcode",
                "moon-barcode-2",
                "moon-qrcode",
                "moon-ticket",
                "moon-cart",
                "moon-cart-2",
                "moon-cart-3",
                "moon-cart-4",
                "moon-cart-5",
                "moon-cart-6",
                "moon-cart-7",
                "moon-cart-plus",
                "moon-cart-minus",
                "moon-cart-add",
                "moon-cart-remove",
                "moon-cart-checkout",
                "moon-cart-remove-2",
                "moon-basket",
                "moon-basket-2",
                "moon-bag",
                "moon-bag-2",
                "moon-bag-3",
                "moon-coin",
                "moon-coins",
                "moon-credit",
                "moon-credit-2",
                "moon-calculate",
                "moon-calculate-2",
                "moon-support",
                "moon-phone",
                "moon-phone-2",
                "moon-phone-3",
                "moon-phone-4",
                "moon-contact-add",
                "moon-contact-remove",
                "moon-contact-add-2",
                "moon-contact-remove-2",
                "moon-call-incoming",
                "moon-call-outgoing",
                "moon-phone-5",
                "moon-phone-6",
                "moon-phone-hang-up",
                "moon-phone-hang-up-2",
                "moon-address-book",
                "moon-address-book-2",
                "moon-notebook",
                "moon-envelop",
                "moon-envelop-2",
                "moon-mail-send",
                "moon-envelop-opened",
                "moon-envelop-3",
                "moon-pushpin",
                "moon-location",
                "moon-location-2",
                "moon-location-3",
                "moon-location-4",
                "moon-location-5",
                "moon-location-6",
                "moon-location-7",
                "moon-compass",
                "moon-compass-2",
                "moon-map",
                "moon-map-2",
                "moon-map-3",
                "moon-map-4",
                "moon-direction",
                "moon-history",
                "moon-history-2",
                "moon-clock",
                "moon-clock-2",
                "moon-clock-3",
                "moon-clock-4",
                "moon-watch",
                "moon-clock-5",
                "moon-clock-6",
                "moon-clock-7",
                "moon-alarm",
                "moon-alarm-2",
                "moon-bell",
                "moon-bell-2",
                "moon-alarm-plus",
                "moon-alarm-minus",
                "moon-alarm-check",
                "moon-alarm-cancel",
                "moon-stopwatch",
                "moon-calendar",
                "moon-calendar-2",
                "moon-calendar-3",
                "moon-calendar-4",
                "moon-calendar-5",
                "moon-print",
                "moon-print-2",
                "moon-print-3",
                "moon-mouse",
                "moon-mouse-2",
                "moon-mouse-3",
                "moon-mouse-4",
                "moon-keyboard",
                "moon-keyboard-2",
                "moon-screen",
                "moon-screen-2",
                "moon-screen-3",
                "moon-screen-4",
                "moon-laptop",
                "moon-mobile",
                "moon-mobile-2",
                "moon-tablet",
                "moon-mobile-3",
                "moon-tv",
                "moon-cabinet",
                "moon-archive",
                "moon-drawer",
                "moon-drawer-2",
                "moon-drawer-3",
                "moon-box",
                "moon-box-add",
                "moon-box-remove",
                "moon-download",
                "moon-upload",
 
            

            ]

        },

        {

			label:"Icon Color",

			id:"icon_color",

			help:"",

          
        },

        {

            label:"Icon Color on Hover",

            id:"icon_color_hover",

            help:"",

          
        },


        {

        	label:"Font Color",

			id:"font_color"

		

        },

        {

            label:"Font Color Hover",

            id:"font_color_hover"

        

        },



		],

		

		shortcode:"shortcode_button"

};