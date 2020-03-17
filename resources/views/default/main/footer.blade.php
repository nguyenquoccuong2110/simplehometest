   <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 boxbarcode wow fadeInLeft">
                          
                         <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->margin(0)->size(100)->generate($TGeneral['name'].' Phone: '.$TGeneral['phone'].' Email: '.$TGeneral['email']. ' Address: '.$TGeneral['address'])) !!} ">
                        </div>
                        <div class="col-md-4 box_info_footer wow fadeInUpShort">
                            <div class="about-contact-info clearfix">
                                <div class="address-info">
                                    <div class="info-icon"><i class="icon_home"></i></div>
                                    <div class="info-content">
                                        <p>Add: {{$TGeneral['address']}} </p>
                                    </div>
                                </div>
                                <div class="address-info">
                                    <div class="info-icon"><i class="icon_factory"></i></div>
                                    <div class="info-content">
                                        <p>Factory: {{$TGeneral['factory']}} </p>
                                    </div>
                                </div>
                                <div class="email-info">
                                    <div class="info-icon"><i class="icon_mail"></i></div>
                                    <div class="info-content">
                                        <p>Email: {{$TGeneral['email']}}</p>
                                    </div>
                                </div>
                                <div class="phone-info">
                                    <div class="info-icon"><i class="icon_tel"></i></div>
                                    <div class="info-content">
                                        <p>Tel: {{$TGeneral['phone']}}</p>
                                        <p>Fax: {{$TGeneral['fax']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 box_infomain wow fadeInRight">
                            <h3>Main products</h3>
                            <ul>
                                <li>{{$TGeneral['mainproduct1']}} </li>
                                <li>{{$TGeneral['mainproduct2']}}</li>
                                <li>{{$TGeneral['mainproduct3']}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-copyright wow zoomInLeft">Copyright © 2018 by Newsun Plastic. All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>