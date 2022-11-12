<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\QuantityProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $productRepository;


    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    #[Route('/', name: 'default')]
    public function index(): Response
    {
        $newProducts = $this->productRepository->findNewProduct();
        $bestProduct = $this->productRepository->findBestProduct();
        

         return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'bestProduct' => $bestProduct,
            'newProduct' => $newProducts,

        ]);
    }

    #[Route('/produits', name: 'products')]
    public function products(EntityManagerInterface $em)
    {
        return $this->render('default/products.html.twig', 
      );
    }

    #[Route('/produit/{id}', name: 'detail_product')]
    public function getOne(Product $productDetail){
        $quantityProductForm = $this->createForm(QuantityProductType::class);

    return $this->render('default/detail-product.html.twig',[
        'productDetail'=> $productDetail,
        'quantityProduct' => $quantityProductForm->createView(),
    ] );
    
}
}