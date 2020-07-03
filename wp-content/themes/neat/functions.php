<?php  
// echo '+38(066)-44- -555 = ' . preg_replace('/[|\s|)|(|-]+?/', '','+38(066)-44- -555') ;
// die();


require_once( __DIR__ . '/NavMenu.php');
require_once( __DIR__ . '/ImageUrlWidget.php');
require_once( __DIR__ . '/ContactInformationWidget.php');
require_once( __DIR__ . '/LatestPostsWidget.php');
require_once( __DIR__ . '/LinksWidget.php');
require_once( __DIR__ . '/ProjectsBlockDescription.php');
require_once( __DIR__ . '/StatisticsDataElement.php');
require_once( __DIR__ . '/StatisticsDataHeadTextWidget.php');
require_once( __DIR__ . '/SocialLinksWidget.php');
require_once( __DIR__ . '/FeaturedAndLatestPostsWidget.php');



add_action('wp_enqueue_scripts',function () {

	wp_enqueue_style('main-stylesheet', get_stylesheet_uri());
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min/jquery.min.js', null, null, false );
	wp_enqueue_script('jquery');

	wp_enqueue_script('build', get_template_directory_uri() . '/js/build.js',['jquery'],null,true);

	// // wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery.min.js',null,null,true);
    // wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js',['jquery'],null,true);
    // wp_enqueue_script('jquery.countTo', get_template_directory_uri() . '/js/jquery.countTo.js',['jquery'],null,true);
    // wp_enqueue_script('jquery.easing.1.3', get_template_directory_uri() . '/js/jquery.easing.1.3.js',['jquery'],null,true);
    // wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri() . '/js/jquery.flexslider-min.js',['jquery'],null,true);
    // wp_enqueue_script('jquery.magnific-popup.min', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',['jquery'],null,true);
    
    // wp_enqueue_script('jquery.waypoints.min', get_template_directory_uri() . '/js/jquery.waypoints.min.js',['jquery'],null,true);
    // wp_enqueue_script('magnific-popup-options', get_template_directory_uri() . '/js/magnific-popup-options.js',['jquery'],null,true);

    // wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js',['jquery'],null,true);
    // wp_enqueue_script('modernizr-2.6.2.min', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js',['jquery'],null,true);
	// wp_enqueue_script('respond.min', get_template_directory_uri() . '/js/respond.min.js',['jquery'],null,true);
	

});

add_action('after_setup_theme', function() {
    add_theme_support('menus');
    add_theme_support('title-tag' );
	add_theme_support('widgets' );
	add_theme_support('post-thumbnails',array('work-projects','page-slides','post'));

});

add_action('widgets_init', function() {
    register_nav_menu('main', 'Main menu');

    register_sidebar( array(
		'name'          => 'Описание раздела Work',
		'id'            => 'projects-description',
		'description'   => 'Текст перед описанием Проектов на главной странице',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => null,
		'after_title'   => null,
	) );
	register_sidebar( array(
		'name'          => 'Виджеты footer-области',
		'id'            => 'footer-widgets',
		'description'   => 'Настройка виджетов footer',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => null,
		'after_title'   => null,
	) );

	register_sidebar( array(
		'name'          => 'Статистика',
		'id'            => 'statistics',
		'description'   => 'Настройка виджетов статистики',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => null,
		'after_title'   => null,
	) );

	register_sidebar( array(
		'name'          => 'Описание раздела Статистика',
		'id'            => 'statistics-description',
		'description'   => 'Текст перед отображением статистики на главной странице',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => null,
		'after_title'   => null,
	) );


	register_sidebar( array(
		'name'          => 'Настройка ссылок на соц.сети',
		'id'            => 'social-links-in-footer',
		'description'   => 'Элементы внизу главной страницы',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => null,
		'after_title'   => null,
	) );

	register_sidebar( array(
		'name'          => 'Контактные данные для Contacts',
		'id'            => 'contact-data',
		'description'   => 'Контактные данные для отображения на странице Contacts',
		'class'         => 'contact-page_',
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => null,
		'after_title'   => null,
	) );

	register_sidebar( array(
		'name'          => 'Лучший и последние посты',
		'id'            => 'featured-and-latest-posts',
		'description'   => 'Лучший и последние посты',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => null,
		'after_title'   => null,
	) );


	register_widget( 'ImageUrlWidget' );
	register_widget( 'ContactInformationWidget' );
	register_widget( 'LatestPostsWidget' );
	register_widget( 'LinksWidget' );
	register_widget( 'ProjectsBlockDescription' );
	register_widget( 'StatisticsDataElement' );
	register_widget( 'StatisticsDataHeadTextWidget' );
	register_widget( 'SocialLinksWidget' );
	register_widget( 'FeaturedAndLatestPostsWidget' );
	
	
});

