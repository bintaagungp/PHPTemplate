<?php

    interface View {
        public function template($directTemplate);
        public function content($directContent);
        public function component(...$directComponent);
    }
