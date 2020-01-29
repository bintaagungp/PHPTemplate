<?php
    
    class PHPTemplate implements View {

        private $dir;
        private $dir_template;
        private $dir_content;
        private $template;
        private $content;
        private $data;

        public function __construct($viewDir = APPPATH) {

            if ( !is_string($viewDir) ) {
                throw new Exception("Value must be String!");
            }

            $this->dir = $viewDir;
        }
        
        public function view($template = null, $content = null, $data = null) {
            
            if ( !empty($template) ) $this->dir_template = $template;
            if ( !empty($content) ) $this->dir_content = $content;
            if ( !empty($data) ) $this->data = $data;
            
            $this->load_content($this->dir_content, 'content');
            $this->load_content($this->dir_template, 'template');

            echo $this->template;
        }

        public function template($directTemplate) {
            $this->template = $directTemplate;
            return $this;
        }
        
        public function content($directContent) {
            $this->content = $directContent;
            return $this;
        }

        public function data($data = []) {
            $this->data = $data;
            return $this;
        }

        public function load() {
            echo $this->content;
        }
        
        private function load_content($view, $type) {
            
            if ( !empty($this->data) ) {
                foreach ($this->data as $key => $value) {
                    if ( !is_array($value) ) {
                        $value = '"'. $value . '"';
                        $data = $value;
                    } else {
                        $value = json_encode($value);
                        $data = 'json_decode($value)';
                    };
                }
                eval('$'.$key.' = '.$data.';');
            }

            ob_start();
            echo eval('require_once($this->dir.$view.\'.php\');');
            if ( $type == "template" ) {
                $this->template .= ob_get_contents();
            } else if ( $type == "content" ) {
                $this->content .= ob_get_contents();
            }
            ob_get_clean();
            return $this;

        }

    }