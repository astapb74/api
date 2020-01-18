<?php

namespace App\Admin;

use App\Entity\{Article, Category};
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\{ListMapper, DatagridMapper};
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\{TextType, CheckboxType, TextareaType};
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;

final class ArticleAddCategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('category', ModelType::class, [
            'class' => Category::class,
            'property' => 'name',
        ]);
        $formMapper->add('article', ModelType::class, [
            'class' => Article::class,
            'property' => 'title',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('created_at', DateRangeFilter::class);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('created_at');
        $listMapper->add('category.name');
        $listMapper->add('article.title');
    }

}
