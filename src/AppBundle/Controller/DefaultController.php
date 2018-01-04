<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        return $this->render('default/home.html', array(
            'title' => 'Home page',
        ));
    }

    public function listpostsAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Post');
        $posts = $repository->findAll();

        return $this->render('default/posts.html', array(
            'title' => 'Posts',
            'posts' => $posts,
        ));

    }

    public function uploadpostAction(Request $request, $id)
    {

        if ($id === -1) {
            $post = new Post();

            $form = $this->createFormBuilder($post)
                ->add('postName', 'text')
                ->add('postDescription', 'textarea')
                ->add('upload', 'submit')
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();
                $date = new \DateTime();
                $data->setPostDate($date->format('Y-m-d H:i:s'));

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();

                return $this->render('default/post.html', array(
                    'title' => 'Post Something',
                    'form' => $form->createView(),
                    'msg' => 'The post was created succesfully and waiting for admin approval',
                    'id' => -1,
                ));
            }

            return $this->render('default/post.html', array(
                'title' => 'Post Something',
                'form' => $form->createView(),
                'msg' => '',
                'id' => -1,
            ));
        }
        else
        {
            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Post');
            $post = $repository->findOneById($id);
            return $this->render('default/post.html', array(
                'title' => $post->getpostName(),
                'msg' => '',
                'id' => $id,
                'post' => $post,
            ));
        }
    }

    public function searchpostAction(){


    }




}
