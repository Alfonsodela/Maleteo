<?php

namespace App\Controller;

use App\Entity\Registro;
use App\Form\SolicitaUnaDemoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistroController extends AbstractController {

    #[Route("/maleteo", name: "maleteo")]

    public function form(Request $request, EntityManagerInterface $doctrine) {
        $form = $this->createForm(SolicitaUnaDemoType::class);
        $form -> handleRequest($request);
        if ($form -> isSubmitted() && $form -> isValid()) {
            $registro = $form -> getData();

            $doctrine -> persist($registro);
            $doctrine -> flush();

            $this->addFlash(
                "success", "pokemon insertado correctamente"
            );
        }

        return $this->renderForm("registro/registro.html.twig",  ["registroForm"=>$form]);
    }

}