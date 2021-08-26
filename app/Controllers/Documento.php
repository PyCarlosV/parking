<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Documento extends Controller{
    public function index ()
    {
        
        $email = \Config\Services::email();

        $email->setFrom('jeingaciaro@gmail.com', 'document code');
        $email->setTo('cobakirim38@gmail.com');
        /*$email->setCC('another@another-example.com');
$email->setBCC('them@their-example.com');*/

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        if ($email->send()) {
            echo 'success';
        } else {
            echo 'invalid';
        }
    }

}