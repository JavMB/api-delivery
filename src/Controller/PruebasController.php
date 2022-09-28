<?php

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PruebasController extends AbstractController
{

    private $logger;
    public function __construct(LoggerInterface $logger){
        $this->logger= $logger;

    }

    //Tenemos que definir como es el endpoint para poder hacer la peticion desde el cliente
    //ENDPOINT
    /**
     * @Route ("/get/usuarios", name="get_users")

     */
public function getAllUser(Request $request,LoggerInterface $logger){
    //Llamará a base de datos y se traera toda la lista de users
    //Devolver una respuesta en formato Json
    //Request
    //Response Hay que devolver una respuesta siempre

    //$response= new Response(); //Esto lleva un codigo de estado, default 200
    //$response->setContent('<div>Hola Mundo</div>');



    $id=$request->get('id');
    $this->logger->alert('Mnesajito');
    //Query sql para traer el user con id= id$
    $response=new JsonResponse();
    $response->setData([
        'succes'=>true,
        'data'=>[
            [
            'id'=>$id  ,
            'nombre'=>'Pepe',
            'email'=>'pepe@email.com'
        ],
            [
                'id'=>2,
                'nombre'=>'Manolo',
                'email'=>'manolo@email.com'
            ]
        ]
    ]);
    return $response;



}
}