<?php
class char {
}

class duration {
}

class guid {
}

class EntityKey {
  public $EntityContainerName; // string
  public $EntityKeyValues; // ArrayOfEntityKeyMember
  public $EntitySetName; // string
  public $Id; // ID
  public $Ref; // IDREF
}

class EntityKeyMember {
  public $Key; // string
  public $Value; // anyType
}

class EntityObject {
  public $EntityKey; // EntityKey
}

class StructuralObject {
  public $Id; // ID
  public $Ref; // IDREF
}

class EntityReferenceOfaddressT_Pq1oBak {
}

class EntityReference {
  public $EntityKey; // EntityKey
}

class RelatedEnd {
}

class EntityReferenceOfbrunchT_Pq1oBak {
}

class EntityReferenceOfuserlevelT_Pq1oBak {
}

class EntityReferenceOfuserT_Pq1oBak {
}

class EntityReferenceOfareaT_Pq1oBak {
}

class EntityReferenceOfcityT_Pq1oBak {
}

class EntityReferenceOfstreetT_Pq1oBak {
}

class EntityReferenceOfcustomerT_Pq1oBak {
}

class EntityReferenceOfbillT_Pq1oBak {
}

class EntityReferenceOfcard_typesT_Pq1oBak {
}

class EntityReferenceOfpayment_typeT_Pq1oBak {
}

class EntityReferenceOfdelivery_guysT_Pq1oBak {
}

class EntityReferenceOfitems_groupsT_Pq1oBak {
}

class EntityReferenceOfitemT_Pq1oBak {
}

class EntityReferenceOforderT_Pq1oBak {
}

class EntityReferenceOfshiftT_Pq1oBak {
}

class DateTimeOffset {
  public $DateTime; // dateTime
  public $OffsetMinutes; // short
}

class order {
  public $bill; // bill
  public $billReference; // EntityReferenceOfbillT_Pq1oBak
  public $bill_id; // int
  public $brunch; // brunch
  public $brunchReference; // EntityReferenceOfbrunchT_Pq1oBak
  public $brunch_id; // int
  public $closed_time; // dateTime
  public $customer; // customer
  public $customerReference; // EntityReferenceOfcustomerT_Pq1oBak
  public $customer_id; // int
  public $delivery_guy_id; // int
  public $delivery_guys; // delivery_guys
  public $delivery_guysReference; // EntityReferenceOfdelivery_guysT_Pq1oBak
  public $order_id; // int
  public $order_status_id; // int
  public $order_time; // dateTime
  public $ordered_products_lines; // ArrayOfordered_products_lines
  public $shift; // shift
  public $shiftReference; // EntityReferenceOfshiftT_Pq1oBak
  public $shift_id; // int
  public $taken; // boolean
  public $teken_time; // dateTime
  public $to_deliver_time; // dateTime
  public $total_price; // double
  public $user; // user
  public $userReference; // EntityReferenceOfuserT_Pq1oBak
  public $user_id; // int
}

class bill {
  public $customer_id; // int
  public $customers; // customer
  public $customersReference; // EntityReferenceOfcustomerT_Pq1oBak
  public $id; // int
  public $ispayed; // boolean
  public $orders; // ArrayOforder
  public $paymentdetails; // ArrayOfpaymentdetail
  public $total_price; // double
}

class customer {
  public $address; // address
  public $addressReference; // EntityReferenceOfaddressT_Pq1oBak
  public $address_id; // int
  public $bill; // ArrayOfbill
  public $birth_date; // dateTime
  public $customer_another_phone; // string
  public $customer_email; // string
  public $customer_id; // int
  public $customer_lastname; // string
  public $customer_name; // string
  public $customer_phone; // string
  public $orders; // ArrayOforder
}

class address {
  public $address_id; // int
  public $apartment; // int
  public $brunches; // ArrayOfbrunch
  public $city; // city
  public $cityReference; // EntityReferenceOfcityT_Pq1oBak
  public $city_id; // int
  public $customers; // ArrayOfcustomer
  public $home_number; // int
  public $street; // street
  public $streetReference; // EntityReferenceOfstreetT_Pq1oBak
  public $street_id; // int
  public $users; // ArrayOfuser
  public $zip_code; // int
}

