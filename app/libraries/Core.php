<?php
    class Core {
        //URL format --> /controller/method/params
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            // print_r($this->getURL());
            if($this->getURL() == null) {
                $url = 'pages/index';
            } else {
                $url = $this->getURL();
            }

            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);

                // Unset 0 index
                unset($url[0]);

                //Call the Controller
                require_once '../app/controllers/' . $this->currentController . '.php';

                //Instantiate the controller class
                $this->currentController = new $this->currentController;
            
                //Check whether the method exists in the controller or not
                if(isset($url[1])) {
                    if(method_exists($this->currentController, $url[1])) {
                        $this->currentMethod = $url[1];

                        //Unset 1 index
                        unset($url[1]);
                    }
                }
                //Get params
                $this->params = $url ? array_values($url) : [];

                //call method and pass parameter list
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            }else {
                // If controller doesn't exist, load the default controller
                require_once '../app/controllers/' . $this->currentController . '.php';

                //Instantiate the controller class
                $this->currentController = new $this->currentController;

                //Call the method
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            }
        }


        public function getURL() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
        }
    }

?>