<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/12/2015
     * Time: 5:33 PM
     */

    class Sp4kModulesCartModelsReviewDisplay extends Sp4kBaseModel
    {
        public $items;
        public $error = false;
        public $cartTotals = [];

        public function execute()
        {
            $cartSession = JFactory::getSession();
            $cart = ($cart = $cartSession->get('cart',[],'Sp4k')) ? $cart : [];

            if(count($cart['items']) > 0){

                $this->items = $cart['items'];
                $this->setTotals();
                $this->setDescriptions();
                $this->setPayment();

                $cart['items'] = $this->items;
                $this->items = null;
                $cart['totals'] = $this->orderTotals;
                $cartSession->set('cart',$cart,'Sp4k');

                //foreach cart item build the line item for display;
                foreach($cart['items'] as $cartItem){
                    $item = new stdClass();
                    $item->description = $this->getItemDescription($cartItem);
                    $item->totals = $this->getItemTotals($cartItem);
                    $this->items[] = $item;
                }
            }
        }

        /**
         * Need to set up payment form at cart items.
         *
         */

        private function setDescriptions(){
            foreach($this->items as &$item){
                if($item->plugins->booking){
                    if($item->plugins->booking->type == 'subscription'){
                        $item->description =
                            $item->product->title.
                            ' at '.$item->plugins->booking->venue->title.
                            ' for '.$item->plugins->booking->attendee->name.
                            ' every '.$item->plugins->schedule->rrule->byday.
                            ' starting '.strftime('%d/%m/%Y',$item->plugins->booking->date_start);

                    }elseif($item->plugins->booking->type == 'mutlidate'){
                        $item->description =
                            $item->product->tite.
                            ' at '.$item->plugins->booking->venue->title.
                            ' for '.$item->plugins->booking->attendee->name.
                            ' on '.implode(',', $item->plugins->booking->dates );
                    }elseif($item->plugins->booking->type == 'oneoff'){
                        $item->description =
                            $item->product->title.
                            ' at '.$item->plugins->booking->venue->title.
                            ' for '.$item->plugins->booking->attendee->name.
                            ' on '.$item->plugins->booking->date;
                    }

                }else{
                    $description = $item->product->title;
                }
            }
        }

        private function getItemDescription($item){
            if($item->plugins->booking){
                if($item->plugins->booking->type == 'subscription'){
                    $description =
                        $item->product->title.
                        ' at '.$item->plugins->booking->venue->title.
                        ' for '.$item->plugins->booking->attendee->name.
                        ' every '.$item->plugins->schedule->rrule->byday.
                        ' starting '.strftime('%d/%m/%Y',$item->plugins->booking->date_start);
                }elseif($item->plugins->booking->type == 'mutlidate'){
                    $description =
                        $item->product->tite.
                        ' at '.$item->plugins->booking->venue->title.
                        ' for '.$item->plugins->booking->attendee->name.
                        ' on '.implode(',', $item->plugins->booking->dates );
                }elseif($item->plugins->booking->type == 'oneoff'){
                    $description =
                        $item->product->title.
                        ' at '.$item->plugins->booking->venue->title.
                        ' for '.$item->plugins->booking->attendee->name.
                        ' on '.$item->plugins->booking->date;
                }

            }else{
                $description = $item->product->title;
            }

            return $description;
        }

        private function setTotals(){

            $this->orderTotals['cost_now'] = isset($this->cartTotals['cost_now']) ? $this->cartTotals['cost_now'] : 0;
            $this->orderTotals['cost_next'] = isset($this->cartTotals['cost_now']) ? $this->cartTotals['cost_now'] : 0;

            foreach($this->items as &$item){
                if($pricing = $item->plugins->pricing){
                    if($pricing->type == 'unitspercycle'){
                        $this->orderTotals['cost_now']   += $item->plugins->pricing->cost_now;
                        $this->orderTotals['cost_next']  +=$item->plugins->pricing->cost_next;
                    }elseif($pricing->type == 'qtyselected'){
                        $this->orderTotals['cost_now']   += $item->plugins->pricing->cost;
                    }elseif($pricing->type == 'flat') {
                        $this->orderTotals['cost_now']   += $item->plugins->pricing->cost;
                    }
                }
            }

        }

        private function getItemTotals($item){
            $totals['cost_now']     = 0;
            $totals['cost_next']    = 0;

            $this->cartTotals['cost_now'] = isset($this->cartTotals['cost_now']) ? $this->cartTotals['cost_now'] : 0;
            $this->cartTotals['cost_next'] = isset($this->cartTotals['cost_now']) ? $this->cartTotals['cost_now'] : 0;

            if($pricing = $item->plugins->pricing){
                if($pricing->type == 'unitspercycle' || 1){
                    $this->cartTotals['cost_now'] += $totals['cost_now'] = $item->plugins->pricing->cost_now;
                    $totals['cost_next']=$item->plugins->pricing->cost_next;
                }elseif($pricing->type == 'qtyselected'){
                    $this->cartTotals['cost_now'] += $totals['cost_now'] = $item->plugins->pricing->cost;
                }elseif($pricing->type == 'flat') {
                    $this->cartTotals['cost_now'] += $totals['cost_now'] = $item->plugins->pricing->cost;
                }
            }

            return $totals;
        }

        private function setPayment(){
            foreach($this->items as $item){
                if($item->product->plugins->payment->recurring->enable){
                    $this->recurring = true;
                }

                if($item->product->plugins->payment->paynow->enable) {
                    $this->paynow  = true;
                }
            }
        }
    }
