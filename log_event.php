<?php

// Función para registrar eventos en un archivo de registro
function log_event($event) {
    // Establecer la zona horaria a la de México
    date_default_timezone_set('America/Mexico_City');
    
    
    $log_file = 'C:/xampp/htdocs/Login/logs/login_log.txt';
    
    
    $current_time = date('Y-m-d H:i:s');
    
    
    $log_entry = $current_time . " - " . $event . "\n";
    
    
    file_put_contents($log_file, $log_entry, FILE_APPEND);
}

?>
