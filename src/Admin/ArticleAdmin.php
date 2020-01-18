<?php
namespace App\Admin;

use App\Entity\{Article, Category};
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\{ListMapper, DatagridMapper};
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\{TextType, CheckboxType, TextareaType};
use Sonata\AdminBundle\Route\RouteCollection;

final class ArticleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('text', TextareaType::class);
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
        $listMapper->add('deleted_at');
        $listMapper->add('_action', null, [
            'actions' => [
                'edit' => [],
                'delete' => [],
            ],
        ]);
    }

    public function getBatchActions()
    {
        // retrieve the default batch actions (currently only delete)
        $actions = parent::getBatchActions();

        if (
          $this->hasRoute('edit') && $this->isGranted('EDIT') &&
          $this->hasRoute('delete') && $this->isGranted('DELETE')
        ) {
            unset($actions['delete']);
            // $actions['deleted'] = array(
            //     'label' => 'todeleted', //$this->trans('todeleted', array(), 'App'),
            //     'ask_confirmation' => true
            // );

        }

        return $actions;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->add('delete', $this->getRouterIdParameter().'/delete');
    }

}