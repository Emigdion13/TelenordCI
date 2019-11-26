<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Avoid to Call 'get_instance' more than one time.
$CI = &get_instance();

$CI->load->language('template');
$CI->load->helper('language');
$CI->load->model('core/mdl_main_menu');

/**
 * Template Library
 * @author RRR
 */
class template {

    // Components
    private $components;
    private $main_component = null;
    private $main_id_instance;
    private $template_file = 'core/backend/index';
    private $template_data = array();
    private $CI = NULL;
    // WR:
    private static $user_properties = array();

    /**
     * Class Constructor
     * @access public
     */
    public function __construct() {        
        $this->CI = &get_instance(); 

        $this->template_data['page_content'] = array(
            'title' => '',
            'header' => TRUE,
            'menu' => TRUE,
            'footer' => TRUE,
            'javascript' => array(),
            'css_file' => array(),
            'css' => array(),
            'button_bar' => array()
        );

        self::$user_properties = $this->CI->profile->get()->getProperties();
    }

    /**
     * Set Template File Path
     * @access public
     * @param string $template Template File ( default: 'template/backend' )
     * @return void
     */
    public function set_template($template = 'core/backend/index') {
        $this->template_file = $template;
        return $this;
    }

    /**
     * Set Title Tag
     * @access public
     * @param string $title
     * @return void
     */
    public function set_title($title = '') {
        $this->template_data['page_content']['title'] = $title;
        return $this;
    }

    /**
     * Get Title
     * @access public
     * @return string
     */
    public function get_title() {
        return $this->template_data['page_content']['title'];
    }

    /**
     * Enable Template Header
     * @access public
     * @param boolean $enabled
     * @return void
     */
    public function enable_header($enabled = TRUE) {
        $this->template_data['page_content']['header'] = $enabled;
        return $this;
    }

    /**
     * Enable Template Menu
     * @access public
     * @param boolean $enabled
     * @return void
     */
    public function enable_menu($enabled = TRUE) {
        $this->template_data['page_content']['menu'] = $enabled;
        return $this;
    }

    /**
     * Enable Template Footer
     * @access public
     * @param boolean $enabled
     * @return void
     */
    public function enable_footer($enabled = TRUE) {
        $this->template_data['page_content']['footer'] = $enabled;
        return $this;
    }

    /**
     * Set System Alert
     * @access public
     * @param string $message
     * @return void
     */
    public function alert($message) {
        $this->template_data['page_content']['alert'] = $message;
    }

    /**
     * Set Navigation (Breadcrumbs)
     * @access public
     * @param string $title Section Title
     * @param array $path An array containing the path to reach this section. Format: array('Main Section' => 'controller/method', 'Parent Section' => 'controller/method' )
     * @param string[optional] $icon Path of the section img relative to /public/img/
     * @return void
     */
    public function set_nav($title, $path, $icon = null) {
        $this->template_data['page_content']['breadcrumbs_title'] = $title;
        $this->template_data['page_content']['breadcrumbs'] = $path;
        $this->template_data['page_content']['breadcrumbs_icon'] = $icon;
        return $this;
    }

    /**
     * Set Sidebar
     * Shows a sidebar on the template. If no value is given, it shows the default sidebar (template/sidebar.php), else, it shows the
     * sidebar file specified in $path
     * @access public
     * @param string[optional] $path File path of the custom sidebar to use
     * @return void
     */
    public function set_sidebar($path = null) {
        if ($path === FALSE) {
            return $this;
        }
        if (!$path) { // Show Default Sidebar
            $this->template_data['page_content']['sidebar'] = '';
        } else { // Show Custom
            $this->template_data['page_content']['sidebar'] = $path;
        }
        return $this;
    }

