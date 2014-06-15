<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Book;

class BookscrudController extends AbstractActionController {

    protected $_objectManager;

    public function indexAction() {
        $books = $this->getObjectManager()->getRepository('\Application\Entity\Book')->findAll();

        return new ViewModel(array('books' => $books));
    }
    
    public function addAction() {

        if ($this->request->isPost()) {
            $book = new Book();
            $book->setTitle($this->getRequest()->getPost('title'));
            $book->setAuthor($this->getRequest()->getPost('author'));
            $book->setPublisher($this->getRequest()->getPost('publisher'));
            $book->setIsbn($this->getRequest()->getPost('isbn'));

            $this->getObjectManager()->persist($book);
            $this->getObjectManager()->flush();
            $newId = $book->getId();

            return $this->redirect()->toRoute('home');
        }
        return new ViewModel();
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $book = $this->getObjectManager()->find('\Application\Entity\Book', $id);

        if ($this->request->isPost()) {
            $book->setTitle($this->getRequest()->getPost('title'));
            $book->setAuthor($this->getRequest()->getPost('author'));
            $book->setPublisher($this->getRequest()->getPost('publisher'));
            $book->setIsbn($this->getRequest()->getPost('isbn'));

            $this->getObjectManager()->persist($book);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('book' => $book));
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $book = $this->getObjectManager()->find('\Application\Entity\Book', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($book);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('book' => $book));
    }

    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}