class brunch {
  public $address; // address
  public $addressReference; // EntityReferenceOfaddressT_Pq1oBak
  public $address_id; // int
  public $brunch_id; // int
  public $brunch_name; // string
  public $delivery_guys; // ArrayOfdelivery_guys
  public $orders; // ArrayOforder
  public $shifts; // ArrayOfshift
  public $users; // ArrayOfuser
}

class delivery_guys {
  public $brunch; // brunch
  public $brunchReference; // EntityReferenceOfbrunchT_Pq1oBak
  public $brunch_id; // int
  public $first_name; // string
  public $id; // int
  public $is_active; // boolean
  public $last_name; // string
  public $orders; // ArrayOforder
  public $phone; // string
}

class shift {
  public $brunch; // brunch
  public $brunchReference; // EntityReferenceOfbrunchT_Pq1oBak
  public $brunch_id; // int
  public $manager_user_id; // int
  public $orders; // ArrayOforder
  public $shift_end; // dateTime
  public $shift_id; // int
  public $shift_start; // dateTime
  public $user; // user
  public $userReference; // EntityReferenceOfuserT_Pq1oBak
}

class user {
  public $address; // address
  public $addressReference; // EntityReferenceOfaddressT_Pq1oBak
  public $address_id; // int
  public $brunch; // brunch
  public $brunchReference; // EntityReferenceOfbrunchT_Pq1oBak
  public $brunch_id; // int
  public $email; // string
  public $first_name; // string
  public $last_name; // string
  public $level_id; // int
  public $orders; // ArrayOforder
  public $password; // string
  public $shifts; // ArrayOfshift
  public $timestamp; // DateTimeOffset
  public $user_id; // int
  public $userlevel; // userlevel
  public $userlevelReference; // EntityReferenceOfuserlevelT_Pq1oBak
  public $username; // string
}

class userlevel {
  public $description; // string
  public $level_id; // int
  public $level_name; // string
  public $users; // ArrayOfuser
}

class city {
  public $addresses; // ArrayOfaddress
  public $area; // area
  public $areaReference; // EntityReferenceOfareaT_Pq1oBak
  public $area_id; // int
  public $city_id; // int
  public $city_name; // string
}

class area {
  public $area_name; // string
  public $cities; // ArrayOfcity
  public $id; // int
}

class street {
  public $addresses; // ArrayOfaddress
  public $street_id; // int
  public $street_name; // string
}

class paymentdetail {
  public $bill; // bill
  public $billReference; // EntityReferenceOfbillT_Pq1oBak
  public $bill_id; // int
  public $card_exparition; // dateTime
  public $card_holder; // string
  public $card_number; // string
  public $card_type; // int
  public $card_types; // card_types
  public $card_typesReference; // EntityReferenceOfcard_typesT_Pq1oBak
  public $id; // int
  public $payed_date; // dateTime
  public $payment_type; // byte
  public $payment_type1; // payment_type
  public $payment_type1Reference; // EntityReferenceOfpayment_typeT_Pq1oBak
  public $sum; // double
}

class card_types {
  public $id; // int
  public $paymentdetails; // ArrayOfpaymentdetail
  public $type_name; // string
}

class payment_type {
  public $id; // byte
  public $payment_type1; // string
  public $paymentdetails; // ArrayOfpaymentdetail
}

class ordered_products_lines {
  public $extra_wishes; // string
  public $item; // item
  public $itemReference; // EntityReferenceOfitemT_Pq1oBak
  public $item_id; // int
  public $order; // order
  public $orderReference; // EntityReferenceOforderT_Pq1oBak
  public $order_id; // int
  public $order_line_id; // long
}

class item {
  public $description; // string
  public $item_group_id; // int
  public $item_id; // int
  public $item_name; // string
  public $items_groups; // items_groups
  public $items_groupsReference; // EntityReferenceOfitems_groupsT_Pq1oBak
  public $ordered_products_lines; // ArrayOfordered_products_lines
  public $price; // double
}

