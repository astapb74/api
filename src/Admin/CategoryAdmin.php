<?php
namespace App\Admin;

use App\Entity\Category;
use App\Controller\CRUDController;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\{ListMapper, DatagridMapper};
use Sonata\AdminBundle\Form\{FormMapper, Type\CollectionType, Type\ModelType};
use Symfony\Component\Form\Extension\Core\Type\{TextType, CheckboxType, TextareaType};
use Sonata\AdminBundle\Route\RouteCollection;


final class CategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
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