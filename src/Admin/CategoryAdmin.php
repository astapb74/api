<?php

// src/Admin/CityAdmin.php

namespace App\Admin;

use App\Entity\Category;
//use App\Entity\City;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class CategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
        // $formMapper->add('description', TextareaType::class);
        // $formMapper->add('isBig', CheckboxType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->add('created_at');
        $listMapper->add('updated_at');
    }
}