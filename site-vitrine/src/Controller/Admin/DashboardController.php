<?php

namespace App\Controller\Admin;

use App\Entity\Plante;
use App\Entity\Tisane;
use App\Entity\Utilisateurs;
use App\Controller\HomeController;
use App\Repository\PlanteRepository;
use App\Repository\TisaneRepository;
use App\Repository\UtilisateursRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{   
    // CONFIGURATION POUR L'AFFICHAGE DE LA LISTE ET NOMBRE TOTAL DE PLANTES ET TISANES

    // déclaration des propriétés en protected
    protected $planteRepository;
    protected $tisaneRepository;
    protected $utilisateursRepository;

    // création d'un constructeur car classe DashboardController ne prends pas de paramètre
    // constructeur dans lequel on va faire passer les différents repo, injections de dépendances et dc des différents repo afin de pouvoir les manipuler et les modifier partout dans notre controller
    // dans les différents repo, nous allons préparer les requêtes qui vont nous permettre de faire la somme de l'ens des plantes et des tisanes
    public function __construct(PlanteRepository $planteRepository, TisaneRepository $tisaneRepository, UtilisateursRepository $utilisateursRepository)
    {
        $this->planteRepository = $planteRepository;
        $this->tisaneRepository = $tisaneRepository;
        $this->utilisateursRepository = $utilisateursRepository;
    }


    // ajout d'un token dans la route pour personnaliser la route d'administration
    /**
     * @Route("/admin", name="admin")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function index(): Response
    {
        return $this->render('bundles/easyadminBundle/views/welcome.html.twig', [
            'plantes' => $this->planteRepository->countAllPlantes(),
            'tisanes' => $this->tisaneRepository->countAllTisanes(),
            'allPlantes' => $this->planteRepository->findAll(),
            'allTisanes' => $this->tisaneRepository->findAll(),
            'utilisateurs' => $this->utilisateursRepository->findAll(),
            // 'utilisateurs' => $this->utilisateursRepository->findOneBy(['roles' => 'ROLE_ADMIN']),
           
        ]);
        // return parent::index();
    }



    // CONFIGURATION DU TABLEAU DE BORD
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Herboristerie du Pré')
            ->setFaviconPath('public/assets/images/image_pageindex/favicon.ico');
    }


    // CONFIGURATION DU MENU
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fas fa-clipboard');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', Utilisateurs::class);
        yield MenuItem::linkToCrud('Plantes', 'fas fa-leaf', Plante::class);
        yield MenuItem::linkToCrud('Tisanes', 'fas fa-mortar-pestle', Tisane::class);
        yield MenuItem::linkToUrl('Accueil','fa fa-home','/');
        yield MenuItem::linkToUrl('L\'Abécédaire','fas fa-seedling','plantes');
        yield MenuItem::linkToUrl('Nos tisanes','fas fa-coffee','tisanes');
        yield MenuItem::linkToUrl('Qui sommes-nous','far fa-smile-beam','qui_sommes_nous');
        yield MenuItem::linkToUrl('Nous contacter','fas fa-phone-alt','nousContacter');
    }

    // AJOUT AVATAR
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getUsername())
            // ->setAvatarUrl('public/assets/images/image_pageindex/logo-mobile')
            ->setAvatarUrl('https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Hoeffler_H.svg/1200px-Hoeffler_H.svg.png')
            ->displayUserAvatar(true);
    }

    

}
