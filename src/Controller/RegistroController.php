<?php

namespace App\Controller;

use App\Form\SolicitaUnaDemoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RegistroController extends AbstractController {

    #[Route("/maleteo", name: "maleteo")]

    public function form() {
        $form = $this->createForm(SolicitaUnaDemoType::class);

        return $this->render("registro/registro.html.twig");
    }

}