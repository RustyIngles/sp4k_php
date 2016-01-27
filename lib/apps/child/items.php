<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/2/2015
 * Time: 9:49 AM
 */

/*
 * todo versioning
 *
 * given a venue, and a product class, find the events for that product class and that venue are active.
 *
 *  we may want to filter for product type, parent category or product_id.
 * product type would be like a skills class.
 * category would be tots
 *
 * select * from events where venue_id = x and product_id = y and product_type = z
 *
 *
 * next we convert the rrule for the events matching to a list of dates, moving forward from today.
 *
 * or we don't use the rrule, just set teh date repeating, and the time. Then show the time in the
 * item list.
 *
 *
 */


    class Sp4kAppsChildItems extends Sp4kAppsAbstractItems
    {
        use Sp4kAppsChildTrait;


    }