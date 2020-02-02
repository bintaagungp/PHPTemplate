<?php
    
    class PHPTemplate {

        private $dir_view;
        private $dir_template;
        private $dir_content;
        private $dir_component;

        private $view_template;
        private $view_content;
        private $view_component;
        
        private $data;



        public function __construct($base_view_dir = BASEDIR . '\\example\\') {

            if ( !is_string($base_view_dir) ) {
                throw new Exception("Value must be String!");
            }

            $example_dir = array_slice(scandir($base_view_dir), 2);

            foreach ($example_dir as $value) {
                if ( is_dir($base_view_dir . "\\$value") ) {
                    switch ($value) {
                        case "template":
                            $this->template( $value . "\\template" );
                        break;
                        
                        case "content":
                            $this->content( $value . "\\content" );
                        break;

                        case "component":
                            $this->component( $value . "\\component" );
                        break;
                        
                    }
                }
            }

            $this->data = ['description' => 'This is example that i make to entertain you how to understand the flow of PHPTemplate. Make it easier with PHPTemplate. Enjoy :)'];

            $this->dir_view = $base_view_dir;

        }
        
        public function view($template = null, $content = null, $component = null, $data = null) {
            
            if ( !empty($template) ) $this->template($template);
            if ( !empty($content) ) $this->content($content);
            if ( !empty($data) ) $this->data($data);
            if ( !empty($component) ) $this->component($component);
            
            $this->load([
                'component' => $this->dir_component,
                'content' => $this->dir_content, 
                'template' => $this->dir_template
            ])->load_template();
            
        }

        public function template($directTemplate) {
            $this->dir_template = $this->trim_view($directTemplate);
            return $this;
        }
        
        public function content($directContent) {
            $this->dir_content = $this->trim_view($directContent);
            return $this;
        }

        public function component(...$directComponent) {
            foreach ( $directComponent as $dirCom ) {
                $com = $this->trim_view($dirCom);
                $this->dir_component[$com] = $com;
            }
            return $this;
        }

        public function data($data = []) {
            $this->data = $data;
            return $this;
        }

        public function load_template() {
            echo $this->view_template;
        }

        public function load_content() {
            echo $this->view_content;
        }

        public function load_component($component) {
            $com = $this->trim_view($component);
            echo $this->view_component[$com];
        }
        
        private function load($view) {
            
            if ( !empty($this->data) ) {
                extract($this->data);
            }

            foreach ($view as $value) {

                if ( !empty($value) ) {
                    ob_start();
                    switch ($value) {
                        case $this->dir_template:
                            require_once($this->view_exist($value));
                            $this->view_template .= ob_get_contents();
                        break;
                        
                        case $this->dir_content:
                            require_once($this->view_exist($value));
                            $this->view_content .= ob_get_contents();
                        break;
                        
                        case $this->dir_component:
                            foreach( $value as $v ) {
                                require_once($this->view_exist($v));
                                $this->view_component[$v] = ob_get_contents();
                            }
                    }
                    ob_get_clean();
                }
            }

            return $this;
            
        }

        private function view_exist($path) {
            $view_path = $this->dir_view . $path . '.php';
            if ( file_exists($view_path) ) {
                return $view_path;
            }
        }

        private function trim_view($dir) {
            $dir = trim($dir);
            $dir = str_replace('/', '\\', $dir);
            return $dir;
        }

    }