<?php   
    class Controllers{
        public function getModels($models)
        {
            # code...
            require_once "./MVC/Models/".$models.".php";
            return new $models;
        }
        public function getViews($view)
        {
            # code...
        }
    }
?>