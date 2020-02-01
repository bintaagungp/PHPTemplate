<?php

    class View {
        public $dir_template;
        public $dir_content;
        public $dir_component;

        public function template($directTemplate) {
            $this->dir_template = $this->trim_input($directTemplate);
            return $this;
        }
        
        public function content($directContent) {
            $this->dir_content = $this->trim_input($directContent);
            return $this;
        }

        public function component($dirCom) {
            $dir = $this->trim_input($dirCom);
            $this->dir_component[$dir] = $dir;
            return $this;
        }

        private function trim_input($dir) {
            $dir = trim($dir);
            $dir = str_replace('/', '\\', $dir);
            return $dir;
        }
    }
