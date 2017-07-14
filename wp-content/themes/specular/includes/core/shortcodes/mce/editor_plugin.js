(function () {

    tinymce.create("tinymce.plugins.ShortcodeNinjaPlugin", {
        
        init: function (d, e) {
            var final_data = [];
            var _self = this;
            d.addCommand("scnOpenDialog", function (a, c) {

                scnSelectedShortcodeType = c.identifier;

                jQuery.get(e + "/dialog.php", function (b) {

                    jQuery("#scn-dialog").remove();

                    jQuery("body").append(b);

                    jQuery("#scn-dialog").hide();

                    var f = jQuery(window).width();

                    b = jQuery(window).height();

                    f = 720 < f ? 720 : f;

                    f -= 80;

                    b -= 84;

                    tb_show("Insert Shortcode", "#TB_inline?width=" + f + "&height=" + b + "&inlineId=scn-dialog");

                    jQuery("#scn-options h3:first").text("Customize the " + c.title + " Shortcode")

                })

            });

            /*d.onNodeChange.add(function (a, c) {

                c.setDisabled("scn_button", a.selection.getContent().length > 0)

            })*/

            d.addButton( 'scn_button', {
                type: 'menubutton',
                text: "",
                title : 'Insert Shortcode',
                image : codeless_global.frameworkUrl + "includes/core/shortcodes/mce/img/icon.png",
                icons : false,
                menu: _self.createControl(d, final_data)
           });




        },

        

        control_by_key: function(passed_key, a, b)

        {

        	var shortcodes = false, key;

        	if(codeless_global && codeless_global.shortcodes) shortcodes = codeless_global.shortcodes;

        

	        if(shortcodes)

			{	

				for (key in shortcodes)

				{	

					if( passed_key == false && typeof shortcodes[key] == 'string')

					{

						a.addWithDialog(b, shortcodes[key].charAt(0).toUpperCase() + shortcodes[key].slice(1), shortcodes[key].toLowerCase().replace(/ /,'_'));

					} 

					else if(key == passed_key )

					{

						for (sub_key in shortcodes[key])

						{

							a.addWithDialog(b, shortcodes[key][sub_key].charAt(0).toUpperCase() + shortcodes[key][sub_key].slice(1), sub_key);

						}	

					}

				}

            }

        },

        

        createControl: function (d, b) {



                var a = this;

                var shortcodes = false, key, remove = {};

                if(codeless_global && codeless_global.shortcodes) 

                {

                	shortcodes = codeless_global.shortcodes;

                	

                	if(typeof codeless_global.shortcodes.remove != 'undefined')

                	{

	                	remove = codeless_global.shortcodes.remove;

                	}

                }


                    a.addWithDialog(b, "Dropcaps", "dropcaps");

                    a.addWithDialog(b, "Social Icons", "social_icons");

                    a.addImmediate(b, "Highlights", "<br>[highlights][/highlights] <br>");

                    a.addWithDialog(b, "Light Box", "lightbox");

                    a.addWithDialog(b, "Audio", "player_audio");

                    a.control_by_key(  "inline", a , b); 

                    a.addWithDialog(b, "Buttons", "buttons");

                    a.addWithDialog(b, "Image Style", "image_style");

                    a.addWithDialog(b, "Block Quote", "blockquote");

                    a.addWithDialog(b, "Labels and badges", "labels");

                    a.addWithDialog(b, "Alerts", "alert");

                    a.control_by_key(  "inline", a , b); 

                    c = [];

                    a.addImmediate(c, "H1 Heading", "<br> [h1_heading][/h1_heading] <br>");

                    a.addImmediate(c, "H2 Heading", "<br> [h2_heading][/h2_heading] <br>");

                    a.addImmediate(c, "H3 Heading", "<br> [h3_heading][/h3_heading] <br>");

                    a.addImmediate(c, "H4 Heading", "<br> [h4_heading][/h4_heading] <br>");

                    a.addImmediate(c, "H5 Heading", "<br> [h5_heading][/h5_heading] <br>");

                    a.addImmediate(c, "H6 Heading", "<br> [h6_heading][/h6_heading] <br>");

                    b.push({

                        text: "Heading",
                        menu: c

                    });

                    a.addWithDialog(b, "Tooltip", "tooltip");   

                    c = [];
					
					a.control_by_key(  false, a , b); 
      

            return b;

        },

        addImmediate: function (d, e, a) {

            d.push({

                text: e,

                onclick: function () { tinyMCE.activeEditor.execCommand("mceInsertContent", false, a) }

            })

        },

        addWithDialog: function (d, e, a) {

            d.push({

                text: e,

                onclick: function () {

                    tinyMCE.activeEditor.execCommand("scnOpenDialog", false, {

                        title: e,

                        identifier: a

                    })

                }

            })

        },

        getInfo: function () {

            return {

                longname: "Shortcode Ninja plugin",

                author: "VisualShortcodes.com",

                authorurl: "http://visualshortcodes.com",

                infourl: "http://visualshortcodes.com/shortcode-ninja",

                version: "1.0"

            }

        }

    });

    tinymce.PluginManager.add("ShortcodeNinjaPlugin", tinymce.plugins.ShortcodeNinjaPlugin)

})();