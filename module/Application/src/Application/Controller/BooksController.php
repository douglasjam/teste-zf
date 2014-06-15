<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Application\Entity\Book;

class BooksController extends AbstractRestfulController {

    protected $_objectManager;

    public function getList() {

        // captura os parametros da url
        $parametrosPermitidos = array('title', 'author', 'publisher', 'isbn');
        $parametros = $this->params()->fromQuery();


        $qb = $this->getObjectManager()->getRepository('\Application\Entity\Book')->createQueryBuilder('c');
        
        foreach ($parametros as $parametro => $valor) {
            if (in_array($parametro, $parametrosPermitidos)) {
                $qb->andWhere($qb->expr()->like('c.' . $parametro, ':' . $parametro));
                $qb->setParameter($parametro, '%' . $valor . '%');
            }
        }

        $books = $qb->getQuery()->getResult();

        $retorno = array();

        foreach ($books as $book) {
            $retorno[] = array(
                'title' => $book->getTitle(),
                'author' => $book->getAuthor(),
            );
        }

        return new JsonModel($retorno);
    }

    public function get($id) {

        $id = (int) $this->params()->fromRoute('id', 0);
        $book = $this->getObjectManager()->find('\Application\Entity\Book', $id);

        $retorno = array();

        if ($book != null)
            $retorno = array(
                'title' => $book->getTitle(),
                'author' => $book->getAuthor(),
                'isbn' => $book->getIsbn(),
                'publisher' => $book->getPublisher(),
            );


        return new JsonModel($retorno);
    }

    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}
