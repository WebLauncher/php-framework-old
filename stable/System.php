<?php
/**
 * System class
 */
/**
 *
 */

define('DS', DIRECTORY_SEPARATOR);
define('SYS_VERSION', '2.6.10');

/**
 * System CLass
 * @example global $page
 * @example In page: $this->system
 * @package WebLauncher\System
 */
class System
{
    /**
     * @var string $title Page Title
     */
    public $title = 'Title not assigned!';
    /**
     * @var string $doctype Doctype text
     */
    public $doctype = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
    /**
     * @var string $html_tag Html tag to use for template
     */
    public $html_tag = '<html xmlns="http://www.w3.org/1999/xhtml">';
    /**
     * @var string $body_tag Body tag to use for template
     */
    public $body_tag = '<body>';
    /**
     * @var string $content_type Content type setting
     */
    public $content_type = 'text/html; charset=UTF-8';
    /**
     * The setting of the tile in the database
     * @var string $title_setting
     */
    public $title_setting = 'general_page_title';
    /**
     * @var flag if page is live
     */
    public $live = false;
    /**
     * @var flag if administrative zone
     */
    public $admin = 0;
    /**
     * @var page query
     */
    public $query = '';
    /**
     * @var page subqueries array
     */
    public $sub_query = array();
    /**
     * @var page content
     */
    public $content = 'home';
    /**
     * @var page components
     */
    public $components = array();
    /**
     * @var page component
     */
    public $component = '';
    /**
     * @var Subcomponents Name
     */
    public $subcomponent = '';
    /**
     * @var page meta tags array
     */
    public $meta_tags = array();
    /**
     * @var page metas get from db enabled
     */
    public $metas_enabled = true;
    /**
     * @var page skin
     */
    public $skin = 'default';
    /**
     * @var page default skin
     */
    public $default_skin = 'default';
    /**
     * @var Skins Folder ( default:'skins/' )
     */
    public $skins_folder = 'skins/';
    /**
     * @var skin server path
     */
    public $skin_server_path = '';
    /**
     * @var assets server path
     */
    public $assets_server_path = '';
    /**
     * @var page default module
     */
    public $default_module = 'site/';
    /**
     * @var page module
     */
    public $module = '';
    /**
     * @var current module user type for authentication
     */
    public $module_user_type = '';
    /**
     * @var Modules folder path
     */
    public $modules_folder = 'modules';
    /**
     * @var current actions array
     */
    public $actions = array();
    /**
     * @var Actions executed list
     */
    public $actions_executed = array();
    /**
     * @var current errors array
     */
    public $errors = array();

    /**
     * Error log files path e.g. /home/errors/
     * @var unknown_type
     */
    public $error_log_path = '';

    /**
     * Error log e-mail to send fatal errors
     */
    public $error_log_email = "";

    /**
     * @var current messages array
     */
    public $messages = array();
    /**
     * @var history array
     */
    public $history = array();
    /**
     * @var flag for history active
     */
    public $history_active = true;
    /**
     * @var paths array
     */
    public $paths = array();
    /**
     * @var flag if should connect to database
     */
    public $db_conn_enabled = true;
    /**
     * @var database connection
     */
    public $db_conn;
    /**
     * @var database connections array
     */
    public $db_connections = array();
    /**
     * @var objects array
     */
    public $objects = array();
    /**
     * @var Objects Folder
     */
    public $objects_folder = 'objects';
    /**
     * Check cookies flag
     */
    public $check_cookies = false;
    /**
     * Cookies enabled flag
     */
    public $cookies_enabled = false;
    /**
     * @var session var
     */
    public $session = '';
    /**
     * @var session manager class
     */
    public $session_manager = '';
    /**
     * @var session cookie
     */
    public $session_cookie = 'default_session_cookie';

    /**
     * @var session default timeout
     */
    public $session_timeout = 1800;

    /**
     * @var session cookie module
     */
    public $session_cookie_module = '';

    /**
     * @var user data array
     */
    public $user = '';
    /**
     * @var trace activation flag [true/false]
     */
    public $trace = false;
    /**
     * @var trace string
     */
    public $trace_page = '';
    /**
     * @var debug activation flag
     */
    public $debug = true;
    /**
     * Database tables
     * @var unknown_type
     */
    public $tables = array();
    /**
     * @var database tables
     */
    public $user_types_tables = array();
    /**
     * @var flag if pagination from db is enabled
     */
    public $pagination_enabled = true;
    /**
     * @var pagination array
     */
    public $pagination = array(0 => 10);
    /**
     * @var current page number
     */
    public $page_no = 1;
    /**
     * @var current page skip number
     */
    public $page_skip = 0;
    /**
     * @var current page offset number
     */
    public $page_offset = 10;
    /**
     * @var current page total rows
     */
    public $no_total_rows = -1;
    /**
     * @var current number of pages
     */
    public $no_pages = 0;
    /**
     * @var page files manager
     */
    public $files_manager;
    /**
     * @var files manager folder
     */
    public $files_folder = 'files/';
    /**
     * @var files manager allowed upload extensions
     */
    public $upload_allowed_extensions = array(
        'png',
        'jpeg',
        'gif',
        'bmp',
        'doc',
        'pdf',
        'zip',
        'jpg',
        'mp4',
        'wmv',
        'mpeg',
        'avi',
        '3gp',
        'MP4',
        'swf',
        'docx',
        'ppt',
        'pptx',
        'xls',
        'xlsx'
    );
    /**
     * @var page restricted flag
     */
    public $restricted = false;
    /**
     * @var page state array
     */
    public $state;
    /**
     * @var check login on page flag
     */
    public $check_login = false;
    /**
     * Custom login messages
     * @var unknown_type
     */
    public $login_messages = array(
        'active' => 'User is not activated!',
        'deleted' => 'User is deleted!',
        'valid' => 'User is invalid!',
        'success' => 'You are logged in!',
        'no_user' => 'The given username does not exist!',
        'no_pass' => 'The password you provided is invalid!'
    );
    /**
     * @var Show/Hide Log-in messages
     */
    public $show_login_messages = true;
    /**
     * @var user authenticated flag
     */
    public $logged = false;
    /**
     * @var validation manager
     */
    public $validate;
    /**
     * @var form valid flag
     */
    public $valid = true;
    /**
     * @var page crypt key
     */
    public $crypt_key = 'default';
    /**
     * @var flag if settings are enabled
     */
    public $settings_enabled = true;
    /**
     * @var page settings array
     */
    public $settings = array();
    /**
     * @var render entire page flag
     */
    public $render_all = true;
    /**
     * @var page multilanguage flag
     */
    public $multi_language = false;
    /**
     * @var index page object
     */
    public $obj_index;
    /**
     * Mail sender type
     * @var unknown_type
     */
    public $mail_type = 'mail';
    /**
     * Mail host
     * @var unknown_type
     */
    public $mail_host = 'localhost';
    /**
     * SMTP mail user
     * @var unknown_type
     */
    public $mail_user = '';
    /**
     * SMTP mail password
     * @var unknown_type
     */
    public $mail_password = '';
    /**
     * SMTP Host port
     * @var unknown_type
     */
    public $mail_port = 25;
    /**
     * SMTP ssl active
     * @var
     */
    public $mail_ssl = false;

    /**
     * E-mail default parameters
     */
    public $mail_defaults = array(
        'subject' => 'system new e-mail',
        'from' => 'from@website.com',
        'fromname' => 'system from name',
        'reply_to' => 'no-reply@website.com',
        'reply_name' => 'system reply name',
        'attachments' => array(),
        'mail_in' => 'to',
        'sender' => '',
        'others' => array()
    );
    /**
     * @var page scripts manager
     */
    public $script_manager = '';
    /**
     * @var New variable for scripts manager
     */
    public $scripts = '';
    /**
     * @var loaded libraries array
     */
    public $loaded_libraries = array();
    /**
     * @var system libraries
     */
    public $libraries = array();
    /**
     * @var array $libraries_settings Libraries settings
     */
    public $libraries_settings = array(
        'smarty' => array('version' => 'v2'),
        'wbl_locale' => array('type' => 'db','default'=>'en_US')
    );
    /**
     * @var memory used
     */
    public $memory = '';
    /**
     * @var Current page settings
     */
    public $page = array();
    /**
     * @var search engine optimization per page activated
     */
    public $seo_enabled = true;
    /**
     * @var tracking access is on
     */
    public $seo_tracking_enabled = false;
    /**
     * @var traking access mode (all|browser|robot)
     */
    public $seo_tracking_mode = 'all';
    /**
     * @var flag to secure request ( IDS )
     */
    public $secure_request_enabled = false;
    /**
     * @var Log-in Visits Logger ( for statistics )
     */
    public $visits_logs_enabled = false;
    /**
     * System Logger
     * @return
     */
    public $logger = '';
    /**
     * Page cache enabled
     */
    public $page_cache_enabled = false;
    /**
     * Cache enabled
     */
    public $cache_enabled = true;
    /**
     * Cache options
     */
    public $cache_options = '';
    /**
     * Cache enabled
     */
    public $no_cache = false;
    /**
     * @var Cache Folder ( default: 'cache/' )
     */
    public $cache_folder = 'cache';
    /**
     * Cache hash for current page caching
     */
    public $cache_hash = '';
    /**
     * @var New variable for files manager
     */
    public $uploads = '';

