<?php

namespace Bundles\PageBundle\Admin;

use Bundles\PageBundle\Admin\PageableAdmin as Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        
        $obj = $this->getSubject();

        $imageOptions = array('required' => false, 'label' => 'Изображение на страницу новости');
        $imageIconOptions = array('required' => false, 'label' => 'Изображение для списка новостей');
        if ($obj && ($webPath = $obj->getImage())) {
            $imageOptions['help'] = '<img width="120px" src="'.$obj->getSrc().'" class="admin-preview" />';
        }
        
        if ($obj && ($webPath = $obj->getImageIcon())) {
            $imageIconOptions['help'] = '<img width="120px" src="'.$obj->getIconSrc().'" class="admin-preview" />';
        }
        
        $formMapper
            ->tab('News')->with('News')
            ->add('title', 'text', array('label' => 'Название'))
//            ->add('slug')
            ->add('file', 'file', $imageIconOptions)
            ->add('file2', 'file', $imageOptions)
            ->add('shortContent', 'textarea', ['label'=> 'Краткое описание', 'required' => false, 'attr' => ['class' => 'tinymce', 'data-theme' => 'advanced']])
            ->add('content', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml'))
            ->end()->end()
            ->tab('seo')->with('seo')
            ->add('page', 'sonata_type_admin', [
                'label' => ' ',
                'btn_add' => false,'btn_delete' => false,
                'required' => false])
            ->end()->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, ['label' => 'Название'])
            ->add('_action', 'actions', ['label'=> 'Действия',
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }
    
    public function prePersist($item)
    {
        $item->upload();
        $item->upload2();
        $this->makeSlug($item);
    }
    
    public function postPersist($item)
    {
        $this->savePage($item, true);
    }
    
    public function preUpdate($item)
    {    
        $item->upload();
        $item->upload2();
        $this->makeSlug($item);
        $this->savePage($item);
    }
    
}