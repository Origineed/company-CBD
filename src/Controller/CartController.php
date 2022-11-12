<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductsOrder;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{

    #[Route('/{id}', name:'add', requirements: ['id' => '\d+'])]
        public function addCart(Product $product, Request $request){
  
           $productOrder = new ProductsOrder();
           $productOrder->setProduct($product);
           $productOrder->setQuantityInCart(1);

           $session = $request->getSession();
           
           $cart = [];

        if($session->has("cart")){
            $cart = $session->get('cart');
        }

        $exist = false;

        foreach ($cart as $productOrderElem){
            if($productOrderElem->getProduct()->getId() == $product->getId()){
                $exist = true;
                $productOrderElem->setQuantityInCart($productOrderElem->getQuantityInCart() + 1);
            }
        }

        if(!$exist){
            $cart[] = $productOrder;
        }


            $session->set("cart", $cart);

            return $this->redirectToRoute('cart_display');
        }
        #[Route('/remove-product/{id}', name: 'remove_product')]
        public function removeProduct(Product $product, Request $request){
            $session = $request->getSession();
            $cart = $session->get('cart', []);

                $delete = null;
            foreach ($cart as $key => $productOrder){
                if($product->getId() == $productOrder->getProduct()->getId()){
                    $delete = $key;
                }
            }
            unset($cart[$delete]);

            $session->set('cart', $cart);

            return $this->redirectToRoute('cart_display');
        }

    #[Route('/', name: 'display')]
    public function index(Request $request): Response
    {   
        $cart = $request->getSession()->get('cart');
        
        $price = 0;
        if ($cart != null){
            foreach ($cart as $po) {
                $price += $po->getProduct()->getPrice() * $po->getQuantityInCart();
            }
        }
        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
            'price' => $price
        ]);
    }

    #[Route('/{operator}/{id}', name: 'addremoveone', requirements: ["id" => "\d+"])]
    public function incrementCartProduct(Product $product, Request $request, $operator)
    {
        $session = $request->getSession();
        $cart = $session->get('cart');

        foreach ($cart as $po){
            if($po->getProduct()->getId() == $product->getId()){
                if ($operator == 'more') {
                $po->setQuantityInCart($po->getQuantityInCart() + 1);
            } elseif ($operator == 'less') {
                $po->setQuantityInCart($po->getQuantityInCart() - 1);
            }
        }
    }
        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_display');

    }
}