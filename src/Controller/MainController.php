<?php

namespace App\Controller;

use App\Entity\Profil;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class MainController extends Controller
{
    /**
     * Affiche la page d'accueil du  site
     * @Route("/", name="accueil")
     */
    public function accueil(EntityManagerInterface $entityManager)
    {

        $profilRepository = $entityManager->getRepository(Profil::class);

        $profil = $profilRepository->findAll();


        return $this->render("main/accueil.html.twig", compact('profil'));
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // Erreur lors de la connexion
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('main/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/profil", name="profil" )
     */
    public function profil()
    {



        return $this->render(
            'main/myprofil.html.twig'
            );



    }

    /**
     * @Route ("/competences", name= competences")
     */
    public function competences()
    {
        return $this->render('main/competences.html.twig');
    }


}