    /**
     * @var /DownloadManager $downloads Download manager object
     */
    public $downloads = '';
    /**
     *
     * @var array $download_allowed_extensions Download Manager allowed extensions and
     * filetypes
     */
    public $download_allowed_extensions = array();
    /**
     * Function used form downloading file (reaadfile, fpassthru, stream, xsendfile)
     * @var unknown_type
     */
    public $download_function = 'readfile';
    /**
     * Template engine
     * @var unknown_type
     */
    public $template = '';
    /**
     * DAL Models
     * @var unknown_type
     */
    public $models = '';
    /**
     * flag for enabling components builder
     * @var unknown_type
     */
    public $build_enabled = false;
    /**
     * flag for enabling components builder auto-build non-existing components
     * @var unknown_type
     */
    public $build_auto = false;
    /**
     * List of redirect links e.g. array('test'=>'site/?a=set:test') will redirect
     * website.com/test to website.com/site/?a=set:test
     * @var unknown_type
     */
    public $redirects = array();
    /**
     * Js files to be loaded
     * @var unknown_type
     */
    public $js_files = array();
    /**
     * CSS files to be loaded
     * @var unknown_type
     */
    public $css_files = array();

    /**
     * If SSL should be maintained
     * @var bool $maintain_ssl
     */
    public $maintain_ssl = false;

    /**
     * Hostname of the request
     * @var string $hostname
     */
    static $hostname = '';

    /**
     * Bowser IP
     * @var string $bowser_ip
     */
    public $browser_ip = '';

    /**
     * Render Type
     * @var string $render_type
     */
    public $render_type = 'all';

    /**
     * If 404 page is enabled
     * @var bool $enable_404
     */
    public $enable_404 = true;

    /**
     * Hocks Manager
     */
    public $hocks = null;

    /**
     * If script is run from console on from request
     */
    public $console = false;

    /**
     * Base url to use for paths when running from console
     */
    public $console_baseurl = '';

    /**
     * Flags if cronjobs from database should be run
     */
    public $console_cronjobs_db_enabled = true;

    /**
     * @var array $console_cronjobs_db_table Console cronjobs database table
     */
    public $console_cronjobs_db_table = array('name' => 'x_conf_cronjobs');

    /**
     * The e-mail manager class
     */
    public $mail = null;

    /**
     * System error message to display as 500 internal error
     */
    public $system_error = '';

    /**
     * System error show flag
     */
    public $system_error_enabled = true;
    /**
     * System config filename
     */
    public $config_file = 'php.config.php';

    /**
     * Constructor
     * @return null
     */
    function __construct()
    {
    }

    /**
     * Call magic method
     * @param string $name
     * @param array $args
     */
    function __call($name, $args)
    {
        switch($name) {
        case 'get_meta_tags' :
            return $$this->meta_tags;
            break;
        case 'call_404' :
            $this->_404();
            break;
        }
    }

