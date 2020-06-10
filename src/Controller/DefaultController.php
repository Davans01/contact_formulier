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
    // Request $request werkt niet hij zegt dat die de class niet kan vinden terwijl ik hem wel heb toegevoegt
    public function index(\Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactformdata = $form->GetData();

            $message = (new \Swift_Message($contactFormData['subject']))
            ->setFrom($contactFormData['from'])
            ->setTo($this->getParameter('default_email'))
            ->setBody(
                   $contactFormData['comment'],
                   'text/plain'
                );

           $mailer->send($comment);

           return $this->redirectToRoute('contact');
        }

        return $this->render('default/index.html.twig', [
           'our_form' => $form->createView()
        ]);
    }

    
}
