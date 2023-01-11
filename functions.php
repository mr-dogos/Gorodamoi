<?php 

function my_wp_nav_menu_args( $args = '' ) {
	$args[ 'container' ] = false;
	return $args;
}

function loadIconsStyle() {
	wp_register_style( 'styleIcons', get_stylesheet_directory_uri() . '/fonts/icons/all.min.css', array(), '5.15.1', 'all' );
	wp_enqueue_style( 'styleIcons' );
}

function loadBootsrapStyle() {
	wp_register_style( 'styleBootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.3', 'all' );
	wp_enqueue_style( 'styleBootstrap' );
}

function loadSwiperStyle() {
	wp_register_style( 'styleSwiper', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css', array(), '6.4.5', 'all' );
	wp_enqueue_style( 'styleSwiper' );
}

function loadLightBoxStyle() {
	wp_register_style( 'styleLight', get_stylesheet_directory_uri() . '/css/lightbox.min.css', array(), '2.0.0', 'all' );
	wp_enqueue_style( 'styleLight' );
}

function loadCssStyle() {
	wp_register_style( 'style_tems', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'style_tems' );
}

// include custom jQuery
function shapeSpace_include_custom_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), null, true );
}

function loadMaskScript() {
	wp_register_script( 'MaskScript', get_stylesheet_directory_uri() . '/js/jquery.masked.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'MaskScript' );
}

function loadBootsrapScript() {
	wp_register_script( 'BootsrapScript', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'BootsrapScript' );
}

function loadBundleScript() {
	wp_register_script( 'BundleScript', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'BundleScript' );
}

function loadSwiperScript() {
	wp_register_script( 'SwiperScript', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'SwiperScript' );
}

function loadLightboxScript() {
	wp_register_script( 'LightboxScript', get_stylesheet_directory_uri() . '/js/lightbox.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'LightboxScript' );
}

function loadIconsScript() {
	wp_register_script( 'IconsScript', get_stylesheet_directory_uri() . '/fonts/icons/all.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'IconsScript' );
}

function loadFunctions() {
	wp_register_script( 'functions', get_stylesheet_directory_uri() . '/js/function.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'functions' );
}

function contact_more_options(){
	add_settings_field('fbook','Ссылка на facebook:','display_fbook','general');
	add_settings_field('vk','Ссылка на ВК:','display_vk','general');
	add_settings_field('addr','Адрес компании:','display_addr','general');
	add_settings_field('phone','Контактный телефон:','display_phone','general');
	add_settings_field('info','Юридическая набивка:','display_info','general');
	register_setting('general','contact_fbook');
	register_setting('general','contact_vk');
	register_setting('general','contact_addr');
	register_setting('general','contact_phone');
	register_setting('general','contact_info');
}

function display_fbook(){
	echo "<input type='text' name='contact_fbook' value='".esc_attr(get_option('contact_fbook'))."'>";
}

function display_vk(){
	echo "<input type='text' name='contact_vk' value='".esc_attr(get_option('contact_vk'))."'>";
}

function display_phone(){
	echo "<input type='text' name='contact_phone' value='".esc_attr(get_option('contact_phone'))."'>";
}

function display_addr(){
	echo "<input type='text' name='contact_addr' value='".esc_attr(get_option('contact_addr'))."'>";
}

function display_info(){
	echo "<input type='text' name='contact_info' value='".esc_attr(get_option('contact_info'))."'>";
}


// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

add_action( 'wp_enqueue_scripts', 'loadIconsStyle' );
add_action( 'wp_enqueue_scripts', 'loadBootsrapStyle' );
add_action( 'wp_enqueue_scripts', 'loadSwiperStyle' );
add_action( 'wp_enqueue_scripts', 'loadLightBoxStyle' );
add_action( 'wp_enqueue_scripts', 'loadCssStyle' );
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');
add_action( 'wp_enqueue_scripts', 'loadMaskScript' );
add_action( 'wp_enqueue_scripts', 'loadBootsrapScript' );
add_action( 'wp_enqueue_scripts', 'loadBundleScript' );
add_action( 'wp_enqueue_scripts', 'loadSwiperScript' );
add_action( 'wp_enqueue_scripts', 'loadLightboxScript' );
add_action( 'wp_enqueue_scripts', 'loadIconsScript' );
add_action( 'wp_enqueue_scripts', 'loadFunctions' );
add_action( 'admin_init','contact_more_options' );
add_action( 'wp_ajax_phone_form', 'action_phone_form' );
add_action( 'wp_ajax_nopriv_phone_form', 'action_phone_form' );
add_action( 'wp_ajax_service_form', 'action_service_form' );
add_action( 'wp_ajax_nopriv_service_form', 'action_service_form' );
add_action( 'wp_ajax_calc_form', 'action_calculate_form' );
add_action( 'wp_ajax_nopriv_calc_form', 'action_calculate_form' );
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
//remove_all_filters( 'wp_mail_from' );
//remove_all_filters( 'wp_mail_from_name' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'comment_text', 'wpautop' );

// MY FUNCTIONS //------------------------------------------------------------//

function set_image($id){
	$data = [
		'alt' =>       get_post_meta( $id, '_wp_attachment_image_alt', true),
		'medium' =>    wp_get_attachment_image_url( $id, 'medium' ),
		'full' =>      wp_get_attachment_image_url( $id, 'full' )		
	];

	return($data);
}

function get_section_home($id){
	$post = get_post( $id, ARRAY_A );
	$ledy = set_image(45);
	$wave = set_image(49);
	$data = [
		'title' => $post['post_title'],
		'content' => $post['post_content'],
		'background' => get_the_post_thumbnail_url( $post['ID'], 'full' ),
		'ledy' => $ledy['full'],
		'wave' => $wave['full']
	];

	return($data);
}

function get_section_serice($id){
	$query = new WP_Query( 'category__in=' . $id . '&posts_per_page=' . get_category( $id )->category_count . '&order=ASC' );
	$cat_title = get_the_category_by_ID($id);
	if ($query->have_posts()){
		while ($query->have_posts()):
			$query -> the_post();
			$id = get_the_id();
			$title = get_the_title();
			$content = get_the_content();
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full', true );
			$item[] = [
				'id'      => $id,
				'title'   => $title,
				'content' => $content,
				'icon'    => $thumb_url[0]
			];
		endwhile;
		wp_reset_postdata();
	}
	
	$data = [
		'title' => $cat_title,
		'cards' => $item
	];
	
	return($data);
}

function get_section_info($id){
	$post = get_post( $id, ARRAY_A );
	$title = $post['post_title'];
	$image = get_the_post_thumbnail_url( $post['ID'], 'full' );
	$content = $post['post_content'];
	$data = [
		'title' => $title,
		'image' => $image,
		'content' => $content
	];
	
	return($data);
}

function get_section_advantages($id){
	$background = set_image(43);
	$query = new WP_Query( 'category__in=' . $id . '&posts_per_page=' . get_category( $id )->category_count . '&order=ASC' );
	$cat_title = get_the_category_by_ID($id);
	if ($query->have_posts()){
		while ($query->have_posts()):
			$query -> the_post();
			$id = get_the_id();
			$title = get_the_title();
			$content = get_the_content();
			$item[] = [
				'id'      => $id,
				'title'   => $title,
				'content' => $content
			];
		endwhile;
		wp_reset_postdata();
	}
	
	$data = [
		'title' => $cat_title,
		'background' => $background['full'],
		'cards' => $item
	];

	return($data);
}

function get_section_slider($id){
	$post = get_post( $id, ARRAY_A );
	$title = $post['post_title'];
	$background = get_the_post_thumbnail_url( $post['ID'], 'full' );
	$gallery = get_post_gallery( $post['ID'], false );
	$img_ids = explode(',', $gallery ['ids']);
	foreach ($img_ids as $value) {
		$images [] = set_image($value);
	}

	$data = [
		'title' => $title,
		'background' => $background,
		'images' => $images
	];
	
	return($data);
}

function get_section_map($id){
	$post = get_post( $id, ARRAY_A );
	$title = $post['post_title'];
	$image = get_the_post_thumbnail_url( $post['ID'], 'full' );
	$content = $post['post_content'];
	$title = 
	$data = [
		'title' => $title,
		'content' => $content,
		'image' => $image
	];
	
	return($data);
}

function get_section_footer(){
	$background_model = set_image(43);
	$info = str_replace(';', '<br>', get_option('contact_info'));
	$phone = get_option('contact_phone');
	$email = get_option('admin_email');
	$addr = get_option('contact_addr');
	
	$data = [
		'meta' => $info,
		'phone' => $phone,
		'email' => $email,
		'addr' =>  $addr,
		'title' => [
			'info' => 'Информация',
			'contact' => 'Контакты',
			'social' => 'Соц.сети'
		],
		'model' => [
			'background' => $background_model,
			'phone' => [
				'title' => 'Заказать звонок',
				'name_holder' => 'Ваше имя',
				'phone_holder' => 'Телефонный номер',
				'invalid' => 'Это поле не может быть пустым',
				'button' => 'Отправить'
			],
			'service' => [
				'title' => 'Заказать услугу',
				'button' => 'Заказать'
			],
			'calculate' => [
				'title' => 'Рассчитать стоимость',
				'button' => 'Рассчитать',
				'caservice' => 'Выберите услугу',
				'casquare' => 'Укажите площадь в м²',
				'caheight' => 'Укажите высоту в метрах',
				'casides' => 'Количество сторон',
				'caglass' => 'Площадь остекления в м²'
			]
		]
	];
	
	return($data);
}

function send_message($data){
	$phone = 'Заказ звонка с сайта';
	$service = 'Заказ услуги с сайта';
	$calculate = 'Заказ расчета с сайта';
	
	$to = 'dogos100@mail.ru';//get_bloginfo('admin_email');
  	$from = preg_replace("([\r\n])", "", $data['name']);
	if(count($data) < 3 ){
		$subject = $phone;
	}elseif(count($data) == 3){
		$subject = $service;
	}else{
		$subject = $calculate;
	}
  	$message = 'Имя: '.$data['name'];
  	$message .= "\r\n".'Телефонный номер: '.$data['phone'];
	if(count($data) > 2){
		$message .= "\r\n".'Услуга: '.$data['service'];
	}
	if(count($data) > 3){
		$message .= "\r\n".'Площадь в м²: '.$data['square'];
		$message .= "\r\n".'Высота в метрах: '.$data['height'];
		$message .= "\r\n".'Количество сторон: '.$data['sides'];
		$message .= "\r\n".'Площадь остекления в м²: '.$data['glass'];
	}
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "From: ".$from." <site@gorodamoi.ru>\r\n";
	$headers .= "Reply-to: ".$from."\r\n";
	$headers .= "Content-Type: text/plain; charset=\"utf-8\"";
	if (wp_mail($to, $subject, $message, $headers)){
		$send = 'form_send';
	}else{
		$send = 'error_send';
	}

	return($send);
}

function action_phone_form(){
	if(isset($_POST['name']) && isset($_POST['phone'])):
		$name = sanitize_text_field($_POST['name']);
		$phone = sanitize_text_field($_POST['phone']);
		if(strlen($name) < 1 || strlen($name) > 36){
			echo(wp_json_encode('error_name'));
		}else{
			$data = [
				'name'  => $name,
				'phone' => $phone
			];
		$send = send_message($data);
		echo(wp_json_encode($send));
		}
	endif;
	wp_die();
}

function action_service_form(){
	if(isset($_POST['name']) && isset($_POST['phone'])):
		$name = sanitize_text_field($_POST['name']);
		$phone = sanitize_text_field($_POST['phone']);
		$service = sanitize_text_field($_POST['service']);
		if(strlen($name) < 1 || strlen($name) > 36){
			echo(wp_json_encode('error_name'));
		}else{
			$data = [
				'name'    => $name,
				'phone'   => $phone,
				'service' => $service
			];
		$send = send_message($data);
		echo(wp_json_encode($send));
		}
	endif;
	wp_die();
}

function action_calculate_form(){
	if(isset($_POST['name']) && isset($_POST['phone'])):
		$name = sanitize_text_field($_POST['name']);
		$phone = sanitize_text_field($_POST['phone']);
		$service = sanitize_text_field($_POST['service']);
		$square = sanitize_text_field($_POST['square']);
		$height = sanitize_text_field($_POST['height']);
		$sides = sanitize_text_field($_POST['sides']);
		$glass = sanitize_text_field($_POST['glass']);
		if(strlen($name) < 1 || strlen($name) > 36){
			echo(wp_json_encode('error_name'));
		}else{
			$data = [
				'name'    => $name,
				'phone'   => $phone,
				'service' => $service,
				'square'  => $square,
				'height'  => $height,
				'sides'   => $sides,
				'glass'   => $glass
			];
			
		$send = send_message($data);
		echo(wp_json_encode($send));
		}
	endif;
	wp_die();
}