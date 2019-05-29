<?php
// src/AppBundle/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController
{
    /**
     * @Route("/")
     */
    public function testAction()
    {
      
        return new Response(
            '<html><body>Test</body></html>'
        );
    }
}