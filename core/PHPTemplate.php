<?php
    
    class PHPTemplate {

        private $defaultDir;
        private $view;
        // private $data;
        
        private $template;
        private $content;
        private $component;
        private $data;

        public function __construct($viewDir = BASEDIR . '\\example\\') {

            if ( !is_string($viewDir) ) {
                throw new Exception("Value must be String!");
            }

            $this->defaultDir = $viewDir;

            require_once(BASEDIR."\core\View.php");
            $this->view = new View;

        }
        
        public function view($template = null, $content = null, $component = null, $data = null) {
            
            if ( !empty($template) ) $this->template($template);
            if ( !empty($content) ) $this->content($content);
            if ( !empty($data) ) $this->data($data);
            if ( !empty($component) ) $this->component($component);
            
            $this->load([
                'component' => $this->view->dir_component,
                'content' => $this->view->dir_content, 
                'template' => $this->view->dir_template
            ])->load_template();
            
        }

        public function template($directTemplate) {
            $this->view->template($directTemplate);
            return $this;
        }
        
        public function content($directContent) {
            $this->view->content($directContent);
            return $this;
        }

        public function component(...$directComponent) {
            foreach ( $directComponent as $dirCom ) {
                $this->view->component($dirCom);
            }
            return $this;
        }

        public function data($data = []) {
            $this->data = $data;
            return $this;
        }

        public function load_template() {
            echo $this->template;
        }

        public function load_content() {
            echo $this->content;
        }

        public function load_component($component) {
            echo $this->component[$component];
        }
        
        private function load($view) {
            
            if ( !empty($this->data) ) {
                foreach ($this->data as $key => $value) {
                    $data = json_encode($value);
                    $d = 'json_decode($data)';
                    eval('$'.$key.' = '.$d.';');
                }
            }

            foreach ($view as $value) {
                if ( !empty($value) ) {
                    ob_start();
                    switch ($value) {
                        case $this->view->dir_template:
                            eval('require_once($this->defaultDir.$value.\'.php\');');
                            $this->template .= ob_get_contents();
                        break;
                        
                        case $this->view->dir_content:
                            eval('require_once($this->defaultDir.$value.\'.php\');');
                            $this->content .= ob_get_contents();
                        break;
                        
                        case $this->view->dir_component:
                            foreach( $value as $v ) {
                                eval('require_once($this->defaultDir.$v.\'.php\');');
                                $this->component[$v] = ob_get_contents();
                            }
                    }
                    ob_get_clean();
                }
            }
            
            return $this;
        }

    }