    /**
     * Set Javascript
     * Add <script type="text/javascript"> tags to the template. You can repeat
     * this method any times or send an array containing all the JS that you
     * are going to use in the template
     * $this->template->set_js('file.js')
     * $this->template->set_js(array('file1.js', 'file2.js'));
     * $this->template->set_js('controller/method');
     * @access public
     * @param string $file File path of the Javascript file, relative to /public/js/
     * @return void
     */
    public function set_js($file, $relative = TRUE) {
        if (!is_array($file))
            $file = array($file);

        foreach ($file as $f) {
            if (!preg_match('/^http/', $f))
                $f = preg_replace('/(\.js)$/', '', trim($f, '/')) . '.js';
            if ($relative) {
                $this->template_data['page_content']['javascript'][] = $f;
            } else {
                if (!preg_match('/^http/', trim($f, '/'))) {
                    $this->template_data['page_content']['javascript'][] = base_url() . 'public/js/' . $f;
                } else {
                    $this->template_data['page_content']['javascript'][] = $f;
                }
            }
        }

        return $this;
    }

    /**
     * Set CSS File
     * $this->template->set_css_file('file.css')
     * $this->template->set_css_file(array('file1.css', 'file2.css'));
     * @access public
     * @param string $file File path of the CSS file, relative to /public/css/
     * @return void
     */
    public function set_css_file($file) {
        if (!is_array($file))
            $file = array($file);

        foreach ($file as &$f) {
            $f = preg_replace('/(\.css)$/', '', trim($f, '/')) . '.css';
        }

        $this->template_data['page_content']['css_file'] = array_merge($this->template_data['page_content']['css_file'], $file);

        return $this;
    }

    /**
     * Set CSS
     * $this->template->set_css('#id div.class { font-weight: bold }');
     * @access public
     * @param string $file File path of the CSS file, relative to /public/css/
     * @return void
     */
    public function set_css($css) {
        $this->template_data['page_content']['css'][] = $css;
        return $this;
    }

    /**
     * Set Message
     * @param string $message
     * @param string[optional] $type Type of message(error|warning|success)
     * @param boolean Show Icon
     */
    public function set_message($message, $type = '', $no_icon = FALSE) {
        $this->template_data['page_content']['message'] = array(
            'message' => $message,
            'type' => $type,
            'no_icon' => $no_icon
        );
        return $this;
    }

    /**
     * Set Button
     * @access public
     * @param string $label Button Label
     * @param string $href href value relative to base_url
     * @param string $role Role needed to show button
     *
     */
    public function set_button($label, $href, $role = NULL) {
        if (!$role || $this->CI->auth->has_role($role)) {
            $i = count($this->template_data['page_content']['button_bar']);
            $this->template_data['page_content']['button_bar'][$i] = array(lang('tpl_' . $label), $href, $label);
        }
        return $this;
    }

    /**
     * Set Buttons
     * @access public
     * @param array Buttons, Format:         
     * 		array(
     * 			array('label', '#'),
     * 			array('label', 'controller/action')
     * 		);
     */
    public function set_buttons($array) {
        if (!is_array($this->template_data['page_content']['button_bar'])) {
            $this->template_data['page_content']['button_bar'] = array();
        }

        foreach ($array as $a) {
            $a[2] = $a[0];
            $a[0] = lang('tpl_' . $a[0]);
            $this->template_data['page_content']['button_bar'][] = $a;
        }

        return $this;
    }

    // WR
    // Auto detect what controller called 'show' method and find 
    // view based on thats name.
    private function getViewByControllerMethod() {
        $backtrace = debug_backtrace();
        $controller = $backtrace[2]['class'];
        $method = $backtrace[2]['function'];

        $backtrace[1]['file'] = str_replace('\\', '/', $backtrace[1]['file']);

        $_prefix = substr($backtrace[1]['file'], 0, stripos($backtrace[1]['file'], 'controllers'));
        $_prefix = str_replace($_prefix . 'controllers', '', $backtrace[1]['file']);
        $_prefix = str_replace($controller . '.php', '', $_prefix);
        $_prefix = $_prefix == '/' ? '' : $_prefix;

        // Array(PATH_COMPLETE,_pref,controller,method)
        return array(($_prefix . $controller . '/' . $method), $_prefix, $controller, $method);
    }

