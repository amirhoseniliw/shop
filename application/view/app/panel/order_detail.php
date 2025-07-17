<?php $this->include('app.layouts.header' ,['user' => $user, 'categories' => $categories]); 
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>
            <div class="col-lg-9">
                <div class="content-box bg-white shadow-box">
                    <div class="container-fluid">
                        <div class="d-flex flex-wrap justify-content-sm-between align-items-baseline border-bottom">
                            <h5 class="font-18 pb-3">
                                <a class="me-3" href=""><i class="bi bi-chevron-right"></i></a>
                                جزئیات سفارش
                                <span class="ms-2 font-14 text-muted">
                                (ارسال شده)
                            </span>
                            </h5>
                            <div>
                                <div class=" d-inline-block me-3">
                                    <span class="main-color-one-color fw-bold">شماره سفارش:</span> 3855384
                                </div>
                                <div class="d-inline-block">
                                    <i class="bi bi-clock-fill me-2"></i>
                                    1401/12/25 - 17:06:15
                                </div>
                            </div>
                        </div>

                        <div class="detail-order mt-3">
                            <div class="detail-order-item d-flex align-items-center">
                                <h6><i class="bi bi-pin-map-fill me-1"></i> آدرس تحویل:</h6>
                                <span class="ms-2 text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</span>
                            </div>
                            <div class="detail-order-item mt-3 d-flex align-items-center">
                                <h6><i class="bi bi-person-fill me-1"></i>تحویل گیرنده:</h6>
                                <span class="ms-2 text-muted">امیر رضایی</span>
                            </div>
                            <div class="detail-order-item mt-3 d-flex align-items-center">
                                <h6><i class="bi bi-telephone-fill me-1"></i>شماره تماس:</h6>
                                <span class="ms-2 text-muted">091234567890</span>
                            </div>
                        </div>

                        <div class="order-tracking-code flex-wrap alert rounded-3 alert-warning d-flex align-items-center justify-content-between mt-3">
                            <div>
                                <div class="order-details__postal-traking-icon"></div>
                                <span class="h6 d-inline-block">کد رهگیری:</span>
                                <span class="font-16 ms-2">2047401361654545484454568111</span>
                            </div>
                            <a class="btn btn-warning" id="js-copy-to-clipboard-button">
                                <svg fill="none" height="15" viewBox="0 0 12 15" width="12" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.228 0.5H4.3463C3.49194 0.5 2.79682 1.19511 2.79682 2.04948V2.23965H1.77201C0.917647 2.23965 0.222534 2.93476 0.222534 3.78912V12.9506C0.222534 13.805 0.917647 14.5001 1.77201 14.5001H7.65375C8.50811 14.5001 9.20316 13.805 9.20316 12.9506V12.7604H10.228C11.0823 12.7604 11.7774 12.0653 11.7774 11.2109V2.04948C11.7775 1.19511 11.0824 0.5 10.228 0.5ZM8.20373 12.9506C8.20373 13.2538 7.95699 13.5006 7.65381 13.5006H1.77201C1.46877 13.5006 1.22202 13.2538 1.22202 12.9506V3.78906C1.22202 3.48581 1.46877 3.23907 1.77201 3.23907H7.65375C7.95699 3.23907 8.20367 3.48581 8.20367 3.78906V12.9506H8.20373ZM10.778 11.2109C10.778 11.5142 10.5313 11.7609 10.228 11.7609H9.20323V3.78906C9.20323 2.93469 8.50811 2.23958 7.65381 2.23958H3.79631V2.04941C3.79631 1.74617 4.04305 1.49942 4.3463 1.49942H10.228C10.5313 1.49942 10.778 1.74617 10.778 2.04941V11.2109Z" fill="#423B2D"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="alert order-3 mt-3">
                            <svg fill="none" height="29" viewBox="0 0 29 29" width="29" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.38318 18.1605L9.43895 16.9785L9.43901 16.9787C9.8138 16.7801 10.2952 16.8083 10.8205 17.1116C12.0156 17.8016 12.9844 19.6527 12.9844 21.2461C12.9844 22.1222 12.6912 22.7371 12.2289 22.9994L12.2292 23.0001L10.2554 24.1364L7.38318 18.1605Z" fill="url(#paint0_linear)"></path>
                                <path d="M15.5164 22.8714L17.5721 21.6894L17.5722 21.6896C17.947 21.491 18.4284 21.5193 18.9537 21.8225C20.1488 22.5125 21.1176 24.3636 21.1176 25.9571C21.1176 26.8331 20.8244 27.4481 20.3621 27.7103L20.3624 27.711L18.3886 28.8472L15.5164 22.8714Z" fill="url(#paint1_linear)"></path>
                                <path d="M5.60132 14.2549V4.39404L21.4282 5.07271V14.9336C21.4283 15.1595 21.3165 15.3854 21.0928 15.5146L14.8231 19.1344C14.3772 19.3918 13.8278 19.3918 13.3819 19.1344L5.93669 14.8359C5.71313 14.7068 5.60132 14.4808 5.60132 14.2549Z" fill="url(#paint2_linear)"></path>
                                <path d="M21.0935 4.49159L13.6482 0.193074C13.2024 -0.0643579 12.6529 -0.0643579 12.2071 0.193074L5.93735 3.81286C5.49012 4.07109 5.49012 4.71656 5.93735 4.97479L13.3826 9.2733C13.8285 9.53074 14.3779 9.53074 14.8238 9.2733L21.0935 5.65351C21.5407 5.39529 21.5407 4.74976 21.0935 4.49159Z" fill="url(#paint3_linear)"></path>
                                <path d="M18.6775 3.09773L10.681 7.71451L8.55981 6.48982L16.5563 1.87305L18.6775 3.09773Z" fill="#DEA861"></path>
                                <path d="M17.4107 2.36523L9.41418 6.98207L9.82964 7.22194L17.8262 2.60516L17.4107 2.36523Z" fill="#CC8241"></path>
                                <path d="M27.7006 19.0359L26.1846 12.6802C26.003 11.9187 25.516 11.2655 24.838 10.8741L21.5796 8.99052C21.3844 8.8778 21.1615 8.91071 21.0065 9.03294L15.3107 12.3214L14.1686 12.9808L20.7788 27.4859L27.4829 23.6154C27.5298 23.5962 27.5738 23.5707 27.6139 23.5397C27.741 23.4414 27.827 23.288 27.827 23.1045V20.1104C27.827 19.7486 27.7845 19.3879 27.7006 19.0359Z" fill="url(#paint4_linear)"></path>
                                <path d="M21.7766 23.1473L22.7315 22.596C22.7884 22.5632 22.8595 22.6042 22.8595 22.67V23.5082C22.8595 23.6218 22.7989 23.7268 22.7005 23.7836L21.7456 24.3349C21.6886 24.3678 21.6176 24.3267 21.6176 24.261V23.4228C21.6176 23.3091 21.6782 23.2042 21.7766 23.1473Z" fill="#E9E5F6"></path>
                                <path d="M26.4772 20.4315L27.4321 19.8802C27.489 19.8474 27.5601 19.8884 27.5601 19.9541V20.7924C27.5601 20.906 27.4995 21.011 27.401 21.0678L26.4461 21.6191C26.3892 21.6519 26.3181 21.6109 26.3181 21.5452V20.7069C26.3181 20.5933 26.3787 20.4883 26.4772 20.4315Z" fill="#E9E5F6"></path>
                                <path d="M13.9664 18.4577V13.3883C13.9664 12.9945 14.3926 12.7484 14.7337 12.9453L17.992 14.8288C18.67 15.2203 19.157 15.8734 19.3387 16.6349L20.8547 22.9906C20.9386 23.3426 20.981 23.7033 20.981 24.0652V27.0592C20.981 27.4839 20.5213 27.7493 20.1536 27.537L6.24573 19.4824C5.8412 19.2489 5.59204 18.8173 5.59204 18.3502V15.1858C5.59204 14.9302 5.86873 14.7705 6.09003 14.8983L13.0923 18.9611C13.4803 19.1862 13.9664 18.9063 13.9664 18.4577Z" fill="#06DAAE"></path>
                                <path d="M14.8083 19.2941V14.0986L17.438 15.6192C17.698 15.7694 17.8814 16.0237 17.9417 16.3179L19.0536 21.7475L14.8083 19.2941Z" fill="url(#paint5_linear)"></path>
                                <path d="M25.9754 13.1816L20.1355 16.5533L21.3358 21.7474L27.1756 18.3758L25.9754 13.1816Z" fill="url(#paint6_linear)"></path>
                                <path d="M14.7946 24.6055C14.7946 23.0121 15.7634 22.2796 16.9585 22.9696C18.1536 23.6596 19.1224 25.5107 19.1224 27.1042C19.1224 28.6977 18.1535 29.4301 16.9585 28.7401C15.7633 28.0501 14.7946 26.199 14.7946 24.6055Z" fill="url(#paint7_linear)"></path>
                                <path d="M17.7772 27.7465C18.3718 27.4931 18.4907 26.4358 18.043 25.3849C17.5952 24.334 16.7502 23.6874 16.1556 23.9407C15.5611 24.194 15.4421 25.2514 15.8899 26.3023C16.3377 27.3532 17.1827 27.9998 17.7772 27.7465Z" fill="#E9E5F6"></path>
                                <path d="M17.3813 26.8126C17.6842 26.6835 17.7448 26.1449 17.5167 25.6095C17.2886 25.0741 16.8581 24.7447 16.5552 24.8737C16.2523 25.0028 16.1917 25.5415 16.4198 26.0769C16.6479 26.6123 17.0784 26.9417 17.3813 26.8126Z" fill="#7662BD"></path>
                                <path d="M6.66174 19.8946C6.66174 18.3011 7.63058 17.5687 8.82564 18.2587C10.0208 18.9487 10.9895 20.7998 10.9895 22.3932C10.9895 23.9867 10.0207 24.7191 8.82564 24.0291C7.63052 23.3392 6.66174 21.4881 6.66174 19.8946Z" fill="url(#paint8_linear)"></path>
                                <path d="M9.64464 23.0399C10.2392 22.7866 10.3582 21.7293 9.91038 20.6784C9.46259 19.6274 8.61761 18.9808 8.02306 19.2342C7.42851 19.4875 7.30954 20.5448 7.75732 21.5957C8.20511 22.6467 9.05009 23.2933 9.64464 23.0399Z" fill="#E9E5F6"></path>
                                <path d="M8.13916 20.7477C8.13916 20.2423 8.44644 20.01 8.82553 20.2289C9.20463 20.4477 9.5119 21.0349 9.5119 21.5403C9.5119 22.0458 9.20457 22.2781 8.82553 22.0592C8.44644 21.8403 8.13916 21.2532 8.13916 20.7477Z" fill="#7662BD"></path>
                                <path d="M27.8089 22.8049L20.7849 26.6507L19.4904 26.0286V27.5343L20.6009 28.1755C20.7969 28.2887 21.0385 28.2887 21.2345 28.1755L28.0212 24.2572C28.1096 24.2062 28.1537 24.117 28.1537 24.0277V22.522L27.8089 22.8049Z" fill="url(#paint9_linear)"></path>
                                <path d="M19.7908 25.8549L20.9821 26.5427L27.8279 22.5903V22.1807L28.0212 22.2922C28.1979 22.3943 28.1979 22.6493 28.0212 22.7512L21.2345 26.6695C21.0385 26.7827 20.7969 26.7827 20.6009 26.6695L19.4904 26.0283L19.7908 25.8549Z" fill="#A996EB"></path>
                                <path d="M23.2332 23.9001L26.104 22.2427V22.735C26.104 23.0478 25.9371 23.3369 25.6662 23.4933L23.6644 24.649C23.4727 24.7597 23.2332 24.6213 23.2332 24.4V23.9001H23.2332Z" fill="url(#paint10_linear)"></path>
                                <path d="M1.34765 7.97914L6.32925 10.8553C6.5838 11.0023 6.74058 11.2739 6.74058 11.5678C6.74058 11.8237 6.46349 11.9837 6.2418 11.8557L1.2602 8.97958C1.00566 8.8326 0.848877 8.561 0.848877 8.2671C0.848877 8.01114 1.12596 7.85113 1.34765 7.97914Z" fill="url(#paint11_linear)"></path>
                                <path d="M3.16906 11.151L8.15066 14.0272C8.4052 14.1741 8.56198 14.4457 8.56198 14.7396C8.56198 14.9956 8.2849 15.1556 8.06321 15.0276L3.08161 12.1514C2.82707 12.0044 2.67029 11.7328 2.67029 11.4389C2.67029 11.183 2.94737 11.023 3.16906 11.151Z" fill="url(#paint12_linear)"></path>
                                <defs>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint0_linear" x1="10.3908" x2="9.50108" y1="19.9034" y2="18.3623">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint1_linear" x1="18.524" x2="17.6343" y1="24.6142" y2="23.0732">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint2_linear" x1="15.3676" x2="13.1935" y1="11.8608" y2="11.8608">
                                        <stop stop-color="#DEA861"></stop>
                                        <stop offset="1" stop-color="#CC8241"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint3_linear" x1="17.9217" x2="9.77968" y1="2.18926" y2="6.89003">
                                        <stop stop-color="#DEA861"></stop>
                                        <stop offset="1" stop-color="#EBCBA0"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint4_linear" x1="22.9087" x2="20.013" y1="18.972" y2="13.9565">
                                        <stop stop-color="#236568"></stop>
                                        <stop offset="0.1516" stop-color="#276A6C"></stop>
                                        <stop offset="0.3251" stop-color="#337878"></stop>
                                        <stop offset="0.5094" stop-color="#478E8C"></stop>
                                        <stop offset="0.7011" stop-color="#62AFA7"></stop>
                                        <stop offset="0.8968" stop-color="#86D7CA"></stop>
                                        <stop offset="1" stop-color="#9BF0DF"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint5_linear" x1="16.931" x2="16.931" y1="21.4819" y2="14.9156">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint6_linear" x1="23.6556" x2="23.6556" y1="21.45" y2="14.0966">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint7_linear" x1="16.9585" x2="16.9585" y1="29.8876" y2="22.0798">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint8_linear" x1="8.82564" x2="8.82564" y1="25.1767" y2="17.3689">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint9_linear" x1="20.7051" x2="21.75" y1="25.3912" y2="25.3912">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint10_linear" x1="24.6686" x2="24.6686" y1="24.6031" y2="22.5038">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#594A8E"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint11_linear" x1="7.18679" x2="1.26836" y1="12.0049" y2="8.36271">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                    <linearGradient gradientUnits="userSpaceOnUse" id="paint12_linear" x1="9.00825" x2="3.08977" y1="15.1767" y2="11.5346">
                                        <stop stop-color="#43386B"></stop>
                                        <stop offset="1" stop-color="#7662BD"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <h6 class="h6 d-inline-block"> شیوه ارسال: </h6>
                            <span class="text-muted"> پست پیشتاز</span>
                        </div>
                        <ul class="row gy-3 ps-0 mt-4">
                            <div class="col-sm-6">
                                <div class="cart-canvas border rounded-3 p-3">
                                    <div class="row align-items-center">
                                        <div class="col-4 ps-0">
                                            <img alt="" src="assets/img/product/product-6.webp" width="200">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="text-overflow-2 font-16">ساعت مچی عقربه‌ای مردانه اینویکتا مدل
                                                Automatico Ghost Reserve
                                            </h3>
                                            <div class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                                <ins class="font-25 ms-0">2,500,000 <span>تومان</span></ins>
                                            </div>
                                            <div class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                                <div class="cart-canvas-count">
                                                    <span>تعداد:</span>
                                                    <span class="fw-bold">3</span>
                                                </div>
                                                <div>
                                                    <span>قیمت نهایی کل:</span>
                                                    <span>5,000,000 تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="cart-canvas border rounded-3 p-3">
                                    <div class="row align-items-center">
                                        <div class="col-4 ps-0">
                                            <img alt="" src="assets/img/product/product-11.webp" width="200">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="text-overflow-2 font-16">ساعت مچی عقربه‌ای مردانه اینویکتا مدل
                                                Automatico Ghost Reserve
                                            </h3>
                                            <div class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                                <ins class="font-25 ms-0">2,500,000 <span>تومان</span></ins>
                                            </div>
                                            <div class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                                <div class="cart-canvas-count">
                                                    <span>تعداد:</span>
                                                    <span class="fw-bold">3</span>
                                                </div>
                                                <div>
                                                    <span>قیمت نهایی کل:</span>
                                                    <span>5,000,000 تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="cart-canvas border rounded-3 p-3">
                                    <div class="row align-items-center">
                                        <div class="col-4 ps-0">
                                            <img alt="" src="assets/img/product/product-4.webp" width="200">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="text-overflow-2 font-16">ساعت مچی عقربه‌ای مردانه اینویکتا مدل
                                                Automatico Ghost Reserve
                                            </h3>
                                            <div class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                                <ins class="font-25 ms-0">2,500,000 <span>تومان</span></ins>
                                            </div>
                                            <div class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                                <div class="cart-canvas-count">
                                                    <span>تعداد:</span>
                                                    <span class="fw-bold">3</span>
                                                </div>
                                                <div>
                                                    <span>قیمت نهایی کل:</span>
                                                    <span>5,000,000 تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="cart-canvas border rounded-3 p-3">
                                    <div class="row align-items-center">
                                        <div class="col-4 ps-0">
                                            <img alt="" src="assets/img/product/product-5.webp" width="200">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="text-overflow-2 font-16">ساعت مچی عقربه‌ای مردانه اینویکتا مدل
                                                Automatico Ghost Reserve
                                            </h3>
                                            <div class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                                <ins class="font-25 ms-0">2,500,000 <span>تومان</span></ins>
                                            </div>
                                            <div class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                                <div class="cart-canvas-count">
                                                    <span>تعداد:</span>
                                                    <span class="fw-bold">3</span>
                                                </div>
                                                <div>
                                                    <span>قیمت نهایی کل:</span>
                                                    <span>5,000,000 تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="order-details__bill">
                    <div class="order-details__bill-title">
                        <span class="bold-text">جزئیات قیمت</span>
                        <div class="order-details__bill-icon order-details__bill-icon--colored"></div>
                    </div>
                    <div class="order-details__bill-details">
                        <div class="order-details__bill-row order-details__bill-row--top">
                            <div class="bill-row__col">
                                <label>جمع مبلغ کالاها:</label>
                                <div class="cart__item-price">25,000,000 <span>تومان</span></div>
                            </div>
                            <div class="bill-row__col">
                                <label>سود شما از خرید:</label>
                                <div class="cart__item-price">5,000,000 <span>تومان</span></div>
                            </div>
                        </div>
                        <div class="order-details__bill-row order-details__bill-row--top">
                            <div class="bill-row__col">
                                <label> هزینه ارسال و بسته بندی: </label>
                                <div class="cart__item-price">70,000,000 <span>تومان</span></div>
                            </div>
                            <div class="bill-row__col">
                                <label class="me-1"> مبلغ پرداخت شده: </label>
                                <div class="cart__item-price main-color-green-color">90,000,000 <span>تومان</span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->include('app.layouts.footer'); ?>

