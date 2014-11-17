<?php

/* 
 * @author Ross Ewing <ross.ewing@hta.co.uk>
 * @copyright HTA Design LLP
 */

DEFINE('CODEBASE','../../_codebase/');
require_once CODEBASE . 'lib/controllers/admin.php';

session_start();
if(isset($_SESSION['id'])) {
	print $_SESSION['id'];
}

?>
<html>
	<head>
		<title>Our Enterprise - FloatCMS</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="assets/css/admin.css?v=<?php print date("Ymd");?>" rel="stylesheet" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		
	</head>
	<body>
		<!--<?php include('tpl/panel.php');?>-->
		<iframe id="iframeSite" src="../content/index.html" height="100%" frameborder="0"></iframe>
		<script type="text/javascript">
			//<![CDATA[
			$("#iframeSite").css("width", $( window ).width());
			
			//Menu dropdown
			$("div.admin-actions").on('mouseenter', 'div.menu-button', function(){
				$("div.menu").show();
				$("div.menu-button").addClass("open");
			});
			
			$("div.admin-actions").on('mouseleave', 'div.menu', function(){
				$("div.menu").hide();
				$("div.menu-button").removeClass("open");
			});
			
			
			$("div.menu-button-save a").click(function(){
				$('#iframeSite').contents().find(".hta-editable").remove();
				$('#iframeSite').contents().find(".hta-ckeditor").remove();
				$('#iframeSite').contents().find(".cke").remove();
				

				var html = $('#iframeSite').contents().find("body").html();
				var url = "?m=save&h=" + html;
				
				//document.getElementById('iframeSite').contentWindow.location.reload(true);
				//document.write(html);
				alert(html);
				$.post(url);
			});
			
			
			//]]>
		</script>
		<?php if (isset($_REQUEST['m']) && $_REQUEST['m'] == 'edit') { ?>
			<script type="text/javascript">			
				//
				$(function() {

				
					$(window).load(function(){
						
						//Set editable areas
						var x = document.getElementById("iframeSite");
						var y = (x.contentWindow || x.contentDocument);
						if (y.document)y = y.document;
						var s = document.createElement("script");
						s.setAttribute("id", "hta-editable");
						var t = document.createTextNode("$(\"div\").find(\".hta-editable\").attr(\"contenteditable\", \"true\");");
						s.appendChild(t);
						y.body.appendChild(s);
						
						
						//Set CKEDITOR
						var s = document.createElement('script');
						s.setAttribute("type","text/javascript");
						s.setAttribute("src", "../web/js/ckeditor/ckeditor.js");
						s.setAttribute("id", "hta-ckeditor");
						y.body.appendChild(s);

					});
					
				});
				
			</script>
			<script>

				// This code is generally not necessary, but it is here to demonstrate
				// how to customize specific editor instances on the fly. This fits well
				// this demo because we have editable elements (like headers) that
				// require less features.

				// The "instanceCreated" event is fired for every editor instance created.
				CKEDITOR.on( 'instanceCreated', function( event ) {
					var editor = event.editor,
						element = editor.element;

					// Customize editors for headers and tag list.
					// These editors don't need features like smileys, templates, iframes etc.
					if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
						// Customize the editor configurations on "configLoaded" event,
						// which is fired after the configuration file loading and
						// execution. This makes it possible to change the
						// configurations before the editor initialization takes place.
						editor.on( 'configLoaded', function() {

							// Remove unnecessary plugins to make the editor simpler.
							editor.config.removePlugins = 'colorbutton,find,flash,font,' +
								'forms,iframe,image,newpage,removeformat,' +
								'smiley,specialchar,stylescombo,templates';

							// Rearrange the layout of the toolbar.
							editor.config.toolbarGroups = [
								{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
								{ name: 'undo' },
								{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
								{ name: 'about' }
							];
						});
					}
				});

			</script>
		<?php } ?>
		<?php if (!isset($_REQUEST['login_status'])){include('tpl/login.php');}?>
	</body>
</html>