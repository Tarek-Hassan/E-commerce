<div class="main-footer-content">

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="wrap-footer-item">
                    <h3 class="item-header">Contact Details</h3>
                    <div class="item-content">
                        <div class="wrap-contact-detail">
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="contact-txt">{{optional($setting)->address}}</p>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="contact-txt">{{optional($setting)->phone}} - {{optional($setting)->phone2}}</p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="contact-txt">{{optional($setting)->email}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                <div class="wrap-footer-item">
                    <h3 class="item-header">Hot Line</h3>
                    <div class="item-content">
                        <div class="wrap-hotline-footer">
                            <span class="desc">Call Us toll Free</span>
                            <b class="phone-number">{{optional($setting)->phone}} - {{optional($setting)->phone2}}</b>
                        </div>
                    </div>
                </div>

                <div class="wrap-footer-item footer-item-second">
                    <h3 class="item-header">Sign up for newsletter</h3>
                    <div class="item-content">
                        <div class="wrap-newletter-footer">
                            <form action="#" class="frm-newletter" id="frm-newletter">
                                <input type="email" class="input-email" name="email" value=""
                                    placeholder="Enter your email address">
                                <button class="btn-submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                <div class="row">
                    <div class="wrap-footer-item twin-item">
                        <h3 class="item-header">My Account</h3>
                        <div class="item-content">
                            <div class="wrap-vertical-nav">
                                <ul>
                                    <li class="menu-item"><a href="#" class="link-term">My Account</a></li>
                                    <li class="menu-item"><a href="#" class="link-term">Brands</a></li>
                                    <li class="menu-item"><a href="#" class="link-term">Gift Certificates</a></li>
                                    <li class="menu-item"><a href="#" class="link-term">Affiliates</a></li>
                                    <li class="menu-item"><a href="#" class="link-term">Wish list</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-footer-item twin-item">
                        <h3 class="item-header">Infomation</h3>
                        <div class="item-content">
                            <div class="wrap-vertical-nav">
                                <ul>
                                    <li class="menu-item"><a href="{{route('contact-us')}}" class="link-term">Contact Us</a></li>
                                    <li class="menu-item"><a href="#" class="link-term">Returns</a></li>
                                    <li class="menu-item"><a href="{{optional($setting)->map}}" class="link-term">Site Map</a></li>
                                    <li class="menu-item"><a href="#" class="link-term">Specials</a></li>
                                    <li class="menu-item"><a href="#" class="link-term">Order History</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="wrap-footer-item">
                    <h3 class="item-header">We Using Safe Payments:</h3>
                    <div class="item-content">
                        <div class="wrap-list-item wrap-gallery">
                            <img src="{{asset('assets/images/payment.png')}}" style="max-width: 260px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="wrap-footer-item">
                    <h3 class="item-header">Social network</h3>
                    <div class="item-content">
                        <div class="wrap-list-item social-network">
                            <ul>
                                <li><a href="{{optional($setting)->twitter}}" class="link-to-item" title="twitter"><i
                                            class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="{{optional($setting)->facebook}}" class="link-to-item" title="facebook"><i
                                            class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{optional($setting)->pinterest}}" class="link-to-item" title="pinterest"><i
                                            class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="{{optional($setting)->instagram}}" class="link-to-item" title="instagram"><i
                                            class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="{{optional($setting)->youtube}}" class="link-to-item" title="youtube"><i class="fa fa-youtube"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="wrap-footer-item">
                    <h3 class="item-header">Dowload App</h3>
                    <div class="item-content">
                        <div class="wrap-list-item apps-list">
                            <ul>
                                <li><a href="#" class="link-to-item" title="our application on apple store">
                                        <figure><img src="{{asset('assets/images/brands/apple-store.png')}}"
                                                alt="apple store" width="128" height="36"></figure>
                                    </a></li>
                                <li><a href="#" class="link-to-item"
                                        title="our application on google play store">
                                        <figure><img
                                                src="{{asset('assets/images/brands/google-play-store.png')}}"
                                                alt="google play store" width="128" height="36"></figure>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="wrap-back-link">
        <div class="container">
            <div class="back-link-box">
                <h3 class="backlink-title">Quick Links</h3>
                <div class="back-link-row">
                    <ul class="list-back-link">
                        <li><span class="row-title">Mobiles:</span></li>
                        <li><a href="#" class="redirect-back-link" title="mobile">Mobiles</a></li>
                        <li><a href="#" class="redirect-back-link" title="yphones">YPhones</a></li>
                        <li><a href="#" class="redirect-back-link" title="Gianee Mobiles GL">Gianee Mobiles GL</a></li>
                        <li><a href="#" class="redirect-back-link" title="Mobiles Karbonn">Mobiles Karbonn</a></li>
                        <li><a href="#" class="redirect-back-link" title="Mobiles Viva">Mobiles Viva</a></li>
                        <li><a href="#" class="redirect-back-link" title="Mobiles Intex">Mobiles Intex</a></li>
                        <li><a href="#" class="redirect-back-link" title="Mobiles Micrumex">Mobiles  Micrumex</a></li>
                        <li><a href="#" class="redirect-back-link" title="Mobiles Bsus">Mobiles Bsus</a> </li>
                        <li><a href="#" class="redirect-back-link" title="Mobiles Samsyng">Mobiles Samsyng</a></li>
                        <li><a href="#" class="redirect-back-link" title="Mobiles Lenova">Mobiles Lenova</a> </li>
                    </ul>

                    <ul class="list-back-link">
                        <li><span class="row-title">Tablets:</span></li>
                        <li><a href="#" class="redirect-back-link" title="Plesc YPads">Plesc YPads</a></li>
                        <li><a href="#" class="redirect-back-link" title="Samsyng Tablets">Samsyng
                                Tablets</a></li>
                        <li><a href="#" class="redirect-back-link" title="Qindows Tablets">Qindows
                                Tablets</a></li>
                        <li><a href="#" class="redirect-back-link" title="Calling Tablets">Calling
                                Tablets</a></li>
                        <li><a href="#" class="redirect-back-link" title="Micrumex Tablets">Micrumex
                                Tablets</a></li>
                        <li><a href="#" class="redirect-back-link" title="Lenova Tablets Bsus">Lenova
                                Tablets Bsus</a></li>
                        <li><a href="#" class="redirect-back-link" title="Tablets iBall">Tablets iBall</a>
                        </li>
                        <li><a href="#" class="redirect-back-link" title="Tablets Swipe">Tablets Swipe</a>
                        </li>
                        <li><a href="#" class="redirect-back-link" title="Tablets TVs, Audio">Tablets TVs,
                                Audio</a></li>
                    </ul>

                    <ul class="list-back-link">
                        <li><span class="row-title">Fashion:</span></li>
                        <li><a href="#" class="redirect-back-link" title="Sarees Silk">Sarees Silk</a></li>
                        <li><a href="#" class="redirect-back-link" title="sarees Salwar">sarees Salwar</a>
                        </li>
                        <li><a href="#" class="redirect-back-link" title="Suits Lehengas">Suits Lehengas</a>
                        </li>
                        <li><a href="#" class="redirect-back-link" title="Biba Jewellery">Biba Jewellery</a>
                        </li>
                        <li><a href="#" class="redirect-back-link" title="Rings Earrings">Rings Earrings</a>
                        </li>
                        <li><a href="#" class="redirect-back-link" title="Diamond Rings">Diamond Rings</a>
                        </li>
                        <li><a href="#" class="redirect-back-link" title="Loose Diamond Shoes">Loose Diamond
                                Shoes</a></li>
                        <li><a href="#" class="redirect-back-link" title="BootsMen Watches">BootsMen
                                Watches</a></li>
                        <li><a href="#" class="redirect-back-link" title="Women Watches">Women Watches</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

</div>