<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (empty($session->get('sesion')['user'])) {
        
            if (empty($session->get('sesion')['emp'])) {
                return redirect()->to(base_url('/'));
            }else{
                return redirect()->to(base_url('/log'));
            }
        }
        #echo 'access time'.date('D, d M Y H::i:s').'<br>';
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}