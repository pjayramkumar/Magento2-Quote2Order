<?php
namespace Elightwalk\Quote2Order\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $quoteFactory;

	protected $quoteManagement;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Quote\Model\QuoteFactory $quoteFactory,
		\Magento\Quote\Model\QuoteManagement $quoteManagement
		
	)
	{
		$this->quoteFactory = $quoteFactory;
		$this->quoteManagement = $quoteManagement;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		echo "<pre>";
		echo "Hello World";
		exit;
		$quoteId = 2; 
		// $customerQuote = $this->quoteFactory->create();
		$oldQuote = $this->quoteFactory->create()->loadByIdWithoutStore($quoteId);
		$oldQuote->setIsActive(1)->setReservedOrderId(null);

		// Create Order From Quote
		$orderdata = $this->quoteManagement->submit($oldQuote);

		print_r($orderdata->getId());
		exit;
	}
}

