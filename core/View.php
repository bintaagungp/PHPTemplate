<?php

    class View {
        public $dir_template;
        public $dir_content;
        public $dir_component;

        public function __construct() {
            
        }

        public function template($directTemplate) {
            $this->dir_template = $directTemplate;
            return $this;
        }
        
        public function content($directContent) {
            $this->dir_content = $directContent;
            return $this;
        }

        public function component($dirCom) {
            $this->dir_component[] = $dirCom;
            return $this;
        }
    }