class items_groups {
  public $id; // int
  public $items; // ArrayOfitem
  public $name; // string
}

class Test {
  public $value; // int
}

class TestResponse {
  public $TestResult; // string
}

class getNewOrders {
  public $brunchID; // int
}

class getNewOrdersResponse {
  public $getNewOrdersResult; // ArrayOforder
}

class newOrdersNum {
  public $brunchID; // int
}

class newOrdersNumResponse {
  public $newOrdersNumResult; // int
}

class insertOrder {
  public $newOrder; // order
}

class insertOrderResponse {
  public $insertOrderResult; // int
}

class insertOrderMoreParams {
  public $brunchid; // int
  public $userID; // int
  public $order_time; // dateTime
  public $shiftId; // int
  public $totalPrice; // double
  public $customerName; // string
  public $customerLastName; // string
  public $customerPhone; // string
  public $customer; // string
  public $customerEmail; // string
  public $cutomerAnotherPhone; // string
  public $customerBirth_date; // dateTime
  public $homeNum; // int
  public $apartment; // int
  public $zipcode; // int
  public $cityIdFromMainDB; // int
  public $AreaIdFromMainDB; // int
  public $streetIdFromMainDB; // int
  public $billTotalPrice; // double
  public $BillIspayed; // boolean
  public $paymentdetails; // ArrayOfpaymentdetail
  public $orderedItemsLines; // ArrayOfordered_products_lines
}

class insertOrderMoreParamsResponse {
  public $insertOrderMoreParamsResult; // int
}

class registRecivedOrders {
  public $ids; // ArrayOfint
}

class registRecivedOrdersResponse {
  public $registRecivedOrdersResult; // boolean
}

class closedOrdersByIds {
  public $ids; // ArrayOfint
}

class closedOrdersByIdsResponse {
  public $closedOrdersByIdsResult; // ArrayOforder
}

class markClosedOrders {
  public $orders; // ArrayOforder
}

class markClosedOrdersResponse {
  public $markClosedOrdersResult; // boolean
}


