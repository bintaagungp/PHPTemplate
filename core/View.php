<?php

    class View {

        public $dir_template;
        public $dir_content;
        public $dir_component;

        public function template($directTemplate) {
            $this->dir_template = $this->trim_view($directTemplate);
            return $this;
        }
        
        public function content($directContent) {
            $this->dir_content = $this->trim_view($directContent);
            return $this;
        }

        public function component($dirCom) {
            $dir = $this->trim_view($dirCom);
            $this->dir_component[$dir] = $dir;
            return $this;
        }

        private function trim_view($dir) {
            $dir = trim($dir);
            $dir = str_replace('/', '\\', $dir);
            return $dir;
        }
        
    }
