<?php

namespace App\Controller;

use App\Form\ContactType;
// use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Httpfoundation\Request;

class DefaultController extends AbstractController
{
    
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        $form = $this->createForm(ContactType::class);

        return $this->render('default/index.html.twig', [
           'our_form' => $form->createView()
        ]);
    }

    
}
