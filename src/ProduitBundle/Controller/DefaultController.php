<?php

namespace ProduitBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ProduitBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DefaultController extends Controller
{
   /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }


   
    public function createAction(Request $request)
        {



            $product = new Produit();
           /* $product->setName('Keyboard');
            $product->setPrix(19.99);
            $product->setDescription('Ergonomic and stylish!');

            $entityManager = $this->getDoctrine()->getManager();

            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($product);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();*/

             //return new Response('Saved new product with id '.$product->getId());
             //return $this->render("Pages/creat.html.twig");

            /*$form = $this->createFormBuilder($product)
            ->add('Name', TextType::class)
            ->add('Prix', MoneyType::class)
            ->add('Description', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Product'))
            ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $Name = $form['Name']->getData();
                $Prix = $form['Prix']->getData();
                $Description = $form['Description']->getData();


                $product->setName($Name);
                $product->setPrix($Prix);
                $product->setDescription($Description);

                $entityManager = $this->getDoctrine()->getManager();

                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($product);

                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();

            }

             return $this->render('Pages/creat.html.twig', array(
            'form' => $form->createView(),
        ));*/
        return $this->render('Pages/creat.html.twig');
        }


        public function addProduitAction(){

           // $req= $this->getRequest();
                $product = new Produit();
            $req =$this->get("request");

            $product->setName($req->get('name'));
            //$product->setPrix($prix);
            $product->setPrix($req->get('prix'));
            //$product->setDescription($description);
            $product->setDescription($req->get('description'));

                $entityManager = $this->getDoctrine()->getManager();
            $entityManager = $this->getDoctrine()->getManager();

                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($product);

                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
                
            return $this->render('Pages/creat.html.twig');

        }


        public function prixAction($prix){

                    $message = "";
                    if($prix<0 or $prix>10){
                        $message = "are you shur?";
                    }
            $response = new Response($message,
                Response::HTTP_OK,
                array('content-type' => 'text/html')
            );

                    //$res = new JsonResponse();
                    //return $res->setData(array("message" => $message));

                    return $response;
}

}
