/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        //
        //habilita los class, style, etc
        config.allowedContent = true;
       
        // ALLOW <i></i>
        config.protectedSource.push( /<i[\s\S]*?\>/g ); //allows beginning <i> tag
        config.protectedSource.push( /<\/i[\s\S]*?\>/g ); //allows ending </i> tag
  
        // ALLOW <span></span>
        config.protectedSource.push( /<span[\s\S]*?\>/g ); //allows beginning <i> tag
        config.protectedSource.push( /<\/span[\s\S]*?\>/g ); //allows ending </i> tag
  
        // ALLOW <button></button>
        config.protectedSource.push( /<button[\s\S]*?\>/g ); //allows beginning <i> tag
        config.protectedSource.push( /<\/button[\s\S]*?\>/g ); //allows ending </i> tag

      
        // ALLOW <textarea></textarea>
        config.protectedSource.push( /<textarea[\s\S]*?\>/g ); //allows beginning <i> tag
        config.protectedSource.push( /<\/textarea[\s\S]*?\>/g ); //allows ending </i> tag
        
              
        // ALLOW <label></label>
        config.protectedSource.push( /<label[\s\S]*?\>/g ); //allows beginning <i> tag
        config.protectedSource.push( /<\/label[\s\S]*?\>/g ); //allows ending </i> tag
        
          
};