/**
 * Service class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class Service extends SoapClient {

  private static $classmap = array(
                                    'char' => 'char',
                                    'duration' => 'duration',
                                    'guid' => 'guid',
                                    'EntityKey' => 'EntityKey',
                                    'EntityKeyMember' => 'EntityKeyMember',
                                    'EntityObject' => 'EntityObject',
                                    'StructuralObject' => 'StructuralObject',
                                    'EntityReferenceOfaddressT_Pq1oBak' => 'EntityReferenceOfaddressT_Pq1oBak',
                                    'EntityReference' => 'EntityReference',
                                    'RelatedEnd' => 'RelatedEnd',
                                    'EntityReferenceOfbrunchT_Pq1oBak' => 'EntityReferenceOfbrunchT_Pq1oBak',
                                    'EntityReferenceOfuserlevelT_Pq1oBak' => 'EntityReferenceOfuserlevelT_Pq1oBak',
                                    'EntityReferenceOfuserT_Pq1oBak' => 'EntityReferenceOfuserT_Pq1oBak',
                                    'EntityReferenceOfareaT_Pq1oBak' => 'EntityReferenceOfareaT_Pq1oBak',
                                    'EntityReferenceOfcityT_Pq1oBak' => 'EntityReferenceOfcityT_Pq1oBak',
                                    'EntityReferenceOfstreetT_Pq1oBak' => 'EntityReferenceOfstreetT_Pq1oBak',
                                    'EntityReferenceOfcustomerT_Pq1oBak' => 'EntityReferenceOfcustomerT_Pq1oBak',
                                    'EntityReferenceOfbillT_Pq1oBak' => 'EntityReferenceOfbillT_Pq1oBak',
                                    'EntityReferenceOfcard_typesT_Pq1oBak' => 'EntityReferenceOfcard_typesT_Pq1oBak',
                                    'EntityReferenceOfpayment_typeT_Pq1oBak' => 'EntityReferenceOfpayment_typeT_Pq1oBak',
                                    'EntityReferenceOfdelivery_guysT_Pq1oBak' => 'EntityReferenceOfdelivery_guysT_Pq1oBak',
                                    'EntityReferenceOfitems_groupsT_Pq1oBak' => 'EntityReferenceOfitems_groupsT_Pq1oBak',
                                    'EntityReferenceOfitemT_Pq1oBak' => 'EntityReferenceOfitemT_Pq1oBak',
                                    'EntityReferenceOforderT_Pq1oBak' => 'EntityReferenceOforderT_Pq1oBak',
                                    'EntityReferenceOfshiftT_Pq1oBak' => 'EntityReferenceOfshiftT_Pq1oBak',
                                    'DateTimeOffset' => 'DateTimeOffset',
                                    'order' => 'order',
                                    'bill' => 'bill',
                                    'customer' => 'customer',
                                    'address' => 'address',
                                    'brunch' => 'brunch',
                                    'delivery_guys' => 'delivery_guys',
                                    'shift' => 'shift',
                                    'user' => 'user',
                                    'userlevel' => 'userlevel',
                                    'city' => 'city',
                                    'area' => 'area',
                                    'street' => 'street',
                                    'paymentdetail' => 'paymentdetail',
                                    'card_types' => 'card_types',
                                    'payment_type' => 'payment_type',
                                    'ordered_products_lines' => 'ordered_products_lines',
                                    'item' => 'item',
                                    'items_groups' => 'items_groups',
                                    'Test' => 'Test',
                                    'TestResponse' => 'TestResponse',
                                    'getNewOrders' => 'getNewOrders',
                                    'getNewOrdersResponse' => 'getNewOrdersResponse',
                                    'newOrdersNum' => 'newOrdersNum',
                                    'newOrdersNumResponse' => 'newOrdersNumResponse',
                                    'insertOrder' => 'insertOrder',
                                    'insertOrderResponse' => 'insertOrderResponse',
                                    'insertOrderMoreParams' => 'insertOrderMoreParams',
                                    'insertOrderMoreParamsResponse' => 'insertOrderMoreParamsResponse',
                                    'registRecivedOrders' => 'registRecivedOrders',
                                    'registRecivedOrdersResponse' => 'registRecivedOrdersResponse',
                                    'closedOrdersByIds' => 'closedOrdersByIds',
                                    'closedOrdersByIdsResponse' => 'closedOrdersByIdsResponse',
                                    'markClosedOrders' => 'markClosedOrders',
                                    'markClosedOrdersResponse' => 'markClosedOrdersResponse',
                                   );

  public function Service($wsdl = "http://www.yura-burger.com/Service.svc?wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param Test $parameters
   * @return TestResponse
   */
  public function Test(Test $parameters) {
    return $this->__soapCall('Test', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param getNewOrders $parameters
   * @return getNewOrdersResponse
   */
  public function getNewOrders(getNewOrders $parameters) {
    return $this->__soapCall('getNewOrders', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param newOrdersNum $parameters
   * @return newOrdersNumResponse
   */
  public function newOrdersNum(newOrdersNum $parameters) {
    return $this->__soapCall('newOrdersNum', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param insertOrder $parameters
   * @return insertOrderResponse
   */
  public function insertOrder(insertOrder $parameters) {
    return $this->__soapCall('insertOrder', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param insertOrderMoreParams $parameters
   * @return insertOrderMoreParamsResponse
   */
  public function insertOrderMoreParams(insertOrderMoreParams $parameters) {
    return $this->__soapCall('insertOrderMoreParams', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param registRecivedOrders $parameters
   * @return registRecivedOrdersResponse
   */
  public function registRecivedOrders(registRecivedOrders $parameters) {
    return $this->__soapCall('registRecivedOrders', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param closedOrdersByIds $parameters
   * @return closedOrdersByIdsResponse
   */
  public function closedOrdersByIds(closedOrdersByIds $parameters) {
    return $this->__soapCall('closedOrdersByIds', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param markClosedOrders $parameters
   * @return markClosedOrdersResponse
   */
  public function markClosedOrders(markClosedOrders $parameters) {
    return $this->__soapCall('markClosedOrders', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

}

?>
