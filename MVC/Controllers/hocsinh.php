<?php
    class hocsinh extends Controllers{
        function show()
        {
            # code...
            $nghi = $this->getModels("hocsinhmodels");
            echo $nghi->getHocsinh();
        }
    }
?>