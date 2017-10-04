<?php

namespace Bundles\PageBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MenuAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('orderNum', null, array('label' => 'Порядок'))
            ->add('name', null, array('label' => 'Название'))
            ->add('url', null, array('label' => 'URL'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('orderNum', null, array('label' => 'Порядок'))
            ->add('name', null, array('label' => 'Название'))
            ->add('url', null, array('label' => 'URL'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, ['label' => 'Название', 'editable' => true])
            ->add('orderNum', null, array('label' => 'Порядок', 'editable' => true))
            ->add('url', null, array('label' => 'URL', 'editable' => true))
            ->add('_action', 'actions', ['label'=> 'Действия',
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }
    
}