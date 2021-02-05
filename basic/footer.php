
<?php

echo '
<div class="foot">
    <!--copyright-------------->
    <span class="copyright">
        Subscribe For News Letter <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
    </span>
    <!--subcribe---------------->
    <div class="subscribe">
        <form action="basic/subscribe_insert.php" method="POST">
        <input name="email" type="email" placeholder="Example@gmail.com" required/>
        <input type="submit" class="btn Button-Cart" value="Subscribe" name="subscribe">
        </form>
    </div>
</div>
<footer class="site-footer">
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-6">
     <div class="footer-logo ">
        <img src="img/new1.png" alt="">
     </div>
    <h5 class="mt-4 font-weight-bold">Urban Kleid – Engineered Fashion.</h5>
    <strong>Write to us :</strong>
    <a href="mailto:#">contact@urbankleid.com</a>
      <p class="text-justify mt-2">New Delhi
      795 Folsom Ave, Suite 600
      San Francisco, CA 94107
      P: (123) 456-7890 </p>
    </div>

    <div class="col-6 col-md-3">
      <h6>Information</h6>
      <ul class="footer-links ">
        <li><a href="products.php">Our Products</a></li>
        <li><a href="#" data-toggle="modal" data-target="#exampleModalLong2">Terms of Purchase</a></li>
        <li><a href="#" data-toggle="modal" data-target="#exampleModalLong3">Security Terms</a></li>
        <li><a href="#" data-toggle="modal" data-target="#exampleModalLong4">Returns Policy</a></li>
      </ul>
    </div>

    <div class="col-6 col-md-3">
      <h6>Quick Links</h6>
      <ul class="footer-links">
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
       
        <li><a href="#" data-toggle="modal" data-target="#exampleModalLong">Privacy Policy</a></li>
        
      </ul>
    </div>
  </div>
  <hr class="small">
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-6 col-12">
      <p class="copyright-text ">Copyright © 2020-' . date('Y') . '  All Rights Reserved by
        <a href="#">Urban Kleid </a>.
       
      </p>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
    
    
            <!--social-links--->
            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <!--phone-number------>        

    </div>
  </div>
</div>
</footer>
';

?>
<style>
  .modal-body ul li {
    margin: 10px;

  }
</style>



