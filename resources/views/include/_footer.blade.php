<div class="container-fluid">
    <div class="row">
        <div class="main-footer w-100">
            <div class="container">
                <div class="footer-details">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-header">
                                <h1>Request A Call-back</h1>
                            </div>
                            <div class="footer-content">
                                If you have any questions, suggestions or any inquiries regarding our service, 
                                we are always here for you. Our support team will contact you within 
                                24 hours and answer to all of your questions. 
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-form d-flex flex-column align-items-center">
                                <div class="form-header">
                                    <div class='form-mail d-flex align-items-center'>
                                        <img src="/images/phone.svg" alt="">
                                        <p style='margin:0;'>+61272020629</p>
                                    </div>
                                    <div class="form-phone d-flex align-items-center">
                                        <img src="/images/mail.svg" alt="">
                                        <p style='margin:0;'>support@stoxtrades.com</p>
                                    </div>
                                    <div class="form-phone d-flex align-items-center">
                                        <img style ='width: 43px;' src="/images/map.svg" alt="">
                                        <p style='margin:0;'>Suite 305, Griffith Corporate Centre, Beachmont, Kingstown, Saint Vincent 
                                            and the Grenadines.</p>
                                    </div>
                                </div>
                                <form action="{{route('mail_send')}}" class='w-100' id='mail_send_form'  method="POST">
                                    @csrf
                                    <input id ='mail_name' name='name' type="text" class='form-control' placeholder="Your Name" required> 
                                    <input id='mail_email' name='email' type="email" class='form-control' placeholder="Your Email" required>
                                    <textarea id='mail_text' name="text" id="" cols="30" rows="6" class='form-control' placeholder="Your Message"></textarea>
                                    <button class='btn btn-primary send_email'>Get Started Trading</button>
                                </form>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>        
        <div class="container">
            <div class="row">
                <img class ='pay-img' style ='margin-top: 60px;' src="/images/pay.svg" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="footer-nav">
                    <div class="copyright">
                        © 2019 Stoxtrades All Right Reserved
                    </div>
                    {{-- <div class="navigation">
                        <ul>
                            <li>Trading</li>
                            <li>Partnership</li>
                            <li>Promotions</li>
                            <li>Analytics & Education</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>