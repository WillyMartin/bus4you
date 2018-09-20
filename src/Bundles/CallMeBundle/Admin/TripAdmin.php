<?php

namespace Bundles\CallMeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\BooleanType;

class TripAdmin extends Admin
{         
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null , ['label' => 'Имя'])
            ->add('phone', null , ['label' => 'Телефон'])
            ->add('email', null , ['label' => 'Email'])
            ->add('dispatch', null , ['label' => 'Точка отправления'])
            ->add('destination', null , ['label' => 'Точка прибытия'])
            ->add('date_travel', null , ['label' => 'Дата поездки'])
            /*->add('creation_time', null , ['label' => 'Дата оформления заявки'])*/
            ->add('services', null , ['label' => 'Дополнительные услуги'])
            ->add('quantity_people', null , ['label' => 'Количесто людей'])
            ->add('done', null , ['label' => 'Обработано'])
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('dispatch', null , ['label' => 'Точка отправления'])
            ->add('destination', null , ['label' => 'Точка прибытия'])
            ->add('date_travel', null , ['label' => 'Дата поездки'])
            ->add('name', null , ['label' => 'Имя'])
            ->add('phone', null , ['label' => 'Телефон'])
            ->add('email', null , ['label' => 'Email'])
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null , ['label' => 'Имя'])
            ->add('phone', null , ['label' => 'Телефон'])
            ->add('email', null , ['label' => 'Email'])
            ->add('dispatch', null , ['label' => 'Точка отправления'])
            ->add('destination', null , ['label' => 'Точка прибытия'])
            ->add('date_travel', null , ['label' => 'Дата поездки'])
            ->add('services', null , ['label' => 'Дополнительные услуги'])
            ->add('quantity_people', null , ['label' => 'Количесто людей'])
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