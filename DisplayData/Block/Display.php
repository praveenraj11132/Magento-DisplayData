<?php
namespace Praveen\DisplayData\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use Praveen\DisplayData\Model\ResourceModel\Model\CollectionFactory as ModelCollectionFactory;
use Praveen\DisplayData\Model\ModelFactory;
use Praveen\DisplayData\Api\ModelRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $searchCriteriaBuilder;
    protected $filterBuilder;
    protected $_ModelCollectionFactory = null;
    protected $ModelFactory;
    protected $_ModelRepository;


    public function __construct(
        Context $context,
        ModelCollectionFactory $ModelCollectionFactory,ModelRepositoryInterface $ModelRepository,
        FilterBuilder $filterBuilder,SearchCriteriaBuilder $searchCriteriaBuilder,
        ModelFactory $ModelFactory,
        array $data = []
    ) {
        $this->ModelFactory = $ModelFactory;
        $this->_ModelRepository=$ModelRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->_ModelCollectionFactory  = $ModelCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getAddCarPostUrl() {

        return $this->getUrl('display/save/save');
    }
    public function getDeleteurl() {

      //  print_r($data);exit;
        return $this->getUrl('display/delete/delete');
    }

    public function getCollection()
    {
        
        $ModelCollection = $this->_ModelCollectionFactory ->create();
        $ModelCollection->addFieldToSelect('*')->load();
        return $ModelCollection->getItems();
    }
    public function fetchData()
    {
        // $objectManager=\Magento\Framework\App\ObjectManager::getInstance();
        $searchCriteriaBuilder = $this->searchCriteriaBuilder->create();
        // $searchCriteria = $searchCriteriaBuilder->addFilter('Id','%%','like')->create();
        $list = $this->_ModelRepository->getList($searchCriteriaBuilder);
        return $list->getItems();
    }
     
  
    // public function getArticleUrl($ModelId) {
    //      return $this->getUrl('blog/index/view/'.$ModelId, ['_secure' => true]);
    // }
}
// public function getcustomtable()
// {

//     $filter2 = $this->filterBuilder
//     ->setField("emp_id")
//     ->setValue(72)
//     ->setConditionType("eq")
//     ->create();

//     $this->searchCriteriaBuilder->addFilters([$filter1 , $filter2]);
// $searchCriteria = $this->searchCriteriaBuilder->create();

// $products  = $this->_carsRepository->getList($searchCriteria)->getItems();

//     return $products;
// }
// public function getcustomtable11()
// {
    
//    $filter1 = $this->filterBuilder->setField('emp_id')
//    ->setConditionType('like')
//    ->setValue('%12%')
//    ->create();
//    $filter2 = $this->filterBuilder->setField('Name')
//    ->setConditionType('like')
//    ->setValue('%test%')
//    ->create();
//    $this->searchCriteriaBuilder->addFilters([$filter1 , $filter2]);
//    //$this->searchCriteriaBuilder->addFilter($filter1);
//    $searchCriteria = $this->searchCriteriaBuilder->create();
//    $searchResult = $this->_carsRepository->getList($searchCriteria);
//    $items = $searchResult->getItems();
//    return $items;
//   }
// namespace Praveen\DisplayData\Block;

//  use \Magento\Framework\View\Element\Template;
//  use \Praveen\DisplayData\Model\ResourceModel\Model\Collection;

//  class Display extends Template
//  {
    
//      private $collection;

//      public function __construct(
//          Template\Context $context,
//          Collection $collection,
//          array $data = []
//      )

//     {
//          parent::__construct($context, $data);
//          $this->collection = $collection;
//     }

//      public function getAllCars() {
//         return $this->collection;
//      }

//     public function getAddCarPostUrl() {
//        return $this->getUrl('display/save/save');
//     }
//     public function getDeleteUrl()
//     {
//         return $this->getUrl('display/delete/delete');
//     }
// }  