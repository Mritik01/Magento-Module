<?php
/**
 * @author     Ritik
 * @company    BlueThink
 * @copyright  2022 Ritik
 * 
 */
namespace Bluethink\CustomPayMethod\Controller\Status;

use Magento\Checkout\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Quote\Model\QuoteFactory;

class Decline extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        Context $context,
        QuoteFactory $quoteFactory,
        Session $checkoutSession,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Sales\Api\OrderManagementInterface $orderManagement
    ) {
        parent::__construct($context);
        $this->orderManagement = $orderManagement;
        $this->quoteFactory = $quoteFactory;
        $this->checkoutSession = $checkoutSession;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {
        try {
            $order = $this->checkoutSession->getLastRealOrder();
            $quote = $this->quoteFactory->create()->loadByIdWithoutStore($order->getQuoteId());
            if ($quote->getId()) {
                $quote->setIsActive(1)->setReservedOrderId(null)->save();
                $this->checkoutSession->replaceQuote($quote);
                // $resultRedirect = $this->resultRedirectFactory->create();
                // $resultRedirect->setPath('checkout/cart');
                $this->messageManager->addWarningMessage('Payment Failed.');
                // return $resultRedirect;
            }
            $orderId = $order->getEntityId();
            $incrementId = $order->getIncrementId();
            $this->orderManagement->cancel($orderId);
            $msg= sprintf('Order has been reversed with Order Id: %s.', $incrementId);
            $this->messageManager->addSuccess(__($msg));
            $result = $this->resultJsonFactory->create();
            $result->setData(['status'=>200,'message'=>$msg]);
            return $result;
            
        } catch (\Exception $e) {
            $result = $this->resultJsonFactory->create();
            $this->messageManager->addError(__($e->getMessage()));
            $result->setData(['status'=>201,'message'=>'']);
            return $result;
        }
    }
}
