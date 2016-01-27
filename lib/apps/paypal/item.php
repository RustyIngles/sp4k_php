<?php




    require JPATH_LIBRARIES  . '/sp4k/lib/PayPal-PHP-SDK/bootstrap.php';

    //use Joomla\Registry\Registry;
    //use PayPal\Rest\ApiContext;
    //use PayPal\Auth\OAuthTokenCredential;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsPaypalItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsPaypalTrait;

        public $status;

        public $id;
        public $created;
        public $createdby;

        public $payment_id;
        public $cart;
        public $total;

        private $_payment;

        protected function load(){
            return;
        }

        protected function bind(){
            return;
        }


        public function process(){
            $sdkConfig = array(
                "mode" => "sandbox"
            );
            // After Step 1
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    'AXg9iE-m2XOToUfY4sQ7V1vjQ7cSDnQjiop4aj-M7pgB3hO3ObTYVv8dL51FDkxNsX-Ov8N6p22RD6lS',     // ClientID
                    'ECRT-ONUf7gq42vbEG1lm9yrbvq1kTXFTCwbQuLiB9TFwZm15KvsBharvgUlR6Dls8sbeaiAWsgsfEHB'      // ClientSecret
                )
            );

            $apiContext->setConfig($sdkConfig);

            $this->setDummyState();

            $card_info = $this->getState()->get('card');

            $card = new \PayPal\Api\CreditCard();

            $card->setType($this->getCardType());
            $card->setNumber(       $card_info->number);
            $card->setExpireMonth(  $card_info->expire_month);
            $card->setExpireYear(   $card_info->expire_year);
            $card->setCvv2(         $card_info->cvv2);

            $fi = new \PayPal\Api\FundingInstrument();
            $fi->setCreditCard($card);

            $payer = new \PayPal\Api\Payer();
            $payer->setPaymentMethod("credit_card");
            $payer->setFundingInstruments(array($fi));

            // Specify the payment amount.
            $amount = new \PayPal\Api\Amount();
            $amount->setCurrency('GBP');
            $amount->setTotal($this->getState()->get('transaction.total'));

            // ###Transaction
            // A transaction defines the contract of a
            // payment - what is the payment for and who
            // is fulfilling it. Transaction is created with
            // a `Payee` and `Amount` types
            $transaction = new \PayPal\Api\Transaction();
            $transaction->setAmount($amount);
            $transaction->setDescription($this->getState()->get('payment.description'));

            $payment = new \PayPal\Api\Payment();
            $payment->setIntent("sale");
            $payment->setPayer($payer);
            $payment->setTransactions(array($transaction));
            //  try {
            //      $payment->create($apiContext);
            //  } catch (PayPal\Exception\PayPalConnectionException $ex) {
            //      $this->_error->code = $ex->getCode(); // Prints the Error Code
            //      $this->_error->message = $ex->getData(); // Prints the detailed error message
            //  }

            $this->_payment = $payment;
            $this->status = $this->_payment->getState();
            $this->transaction_id = $payment->transactions[0]->related_resources[0]->sale->id;
            $this->amount = $payment->transactions[0]->amount->total;
            return $this;
        }

        private function getCardType()
        {
            $number = preg_replace('/[^\d]/','',$this->getState()->get('card.number'));

            if (preg_match('/^3[47][0-9]{13}$/',$number))
            {
                return 'amex';
            }
            elseif (preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',$number))
            {
                //return 'Diners Club';
                return false;
            }
            elseif (preg_match('/^6(?:011|5[0-9][0-9])[0-9]{12}$/',$number))
            {
                return 'discover';
            }
            elseif (preg_match('/^(?:2131|1800|35\d{3})\d{11}$/',$number))
            {
                //return 'JCB';
                return false;
            }
            elseif (preg_match('/^5[1-5][0-9]{14}$/',$number))
            {
                return 'mastercard';
            }
            elseif (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/',$number))
            {
                return 'visa';
            }
            else
            {
                return false;
            }
        }

        private function setDummyState(){
            $cardState = new Joomla\Registry\Registry([
                'number'=>'5555555555554444',
                'expire_month'=>'12',
                'expire_year'=>'2017',
                'cvv2'=>'123'
            ]);

            $this->getState()->set('card',$cardState->toObject());


            $transactionState = new Joomla\Registry\Registry([
                'total'=>100
            ]);

            $this->getState()->set('transaction',$transactionState->toObject());

            $paymentState = new Joomla\Registry\Registry([
                'description'=>'test'
            ]);

            $this->getState()->set('payment',$paymentState->toObject());
        }

        public function getError(){
            return $this->_error;
        }


    }