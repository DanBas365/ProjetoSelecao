<?php
class Core{
    public function Start(){

        $url = '/';
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
        }

        $params = array();
        if(!empty($url) && $url != '/'){
            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0].'Controller';
            array_shift($url);
            if(isset($url[0]) && !empty($url)){
                $currentAction = $url[0];
                array_shift($url);
            } else{
                $currentAction = 'Index';
            }

            if(count($url) > 0){
                $params = $url;
            }
        } else{
            $currentController = 'homeController';
            $currentAction = 'Index';
        }
        
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }
}
?>