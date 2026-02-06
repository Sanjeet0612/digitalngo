@include('front.includes.new_header')

            <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Join Member</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Member</li>
                    </ol>
                </nav>  
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->
    <!-- Main Body Content Start -->
    <main id="body-content">
        <!-- About Us Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row"> 
                                
                    <div class="col-lg-8 col-md-12">
                        <h1 class="heading-main">
                            <small>Donation</small>
                            Don't Let Poverty Destroy Someone's Dreams
                        </h1>

                        <p>The secret to happiness lies in helping others. Never underestimate the difference YOU can make in the lives of the poor, the abused and the helpless. Spread sunshine in their lives no matter what the weather may be.</p>

                        <div class="donation-wrap">
                            <h3 class="h3-sm fw-5 txt-blue mb-3">Select Your Donation Amount</h3>
                            <div class="message">
                                @if(session('success'))
                                    <p style="color:green">{{ session('success') }}</p>
                                @endif

                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p style="color:red">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div> 
                            <form action="{{url('/')}}/donation" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="package_amt" value="1100" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadioInline1">₹ 1100 Membership Fees</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="package_amt" value="500" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">₹ 500 Volunteers Fees</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline3" name="package_amt" value="100" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline3">₹ 100 Donation for Plant</label>
                                        </div>

                                        <!-- <div class="mt-3">
                                            <input type="text" class="form-control" id="custom" placeholder="Custom Amount">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="border-top mb-4"></div>                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="mobile" value="{{old('phone')}}" name="phone" placeholder="Mobile Number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="city" value="{{old('city')}}"  name="city" placeholder="Enter your City" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="address" value="{{old('address')}}" name="address" placeholder="Enter your Address" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="state" value="{{old('state')}}" name="state" placeholder="Enter your State" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pincode"  value="{{old('pincode')}}" name="pincode"  placeholder="Enter your Pincode" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{old('refrer_code')}}" name="refrer_code" id="security" placeholder="Refer Code">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-default" name="member" ><i data-feather="heart"></i> Join Now</button>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="faqs-sidebar pos-rel">
                            <div class="bg-overlay blue opacity-80"></div>                            
                            <form>
                                <h3 class="h3-sm fw-7 txt-white mb-3">Have any Question?</h3>
                                <div class="form-group">
                                    <label for="fullname"><strong>Full Name</strong></label>
                                    <input type="text" class="form-control form-light" id="fullname">
                                </div>
                                <div class="form-group">
                                    <label for="emailform"><strong>Email Address</strong></label>
                                    <input type="email" class="form-control form-light" id="emailform">
                                </div>
                                <div class="form-group">
                                    <label for="emailform"><strong>Mobile Number</strong></label>
                                    <input type="text" class="form-control form-light" id="emailform">
                                </div>
                                <div class="form-group">
                                    <label for="questionmsg"><strong>How can help you?</strong></label>
                                    <textarea class="form-control form-light" rows="5" id="questionmsg"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default mt-3">Ask It Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->

        <!-- Callout Style Start -->
        <section class="wide-tb-150 bg-scroll bg-img-6 pos-rel callout-style-1">
            <div class="bg-overlay blue opacity-80"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="heading-main light-mode">
                            <small>Help Other People</small>
                            We Dream to Create A Bright Future Of The Underprivileged Children
                        </h1>
                    </div>
                    <div class="col-sm-12 text-md-right">
                        <a href="donation-page.html" class="btn btn-default">Donate Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout Style End -->
      <!-- Our Partners Start -->
      @include('front.includes.new_partner')
        <!-- Our Partners End -->
    </main>
     <!-- Main Footer Start -->
@include('front.includes.new_footer')