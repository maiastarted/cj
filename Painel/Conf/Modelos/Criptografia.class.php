<?php
    
    class Criptografia
    {
        function encrypt($dados, $palavra)
        {
            $secret_key = $palavra;//TEXTO_CHAVE;
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $secret_iv = 'This is my secret iv';
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $output = openssl_encrypt($dados, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
            return $output;
        }
        
        function encrypt_password($dados, $email)
        {
            $secret_key = $email;
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $secret_iv = 'IV para criptografar a password';
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $output = openssl_encrypt($dados, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
            return $output;
        }
        
        function dencrypt($dados, $palavra)
        {
            $output='';
            $secret_key = $palavra;//TEXTO_CHAVE;
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $secret_iv = 'This is my secret iv';
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $output = openssl_decrypt(base64_decode($dados), $encrypt_method, $key, 0, $iv);
            
            return $output;
        }
        
        function dencrypt_password($dados, $email)
        
        {
            $secret_key = $email;
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $secret_iv = 'IV para criptografar a password';
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $output = openssl_decrypt(base64_decode($dados), $encrypt_method, $key, 0, $iv);
            
            return $output;
        }
        
        
    }
