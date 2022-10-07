<?php
namespace Praveen\DisplayData\Controller\Save;

    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\Exception\CouldNotSaveException;
    use Magento\Framework\Exception\LocalizedException;
    use Magento\Framework\Exception\NoSuchEntityException;
    use Magento\Framework\View\Result\PageFactory;

    use Praveen\DisplayData\Api\ModelRepositoryInterface;
    use Praveen\DisplayData\Api\Data\ModelInterface;
    
class Save extends Action
{
   
        protected $_pageFactory;
        protected $_ModelRepository;
        protected $_Model;

        public function __construct(
            
            Context $context,
            PageFactory $pageFactory,
            ModelRepositoryInterface $ModelRepository,
            ModelInterface $ModelInterface
        ) {
            $this->_pageFactory = $pageFactory;
            $this->_ModelRepository=$ModelRepository;
            $this->_Model = $ModelInterface;
            return parent::__construct($context);
        }

        public function execute()
        {
            $data = $this->getRequest()->getParams();
            // $EmpId =$data['emp_id'];
            $name =$data['Name'];
            $email =$data['Email'];
            $telephone =$data['Telephone'];
            
            $Model = $this->_Model;
        // $this->_EmployeeModel->setEmpId($EmpId);
      $this->_Model->setName($name);
      $this->_Model->setEmail($email);
       $this->_Model->setTelephone($telephone);

        try {
          
            /* Use the resource model to save the model in the DB */
            $this->_ModelRepository->save($Model);
            $this->messageManager->addSuccessMessage("PraveenData saved successfully!");
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            die;
            $this->messageManager->addErrorMessage(__("Error saving data"));
        }
    
        /* Redirect back to cars page */
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('display');
        return $redirect;
        }
    }
?>