<!--Terms and condition  Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle " aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">PRIVACY POLICY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li>1. URBAN KLEID is committed to protecting the privacy of its online Clients in providing a secure Online Shop for electronic commerce transactions.</li>
          <li>2. When ordering products from URBAN KLEID's Online Shop, You will be asked to provide personal information including your name, delivery address, telephone number, product selections as well as payment card details. All the Personal Information provided by you will be used to process your orders and is collected with your knowledge and express authorisation upon opening an Online Shop account.</li>
          <li>3. Information provided at the time of making an order will be used to process the order including payment and delivery. If you have activated the consent box, you will also receive information on our products and promotions we feel may be of interest to you.</li>
          <li>4. Your Personal information may also be used for marketing research relating to URBAN KLEID. It will not be used for any unsolicited communication to users unless so authorised by them. URBAN KLEID will use its best endeavours to ensure that such data is kept secure at all times. Unless required to do so by law, URBAN KLEID will not otherwise share, sell or distribute any of the Personal information you provide to us without your consent in writing and upon request, URBAN KLEID will remove users' personal information from its database thereby cancelling their online account.</li>
          <li>5. Upon request by sending an e-mail to: contact@urbankleid.com, You may access, rectify, cancel and/or request that any erroneous information concerning your Personal Data be corrected in particular in the event that your personal details change.</li>
          <li>6. URBAN KLEID, from time to time, may collect information about your usage of our website related with URBAN KLEID preferences. We will use and analyse the collected information to administer, support, improve and develop our business to provide you with the best service and this information may be shared with our partner suppliers for analytical purposes only.</li>
          <li>7. We use cookies to help keep track of your current shopping session and shopping basket content. If you do not accept cookies, you will be unable to use the Online Shop.
            Any further doubt, query or suggestions relating to any services provided through the Website should either be e-mailed to contact@urbankleid.com. </li> <br>
          <b>We trust our privacy policy demonstrates our commitment to protecting your privacy.
          </b>
          <hr>
          <p class="lead">Regards <br> Urban Kleid</p>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!--Term of purchase   Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle " aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">TERM'S OF PURCHASE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li><b>1. LEGAL </b>
            <hr>
            Welcome to URBAN KLEID Online Store, where you will find a range of URBAN KLEID products specially selected for our Online customers. We only offers products for sale that are in stock and available for dispatch from its warehouse. Although much effort has gone into producing high quality images of our product selection, we cannot guarantee that your monitor or handset will accurately replicate the actual garment colour.
            Use of the URBAN KLEID website is subject to the ‘Terms and Conditions’ of use which, unless stated otherwise, also apply to use of the Online Shop. Additionally, Online Shopping with URBAN KLEID is subject to the following ‘Terms of Purchase’ which contain important information about ordering products, payment and delivery. URBAN KLEID reserves the right to modify these Terms of Purchase ("Terms") from time to time.
            In these Terms, references made to "We" and "Us" mean URBAN KLEID (Closphere Private Limited), and "You" means you, one of URBAN KLEID's Online Shop customers.
          </li>
          <li> <b>2. ACCEPTANCE OF THE CONDITIONS OF PURCHASE AND PRIVACY POLICY </b>
            <hr>
            Before proceeding with your purchase, you must confirm your acceptance of these Conditions by ticking the box marked “I accept the conditions of purchase and the privacy policy.” By doing so, you declare that you have read and accept, without any reservations, these conditions of purchase, and in particular that: <br>
            (a) You are over the age of 16 and have sufficient legal capacity to be bound by contractual terms and conditions. <br>
            (b) You shall not place any false, fraudulent or speculative orders. <br>
            (c) You are obliged to correctly provide us with your email address, postal address and/or other contact details. <br>
            (d) Please note that if you do not provide us with all of the required information, we will not be able to process your order.
          </li>

          <li> <b> 3. AVAILABILITY OF SERVICE </b>
            <hr>
            We are currently only accepting orders from India.
          </li>

          <li> <b> 4. VALIDITY OF THE OFFER AND AVAILABILITY OF PRODUCTS </b>
            <hr>

            The offer of the products shall remain valid while the offer is shown on the website www.urbankleid.com, unless a specific offer period is indicated, such as promotional offers during specific dates.
            </br>
            4.1 Availability of products
            In any event, all orders will be subject to availability. If any difficulties occur with regard to their supply or stock, you will be refunded any amounts you would have paid. We reserve the right to withdraw any product from this website at any time, without this entailing the acceptance of any type of liability on the part of URBAN KLEID India. <br>
            4.2 Refusal to process orders
            Although we will do everything in our power to always process all orders, exceptional circumstances may arise that require us to reject processing an order after having sent the order confirmation, and so we reserve the right to do so at any time. In any event, URBAN KLEID shall not be liable for removing any product from this website, removing or altering any material or contents of the website, or for not processing an order once we have sent the order confirmation.

          </li>

          <li> <b> 5. PLACING YOUR ORDER </b>
            <hr>
            1. To place an order, you should be lawfully capable of entering into and forming a valid contract in accordance with Indian Law. <br>
            2. In order to make purchases through the Site, you will be requested to provide information about yourself, as indicated so that we may process your Order. You represent and warrant that the information provided by you is both valid and correct.<br>
            3. Once you have chosen a product, click on the image to access the product page where information on sizing, colour options and availability will be provided. All product prices shown in the URBAN KLEID Online Shop are inclusive of GST but do not include delivery costs, which you can select during checkout. All prices and offers remain valid as advertised from time to time.<br>
            4. If you are happy with your choice, click on the "Add to Bag" button.<br>
            5. You can monitor the products you have chosen by clicking on the "Shopping Bag" button at any time. You can also remove an item by clicking on the "Remove" button next to the chosen product.<br>
            6. When you are ready, proceed to "Checkout" and follow instructions. Please ensure that you provide information as requested.<br>
            7. Once you have confirmed your order, we will issue you with a Order reference number, which will appear in your order confirmation. Please ensure that you save this number for reference.<br>
            8. On placing an order with URBAN KLEID, You are making an offer to Us to purchase the products selected in accordance with these Terms. Please note that we may not always be able to accept your offer (see ACCEPTANCE OF THE PURCHASE AND CONFIRMATION OF RECEPTION OF THE ORDER). All orders are subject to availability and acceptance.

          </li>
          <hr>
          <p class="lead">Regards <br> Urban Kleid</p>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!--Security Terms   Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle " aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SECURITY TERMS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li><b>1. ACCEPTANCE OF THE PURCHASE AND CONFIRMATION OF RECEPTION OF THE ORDER </b>
            <hr>

            Acceptance of the purchase must be made by clicking the button marked “Place Order”. You must then:
            (a)Identify yourself as a registered user (if you haven’t already done so when you start the purchase procedure), or select the option to continue as a guest. <br>
            (b) If you choose to make your purchase as a guest, you will need to provide us with your personal details and delivery information so that we can process your order. <br>
            (c) Choose the delivery method <br>
            (d) Choose the payment method <br>
            (e) Once you have checked the order, accept these terms and Conditions of Purchase and the Privacy Policy by clicking on the corresponding box, and then clicking on the “Purchase” option. <br>
            Once you have accepted the purchase and made the payment, you will receive and e-mail with an identification code so that you can monitor the delivery status of your order. <br>
            We reserve the right not to accept your order. Such non-acceptance may result, for example, from the fact that a product ordered is out of stock or that we are unable to obtain authorisation for your payment or that you do not meet the terms of eligibility set-out above.

          </li>
          <li> <b>2. PRICE AND PAYMENT <br> <br> 2.1 Prices </b>
            <hr>

            The price of the products will be as stipulated at any given moment on www.urbankleid.com. All prices are given in your preferred currency.
            The prices included on the website include the GST for the delivery country. Import duties and taxes may apply upon receipt of international orders. These duties & taxes are beyond our control as they are set by the Customs Authority of the destination country and depend on a number of factors, such as: <br>
            • 1. Country of origin of the purchased product. <br>
            • 2. Local VAT rates. <br>
            • 3. Local import taxes. <br>
            It will be your responsibility to pay these charges if and when asked to by your local authorities. Our guaranteed landed cost shipping service allows you to prepay all taxes and there will be no additional charges when you receive your package. <br>
            Prices may change at any time, but this will not affect orders for which we have already sent a mailing confirmation. The prices may change at any time, although any such changes will not affect any orders for which we have already sent a confirmation of delivery. 

          </li>

          <li> <b> 2.2. Payment methods </b>
            <hr>

            All purchases may be paid using the following means of payment: <br>
            (a) Cards: Visa, Visa Electron, Maestro, MasterCard and American Express. We recommend that before making your purchase you check:  (i) the validity date of your card, and (ii) the limit on the card for making purchases.
            (b) PayuMoney.

          </li>

          <li> <b> 2.3 Security during the payment process </b>
            <hr>


            Check that you have filled in all of the required fields correctly. Once you have finished, the information will be transmitted in an encrypted format using the SSL protocol. If you choose to pay using a card, the system will contact the bank that issued the card so that you can authorise the payment. Once the bank has confirmed authentication, the amount will be charged to the card. If your bank does not confirm authentication, the order will be cancelled. In any event, you will be informed of the result of the operation by e-mail. By making a payment with a card you confirm that it is your property. Payment by credit card will be subject to verification and authorisation procedures by the entity that issued the card, as a result of which if the entity does not authorise payment, we will not be able to process the order nor will we accept any liability for any delay or lack of delivery.


          </li>

          <li> <b> 3. DELIVERY TIMES AND DELIVERY COSTS </b>
            <hr>

            All of our deliveries are made by courier service. Notwithstanding the conditions of Clause 6 regarding the availability of stock. Delivery times depend on the destination country. An estimated delivery time and cost will be displayed for each option, however, there is no guaranteed delivery date. Delivery dates quoted at checkout are an estimation only. <br>
            We aim to meet the delivery times quoted but during busy periods, deliveries may take a little longer. Occasionally circumstances beyond our control, such as extreme weather conditions or customs inspections, can result in delivery delays. To track your order, refer to my orders.
            Shipping costs are calculated automatically at checkout and depend on: <br>
            (a) Destination city. <br>
            (b) Size/weight of the package. <br>
            (c) Shipping method selected. <br>
            The prices for each available option will be displayed at checkout. <br>
            Please remember that the purchase must be delivered at the indicated address, within working hours. It is also important that you provide us with a telephone number when you make the order, so that we can get in touch with you if there were any problems with the delivery. <br>
            Remember that it is essential that you provide us with a full and precise delivery address, which must not be located in a different country from where the purchase was made. <br>
            If you do not receive the order within the indicated delivery period or if you have any questions, you can contact us by e-mail at contact@urbankleid.com; on public holidays in India, we will remain closed. <br>
            Impossibility of delivery : 
            If it is not possible to make a delivery, we will get in touch with you in order to organise a new delivery. If it is not possible to make the delivery after three attempts, we will organise a return and refund you the money you have paid.

          </li>

          <li> <b>4. LANGUAGE OR LANGUAGES IN WHICH CONTRACTS MAY BE FORMALISED </b>
            <hr>


            Contracts are to be formalised in English.


          </li>

          <li> <b> 5. CUSTOMER SERVICE </b>
            <hr>


            To ensure a comfortable buying experience, if you have any questions you can contact us by sending an e-mail to contact@URBAN KLEID.com; on public holidays in India, we will remain closed.


          </li>
          <hr>
          <p class="lead">Regards <br> Urban Kleid</p>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!--Return Policy   Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle " aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">RETURNS POLICY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li><b> 1. Returns (right to desist) </b>
            <hr>

            URBAN KLEID India, allows for the possibility to cancel your order at no extra cost, if requested while still being processed, before it has been sent to the transportation company for delivery. Otherwise you will have to wait to receive the order in order to process the return. Please note that during sales, Diwali, special promotions and high demand periods, changes of delivery address or cancellation requests will not be accepted. <br>
            Once the product has been delivered, you will have ten (10) calendar days from the reception of the order to cancel the contract and return the product you have acquired. You will have to notify URBAN KLEID within this period of your intention to cancel the contract. <br>
            Late/Repeated returns. <br>
            URBAN KLEID offers a flexible returns policy to enhance your online shopping experience, however, customers returning items repeatedly or outside of the 10 days, may be refused refund at our discretion.

          </li>
          <li> <b>2. How do I return an item? </b>
            <hr>

            You can return any product you have purchased from www.urbankleid.com within the next 10 calendar days of its delivery date. <br>
            To make a return, please go to my order and place a return request. </br>
            When you return an item we ask that it is still in the original packaging and is not worn, washed, damaged or had the tags removed. Any item which fails to meet these criteria may not be refunded. </br>
            Returns will not be accepted by any other means than those indicated above.

          </li>

          <li> <b> 3. Please bear the following aspects in mind: </b>
            <hr>
            1. The right to desist from a contract will not be granted for (i)personalised items(including altered products) <br>
            2. Make sure the items are in the same condition as when they were received. Returns will not be allowed when the product has been used beyond opening its packaging, for products that are not in the same condition as when they were delivered, or if they have suffered any damage. Please return the item using or including all of its original packaging, together with the accompanying documentation. In any event, you must return the product together with the invoice you received when you made the purchase. <br>
            3. You must return in the same delivery all of the items you have acquired in the same order that you wish to return. <br>
            4. If you have been given a gift together with the product you wish to return, this must also be returned in the same conditions. Otherwise you will be debited the amount corresponding to the value of the gift.<br>
            5. We cannot offer an exchange for the product. <br>
            6. You can only send returns from the same address to which the order was made. <br>
            7. Cash on delivery returns will not be accepted. <br>
            8. Returns will not be accepted by any other means than those described in this document.<br>
            9. Refunds will only be made for products that have been returned according to our returns policy.<br>
            10. We will only process returns of products acquired from www.urbankleid.com.<br>

          </li>

          <li> <b> 4. Products with faults or defects</b>
            <hr>


            Please note that all products sent for delivery are checked carefully to avoid these situations.
            However, if you believe that the product has any faults or manufacturing defects, please contact our customer service department by sending an e-mail to contact@urbankleid.com. Once the return has been accepted, we will arrange collection of the faulty item at the agreed address and time. Within a maximum of 14 calendar days you’ll receive the refund, using the same method you used to make the payment.

          </li>
          <hr>
          <p> <b> 5. SECURITY </b> <br>
            URBAN KLEID guarantees the privacy of the details you provide us with by means of the SSL protocol.
            Your browser will indicate that you are on a secure site. You can also verify that you are on a secure site by checking that the address shown in the browser window starts with ‘https’ (instead of ‘http’).
            .
          </p>
          <hr>
          <p class="lead">Regards <br> Urban Kleid</p>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>