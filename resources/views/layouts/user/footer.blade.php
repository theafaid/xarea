     @yield ('footer-content')
            <!-- Footer area-->
            <div class="footer-area">

                <div class=" footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                                <div class="single-footer">
                                    <h4>من نحن ؟</h4>
                                    <div class="footer-title-line"></div>
                                    <p>
                                        {{!empty(setting()->site_description) ? setting()->site_description : "اكبر موقع لمبيعات الشقق وتأجيرها"}}</p>
                                    <ul class="footer-adress">
                                        @if(!empty(setting()->site_address))
                                        <li><i class="pe-7s-map-marker strong"> </i> 
                                            {{setting()->site_address}}
                                        </li>
                                        @endif

                                        @if(!empty(setting()->site_email))
                                        <li><i class="pe-7s-mail strong"> </i>
                                            {{setting()->site_email}}
                                       </li>
                                        @endif 

                                        @if(!empty(setting()->site_phone))
                                        <li><i class="pe-7s-call strong"> </i>
                                            {{setting()->site_phone}}
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-footer">
                                    <h4>روابط سريعة</h4>
                                    <div class="footer-title-line"></div>
                                    <ul class="footer-menu">
                                        <li><a href="{{url('')}}">الرئيسية</a>  </li> 
                                        <li><a href="{{url('home')}}">الشقق المتاحة</a>  </li> 
                                        <li><a href="{{url('flats/rent')}}">شقق للإيجار</a>  </li> 
                                        <li><a href="{{url('flats/ownership')}}">شقق للتمليك</a></li> 
                                        <li><a href="{{url('contact')}}">إتصل بنا</a></li> 
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-footer news-letter">
                                    <h4>إبقى على اتصال</h4>
                                    <div class="footer-title-line"></div>
                                    <p>يمكنك إرسال رسالة إلينا فى اى وقت ...</p>

                                    <form>
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="بريدك الإلكترونى">
                                            
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </form> 

                                    <div class="social pull-right">
                                        <span class="follow-us wow wobble">تابعنا على مواقع التواصل الإجتماعى</span><br>
                                        <ul class='text-center'>
                                            
                                            @if(!empty(setting()->site_facebook))
                                            <li><a class="wow fadeInUp animated" target="_blank" href="{{setting()->site_facebook}}" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                            @endif


                                            @if(!empty(setting()->site_twitter))
                                                <li><a class="wow fadeInUp animated" target="_blank" href="{{setting()->site_twitter}}"><i class="fa fa-twitter"></i></a></li>
                                            @endif


                                            @if(!empty(setting()->site_googleplus))
                                            <li><a class="wow fadeInUp animated" target="_blank" href="{{setting()->site_googleplus}}" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                            @endif
                                        </ul> 
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="footer-copy text-center">
                    <div class="container">
                        <div class="row">
                            <div class='pull-left'>تصميم وبرمجة <a class="auther" href="https://www.facebook.com/abdulrhmanahmed11" target="_blank">Abdulrhman Faid</a></div>
                            <div class="text-center">
                                <span>@if(!empty(setting()->sitename) && !empty(setting()->site_footer_text))
                                    {{setting()->site_footer_text}} &copy;  
                                    <a href="{{url('')}}">{{setting()->sitename}}</a></span> 
                                    @else
                                     
                                    <a href="{{url('')}}">شقتى</a></span> 
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script src="{{url('design/frontend')}}/assets/js/modernizr-2.6.2.min.js"></script>

            <script src="{{url('design/frontend')}}/assets/js/jquery-1.10.2.min.js"></script> 
            <script src="{{url('design/frontend')}}/bootstrap/js/bootstrap.min.js"></script>
            <script src="{{url('design/frontend')}}/assets/js/bootstrap-select.min.js"></script>
            <script src="{{url('design/frontend')}}/assets/js/bootstrap-hover-dropdown.js"></script>
            <script src="{{url('design/frontend')}}/assets/js/nice-scroll.min.js"></script>

            <script src="{{url('design/frontend')}}/assets/js/easypiechart.min.js"></script>
            <script src="{{url('design/frontend')}}/assets/js/jquery.easypiechart.min.js"></script>

            <script src="{{url('design/frontend')}}/assets/js/owl.carousel.min.js"></script>
            <script src="{{url('design/frontend')}}/assets/js/wow.js"></script>

            <script src="{{url('design/frontend')}}/assets/js/icheck.min.js"></script>
            <script src="{{url('design/frontend')}}/assets/js/price-range.js"></script>
            <script src="{{url('design/frontend')}}/assets/js/typed.js"></script>

            <script src="{{url('design/frontend')}}/assets/js/main.js"></script>            
            <script src="{{url('design/frontend')}}/assets/js/custom.js"></script>
            
            
            @stack('js')

        </body>
    </html>