add_action( 'init', 'register_post_types' );

function register_post_types(){
	register_post_type( 'slides-main-page', [
		'label'  => null,
		'labels' => [
			'name'               => 'Слайды на главной странице', // основное название для типа записи
			'singular_name'      => 'Слайд', // название для одной записи этого типа
			'add_new'            => 'Добавить слайд', // для добавления новой записи
			'add_new_item'       => 'Добавление слайда на главной', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование слайда на главной', // для редактирования типа записи
			'new_item'           => 'Новый слайд на главной', // текст новой записи
			'view_item'          => 'Просмотреть слайд', // для просмотра записи этого типа.
		],
		'description'         => 'Слайды на главной странице',
		'public'              => true,
		'publicly_queryable'  => false,
		'menu_icon'           =>'dashicons-images-alt2',
		'supports'           => array('title','editor'),
	] );

	register_post_type( 'services', [
		'label'  => null,
		'labels' => [
			'name'               => 'Услуги', // основное название для типа записи
			'singular_name'      => 'Услуга', // название для одной записи этого типа
			'add_new'            => 'Добавить услугу', // для добавления новой записи
			'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
			'new_item'           => 'Новая услуга', // текст новой записи
			'view_item'          => 'Просмотреть услугу', // для просмотра записи этого типа.
		],
		'description'         => 'Услуги на сайте',
		'public'              => true,
		'publicly_queryable'  => true,
		'menu_icon'           => 'dashicons-cart'
	] );

	register_post_type( 'work-projects', [
		'label'  => 'Проекты',
		'labels' => [
			'name'               => 'Проекты', // основное название для типа записи
			'singular_name'      => 'Проект', // название для одной записи этого типа
			'add_new'            => 'Добавить проект', // для добавления новой записи
			'add_new_item'       => 'Добавление проекта', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование проекта', // для редактирования типа записи
			'new_item'           => 'Новый проект', // текст новой записи
			'view_item'          => 'Просмотреть проект', // для просмотра записи этого типа.
			'search_items'       => 'Искать проект', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Проекты', // название меню
		],
		'description'         => 'Проекты компании',
		'public'              => true,
		'publicly_queryable'  => true,
		'menu_icon'           => 'dashicons-screenoptions',
		'supports'			  => array('thumbnail','editor','title'),
		'has_archive'		  => true,
		'rewrite'			  => true,	
		// 'taxonomies'		  => array('projects-category')
	] );

	register_post_type( 'page-slides', [
		'label'  => 'Все слайды',
		'labels' => [
			'name'               => 'Слайды на страницах', // основное название для типа записи
			'singular_name'      => 'Слайд', // название для одной записи этого типа
			'add_new'            => 'Добавить новый', // для добавления новой записи
			'add_new_item'       => 'Добавление слайда', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
			'new_item'           => 'Новый слайд', // текст новой записи
			'view_item'          => 'Просмотреть слайд', // для просмотра записи этого типа.
			'search_items'       => 'Искать слайды', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Слайды на страницах', // название меню
		],
		'description'         => 'Слайды',
		'public'              => true,
		'publicly_queryable'  => false,
		'menu_icon'           => 'dashicons-welcome-write-blog',
		'supports'			  => array('thumbnail','editor','title'),
		// 'taxonomies'		  => array('projects-category')
	] );

} 


function getDefaultThumbnailImageSrc() {
	return get_post(271)->guid;	
}

function getDataAboutPageSlideById(int $id) {
	$data = [];
	$postSlide = get_post($id);
	$data['thumbnail_url'] = get_the_post_thumbnail_url($id);
	if (!$data['thumbnail_url']) $data['thumbnail_url'] = getDefaultThumbnailImageSrc();
	$data['title'] = $postSlide->post_title;
	$data['content'] = $postSlide->post_content;
	return $data;
}

?>

