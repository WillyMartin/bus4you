<?php

namespace Bundles\PageBundle\Admin;

use Bundles\PageBundle\Admin\PageableAdmin as Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class StaticPageAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Page')->with('Page')
            ->add('title', 'text', array('label' => 'Title'))
//            ->add('seo_title',null, array('label'=> 'Seo-title'))
//            ->add('keywords',null, array('label'=> 'Ключевые слова'))
//            ->add('description',null, array('label'=> 'Description'))
//            ->add('slug')
//            ->add('status')
            ->add('content','textarea', array('required' => false, 'attr' => array('class' => 'tinymce', 'data-theme' => 'advanced')))
            // seo page
            ->end()->end()
            ->tab('seo')->with('seo')
                ->add('page', 'sonata_type_admin', [
                    'label' => ' ',
                    'btn_add' => false,'btn_delete' => false,
                    'required' => false])
            ->end()->end()
                
                
//                ->add('page', 'sonata_type_model', [
//  
//                        'class' => \Bundles\PageBundle\Admin\PageAdmin::class,
//                    //    'query_builder' => function(EntityRepository $repository) {return $repository->createQueryBuilder('ClubType')->orderBy('ClubType.id', 'ASC');},
//                    ]
//                )

                                
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
//            ->add('slug')
//            ->add('status')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
//            ->add('slug')
//            ->add('status', null, array('label'=> 'Статус', 'editable' => true))
        ;
    }
    
    public function postPersist($item)
    {
        $this->savePage($item, true);
    }
    
    public function preUpdate($item)
    {    
        $this->savePage($item);
    }
    
}