<?php
/** -------------------------------
 *
 * Wordpress機能設定
 *
 * ------------------------------ */

//title 自動追加
add_theme_support( 'title-tag' );

//タイトルにキャッチフレーズを表示させない
function remove_tagline($title) {
if ( isset($title['tagline']) ) {
    unset( $title['tagline'] );
  }
  return $title;
}
add_filter( 'document_title_parts', 'remove_tagline' );

//セパレータ変更
function custom_title_separator($sep) {
  $sep = '|';
  return $sep;
}
add_filter( 'document_title_separator', 'custom_title_separator' );

//記事一覧 引用[...]変更
function new_excerpt_more($more) {
  return '&#46;&#46;&#46;';
}
add_filter('excerpt_more', 'new_excerpt_more');

//アイキャッチ追加
add_theme_support( 'post-thumbnails', array( 'post' ) );

//カスタムメニューロケーション追加
function register_my_menus() {
  register_nav_menus(
    array(
      'gnav-menu' => __( 'グローバルメニュー' ),
      'side-about' => __( 'サイドメニュー(about)' ),
      'side-public' => __( 'サイドメニュー(public)' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

//カスタムメニュー css(class)調整
function my_css_attributes_filter( $var ) {
  return is_array($var) ? array_intersect($var, array( 'current-menu-item' )) : '';
}
add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 10, 1 );
add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 10, 1 );
add_filter( 'page_css_class', 'my_css_attributes_filter', 10, 1 );

// クラスを削除して、表示中メニューに 'current' クラスを付与する
// add_filter( 'nav_menu_css_class', 'my_custom_nav', 10, 2 );
// function my_custom_nav( $classes, $item ) {
//
//   if( !empty( $classes[0] ) ){
//     $custom_class = esc_attr( $classes[0] );
//   }
//   $classes = array();
//   if( $item -> current == true ) {
//     $classes[] = 'current';
//   }
//
//   if( !empty( $custom_class ) ){
//     $classes[] = $custom_class;
//   }
//   return $classes;
// }
//
// // liに自動追加される ID を削除する
// add_filter('nav_menu_item_id', 'my_nav_id_remove', 10);
// function my_nav_id_remove( $id ){
//   return $id = array();
// }

//リンクを相対パスに変更
class relative_URI {
    public function __construct() {
        add_action('get_header', array(&$this, 'get_header'), 1);
        add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
    }
    protected function replace_relative_URI($content) {
        $home_url = trailingslashit(get_home_url('/'));
        $top_url = preg_replace( '/^(https?:\/\/.+?)\/(.*)$/', '$1', $home_url );
        return str_replace( $top_url, '', $content );
    }
    public function get_header(){
        ob_start(array(&$this, 'replace_relative_URI'));
    }
    public function wp_footer(){
        ob_end_flush();
    }
}
$relative_URI = new relative_URI();

/** -------------------------------
 *
 *   管理画面
 *
 * ------------------------------ */

/**
 * ログイン画面 ロゴ変更
 */
function login_logo_image() {
  echo '<style type="text/css">
          #login h1 a {
            width: 100%;
            height: 80px;
            background: url(/common/img/logo.png) no-repeat !important;
            background-size: 100% auto !important;
            background-position: center center !important;
          }
        </style>';
}
add_action('login_head', 'login_logo_image');

//投稿メニューを非表示
function remove_menus () {
  global $menu;
  remove_menu_page( 'edit.php' );
}
add_action('admin_menu', 'remove_menus');

//管理画面にCSSを適用
function my_admin_style(){
    wp_enqueue_style( 'my_admin_style', get_template_directory_uri().'/css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'my_admin_style' );

// ビジュアルエディタ用CSS読み込み
add_editor_style('css/editor-style.css');

function custom_editor_settings( $initArray ) {
    $initArray['body_class'] = 'editor-area';
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

//エディタ 自動整形無効
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_content', 'wptexturize' );
//
// function override_mce_options( $init_array ) {
//     global $allowedposttags;
//
//     $init_array['valid_elements']          = '*[*]';
//     $init_array['extended_valid_elements']= '*[*]';
//     $init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
//     $init_array['indent']                  = true;
//     $init_array['wpautop']                = false;
//     $init_array['force_p_newlines']        = false;
//
//     return $init_array;
// }
// add_filter( 'tiny_mce_before_init', 'override_mce_options' );

add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content) {
    global $post;
    $remove_filter = false;

    $arr_types = array('page'); 
    $post_type = get_post_type( $post->ID );
    if (in_array($post_type, $arr_types)) $remove_filter = true;

    if ( $remove_filter ) {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
    }

    return $content;
}

/** -------------------------------
 *
 *   カスタム投稿
 *
 * ------------------------------ */


/*
add_action( 'init', 'create_post_type' );

function create_post_type() {

    //カスタム投稿タイプ１（ここから）
    register_post_type(
        'Blog',
    array(

        'labels' => array(
            'name' => __( 'Blog' ),
            'singular_name' => __( 'Blog' )
            ),
            'public' => true,
            'menu_position' =>5,
            )


      $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive'   => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'author', )
      );

      register_post_type( 'blog', $args );

      //ブログのタクソノミ
      $args = array(
        'hierarchical' => true,
        'label' => 'Category',
        'show_ui' => true,
        'query_var' => true,
        'singular_label' => 'Category',
        'rewrite' => array( 'slug' => 'blog' ),
      );
      register_taxonomy( 'blog_cat', 'blog', $args );
  
    )

    );
    //カスタム投稿タイプ１（ここまで）

    //カスタム投稿タイプ２（ここから）
    register_post_type(

    'info',
    array(
        'labels' => array(
        'name' => __( 'Info' ),
        'singular_name' => __( 'Info' )
        ),
        'public' => true,
        'menu_position' =>5,
        )
    )


    );
    //カスタム投稿タイプ２（ここまで）


}    */

add_action( 'init', 'create_post_type' );  
function create_post_type() {  
    //お知らせ  
    register_post_type( 'blog',  
        array(  
          'label' => 'Blog',  // 管理画面の左メニューに表示されるテキスト  
          'public' => true,  // 投稿タイプをパブリックにするか否か  
          'has_archive' => true,  // アーカイブを有効にするか否か  
          'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置  
          'supports' => $EditorStyle,  // 投稿画面でどのmoduleを使うか的な設定  
                'rewrite' => array(  
                    'single' => 'menu',  
                    'with_front' => false  
                )  
            )  
    );  
    //スタッフブログ  
    register_post_type( 'info',  
        array(  
        'label' => 'Information',   
        'public' => true,   
        'has_archive' => true,   
        'menu_position' => 6,   
        'supports' => $EditorStyle,   
            'rewrite' => array(  
                'single' => 'menu',  
                'with_front' => false  
            )  
        )  
    );  
  
    //お知らせ-カテゴリ  
    register_taxonomy(  
        'blog-cat',  // 追加するタクソノミー名（英小文字とアンダースコアのみ）  
        'blog',  // どのカスタム投稿タイプに追加するか  
        array(  
            'label' => 'カテゴリー',  // 管理画面上に表示される名前（投稿で言うカテゴリー）  
            'labels' => array(  
                'all_items' => 'カテゴリ一覧',  // 投稿画面の右カラムに表示されるテキスト（投稿で言うカテゴリー一覧）  
                'add_new_item' => 'カテゴリの追加'  // 投稿画面の右カラムに表示されるカテゴリ追加リンク  
            ),  
            'hierarchical' => true,  // タクソノミーを階層化するか否か（子カテゴリを作れるか否か）  
            'rewrite' => array(  
                'single' => 'menu/category',  
                'with_front' => false  
            ),  
            'public' => true,  
            'show_ui' => true  
        )  
    );  
  
    //お知らせ-Tag  
    register_taxonomy(  
        'blog-tag',   
        'blog',   
        array(  
            'hierarchical' => false,   
            'update_count_callback' => '_update_post_term_count',  
            'label' => 'Tag',  
            'singular_label' => 'Tag',  
            'public' => true,  
            'show_ui' => true  
        )  
    );  
  
    //スタッフブログ-カテゴリ  
    register_taxonomy(  
        'info-cat',   
        'info',   
        array(  
            'label' => 'カテゴリー',   
            'labels' => array(  
                'all_items' => 'カテゴリ一覧',   
                'add_new_item' => 'カテゴリの追加'   
            ),  
            'hierarchical' => true,  
            'rewrite' => array(  
                'single' => 'menu/category',  
                'with_front' => false  
            ),  
            'public' => true,  
            'show_ui' => true  
        )  
    );  
  
    //スタッフブログ-Tag  
    register_taxonomy(  
        'info-tag',   
        'info',   
        array(  
            'hierarchical' => false,   
            'update_count_callback' => '_update_post_term_count',  
            'label' => 'Tag',  
            'singular_label' => 'Tag',  
            'public' => true,  
            'show_ui' => true  
        )  
    );  
} 


