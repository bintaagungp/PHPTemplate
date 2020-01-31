<?php
    
    class PHPTemplate implements View, Data {

        private $dir;
        private $dir_template;
        private $dir_content;
        private $dir_component;
        private $template;
        private $content;
        private $component;
        private $data;

        public function __construct($viewDir = APPPATH) {

            if ( !is_string($viewDir) ) {
                throw new Exception("Value must be String!");
            }

            $this->dir = $viewDir;
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
            ]);
            
            echo $this->template;
        }

        public function template($directTemplate) {
            $this->dir_template = $directTemplate;
            return $this;
        }
        
        public function content($directContent) {
            $this->dir_content = $directContent;
            return $this;
        }

        public function component(...$directComponent) {
            foreach ( $directComponent as $dirCom ) {
                $this->dir_component[] = $dirCom;
            }
            return $this;
        }

        public function data($data = []) {
            $this->data = $data;
            return $this;
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
                        case $this->dir_template:
                            eval('require_once($this->dir.$value.\'.php\');');
                            $this->template .= ob_get_contents();
                        break;
                        
                        case $this->dir_content:
                            eval('require_once($this->dir.$value.\'.php\');');
                            $this->content .= ob_get_contents();
                        break;
                        
                        case $this->dir_component:
                            foreach( $value as $v ) {
                                eval('require_once($this->dir.$v.\'.php\');');
                                $this->component[$v] = ob_get_contents();
                            }
                    }
                    ob_get_clean();
                }
            }
            
            return $this;
        }

    }