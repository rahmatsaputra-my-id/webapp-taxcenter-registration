<?php  

function hashpassword($password = '')
    {        
        return hash('sha512', $password . config_item('encryption_key'));
    }

?>