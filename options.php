<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Departments
	$profile_depts = array(
		'' 		=> 	__('Select a Department', 'ufclaspeople2'),
		'Anthropology' => 'Anthropology', 
		'Astronomy' => 'Astronomy', 
		'Biology' => 'Biology', 
		'Chemistry' => 'Chemistry', 
		'Classics' => 'Classics', 
		'Economics' => 'Economics', 
		'English' => 'English', 
		'Geography' => 'Geography', 
		'Geological Sciences' => 'Geological Sciences', 
		'History' => 'History', 
		'Languages, Literatures, & Cultures' => 'Languages, Literatures, & Cultures', 
		'Linguistics' => 'Linguistics', 
		'Mathematics' => 'Mathematics', 
		'Philosophy' => 'Philosophy', 
		'Physics' => 'Physics', 
		'Political Science' => 'Political Science', 
		'Psychology' => 'Psychology', 
		'Religion' => 'Religion', 
		'Sociology and Criminology & Law' => 'Sociology and Criminology & Law', 
		'Spanish and Portuguese Studies' => 'Spanish and Portuguese Studies', 
		'Statistics' => 'Statistics', 
		'Other' => 'Other', 
		);

	// Locations
	$profile_locations = array(
		'' 		=> 	__('Select a Location', 'ufclaspeople2'),
		'Academic Advising Center Gainesville FL' => 'Academic Advising Center',
		'Anderson Hall Gainesville FL' => 'Anderson Hall',
		'Bartram Hall Gainesville FL' => 'Bartram Hall',
		'Broward Hall Gainesville FL' => 'Broward Hall',
		'Bryant Space Science Center Gainesville FL' 	=> 	'Bryant Space Science Center',
		'Carr Hall Gainesville FL' 		=> 	'Carr Hall',
		'Dauer Hall Gainesville FL' 		=> 	'Dauer Hall',
		'Griffin-Floyd Hall Gainesville FL' 		=> 	'Griffin-Floyd Hall',
		'Grinter Hall Gainesville FL' 		=> 	'Grinter Hall',
		'Keene-Flint Hall Gainesville FL' 		=> 	'Keene-Flint Hall',
		'Little Hall Gainesville FL' 		=> 	'Little Hall',
		'Matherly Hall Gainesville FL' 		=> 	'Matherly Hall',
		'McCarty Hall A Gainesville FL' 		=> 	'McCarty Hall A',
		'McCarty Hall C Gainesville FL' 		=> 	'McCarty Hall C',
		'29.648068, -82.346436' 			=> 	'Microkelvin Lab',
		'Norman Hall Gainesville FL' 		=> 	'Norman Hall',
		'Physics Department Gainesville FL' => 	'Physics Building',
		'Psychology Bldg Gainesville FL' 	=> 	'Psychology Building',
		'Pugh Hall Gainesville FL' 			=> 	'Pugh Hall',
		'Rolfs Hall Gainesville FL' 		=> 	'Rolfs Hall',
		'Tigert Hall Gainesville FL' 		=> 	'Tigert Hall',
		'Turlington Hall Gainesville FL' 		=> 	'Turlington Hall',
		'Ustler Hall Gainesville FL' 		=> 	'Ustler Hall',
		'Walker Hall Gainesville FL' 		=> 	'Walker Hall',
		'Williamson Hall Gainesville FL' 		=> 	'Williamson Hall',
		'Yon Hall Gainesville FL' 		=> 	'Yon Hall',
	);
	
	$profile_affiliations = array(
		'' 		=> 	__('Select an affiliation', 'ufclaspeople2'),
		'Faculty' => 'Faculty',
		'Graduate Student' => 'Graduate Student',
		'Staff' => 'Staff',
	);
	
	$parent_colleges_institutes = array(
		"College of Liberal Arts and Sciences" => "College of Liberal Arts and Sciences",
		/*"University of Florida" => "University of Florida",
		"UF Academic Health Center" => "UF Academic Health Center",
		"Shands HealthCare" => "Shands HealthCare",
		"" => "None"*/
		);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	// Profile
	$options[] = array(
		'name' => __('Profile Information', 'ufclaspeople2'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('', 'ufclaspeople2'),
		'desc' => __('Profile information for this site. Email, phone, and location also appears in the mobile navigation menu. Leave blank to disable mobile menu buttons.', 'ufclaspeople2'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Email', 'ufclaspeople2'),
		'desc' => __('Enter your email address. (e.g. username@ufl.edu)', 'ufclaspeople2'),
		'id' => 'opt_profile_email',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Phone', 'ufclaspeople2'),
		'desc' => __('Enter your phone number in the following format: ###-###-####. (e.g. 352-555-5555)', 'ufclaspeople2'),
		'id' => 'opt_profile_phone',
		'std' => '',
		'type' => 'text');
				
	$options[] = array(
		'name' => __('Office Location', 'ufclaspeople2'),
		'desc' => __('Select a location. Links will take users to Google Maps (https://www.google.com/maps)', 'ufclaspeople2'),
		'id' => 'opt_profile_location',
		'std' => '',
		'type' => 'select',
		'options' => $profile_locations);
		
	$options[] = array(
		'name' => __('Affilation', 'ufclaspeople2'),
		'desc' => __('', 'ufclaspeople2'),
		'id' => 'opt_profile_affiliation',
		'std' => '',
		'type' => 'select',
		'options' => $profile_affiliations);
		
	$options[] = array(
		'name' => __('Department', 'ufclaspeople2'),
		'desc' => __('Select a department', 'ufclaspeople2'),
		'id' => 'opt_profile_dept',
		'std' => '',
		'type' => 'select',
		'options' => $profile_depts);
	
	// Settings from the original template
	$options[] = array( "name" => "General",
          "type" => "heading");
            
    $options[] = array( "name" => "Parent College / Institute",
          "desc" => "Select your parent organization.",
          "id" => "opt_parent_colleges_institutes",
          "std" => "one",
          "type" => "select",
          "options" => $parent_colleges_institutes);
   
/*    $options[] = array( "name" => "Webmaster Email",
          "desc" => "Enter the email address for webmaster contact requests (e.g. webmaster@yourdomain.edu)",
          "id" => "opt_webmaster_email",
          "std" => "",
          "type" => "text");
                   
    $options[] = array( "name" => "Google Analytics Account Number",
          "desc" => "Enter your account number for Google Analytics (e.g. 'UA-xxxxxxx-x') Default is 'UA-1145687-25'. ",
          "id" => "opt_analytics_acct",
          "std" => "UA-1145687-25",
          "type" => "text");
			
    $options[] = array( "name" => "Intranet URL",
          "desc" => "Enter the URL to your unit's intranet. This will place a link at the bottom of the footer titled 'Intranet'",
          "id" => "opt_intranet_url",
          "std" => "",
          "type" => "text");

    $options[] = array( "name" => "Make a Gift URL",
          "desc" => "Enter the URL to your unit's specific fund/giving page at the UF Foundation. Find available online funds at the <a href='https://www.uff.ufl.edu/OnlineGiving/Advanced.asp'>UF Foundation</a>",
          "id" => "opt_makeagift_url",
          "std" => "",
          "type" => "text");
		  
    $options[] = array( "name" => "Enable Mega Drop Down Menu",
         "desc" => "Enable mega drop down menus for your main menu",
         "id" => "opt_mega_menu",
         "std" => "0",
         "type" => "checkbox");
    
    $options[] = array( "name" => "Collapse Sidebar Navigation",
         "desc" => "Useful for larger sites - keeps the sidebar navigation a manageable height",
         "id" => "opt_collapse_sidebar_nav",
         "std" => "0",
         "type" => "checkbox");
		           
    $options[] = array( "name" => "Site Title",
          "type" => "heading");

    $options[] = array( "name" => "Title Font Size",
          "desc" => "Enter a number that corresponds to the size of the font you would like for the title of your site (Default 2.6).",
          "id" => "opt_title_size",
          "class" => "mini",
          "std" => "",
          "type" => "text");
    
    $options[] = array( "name" => "Title Padding",
          "desc" => "Enter the amount of padding the title should have (Default 6).",
          "id" => "opt_title_pad",
          "class" => "mini",
          "std" => "",
          "type" => "text");    
          
    $options[] = array( "name" => "Tagline Font Size",
          "desc" => "Enter a number that corresponds to the size of the font you would like for the tagline of your site (Default values 1.4).",
          "id" => "opt_tagline_size",
          "class" => "mini",
          "std" => "",
          "type" => "text");              

    $options[] = array( "name" => "Header Call to Action",
          "type" => "heading");
		  
    $options[] = array( "name" => "Call to Action Text",
          "desc" => "The Call to Action text is the orange box above your main menu. Enter what you would like it to say here. Leave it blank to remove it.",
          "id" => "opt_actionitem_text",
          "std" => "",
          "type" => "text");

    $options[] = array( "name" => "Call to Action URL",
          "desc" => "Where visitors are taken when they click on your Header Action Item",
          "id" => "opt_actionitem_url",
          "std" => "",
          "type" => "text");

	$options[] = array( "name" => "Homepage Layout",
         "type" => "heading");
   
	$options[] = array( "name" => "Homepage Layout for Widgets",
           "desc" => "Select which layout you want to use for your widgets on the homepage",
           "id" => "opt_homepage_layout",
           "std" => "3c-default",
           "type" => "images",
           "options" => array(
             '3c-default' => $imagepath . '3c-default.png',
             '3c-thirds' => $imagepath . '3c-thirds.png',
             '2c-bias' => $imagepath . '2c-bias.png',
             '2c-half' => $imagepath . '2c-half.png',
             '1c-100' => $imagepath . '1c-100.png')
           );
   
	$options[] = array( "name" => "Color Scheme (white background)",
         "desc" => "Use a white background for the homepage widget zone",
         "id" => "opt_homepage_layout_color",
         "std" => "0",
         "type" => "checkbox");
   
  
   $options[] = array( "name" => "Featured Content",
         "type" => "heading");
         
   $options[] = array( "name" => "Select a Category",
          "desc" => "Choose a category from which featured posts are drawn. To remove the featured content area, simply set this dropdown to 'Choose a Category'",
          "id" => "opt_featured_category",
          "type" => "select",
          "std" => array("Choose a Category" => "Choose a Category"),
          "options" => $options_categories);
          
   $options[] = array( "name" => "Number of Posts to Display in Slider",
          "desc" => "How many posts do you want to display in your slider (Story Stacker is fixed at 3)",
          "id" => "opt_number_of_posts_to_show",
          "std" => "3",
    		  "type" => "select",
    		  "class" => "mini",
    		  "options" => array("1" => "1", "2" => "2", "3" => "3","4" => "4","5" => "5","6" => "6",));
			  
	$options[] = array( "name" => "Slider Speed", 
 	      "desc" => "Time in milliseconds to display each slide (e.g. 5000 means five seconds)", 
		  "id" => "opt_featured_speed", 
		  "std" => "7000", 
		  "type" => "text"); 
	  
	$options[] = array( "name" => "Disable Timeline Scrubber",
         "desc" => "Disable the long bar with dots underneath the images",
         "id" => "opt_featured_content_disable_timeline",
         "std" => "0",
         "type" => "checkbox");
		  
   $options[] = array( "name" => "Story Stacker",
         "desc" => "Check to enable the Featured Content Story Stacker for your home page.",
         "id" => "opt_story_stacker",
         "std" => "0",
         "type" => "checkbox");
		 
   $options[] = array( "name" => "Story Stacker - Disable Dates",
         "desc" => "Disable dates from appearing underneath your post titles",
         "id" => "opt_story_stacker_disable_dates",
         "std" => "0",
         "type" => "checkbox");
*/   
   $options[] = array( "name" => "Advanced",
			"type" => "heading");
   
   /*$options[] = array( "name" => "Facebook",
			"super-admin-only" => "0",
          "desc" => "Enter the url of your organization's Facebook page (e.g. http://facebook.com/uflorida)",
          "id" => "opt_facebook_url",
          "std" => "",
          "type" => "text");
            
   $options[] = array( "name" => "Twitter",
			"super-admin-only" => "0",
          "desc" => "Enter the url of your organization's Twitter page (e.g. http://www.twitter.com/uflorida)",
          "id" => "opt_twitter_url",
          "std" => "",
          "type" => "text");
   
   $options[] = array( "name" => "Youtube",
			"super-admin-only" => "0",
          "desc" => "Enter the url of your organization's Youtube page (e.g. http://www.youtube.com/universityofflorida)",
          "id" => "opt_youtube_url",
          "std" => "",
          "type" => "text");
		  
   $options[] = array( "name" => "Facebook Insights ID",
			"super-admin-only" => "1",
          "desc" => "Enter the unique number ID for fb:admins, e.g., <meta property=\"fb:admins\" content=\"1138099648\", would be \"1138099648\" />",
          "id" => "opt_facebook_insights",
          "std" => "",
          "type" => "text");
   
	$options[] = array( "name" => "Custom Logo",
			"super-admin-only" => "1",
      	"desc" => "For advanced use only.",
      	"id" => "opt_alternative_site_logo",
      	"type" => "upload");		  
		
    $options[] = array( "name" => "Custom Logo Height",
			"super-admin-only" => "1",
      	"desc" => "For advanced use only. Enter height in pixels (i.e. 70)",
          "id" => "opt_alternative_site_logo_height",
		  "class" => "mini",
          "std" => "",
          "type" => "text");  
		  
   $options[] = array( "name" => "Custom Logo Width",
			"super-admin-only" => "1",
      	"desc" => "For advanced use only. Enter width in pixels (i.e. 70)",
          "id" => "opt_alternative_site_logo_width",
		  "class" => "mini",
          "std" => "",
          "type" => "text"); */
	
  $options[] = array( "name" => "Custom CSS",
      "desc" => "Enter custom CSS to be inserted in the header.",
      "id" => "opt_custom_css",
      "std" => "",
      "type" => "textarea"); 

	return $options;
}