    /**
     * Get magic method
     * @param string $name
     */
    function __get($name)
    {
        switch($name) {
        case 'browser' :
            return BrowserInfo::get(isset_or($_SERVER['HTTP_USER_AGENT']));
            break;
        case 'browser_ip' :
            return BrowserInfo::get_user_ip();
            break;
        case 'server' :
            return ServerInfo::get();
            break;
        case 'ispostback' :
            return (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST');
            break;
        case 'ajax' :
            return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
            break;
        case 'sys_version' :
            return SYS_VERSION;
            break;
        case 'ssl' :
            return isset($_SERVER['HTTPS']);
            break;
        case 'request_method' :
            return in_array(isset_or($_SERVER['REQUEST_METHOD'], 'GET'), array(
                'POST',
                'DELETE',
                'GET',
                'PUT'
            )) ? strtolower(isset_or($_SERVER['REQUEST_METHOD'], 'GET')) : 'get';
            break;
        }
    }

    /**
     * Import libraries
     * @param object $type ( 'dal', 'functions', 'classes')
     * @param object $file
     * @return
     */
    function import($type, $file)
    {
        return in_array($type, array(
            'dal',
            'class',
            'library',
            'file',
            'model'
        )) && $this->{"load_".$type}($file);
    }

    /**
     * Initialisation function
     * @return
     */
    function init()
    {
        // init autoload
        $this->_init_autoload();

        // init functions
        $this->_init_functions();

        // init configuration
        $this->_init_config();

        // init console
        $this->_init_console();

        // init hocks
        $this->_init_hocks();

        self::$hostname = self::get_hostname();

        $this->hocks->before_init();

        // init loggers
        $this->_init_loggers();

        // init paths
        $this->_init_paths();

        // init check system requirements
        $this->_init_check();

        // init trace
        $this->_init_trace();

        // init image modifier
        $this->_init_image_modifier();

        //init redirects
        $this->_init_redirects();

        // init module config
        $this->_init_module_config();

        // init mailer
        $this->_init_mail();

        // connect to database
        if ($this->db_conn_enabled) {
            // init DAL
            $this->_init_dal();

            // execute console
            if ($this->console)
                ConsoleManager::execute();

            // init minify
            $this->_init_minify();

            // pagination
            $this->_init_pagination();

            // get settings from db
            $this->_init_settings();

            // init session
            $this->init_session();

            // check if script file request
            $this->_init_js_script();

            // check if signature requested
            $this->_init_signature();

            // get user info
            $this->_init_user();

            // set language
            $this->_init_language();

            // set errors
            $this->_init_errors();

            // set messages
            $this->_init_messages();

            // secure link request and post
            $this->_init_security();

            // save history
            $this->_init_history();

            // validate if postback
            $this->_init_validation();

            // init uploads
            $this->_init_uploads();

            // download manager
            $this->_init_downloads();

            // clear state
            $this->_init_state();

            // check if authentication requested
            $this->_init_authentication();

            // get metas from db
            $this->_init_metas();

            // init title
            $this->_init_title();

            // apply page settings
            $this->_init_page_settings();
        }
        // init template manager
        $this->_init_template();

        // load objects
        $this->_init_objects();

        // init system error
        $this->_init_system_error();
        $this->hocks->after_init();
        $this->memory->save('system_after_init');
    }

    /**
     * Autoloader
     * @param string $name
     */
    function __autoload($name)
    {
        $results = array();
        preg_match_all('/[A-Z][^A-Z]*/', $name, $results);
        $file = __DIR__ . '/classes/objects/' . $name . '.php';
        if (isset($results[0]))
            if (count($results[0]))
                $file = __DIR__ . '/classes/' . strtolower(array_pop($results[0])) . 's/' . $name . '.php';
        if (file_exists($file))
            require_once $file;
        elseif (file_exists(__DIR__ . '/classes/objects/' . $name . '.php'))
            require_once __DIR__ . '/classes/objects/' . $name . '.php';
    }

    /**
     * Init autoloader
     */
    private function _init_autoload()
    {
        spl_autoload_register(array(
            $this,
            '__autoload'
        ));
    }

    /**
     * Init system error
     * @param string $code
     * @param string $message
     */
    private function _init_system_error($code = '500', $message = '')
    {
        if ($this->system_error_enabled && ($this->system_error || $message)) {
            $this->system_error = $message ? $message : $this->system_error;
            $err_file = $this->paths['root_code'] . $this->module . 'views/' . $this->skin . '/' . $code . '.tpl';
            if (!is_file($err_file)) {
                $err_file = $this->paths['root_code'] . $this->default_module . 'views/' . $this->skin . '/' . $code . '.tpl';
                $this->assign('code', $code);
                $this->assign('message', $this->system_error);
            }
            $status = $this->_header_status($code);
            if (is_file($err_file) && $this->template)
                $this->template->display($err_file);
            else
                echo '<h1>' . $status . '</h1>' . $this->system_error;
            exit();
        }
    }

    /**
     * System error trigger
     * @param string $code
     * @param string $message
     */
    public function system_error($code = 505, $message = '')
    {
        $this->_init_system_error($code, $message);
    }

    /**
     * Init mail attribute
     */
    private function _init_mail()
    {
        $this->import('library', 'mail');
        $this->mail = new EmailManager();
    }

    /**
     * Init console determination function
     */
    private function _init_console()
    {
        $this->console = defined('PHP_SAPI') && PHP_SAPI == 'cli';
        if ($this->console) {
            ConsoleManager::$system = &$this;
            ConsoleManager::init();
        }
    }

    /**
     * Init Trace function
     */
    private function _init_trace()
    {
        TraceManager::init();
    }

    /**
     * Init hock function
     */
    private function _init_hocks()
    {
        $this->hocks = new HocksManager();
    }

    /**
     * Add hock function
     * @param string $name
     * @param callable $function
     */
    public function add_hock($name, $function)
    {
        $this->hocks->add($name, $function);
    }

    /**
     * Init confguration function
     */
    private function _init_config()
    {
        global $page;
        if (defined('SYSTEM_CONFIG_FILE'))
            $this->config_file = SYSTEM_CONFIG_FILE;
        // configuration file
        if (isset($_SERVER["SCRIPT_FILENAME"]) && is_file(dirname($_SERVER["SCRIPT_FILENAME"]) . DS . $this->config_file))
            $this->import('file', dirname($_SERVER["SCRIPT_FILENAME"]) . DS . $this->config_file);
        elseif (defined('SYSTEM_CONFIG_PATH') && is_file(SYSTEM_CONFIG_PATH . $this->config_file))
            $this->import('file', SYSTEM_CONFIG_PATH . $this->config_file);
        if (substr($this->default_module, -1) !== '/')
            $this->default_module .= '/';
        $this->_init_debug();
    }

    /**
     * Init functions
     */
    private function _init_functions()
    {
        // general functions
        $this->import('file', __DIR__ . '/functions/system.php');
    }

    /**
     * Init loggers function
     */
    private function _init_loggers()
    {
        $this->logger = new SystemLogger($this->trace);
        $this->memory = new MemoryLogger($this->trace);
        $this->time = new TimeLogger($this->trace);

        $this->time->start('system');
        $this->memory->save('max', ini_get('memory_limit'), '%s');
        $this->memory->save('system_before_init');
    }

    /**
     * Init template function
     */
    private function _init_template()
    {
        global $smarty;
        $this->import('library', 'Smarty');
        $smarty = TemplatesManager::get_engine($this->libraries_settings['smarty']['version'], $this->paths['root_code'], $this->paths['root_cache'], $this->trace, $this->debug, $this->page_cache_enabled);
        $this->template = &$smarty;
        $this->change_template_dir($this->paths['root_code']);
        $this->change_cache_dir($this->paths['root_cache']);
        if (isset_or($_REQUEST['__clear_cache'])) {
            $current_url = str_replace('?__clear_cache=1', '', $this->paths['current_full']);
            $current_url = str_replace('&__clear_cache=1', '', $current_url);
            $this->cache_hash = base64_encode($current_url);
            $this->no_cache = true;
            TemplatesManager::clear_cache($this->cache_hash);
        }
    }

    /**
     * Init DAL function
     */
    private function _init_dal()
    {
        global $dal;

        if ($this->admin)
            $this->import('class', 'objects.BaseAdmin');
        else
            $this->import('class', 'objects.Base');

        // Data Access Layer
        $dal = new ModelsManager();
        $this->models = &$dal;
        $this->models->db = &$this->db_conn;
        $this->_db_connect();
    }

    /**
     * Init module configuration file
     */
    private function _init_module_config()
    {
        // check and import module config.php file
        if (defined('MODULE_CONFIG_PATH'))
            $this->import('file', MODULE_CONFIG_PATH . 'config.php');
        else
            $this->import('file', $this->paths['root_code'] . $this->module . 'config.php');
        $this->_init_debug();
        if (!isset($this->db_connections) || !is_array($this->db_connections) || !count($this->db_connections))
            $this->db_conn_enabled = false;
    }

    /**
     * Init debug settings
     */
    private function _init_debug()
    {
        ini_set('display_errors', $this->debug ? 1 : 0);
        error_reporting($this->debug ? E_ALL : 0);
    }

    /**
     * Check the requirements of the system if called
     */
    private function _init_check()
    {
        if ($this->trace && $this->debug && $this->content == '_check') {
            InstallInfo::display();
            die ;
        }
    }

    /**
     * Init image modifier
     */
    private function _init_image_modifier()
    {
        if ($this->content == 'img_mod') {
            ini_set('memory_limit', '128M');
            $this->load_library("images");
            $path = str_replace($this->paths['root'], $this->paths['dir'], $_REQUEST['_file']);

            $this->import('library', 'image');
            // get cache path
            $img_cache = $this->paths['root_cache'] . 'img_mod/';
            if (!is_dir($img_cache)) {
                if (!mkdir($img_cache, 0777, true)) {
                    $this->logger->log('Cache_Write_Error', 'Can not create dir "' . $dir . '" to cache folder!');
                    return false;
                }
            }
            @chmod($img_cache, 0777);
            $cache_filename = $_REQUEST['name'];
            $cache_path = $img_cache . $cache_filename;
            ImageManager::get_resized_image_proportional($path, isset_or($_REQUEST['_width']), isset_or($_REQUEST['_height']), isset_or($_REQUEST['_fit']), $cache_path, false);

            if (isset_or($_REQUEST['_w'])) {
                ImageManager::apply_watermarked($cache_path, $_REQUEST['_w'], isset_or($_REQUEST['_w_left'], 'left'), isset_or($_REQUEST['_w_top'], 'top'));
            }
            header('Content-Disposition: inline; filename="' . $_REQUEST['name'] . '"');
            ImageManager::output($cache_path);
            die ;
        }
    }

    /**
     * Init minify script
     */
    private function _init_minify()
    {
        if ($this->content == 'min') {
            header('Expires: Thu, 4 Oct 2014 20:00:00 GMT');
            $this->import('library', 'min');
            die ;
        }
    }

    /**
     * Init redirects
     */
    private function _init_redirects()
    {
        foreach ($this->redirects as $k => $v)
            if ($k . '/' == $this->query || $k == $this->query)
                $this->redirect(str_replace('//', $this->paths['root'], $v));
    }

    /**
     * Init page title
     */
    private function _init_title()
    {
        if (!$this->ajax)
            $this->title = isset($this->settings[$this->title_setting]) ? $this->settings[$this->title_setting]['value'] : $this->title;
    }

    /**
     * Init uploads manager
     */
    private function _init_uploads()
    {
        $this->files_manager = new FilesManager($this->files_folder, $this->paths['root'], $this->paths['root_dir']);
        $this->uploads = &$this->files_manager;
    }

    /**
     * Init downloads manager
     */
    private function _init_downloads()
    {
        $this->downloads = new DownloadManager();
    }

    /**
     * Init mesasges function
     */
    private function _init_messages()
    {
        $this->messages = isset($this->session['messages']) ? $this->session['messages'] : '';
    }

    /**
     * Init system paths
     */
    private function _init_paths()
    {
        $this_address = ($this->ssl ? 'https://' : 'http://') . isset_or($_SERVER['HTTP_HOST']);
        $application_name = dirname(isset_or($_SERVER['SCRIPT_NAME']));
        $this->paths['root'] = $this->console ? $this->console_baseurl : $this_address . (strlen($application_name) <= 1 ? '' : $application_name) . '/';
        $this->assets_server_path = $this->assets_server_path ? $this->assets_server_path : $this->paths['root'] . 'assets/';
        $this->paths['root_styles'] = $this->assets_server_path . 'styles/';
        $this->paths['root_images'] = $this->assets_server_path . 'images/';
        $this->paths['root_scripts'] = $this->assets_server_path . 'scripts/';
        $this->paths['root_objects'] = $this->paths['root'] . $this->objects_folder;
        $this->paths['dir'] = dirname(isset_or($_SERVER['SCRIPT_FILENAME'])) . DS;
        if ($this->console) {
            $included = get_included_files();
            $this->paths['dir'] = dirname($included[0]) . DS;
        }
        $this->paths['root_dir'] = $this->paths['dir'];
        $this->paths['root_code'] = $this->paths['dir'] . $this->modules_folder . DS;
        $this->paths['root_cache'] = $this->paths['dir'] . $this->cache_folder . DS;
        $this->paths['root_objects_inc'] = $this->paths['dir'] . $this->objects_folder . DS;

        $this->error_log_path = $this->paths['root_dir'];

        // set actions
        if (isset($_REQUEST['a'])) {
            $action = $_REQUEST['a'];
            $actions = explode(':', $action);
            $this->actions = $actions;
            $this->actions['all'] = $action;
        } elseif ($this->console) {
            $url = parse_url($this->query);
            parse_str(isset_or($url['query']));
            $action = isset_or($a);
            $actions = explode(':', $action);
            $this->actions = $actions;
            $this->actions['all'] = $action;
        }

        // pages selector
        $q = isset($_REQUEST['q']) ? $_REQUEST['q'] : $this->query;
        if ($this->console) {
            $url = parse_url($this->query);
            $q = $url['path'];
        }
        $this->set_query($q);

        // inexistent file request
        if (is_dir($this->subquery[0]))
            die('Inexistent module requested!');

        // component
        if (isset($this->subquery[2]))
            $this->component = $this->subquery[2];

        // subcomponent
        if (isset($this->subquery[3]))
            $this->subcomponent = $this->subquery[3];

        // components
        for ($i = 1; $i < count($this->subquery); $i++)
            if ($this->subquery[$i])
                $this->components[] = $this->subquery[$i];
        if (!isset($this->components[0]))
            $this->components[0] = 'home';

        // sub query init
        $this->subquery[0] = $this->module;
        $this->subquery[1] = $this->content;

        // page subpaths
        $spath = $this->paths['root'];
        foreach ($this->subquery as $k => $v) {
            if ($v) {
                if ($k > 1)
                    $spath .= '/' . $v;
                else
                    $spath .= $v;
                $this->paths['sub_paths'][$k] = $spath;
                if ($this->paths['sub_paths'][$k][strlen($this->paths['sub_paths'][$k]) - 1] != '/')
                    $this->paths['sub_paths'][$k] .= '/';
            }
        }

        // current link
        $this->paths['current'] = isset_or($this->paths['sub_paths'][count($this->paths['sub_paths']) - 1]);

        $this->paths['current_full'] = page_url();
        $this->cache_hash = base64_encode($this->paths['current_full']);
        $this->_init_cache();

        $this->paths['root_module'] = isset_or($this->paths['sub_paths'][0]);
        $this->paths['root_content'] = $this->paths['sub_paths'][1];
        if (isset($this->paths['sub_paths'][2]))
            $this->paths['root_component'] = $this->paths['sub_paths'][2];
        if (isset($this->paths['sub_paths'][3]))
            $this->paths['root_subcomponent'] = $this->paths['sub_paths'][3];

        $this->init_skin();
        $this->render_all = !$this->ajax;
        $this->render_type = $this->_get_render_type();
    }

    /**
     * Init system cache
     */
    private function _init_cache()
    {
        $this->no_cache = !$this->live;
        if (isset_or($_REQUEST['__nocache'])) {
            $this->page_cache_enabled = false;
            $this->no_cache = true;
        }
        if ($this->cache_enabled) {
            $this->import('library', 'stash');
            if (!$this->cache_options) {
                $this->cache_options = array('short' => array(
                        'type' => 'file',
                        'default' => true,
                        'options' => array('path' => $this->paths['root_cache'] . '_system/')
                    ));
            }
            $this->cache = new CacheManager($this->cache_options);
        }
    }

    /**
     * Init skin
     */
    function init_skin()
    {
        // set skins folders
        if ($this->module != '') {
            $skin_path = ($this->skin_server_path) ? $this->skin_server_path : $this->paths['root'] . $this->skins_folder;
            if (is_dir($this->paths['root_dir'] . $this->skins_folder . $this->skin . '/')) {
                $this->add_path('skin_images', $skin_path . $this->skin . '/' . $this->module . 'images/');
                $this->add_path('skin_scripts', $skin_path . $this->skin . '/' . $this->module . 'scripts/');
                $this->add_path('skin_styles', $skin_path . $this->skin . '/' . $this->module . 'styles/');
            } else {
                $this->add_path('skin_images', $skin_path . $this->default_skin . '/' . $this->module . 'images/');
                $this->add_path('skin_scripts', $skin_path . $this->default_skin . '/' . $this->module . 'scripts/');
                $this->add_path('skin_styles', $skin_path . $this->default_skin . '/' . $this->module . 'styles/');
            }
        } else {
            $this->add_path('skin_images', $this->paths['root_images']);
            $this->add_path('skin_scripts', $this->paths['root_scripts']);
            $this->add_path('skin_styles', $this->paths['root_styles']);
        }
    }

    /**
     * Get page settings from db
     */
    private function _init_page_settings()
    {
        if ($this->seo_enabled && isset($this->db_conn->tables['tbl_x_conf_pages']) && !$this->ajax) {
            $pagepath = $this->paths['current_full'];
            $pg = $this->models->x_conf_pages->get_cond('page="' . $pagepath . '"');
            if ($pg) {
                $params = array();
                $pg['views']++;
                $params['views'] = $pg['views'];

                $this->models->x_conf_pages->update($params, 'id=' . $pg['id']);
            } else {
                $params = array();
                $params['page'] = $pagepath;
                $params['views'] = 1;
                $params['active'] = 1;
                $params['title'] = $this->title;
                $params['keywords'] = $this->get_meta_tag('keywords') ? $this->get_meta_tag('keywords') : '';
                $params['description'] = $this->get_meta_tag('description') ? $this->get_meta_tag('description') : '';

                $id = $this->models->x_conf_pages->insert($params);
                $pg = $this->models->x_conf_pages->get($id);
            }
            $this->page = $pg;

            // apply settings
            $this->title = str_replace('%title%', $this->title, $this->page['title']);
            $this->set_meta_tag('keywords', $this->get_meta_tag('keywords') ? str_replace('%main%', $this->get_meta_tag('keywords'), $this->page['keywords']) : $this->page['keywords']);
            $this->set_meta_tag('description', $this->get_meta_tag('description') ? str_replace('%main%', $this->get_meta_tag('description'), $this->page['description']) : $this->page['description']);
        }
    }

    /**
     * Save the page settings if not saved
     */
    function save_page_settings()
    {
        if ($this->seo_enabled && $this->db_conn_enabled && !$this->ajax) {
            $pagepath = $this->paths['current_full'];
            $pg = $this->models->x_conf_pages->get_cond('page="' . $pagepath . '"');
            if ($pg) {
                $params = array();
                $pg['views']++;
                $params['views'] = $pg['views'];
                $this->models->x_conf_pages->update($params, 'id=' . $pg['id']);
            } else {
                $params = array();
                $params['page'] = $this->paths['current_full'];
                $params['views'] = 1;
                $params['active'] = 1;
                $params['title'] = $this->title;
                $params['keywords'] = $this->get_meta_tag('keywords') ? $this->get_meta_tag('keywords') : '';
                $params['description'] = $this->get_meta_tag('description') ? $this->get_meta_tag('description') : '';

                $id = $this->models->x_conf_pages->insert($params);
            }

            if ($this->seo_tracking_enabled && isset($this->db_conn->tables['tbl_xpages_tracking'])) {
                $params = array();
                $params['url'] = $pagepath;
                $params['datetime'] = nowfull();
                if (($this->seo_tracking_mode == 'all' || $this->seo_tracking_mode == 'robot') && $this->browser['type'] == 'robot')
                    $params['crawler'] = $this->browser['browser'];
                if (($this->seo_tracking_mode == 'all' || $this->seo_tracking_mode == 'browser') && $this->browser['type'] == 'browser') {
                    $params['browser'] = $this->browser['browser'];
                    $params['referer_url'] = isset_or($_SERVER["HTTP_REFERER"]);
                    $params['client_ip'] = $this->browser_ip;
                    $params['session_hash'] = session_id();
                }
                $this->models->x_conf_pages_tracking->insert($params);
            }
        }
    }

    /**
     * Init validation PHP/Javascript
     */
    private function _init_validation()
    {
        $this->validate = new FormsManager();
        $this->validate->init();
    }

    /**
     * Display js generated script
     */
    private function _init_js_script()
    {
        if (strpos($this->subquery[1], 'script_file_') !== FALSE) {
            header('Content-Type: application/javascript');
            header('Expires: Thu, 4 Oct 2014 20:00:00 GMT');
            header('Cache-Control: public, max-age=31536000');
            header('Last-Modified: ' . date('D, j M Y G:i:s T'));

            echo @$this->session['script'];
            unset($this->session['script']);
            @$this->save_session();

            exit();
            die();
        }
        // scripts manager
        $this->scripts = new ScriptManager();
    }

    /**
     * Get meta tags from db
     */
    private function _init_metas()
    {
        if (!$this->ajax && $this->metas_enabled)
            if (isset($this->db_conn->tables['tbl_xmetas'])) {
                $query = 'select `name`,`content` from ' . $this->db_conn->tables['tbl_x_conf_metas'] . ' where is_active=1';
                $metas = $this->db_conn->getAll($query);
                foreach ($metas as $v)
                    $this->set_meta_tag($v['name'], $v['content']);
            }
    }

    /**
     * Get settings from the database table 'x_conf_sys_settings'
     * @return
     */
    private function _init_settings()
    {
        if ($this->settings_enabled && isset($this->db_conn->tables['tbl_x_conf_sys_settings'])) {
            $query = 'select * from ' . $this->db_conn->tables['tbl_x_conf_sys_settings'];
            $arr = $this->db_conn->getAll($query);
            $return = array();
            foreach ($arr as $k => $v) {
                if ($v['type'] == "id") {
                    $query = "select `" . $v['from_field'] . "` from `" . $v['from_table'] . "` where id=" . $v['value'];
                    $return[$v['name']] = array(
                        "value" => $this->db_conn->getOne($query),
                        "id" => $v['value']
                    );
                } else
                    $return[$v['name']] = array("value" => $v['value']);
            }
            $this->settings = $return;
        }
    }

    /**
     * Generates a init_signature image
     */
    private function _init_signature()
    {
        if (isset($this->actions[0]) && $this->actions[0] == 'signature_reset') {
            unset($this->session['signature']);
            $this->actions[0] = 'signature';
        }
        if (isset($this->actions[0]) && $this->actions[0] == 'signature') {
            $obj = new SignatureManager($this->session);
            $obj->display(5, dirname(__FILE__) . '/font.ttf');
            $this->save_session();
            die ;
        }
    }

    /**
     * Secures data tranfered from the client
     */
    private function _init_security()
    {
        if ($this->secure_request_enabled) {
            $this->import('library', 'ids');
        }
    }

    /**
     * Inititalize history array
     */
    private function _init_history()
    {
        if ($this->history_active) {
            $history = '';
            $history = new HistoryManager($this->session, $this->ajax ? '' : $this->paths['current_full']);
            $this->history = $history->get_history();
        }
    }

    /**
     * Init current language
     */
    private function _init_language()
    {
        // set locale
        if ($this->multi_language) {
            if (!isset($this->session['language_id'])) {
                if ($this->admin) {
                    if (isset($this->settings['admin_default_language']['id']))
                        $this->session['language_id'] = $this->settings['admin_default_language']['id'];
                    else
                        $this->logger->log('settings_error', 'Setting field "admin_default_language" not found!');
                } else {
                    if (isset($this->settings['default_language_id']['id']))
                        $this->session['language_id'] = $this->settings['default_language_id']['id'];
                    else
                        $this->logger->log('settings_error', 'Setting field "default_language_id" not found!');
                }
            }
            // check if language change requested
            if (isset($_REQUEST['language'])) {
                $this->session['language_id'] = $_REQUEST['language'];
                $this->redirect($this->paths['current']);
            }
            $language = $this->db_conn->getRow('select * from ' . $this->db_conn->tables['tbl_x_conf_languages'] . ' where id=' . $this->session['language_id']);
            if (strtolower($this->browser['os']) == 'windows' && isset_or($language['locale_win']))
                $locale = $language['locale_win'];
            elseif (isset_or($language['locale_linux']))
                $locale = $language['locale_linux'];
            else
                $locale = $this->libraries_settings['wbl_locale']['default'];

            $domain = 'messages';
            putenv('LANG=' . $locale);
            setlocale(LC_ALL, $locale);
            if (!function_exists("gettext")) {
                $this->import('library', 'gettext');
                T_setlocale(LC_ALL, $locale);
            }
            textdomain($domain);
            bindtextdomain($domain, $this->paths['root_dir'] . 'Locale');
            bind_textdomain_codeset($domain, 'UTF-8');
        }
    }

    /**
     * Init pagination information
     */
    private function _init_pagination()
    {
        if ($this->pagination_enabled) {
            $p = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
            $this->page_no = $p;

            $this->page_offset = isset($this->pagination[0]) ? $this->pagination[0] : 10;

            // calculate page skip
            if ($this->page_no > 1)
                $this->page_skip = ($this->page_no - 1) * $this->page_offset;
        }
    }

    /**
     * Get meta tag by name
     * @param string $name
     * @return string
     */
    function get_meta_tag($name)
    {
        return isset($this->meta_tags[$name]) ? $this->meta_tags[$name]['content'] : '';
    }

    /**
     * Set meta tag by name and value
     * @param string $name
     * @param string $content
     */
    function set_meta_tag($name, $content)
    {
        if (isset($this->meta_tags[$name]))
            $this->meta_tags[$name]['content'] = $content;
        else
            $this->meta_tags[$name] = array(
                'name' => $name,
                'content' => $content
            );
    }

    /**
     * Add js file to be loaded
     * @param string $file
     * @param bool $local
     * @param string $type
     */
    function add_js_file($file, $local = true, $type = 'text/javascript')
    {
        $file = str_replace(isset_or($this->paths['skin_scripts']), '{$skin_scripts}', $file);
        $file = str_replace(isset_or($this->paths['root_scripts']), '{$root_scripts}', $file);
        $this->js_files[$file] = array(
            'src' => $file,
            'local' => $local,
            'type' => $type
        );
    }

    /**
     * Save in session the current js files
     */
    function save_js_files()
    {
        $this->session['__js_files'] = array();
        $js_files = $this->js_files;

        $this->js_files = array();
        $group = 0;
        $module = str_replace('/', '', $this->module);
        foreach ($js_files as $k => $v)
            if (isset_or($v['src'])) {
                if ($v['local']) {
                    $this->session['__js_files'][$group][] = str_replace('{$skin_scripts}', '//skins/' . $this->skin . '/' . $this->module . 'scripts/', str_replace('{$root_scripts}', '//assets/scripts/', $v['src']));
                    $this->add_js_file($this->paths['root'] . 'min/?g=js_site' . $group . '&module=' . $module . '&ck=' . $this->session_cookie . '&skin=' . $this->skin, false);
                } else {
                    $this->add_js_file($v['src'], false, $v['type']);
                    $group++;
                }
            }

        $this->save_session();
        $this->assign('p', $this->get_page());
    }

    /**
     * Add css file to be loaded
     * @param string $file
     * @param string $type
     * @param string $media
     * @param string $browser_cond
     */
    function add_css_file($file, $type = 'text/css', $media = 'screen, projection', $browser_cond = '')
    {
        $this->css_files[$file] = array(
            'href' => $file,
            'type' => $type,
            'media' => $media,
            'browser_cond' => $browser_cond
        );
    }

    /**
     * System render
     */
    function render()
    {
        $this->memory->save('system_before_render');
        $this->hocks->before_render();

        // load variables
        $this->render_variables();

        // load scripts
        $this->time->start('render_scripts');
        $this->render_scripts();
        $this->time->end('render_scripts');

        // load templates
        $this->time->start('render_templates');
        $this->render_template();
        $this->hocks->after_render();

        // save page settings
        $this->save_page_settings();

        // save session
        $this->save_session();
    }

    /**
     * Change smarty cache dir
     * @param string $dir
     */
    function change_cache_dir($dir)
    {
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0777, true)) {
                $this->logger->log('Cache_Write_Error', 'Can not create dir "' . $dir . '" to cache folder!');
                return false;
            }
            @chmod($dir, 0777);
        }
        TemplatesManager::set_compile_dir($dir);
        return true;
    }

    /**
     * Clear all cache for a given url
     * @param string $url
     */
    function clear_cache($url = '')
    {
        if (!$url)
            $url = $this->paths['current_full'];
        if (class_exists('TemplatesManager'))
            TemplatesManager::clear_cache(base64_encode($url));
    }

    /**
     * Change smarty template dir
     * @param string $dir
     */
    function change_template_dir($dir)
    {
        TemplatesManager::set_template_dir($dir);
        if (!is_dir(TemplatesManager::get_template_dir()))
            $this->logger->log('Templates_Error', 'Can not find templates directory "' . $dir . '"!');
    }

    /**
     * Fetch template file into variable
     * @param string $name
     * @param string $file
     * @param string $cache_folder
     * @param bool $return
     */
    function fetch_template($name, $file, $cache_folder, $return = false)
    {
        $this->change_cache_dir($cache_folder);
        if (is_file($file)) {
            if ($return)
                return $this->template->fetch($file, $this->cache_hash);
            else
                $this->assign($name, $this->template->fetch($file, $this->cache_hash));
        } else
            $this->logger->log('Templates_Error', 'Can not fetch template "' . $name . '" from file "' . $file . '"!');
    }

    /**
     * Assign variable to template	 *
     * @param $var
     * @param $value
     */
    function assign($var, $value = null)
    {
        $this->template->assign($var, $value);
    }

    /**
     * Render skin
     */
    function render_skin()
    {
        $this->init_skin();

        // set skins folders
        $this->assign('skin_images', $this->paths['skin_images']);
        $this->assign('skin_scripts', $this->paths['skin_scripts']);
        $this->assign('skin_styles', $this->paths['skin_styles']);

        // get skin
        $skin_folder = $this->paths['root_dir'] . $this->skins_folder . $this->default_skin . '/' . $this->module;
        if (is_dir($this->paths['root_dir'] . $this->skins_folder . $this->skin . '/'))
            $skin_folder = $this->paths['root_dir'] . $this->skins_folder . $this->skin . '/' . $this->module;
    }

    /**
     * Render all templates
     * @return
     */
    function render_template()
    {
        $template_folder = $this->paths['root_dir'];
        $this->render_type = $this->_get_render_type();

        if ($this->live && $this->render_type == 'all')
            $this->save_js_files();
        if (!$this->no_cache && (TemplatesManager::is_cached($this->paths['root_dir'] . 'index.tpl', $this->cache_hash) || TemplatesManager::is_cached(__DIR__ . '/objects/system/index.tpl', $this->cache_hash))) {
            header('Content-Type: ' . $this->content_type);
            TemplatesManager::set_cache(true);
            if (is_file($template_folder . 'index.tpl'))
                $this->template->display($template_folder . 'index.tpl', $this->cache_hash);
            else
                $this->template->display(__DIR__ . '/objects/system/index.tpl', $this->cache_hash);
            die ;
        }
        if (!TemplatesManager::is_cached($template_folder . 'index.tpl', $this->cache_hash)) {
            $this->render_skin();
            // change smarty template dir for module

            if (is_dir($this->paths['root_code'] . $this->module . 'views/' . $this->skin . '/'))
                $template_folder = $this->paths['root_code'] . $this->module . 'views/' . $this->skin . '/';
            else
                $template_folder = $this->paths['root_code'] . $this->module . 'views/' . $this->default_skin . '/';

            $cache_folder = $this->paths['root_cache'] . $this->module . 'views' . DS . $this->skin . DS;

            // language bar
            if ($this->multi_language && isset($this->db_conn->tables['tbl_x_conf_languages']))
                $this->assign('languages_arr', $this->models->x_conf_languages->get_all('', '', 'order', '', 'is_active=1'));

            $this->fetch_template('__noscript', $template_folder . 'noscript.tpl', $cache_folder);
            if ($this->ajax && $this->obj_index->view != 'index')
                $this->render_type = 'page';
            $this->obj_index->_render_template($this->render_type);

            // change smarty template and cache dir for main index
            $template_folder = $this->paths['root_dir'];
            $cache_folder = $this->paths['root_cache'] . '_index/';

            $this->time->end('system');
            $this->time->end('render_templates');
            $this->memory->save('system_after_render');
            if ($this->trace) {
                TraceManager::generate();
                $this->assign('page_trace', $this->trace_page);
            }

            // set title
            $this->assign('title', $this->title);
            $this->assign('render_type', $this->render_type);

            $this->assign('p', $this->get_page());
        }
        header('Content-Type: ' . $this->content_type);
        $this->change_cache_dir($cache_folder);
        if (is_file($template_folder . 'index.tpl'))
            $this->template->display($template_folder . 'index.tpl', $this->cache_hash);
        else
            $this->template->display(__DIR__ . '/templates/system/index.tpl', $this->cache_hash);
    }

    /**
     * Get the render type
     */
    private function _get_render_type()
    {
        // check render type
        if ($this->render_all)
            return 'all';
        else {
            // check if it was changed
            if ($this->render_type != 'all')
                return $this->render_type;
            if (!count($this->components))
                return 'page';
            else
                return 'page_component_' . (count($this->components) - 1);
        }
    }

    /**
     * 404 Error
     */
    private function _404()
    {
        if ($this->enable_404)
            $this->_init_system_error('404', 'The page that you have requested could not be found.');
    }

    /**
     *
     * Render scripts
     * @return
     */
    function render_scripts()
    {

        if ($this->admin) {
            $this->import('class', 'objects.PageAdmin');
            $this->import('library', 'wbl_admin');
        } else
            $this->import('class', 'objects.Page');
        if ($this->import('file', $this->paths['root_code'] . $this->module . 'index.php') && class_exists('PageIndex')) {
            $this->obj_index = new PageIndex('page', $this->paths['root_cache'] . $this->module, $this->paths['root_code'] . $this->module, 'index.php', 'index', $this->skin);
            $this->obj_index->subquery = $this->components;
        } else {
            if (!class_exists('PageIndex'))
                $this->logger->log('OOP_Warning', 'No \'PageIndex\' class found for this module!');
            else
                $this->_404();
        }

        // check if validation is called
        if (isset($this->actions[0]) && $this->actions[0] == 'validate') {
            die($this->validate->validate($_POST['rule'], $_POST['value']) ? '1' : '0');
        }

        // init index
        if (isset($this->obj_index))
            $this->obj_index->_init();

        // render index
        if (!$this->restricted && isset($this->obj_index))
            $this->obj_index->_render();

        // get database pages number if required
        if ($this->no_pages == 0 && $this->no_total_rows < 0) {
            $this->no_total_rows = (is_object($this->db_conn) ? $this->db_conn->countTotalRows() : $this->no_total_rows);
            if ($this->no_total_rows > $this->page_offset && $this->no_total_rows >= 0 && $this->page_offset) {
                $this->no_pages = (int)($this->no_total_rows / $this->page_offset) + (($this->no_total_rows % $this->page_offset > 0) ? 1 : 0);
            } else {
                $this->no_pages = 0;
            }
        } elseif ($this->no_pages == 0 && $this->no_total_rows != 0) {
            $this->no_pages = (int)($this->no_total_rows / $this->page_offset) + (($this->no_total_rows % $this->page_offset > 0) ? 1 : 0);
        }
        if ($this->ajax && SessionManager::is_new() && $this->check_login)
            $this->redirect($this->paths['root_module']);
        // page object
        $this->assign('p', $this->get_page());
    }

    /**
     * Render objects
     * @return
     */
    private function _init_objects()
    {
        // load objects
        if (is_dir($this->paths['root_objects_inc'])) {
            $files = scandir($this->paths['root_objects_inc']);
            foreach ($files as $k => $v) {
                if ($v != '.' && $v != '..' && $v != '') {
                    $this->objects[$v] = array();
                    $objs = scandir($this->paths['root_objects_inc'] . $v);
                    foreach ($objs as $l => $o)
                        if ($o != '.' && $o != '..' && $o != '' && is_file($this->paths['root_objects_inc'] . $v . '/' . $o . '/include.tpl'))
                            $this->objects[$v][$o] = $this->paths['root_objects_inc'] . $v . '/' . $o . '/include.tpl';
                }
            }
        }
    }

    /**
     * Get validation errors from session
     * @return
     */
    private function _init_errors()
    {
        if (isset($this->session['errors']) && is_array($this->session['errors']))
            foreach ($this->session['errors'] as $e)
                if (isset($e['field']) && isset($e['text']))
                    $this->errors[$e['field']] = $e['text'];
    }

    /**
     * Initialise session from db
     * @return
     */
    function init_session()
    {
        // set cookie for module
        $this->session_cookie .= ('_' . ($this->session_cookie_module ? $this->session_cookie_module : str_replace('/', '', $this->module)));
        $this->hocks->before_session_init();

        SessionManager::init($this->session_cookie, $this->session_timeout);
        $this->session = &$_SESSION;

        $this->_init_check_cookies();

        if (isset($this->session['state']))
            $this->state = $this->session['state'];
        $this->clear_messages();
        $this->clear_errors();
        $this->messages = isset($this->session['messages']) ? $this->session['messages'] : array();
        $this->hocks->after_session_init();
    }

    /**
     * Init check cookie if this is configured as enabled
     * @return
     */
    private function _init_check_cookies()
    {
        if ($this->check_cookies) {
            if ($this->actions[0] == '__no_cookies')
                $this->system_error = 'Please enable the cookies in your browser and then <a href="' . base64_decode($_REQUEST['page']) . '">click here</a> to go to the page you wanted to access.';
            elseif ($this->actions[0] == '__check_cookies') {
                $this->cookies_enabled = $_SESSION['__check_cookies'] && $_SESSION['_hash'] = $_REQUEST['hash'];
                if ($this->cookies_enabled)
                    $this->redirect(base64_decode($_REQUEST['page']));
                else
                    $this->redirect($this->paths['root_module'] . '?a=__no_cookies&page=' . $_REQUEST['page']);
            } elseif (!isset($_SESSION['__check_cookies'])) {
                $_SESSION['__check_cookies'] = 1;
                $this->redirect($this->paths['root_module'] . '?a=__check_cookies&hash=' . $_SESSION['_hash'] . '&page=' . base64_encode($this->paths['current_full']));
            } else
                $this->cookies_enabled = true;
        }
    }

    /**
     * Puplic function to check if cookies are enable, user will be redirected to a
     * link to check if cookies are enabled
     */
    public function check_cookies()
    {
        $this->check_cookies = true;
        $this->_init_check_cookies();
    }

    /**
     * Render template variables
     * @return
     */
    function render_variables()
    {
        $this->assign('random', md5(time() . rand()));
        $this->assign('session', $this->session);
        $this->assign('ssl', $this->ssl);
        $this->assign('root', $this->paths['root']);
        $this->assign('current', $this->paths['current']);
        $this->assign('root_images', $this->paths['root_images']);
        $this->assign('root_styles', $this->paths['root_styles']);
        $this->assign('root_scripts', $this->paths['root_scripts']);
        $this->assign('root_module', $this->paths['root_module']);
        $this->assign('root_content', $this->paths['root_content']);
        $this->assign('root_component', isset_or($this->paths['root_component']));
        $this->assign('root_subcomponent', isset_or($this->paths['root_subcomponent']));

        // user logged
        $this->assign('logged', $this->logged);
        // date
        $this->assign('date', @getdate());
        // actions
        $this->assign('actions', $this->actions);
        // errors
        $this->assign('errors', $this->errors);
        // history
        $this->assign('history', $this->history);
        // query
        $this->assign('query', $this->query);
        // module
        $this->assign('module', $this->module);
        // messages
        $this->assign('messages', $this->messages);

        // set skins folders
        $this->assign('skin_images', $this->paths['skin_images']);
        $this->assign('skin_scripts', $this->paths['skin_scripts']);
        $this->assign('skin_styles', $this->paths['skin_styles']);

        $this->assign('__before_skin', '<link rel="icon" href="{$root_images}favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="{$root_images}favicon.ico" type="image/x-icon"/>
<script type="text/javascript">
	var root=\'{$root}\';
	var root_current=\'{$current}\';
</script>');
    }

    /**
     * Get db tables
     * @return
     */
    private function _db_connect()
    {
        if (isset($this->db_connections[0])) {
            $this->db_conn = new DbManager();
            $this->db_conn->trace = $this->trace;
            $this->add_tables();
            $this->db_conn->connect($this->db_connections[0]['host'], $this->db_connections[0]['user'], $this->db_connections[0]['password'], $this->db_connections[0]['dbname']);
        }
    }

    /**
     * Set the moduel user type for authentication purpose
     * @return
     * @param object $type
     */
    function set_module_user_type($type)
    {
        $this->module_user_type = $type;
        // check user
        if ($this->module_user_type && isset($this->session['user_type']) && $this->session['user_type'] != '' && $this->session['user_type'] != $this->module_user_type)
            $this->logout();
    }

    /**
     * Add a system message
     * @return
     * @param object $type
     * @param object $text
     */
    function add_message($type, $text)
    {
        if (@!is_array(@$this->session['messages']))
            $this->session['messages'] = array();
        $this->session['messages'][] = array(
            'type' => $type,
            'text' => $text,
            'showed' => 0
        );
        $this->save_session();
        $this->messages = $this->session['messages'];

    }

    /**
     * Add a field validation error
     * @return
     * @param object $field
     * @param object $text
     */
    function add_error($field, $text)
    {
        if (!isset($this->session['errors']) || !is_array($this->session['errors']))
            $this->session['errors'] = array();
        $this->session['errors'][] = array(
            'field' => $field,
            'text' => $text,
            'showed' => 0
        );
        $this->errors[$field] = $text;
        $this->valid = false;
    }

    /**
     * Parse query 'q' url rewrite
     * @return
     * @param object $query
     */
    function set_query($query)
    {
        $this->query = $query;
        $pages = explode('/', $query);

        $module = trim($pages[0]);
        if ($module != '' && is_dir($this->paths['root_code'] . $module)) {
            $module .= '/';
        } elseif ($module == '') {
            $module = $this->default_module;
        } elseif (($module != '' && is_dir($this->paths['root_code'] . $this->default_module . 'components/' . $module . '/'))) {
            $pages[1] = $module;
            $module = $this->default_module;
        } else {
            if ($module == 'img_mod' || $module == 'min' || $module == '_check') {
                $pages[1] = $module;
                if (isset($_REQUEST['module'])) {
                    $pages[0] = $_REQUEST['module'];
                    $module = $pages[0] . '/';
                }
            } else {
                $pages[1] = $module;
                $module = $this->default_module;
            }
        }
        $this->module = $module;
        $pages[0] = $this->module;
        if (isset_or($pages[1]))
            $this->content = $pages[1];
        $this->subquery = $pages;
    }

    /**
     * Add system meta tag
     * @return
     * @param object $name
     * @param object $content
     */
    function add_meta_tag($name, $content)
    {
        $this->meta_tags[$name] = array(
            'name' => $name,
            'content' => $content
        );
    }

    /**
     * Add system path
     * @return
     * @param object $name
     * @param object $value
     */
    function add_path($name, $value)
    {
        $this->paths[$name] = $value;
    }

    /**
     * Save current session in db table 'sessions'
     * @return
     */
    function save_session()
    {
        $_SESSION = $this->session;
    }

    /**
     * Save current system state
     * @return
     */
    function save_state()
    {
        if (isset($this->history[0]))
            $this->session['state_link'] = $this->history[0];
        else
            $this->session['state_link'] = $this->paths['current_full'];

        $this->session['state'] = $_REQUEST;
        $this->save_session();
    }

    /**
     * Clear current system state
     * @return
     */
    private function _init_state()
    {
        if (isset($this->session['state_link']) && $this->session['state_link'] != $this->paths['current_full']) {
            $this->session['state'] = '';
            $this->session['state_link'] = '';
            $this->save_session();
        }
    }

    /**
     * Authenticate user if required
     * @return
     */
    private function _init_authentication()
    {
        if (isset($this->actions[0])) {
            switch ($this->actions[0]) {
            case 'login' :
                $this->login();
                break;
            case 'logout' :
                $this->logout();
                break;
            }
        } else {
            $this->update_visit_log();
        }
    }

    /**
     * Get current logged user
     * @return
     */
    private function _init_user()
    {
        $this->_init_authenticate();
        $this->authenticate->init_user();
    }

    /**
     * Clear system messages
     * @return
     */
    function clear_messages()
    {
        if (isset($this->session['messages']))
            foreach ($this->session['messages'] as $k => $v)
                if ($v['showed'] >= 1)
                    array_splice($this->session['messages'], $k, 1);
                else if (isset($this->session['messages'][$k]['showed']))
                    $this->session['messages'][$k]['showed']++;
    }

    /**
     * Clear system errors
     * @return
     */
    function clear_errors()
    {
        if (isset($this->session['errors'])) {
            foreach ($this->session['errors'] as $k => $v)
                if ($v['showed'] >= 1)
                    array_splice($this->session['errors'], $k, 1);
                else if (isset($this->session['errors'][$k]['showed']))
                    $this->session['errors'][$k]['showed']++;
            $this->_init_errors();
        }
    }

    /**
     * Get db tables form the global var $app_tables
     * @return
     */
    function add_tables()
    {
        if (is_array($this->tables)) {
            $tables = new stdClass();
            foreach ($this->tables as $k => $v)
                $tables->$k = $v;
            $this->tables = $tables;
        }
    }

    /**
     * Log out current user
     * @param string $goto
     * @return
     */
    function logout($goto = '')
    {
        $this->_init_authenticate();
        $this->hocks->before_logout();
        $this->authenticate->logout();
        $this->hocks->after_logout();
    }

    /**
     * Update visit log in db
     */
    function update_visit_log()
    {
        $this->_init_authenticate();
        $this->authenticate->update_visit_log();
    }

    /**
     * Init authentication
     */
    private function _init_authenticate()
    {
        if (!isset($this->authenticate))
            $this->authenticate = new AuthenticationManager();
        $this->authenticate->settings = $this->user_types_tables;
        $this->authenticate->messages = $this->login_messages;
        $this->authenticate->show_messages = $this->show_login_messages;
        $this->authenticate->visits_logs_enabled = $this->visits_logs_enabled;
        $this->authenticate->module_user_type = $this->module_user_type;
    }

    /**
     * Login request
     * @return
     */
    function login()
    {
        $this->_init_authenticate();
        $this->hocks->before_login();
        $this->authenticate->login();
        $this->hocks->after_login();
    }

    /**
     * Validate a form
     * @return
     * @param object $form_id
     */
    function validate_form($form_id)
    {
        if (isset($this->validate[$form_id]) && !$this->validate[$form_id]->validate()) {
            $errors = $this->validate[$form_id]->get_errors();
            foreach ($errors as $f => $e) {
                $this->add_error($f, $e);
            }
            $this->save_session();
        }
    }

    /**
     * Add form validator
     * @return
     * @param object $form_id
     * @param object $field
     * @param object $rule
     * @param object $message [optional]
     * @param bool $client
     * @param bool $server
     */
    function add_validator($form_id, $field, $rule, $message = '', $client = false, $server = true)
    {
        if ($server) {
            $hash = $this->validate->get_form_hash($form_id);
            if (!isset($this->session['validation']))
                $this->session['validation'] = array();
            if (!isset($this->session['validation'][$hash]))
                $this->session['validation'][$hash] = array(
                    'form_id' => $form_id,
                    'fields' => array()
                );
            $this->session['validation'][$hash]['fields'][$field]['rules'][$rule] = $message;
            $this->validate->add_rule($form_id, $field, $rule, $message);
        }
        if ($client) {
            $this->scripts->add_validator($form_id, $field, $rule, $message);
        }
        $this->save_session();
    }

    /**
     * Add form filter
     * @return
     * @param object $form_id
     * @param object $field
     * @param object $filter
     * @param object $params
     * @param bool $client
     * @param bool $server
     */
    function add_filter($form_id, $field, $filter, $params = '', $client = false, $server = true)
    {
        if ($server) {
            $hash = $this->validate->get_form_hash($form_id);
            if (!isset($this->session['validation']))
                $this->session['validation'] = array();
            if (!isset($this->session['validation'][$hash]))
                $this->session['validation'][$hash] = array(
                    'form_id' => $form_id,
                    'fields' => array()
                );
            $this->session['validation'][$hash]['fields'][$field]['filters'][$filter] = $params;
            $this->validate->add_filter($form_id, $field, $filter, $params);
        }
        if ($client) {
            // no client filters yet
            // $this -> scripts -> add_validator($form_id, $field, $rule, $message);
        }
        $this->save_session();
    }

    /**
     * Redirect system to anothe url
     * @return
     * @param object $url [optional]
     * @param object $action [optional]
     * @param object $page [optional]
     * @param object $error [optional]
     */
    function redirect($url = '', $action = '', $page = '', $error = '')
    {
        $this->clear_cache($url);
        if (!$this->ajax)
            $this->save_state();
        if ($url) {
            if (headers_sent() || $this->ajax) {
                echo '<script type="text/javascript">location.href="' . $url . '";</script>';
            } else {
                ob_start();
                header('Location: ' . $url);
                ob_end_flush();
            }
        } else {
            $this->redirect($this->paths['current_full']);
        }
        exit ;
    }

    /**
     * Redirect system to another ssl url
     * @return
     * @param object $url [optional]
     * @param object $action [optional]
     * @param object $page [optional]
     * @param object $error [optional]
     */
    function redirect_ssl($url = '', $action = '', $page = '', $error = '')
    {
        $this->clear_cache($url);
        $this->save_state();

        if (!$url) {
            if ($_SERVER['SERVER_PORT'] == 443)
                return true;
            $url = $this->paths['current_full'];
        }
        $url = str_replace('http:', 'https:', $url);
        if ($url) {
            if (headers_sent()) {
                echo '<script type="text/javascript">location.href="' . $url . '";</script>';
            } else {
                header("HTTP/1.1 301 Moved Permanently");
                header('Location: ' . $url);
            }
        }
        exit ;
    }

    /**
     * Redirect system to restricted page
     * @return
     * @param object $message
     */
    function restricted($message)
    {
        $this->restricted = true;
        $this->assign('message', $message);
    }

    /**
     * Get system trace array
     * @return
     */
    function get_page()
    {
        $arr = array();
        if ($this->trace)
            $arr['sys_version'] = $this->sys_version;
        $arr['hostname'] = self::$hostname;
        if ($this->trace)
            $arr['crypt_key'] = $this->crypt_key;
        $arr['title'] = $this->title;
        $arr['doctype'] = $this->doctype;
        $arr['html_tag'] = $this->html_tag;
        $arr['body_tag'] = $this->body_tag;
        $arr['content_type'] = $this->content_type;
        $arr['live'] = $this->live;
        $arr['trace'] = $this->trace;
        $arr['page'] = $this->page;
        $arr['multi_language'] = $this->multi_language;
        $arr['meta_tags'] = $this->meta_tags;
        $arr['query'] = $this->query;
        $arr['subquery'] = $this->subquery;
        $arr['skin'] = $this->skin;
        $arr['default_skin'] = $this->default_skin;
        $arr['module'] = $this->module;
        $arr['module_user_type'] = $this->module_user_type;
        $arr['content'] = $this->content;
        $arr['component'] = $this->component;
        $arr['subcomponent'] = $this->subcomponent;
        $arr['components'] = $this->components;
        $arr['page_no'] = $this->page_no;
        $arr['page_skip'] = $this->page_skip;
        $arr['page_offset'] = $this->page_offset;
        $arr['no_pages'] = $this->no_pages;
        $arr['no_total_rows'] = $this->no_total_rows;
        $arr['ispostback'] = $this->ispostback;
        $arr['pagination'] = $this->pagination;
        if ($this->no_pages)
            for ($i = 1; $i <= $this->no_pages; $i++)
                $arr['pages'][$i] = $i;
        $arr['actions'] = $this->actions;
        $arr['actions_executed'] = $this->actions_executed;
        $arr['errors'] = $this->errors;
        $arr['messages'] = $this->messages;
        $arr['session_cookie'] = $this->session_cookie;
        $arr['session'] = $this->session;
        $arr['state'] = $this->state;
        $arr['check_login'] = $this->check_login;
        $arr['logged'] = $this->logged;
        $arr['user'] = $this->user;
        $arr['history'] = $this->history;
        $arr['server'] = $this->server;
        $arr['browser'] = $this->browser;
        $arr['paths'] = $this->paths;
        $arr['objects'] = $this->objects;
        $arr['valid'] = $this->valid;
        $arr['settings'] = $this->settings;
        if ($this->db_conn_enabled && is_a($this->db_conn->tables, 'TablesManager')) {
            if ($this->trace) {
                $arr['dns'] = $this->db_conn->get_dns();
                $arr['db_no_valid_queries'] = $this->db_conn->num_valid_queries;
                $arr['db_no_invalid_queries'] = $this->db_conn->num_invalid_queries;
                $arr['db_queries'] = $this->db_conn->queries;
            }
            $arr['tables'] = $this->db_conn->tables;
        }
        $arr['user_types_tables'] = $this->user_types_tables;
        $arr['js_files'] = $this->js_files;
        $arr['css_files'] = $this->css_files;
        $arr['ajax'] = $this->ajax;
        return $arr;
    }

    /**
     * loads libraries defined in configuration file
     * @return
     * @param object $library
     */
    function load_library($library)
    {
        if (!isset($this->loaded_libraries[$library])) {
            if (!$this->load_file(dirname(__FILE__) . '/libraries/' . $library . '/import.php')) {
                $this->logger->log('load_library', 'Import file for library "' . $library . '" was not found at: "' . dirname(__FILE__) . '/lib/libraries/' . $library . '/import.php"');
                return false;
            }
            $this->loaded_libraries[$library] = 1;
        }
        return true;
    }

    /**
     * Load class for given model
     * @param object $model
     * @return
     */
    function load_model($model)
    {
        if (!$this->models->import($model)) {
            $this->logger->log('load_dal', 'File for model "' . $model . '" was not found in any models folders.');
            return false;
        }
        return true;
    }

    /**
     * Load class from php files
     * @param object $class
     * @return
     */
    function load_class($class)
    {
        if (!class_exists($class)) {
            $paths = explode('.', $class);
            $file_path = $class . '.php';
            if (count($paths) > 1) {
                $paths[count($paths) - 1] = $paths[count($paths) - 1] . '.php';
                $file_path = implode('/', $paths);
            }
            if (!$this->load_file(dirname(__FILE__) . '/classes/' . $file_path)) {
                $this->logger->log('load_class', 'File for class "' . $class . '" was not found at: "' . dirname(__FILE__) . '/lib/classes/' . $file_path . '"');
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * Load a PHP file given.
     * @param object $file path to the file
     * @return
     */
    function load_file($file)
    {
        if (is_file($file)) {
            try {
                global $page;
                if ($this->debug)
                    require $file;
                else
                    include $file;
                return true;
            } catch(Exception $ex) {
                trigger_error('Error loading file "' . $file . '": ' . $ex->getMessage());
            }
        }
        $this->logger->log('load_file', 'File "' . $file . '" was not found!');
        return false;
    }

    /**
     * Disconnect from database
     */
    function disconnect()
    {
        if (is_object($this->db_conn))
            $this->db_conn->disconnect();
    }

    /**
     * To string magic method
     */
    public function __toString()
    {
        return 'System - Class';
    }

    /**
     * Returns the hostname of the website
     */
    static function get_hostname()
    {
        if (self::$hostname != '')
            return self::$hostname;
        self::$hostname = get_hostname();
        return self::$hostname;
    }

    /**
     * Header status codes return
     * @param string $statusCode
     */
    private function _header_status($statusCode)
    {
        static $status_codes = null;

        if ($status_codes === null) {
            $status_codes = array(
                100 => 'Continue',
                101 => 'Switching Protocols',
                102 => 'Processing',
                200 => 'OK',
                201 => 'Created',
                202 => 'Accepted',
                203 => 'Non-Authoritative Information',
                204 => 'No Content',
                205 => 'Reset Content',
                206 => 'Partial Content',
                207 => 'Multi-Status',
                300 => 'Multiple Choices',
                301 => 'Moved Permanently',
                302 => 'Found',
                303 => 'See Other',
                304 => 'Not Modified',
                305 => 'Use Proxy',
                307 => 'Temporary Redirect',
                400 => 'Bad Request',
                401 => 'Unauthorized',
                402 => 'Payment Required',
                403 => 'Forbidden',
                404 => 'Not Found',
                405 => 'Method Not Allowed',
                406 => 'Not Acceptable',
                407 => 'Proxy Authentication Required',
                408 => 'Request Timeout',
                409 => 'Conflict',
                410 => 'Gone',
                411 => 'Length Required',
                412 => 'Precondition Failed',
                413 => 'Request Entity Too Large',
                414 => 'Request-URI Too Long',
                415 => 'Unsupported Media Type',
                416 => 'Requested Range Not Satisfiable',
                417 => 'Expectation Failed',
                422 => 'Unprocessable Entity',
                423 => 'Locked',
                424 => 'Failed Dependency',
                426 => 'Upgrade Required',
                500 => 'Internal Server Error',
                501 => 'Not Implemented',
                502 => 'Bad Gateway',
                503 => 'Service Unavailable',
                504 => 'Gateway Timeout',
                505 => 'HTTP Version Not Supported',
                506 => 'Variant Also Negotiates',
                507 => 'Insufficient Storage',
                509 => 'Bandwidth Limit Exceeded',
                510 => 'Not Extended'
            );
        }

        if ($status_codes[$statusCode] !== null) {
            $status_string = $statusCode . ' ' . $status_codes[$statusCode];
            header($_SERVER['SERVER_PROTOCOL'] . ' ' . $status_string, true, $statusCode);
            return $status_string;
        }
        return '';
    }

}
?>