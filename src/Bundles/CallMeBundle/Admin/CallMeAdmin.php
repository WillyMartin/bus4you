<?php

namespace Bundles\CallMeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\BooleanType;

class CallMeAdmin extends Admin
{         
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null , ['label' => 'Имя'])
            ->add('phone', null , ['label' => 'Телефон'])
            ->add('done', null , ['label' => 'Обработано']) 
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {        
        $datagridMapper
            ->add('name', null , ['label' => 'Имя'])
            ->add('phone', null , ['label' => 'Телефон'])
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null , ['label' => 'Имя'])
            ->add('phone', null , ['label' => 'Телефон'])
            ->add('done', null , ['editable' => true, 'label' => 'Обработано'])
            ->add('_action', 'actions', ['label'=> 'Действия',
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }
    
}