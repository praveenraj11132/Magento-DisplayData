<?php
namespace Praveen\DisplayData\Controller\View;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\App\ResponseInterface;
use \Praveen\DisplayData\Model\Model;
use \Praveen\DisplayData\Model\ResourceModel\Model as ModelInterfaceResource;

class Add extends Action
{
  
    private $model;
    private $modelinterfaceResource;

    public function __construct(
        Context $context,
        Model $model,
        ModelInterfaceResource $modelinterfaceResource
    )
    {
        parent::__construct($context);
        $this->model = $model;
        $this->modelinterfaceResource = $modelinterfaceResource;
    }

    public function execute()
    {
        
        $data = $this->getRequest()->getParams();

        $modelModel = $this->model;
        $modelModel->setData($data);

        try {
            /* Use the resource model to save the model in the DB */
            $this->modelinterfaceResource->save($modelModel);
            $this->messageManager->addSuccessMessage("Car saved successfully!");
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__("Error saving car"));
        }

        /* Redirect back to cars page */
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('display');
        return $redirect;
    }
}  