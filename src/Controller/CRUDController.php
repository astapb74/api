<?php
namespace App\Controller;

use Sonata\AdminBundle\Controller\CRUDController as BaseController;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CRUDController extends BaseController
{


   /**
     * @param $id
     */
    public function deleteAction($id)
    {
        $object = $this->admin->getSubject();

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id: %s', $id));
        }

        $object->setDeletedAt(new \DateTime());

        $this->admin->update($object);

        $this->addFlash('sonata_flash_success', 'Deleted successfully');

        return new RedirectResponse($this->admin->generateUrl('list'));
    }
}