    /**
     * Show Template
     * Equivalent to $this->load->view('template', $data). This function renders
     * the template after specifying the content template and the array of
     * values to extract as variables
     * @access public
     * @param string $template File path of the Content file, relative to CodeIgniter's View Directory
     * @param string[optional] $data Array of values
     * @return void
     */
    public function show($template = null, $data = array(), $return = null) {
        // WR: detect view name based on method of controller, only pass Data values
        $_controller = $this->getViewByControllerMethod();
        if (is_array($template) || $template === null) {
            $data = $template;
            $template = $_controller[0];
        }

        // Check if some JS or CSS exists with the same name of this views and load it automaticly.
        // firstly add __construct.js/css after any other js/css of this module
        if (file_exists('./public/js/' . $_controller[1] . '/' . $_controller[2] . '/__construct.js')) {
            $this->set_js($_controller[1] . '/' . $_controller[2] . '/__construct');
        }
        if (file_exists('./public/css/' . $_controller[1] . '/' . $_controller[2] . '/__construct.css')) {
            $this->set_css_file($_controller[1] . '/' . $_controller[2] . '/__construct');
        }
        if (file_exists('./public/js/' . $template . '.js')) {
            $this->set_js($template);
        }
        if (file_exists('./public/css/' . $template . '.css')) {
            $this->set_css_file($template);
        }

        $this->template_data['page_content']['filepath'] = $template;

        $values = $this->template_data;

        if (is_array($data)) {
            $values = array_merge($values, $data);
        }

        if ($return) {
            return $this->CI->load->view($this->template_file, $values, true);
            exit();
        }
        $this->CI->load->view($this->template_file, $values);
        $this->template_data = null;
    }

    /**
     * Menu Orientation based on user logged
     * top|left
     * @author WR.
     * @date 2014-01-15
     * @return null|string
     */
    public static function menu_orientation() {
        return self::$user_properties['menu_orientation'];
    }
    
    public static function theme_color() {
        return self::$user_properties['theme'];
    }

    /**
     * Print HTML menu recursively
     *
     * @param        $menu
     * @param string $liClass
     */
    public static function echo_menu_recursively($menu, $menu_orientation = 'top') {
        global $CI;

        // Default
        $liClass = 'submenu';
        $ulClass = '';
        $showImage = false;

        $sub_link = '';

        switch ($menu_orientation) {
            case 'left':
                $ulClass = 'sub-nav';
                $showImage = true;
                $sub_link = '<a class="menu-hasChild"></a>';
                break;
        }
        $img = '';
        if ($showImage) {
            $img = '<img src="img/control_panel/' . $menu->name . '.png" alt="' . $menu->name . '">';
        }
        $childMenus = $CI->mdl_main_menu->get_menu_childs($menu->id);
        if ($childMenus) {
            printf('<li class="%s">%s', $liClass, $sub_link);
            printf('<a %s class="submenu-background" title="%s">%s</a>',
                (($menu->link && $CI->mdl_main_menu->isMenuOnRoles($menu->name)) ? 'href="' . site_url($menu->link) . '"' : ''),
                lang($menu->name),
                ($img . ($showImage ? '<span>' : '') . lang($menu->name) . ($showImage ? '</span>' : ''))
            );
            printf('<ul class="%s">', $ulClass);
            foreach ($childMenus as $c) {
                self::echo_menu_recursively($c, $menu_orientation);
            }
            echo '</ul>';
            echo '</li>';
            return;
        }
        $uri = $CI->uri->segment(1) . '/' . $CI->uri->segment(2);

        printf('<li><a href="%s"%s title="%s">%s</a></li>', site_url($menu->link), ($uri == $menu->link ? ' class="selected"' : ''), lang($menu->name), ($img . ($showImage ? '<span>' : '') . lang($menu->name) . ($showImage ? '</span>' : ''))
        );
    }

    public function show_template($view, $data)
    {
        $this->CI->load->view('hf/header', $this->template_data);
        $this->CI->load->view($view, $data);
        $this->CI->load->view('hf/footer');

    }
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
