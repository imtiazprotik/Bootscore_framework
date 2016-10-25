(function() {
    tinymce.PluginManager.add('wpbootscore_mce_button', function( editor, url ) {
        editor.addButton( 'wpbootscore_mce_button', {
            text: 'Shortcodes',
            icon: 'button',
            type: 'menubutton',
            menu: [

                // No Parameter
                {
                      text: 'Buttons',
                      onclick: function() {
                      editor.insertContent('[eden_button type="" text="Protik"]');
                     }
               },

               {
                    text: 'With Parameter',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Buttons',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'single_line',
                                    label: 'Single Line',
                                    value: 'Title here',
                                },
                                
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( 
                                    '[single parameter="'+e.data.single_line+'" parameter="'+e.data.dropdown+'"]'
                                    );
                            }
                        });
                    }
                },


               {
                    text: 'With Parameter',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Feature Generator',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'single_line',
                                    label: 'Single Line',
                                    value: 'Title here',
                                },
                                {
                                    type: 'listbox',
                                    name: 'dropdown',
                                    label: 'Dropdown',
                                    'values': [
                                        {text: 'One', value: 'One'},
                                        {text: 'Two', value: 'Two'},
                                    ]
                                },
                                
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( 
                                    '[single parameter="'+e.data.single_line+'" parameter="'+e.data.dropdown+'"]'
                                    );
                            }
                        });
                    }
                },

                // Section
                {
                    text: 'Section',
                    menu: [
{
                    text: 'With Parameter',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Section heading area',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'title',
                                    label: 'Section Title',
                                    value: 'Title here',
                                },
                                {
                                    type: 'textbox',
                                    name: 'content',
                                    label: 'description Box',
                                    value: 'Message here',
                                    multiline: true,
                                    minWidth: 300,
                                    minHeight: 100
                                },
                                
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( 
                                    '[eden_section title="'+e.data.title+'"]<p>'+e.data.content+'</p>[/eden_section]'
                                    );
                            }
                        });
                    }
                },

                    ]
                },

            ]
        });
    });
})();