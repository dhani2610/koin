
    <script src="{{ url('frontend/assets/js/vendors/modernizr-3.6.0.min.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/jquery-3.6.0.min.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/jquery-migrate-3.3.0.min.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/bootstrap.bundle.min.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/waypoints.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/wow.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/magnific-popup.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/perfect-scrollbar.min.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/select2.min.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/isotope.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/scrollup.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/swiper-bundle.min.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/noUISlider.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/slider.js')}} "></script>
    <!-- Count down-->
    <script src="{{ url('frontend/assets/js/vendors/counterup.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/jquery.countdown.min.js')}} "></script>
    <!-- Count down--><script src="{{ url('frontend/assets/js/vendors/jquery.elevatezoom.js')}} "></script>
    <script src="{{ url('frontend/assets/js/vendors/slick.js')}} "></script>
    <script src="{{ url('frontend/assets/js/main.js?v=3.0.0')}} "></script>
    <script src="{{ url('frontend/assets/js/shop.js')}} "></script>
    <script src="{{ url('frontend/assets/js/shop2.js')}} "></script>
    
     {{-- my search navbar user--}}

   <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
  
    $('#inputSearchUser').on('keyup',function(){
        // alert("ok");
        $inputSearchUser = $(this).val();
        // alert($inputSearchUser);
        if($inputSearchUser ==''){
            $('#searchResultUser').html('');
            $('#searchResultUser').hide();
        }else{
            $.ajax({
                method:"post",
                url:"{{ route('searchnavbaruser') }}",
                data:JSON.stringify({
                    inputSearchUser:$inputSearchUser
                }),
                
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json'
                },
                success: function(data){
                    // alert("ok");
                    var searchResultAjaxUser='';
                    data = JSON.parse(data);
                    // console.log(data);
                    $('#searchResultUser').show();
                    var noproduct = 0;
                    
                    for(let i=0; i<data.length;i++){
                        if (data[i].for_search == 0) {
                              var routes ="{{route('home')}}"+"/detail-product/"+data[i].id;
                                  searchResultAjaxUser +='<a href="'+routes+'" class="list-group-item list-group-item-action" aria-current="true">\
                                                            <div class="d-flex justify-content-between">\
                                                              <small>'+data[i].name+'</small>\
                                                            </div>\
                                                          </a>'
                                  // searchResultAjaxUser +='<div class="search-item"><a href="'+routes+'">'+data[i].name+'</a></div>'
                        } 
                      
                        else if(data[i].for_search == 1){
                            var routes ="{{route('home')}}"+"/detail-empty-bottle/"+data[i].id;
                              searchResultAjaxUser +='<a href="'+routes+'" class="list-group-item list-group-item-action" aria-current="true">\
                                                            <div class="d-flex justify-content-between">\
                                                              <small>'+data[i].name+'</small>\
                                                            </div>\
                                                          </a>'
                        }
                    }
                    $('#searchResultUser').html(searchResultAjaxUser);
                }
            })
        }
  
    })
    </script>

    {{-- my search navbar user mobile--}}

   <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
  
    $('#inputSearchUserMobile').on('keyup',function(){
        // alert("ok");
        $inputSearchUserMobile = $(this).val();
        // alert($inputSearchUserMobile);
        if($inputSearchUserMobile ==''){
            $('#searchResultUserMobile').html('');
            $('#searchResultUserMobile').hide();
        }else{
            $.ajax({
                method:"post",
                url:"{{ route('searchnavbaruser') }}",
                data:JSON.stringify({
                    inputSearchUserMobile:$inputSearchUserMobile
                }),
                
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json'
                },
                success: function(data){
                    // alert("ok");
                    var searchResultAjaxUserMobile='';
                    data = JSON.parse(data);
                    // console.log(data);
                    $('#searchResultUserMobile').show();
                    var noproduct = 0;
                    
                    for(let i=0; i<data.length;i++){
                        if (data[i].for_search == 0) {
                              var routes ="{{route('home')}}"+"/detail-product/"+data[i].id;
                                  searchResultAjaxUserMobile +='<a href="'+routes+'" class="list-group-item list-group-item-action" aria-current="true">\
                                                            <div class="d-flex justify-content-between">\
                                                              <small>'+data[i].name+'</small>\
                                                            </div>\
                                                          </a>'
                                  // searchResultAjaxUserMobile +='<div class="search-item"><a href="'+routes+'">'+data[i].name+'</a></div>'
                        } 
                      
                        else if(data[i].for_search == 1){
                            var routes ="{{route('home')}}"+"/detail-empty-bottle/"+data[i].id;
                              searchResultAjaxUserMobile +='<a href="'+routes+'" class="list-group-item list-group-item-action" aria-current="true">\
                                                            <div class="d-flex justify-content-between">\
                                                              <small>'+data[i].name+'</small>\
                                                            </div>\
                                                          </a>'
                        }
                    }
                    $('#searchResultUserMobile').html(searchResultAjaxUserMobile);
                }
            })
        }
  
    })
    </script>
    