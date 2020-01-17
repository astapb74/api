<?php

// src/Admin/AddressAdmin.php

namespace App\Admin;

use App\Entity\{Article, Category};
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\{ListMapper, DatagridMapper};
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\{TextType, CheckboxType, TextareaType};

final class ArticleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('text', TextareaType::class);
        // $formMapper->add('category', ModelType::class, [
        //     'class' => Category::class,
        //     'property' => 'name',
        // ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
        $listMapper->add('created_at');
        $listMapper->add('updated_at');
    }
}