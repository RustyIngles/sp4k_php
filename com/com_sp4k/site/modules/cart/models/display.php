<?php
use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/12/2015
 * Time: 5:33 PM
 */

class Sp4kModulesCartModelsDisplay extends Sp4kBaseModel
{
    public $error = false;
    public $cartTotals = [];

    public function execute()
    {
        $cartSession = JFactory::getSession();
        $cart = ($cart = $cartSession->get('cart',[],'Sp4k')) ? $cart : [];

        if(isset($cart['items']) && count($cart['items']) > 0){
            //foreach cart item build the line item for display;

            /** @var Sp4kAppsCartApp $cartApp */
            //$cartApp = Sp4kAppsCartApp::getInstance(new Registry($cart));
            //$cartItems = $cartApp->getItems();
            foreach($cart['items'] as $cartItem){
                $item = new stdClass();
                $item->description = $this->getItemDescription($cartItem);
                $item->totals = $this->getItemTotals($cartItem);
                $this->items[] = $item;
            }
        }
    }

    private function setCartSummary(){
        foreach($this->items as $item){
            if($item['plugins']['booking']){
                $test = 'test';
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
                    $item->product->title.
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
}
