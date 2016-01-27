<?php
    use Joomla\Registry\Registry;



    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsSubscriptionItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsSubscriptionTrait;

        public $id;

        public $status;
        public $product_id;
        public $account_id;
        public $order_line_item_id;
        public $created;
        public $date_start;
        public $date_end;
        public $bill_date;
        public $period;
        public $pm_ref_agreement_id;

        protected $_error = false;


        //--------------------------------------------------------
        /////////run create auto_pay on compatible payment methods.


        //get the subscription item subscription payment method,
        // product autopay required,
        // new AutopayPaymentMethod(initialize data);//create any identities necessary
        // for newly inintiated customers if necessary, for newly initiated subscriptions.

        public function update()
        {
            parent::update();

            $classname = 'Sp4kAppsSubscriptionPaymentMethods'.ucfirst($this->getState()->get('billing'));

            if(class_exists($classname)){

                /** @var Sp4kAppsSubscriptionPaymentMethodsBank $paymentProcessor */
                $paymentProcessor = new $classname(
                    new Registry([
                        'agreement'=>[
                            'account_config'=>$this->getState()->get('billing'),
                            'user'=>$this->getState()->get('juser'),
                            'paymentMonthInYear'=>(int)strftime('%m',$this->getState()->get('billing_start')),
                            'paymentDayInMonth'=>$this->getState()->get('paydate'),
                            'start'=>strftime('%d/%m/%Y',$this->getState()->get('billing_start'))
                        ],
                        'paymentinfo'=>$this->getState()->get('payinfo')
                    ])
                );

                //set up an account for this user if one does not already exist with the payment provider.
                $paymentProcessor->initializeAgreement();

                if($payment_error = $paymentProcessor->getError()){
                    $this->_error = $payment_error;
                }else{
                    $this->state = 1;
                    $this->status = 1;//failed/complete/unresolved/abandoned/cancelled/rejected
                    $this->pm_ref_agreement_id = $paymentProcessor->agreement_id;
                    $this->bind();
                    parent::update();
                }
            }

            return;
        }

        public function getError(){
            return $this->_error;
        }
    }

