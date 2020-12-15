@extends('frontEnd.layouts.master')
@section('title','Newsfeed Page')
@section('content')
    <section>
        <div class="container newsfeeds">
            <div class="row">
        <div class="col-sm-7 padding-left">
                   <!-- start sw-rss-feed code --> 
<script type="text/javascript"> 
<!-- 
rssfeed_url = new Array(); 
rssfeed_url[0]="http://www.fao.org/nepal/news/rss/en/";  
rssfeed_frame_width="530"; 
rssfeed_frame_height="500"; 
rssfeed_scroll="on"; 
rssfeed_scroll_step="6"; 
rssfeed_scroll_bar="off"; 
rssfeed_target="_blank"; 
rssfeed_font_size="12"; 
rssfeed_font_face=""; 
rssfeed_border="on"; 
rssfeed_css_url="https://feed.surfing-waves.com/css/style4.css"; 
rssfeed_title="on"; 
rssfeed_title_name=""; 
rssfeed_title_bgcolor="#3366ff"; 
rssfeed_title_color="#fff"; 
rssfeed_title_bgimage=""; 
rssfeed_footer="off"; 
rssfeed_footer_name="rss feed"; 
rssfeed_footer_bgcolor="#fff"; 
rssfeed_footer_color="#333"; 
rssfeed_footer_bgimage=""; 
rssfeed_item_title_length="50"; 
rssfeed_item_title_color="#666"; 
rssfeed_item_bgcolor="#fff"; 
rssfeed_item_bgimage=""; 
rssfeed_item_border_bottom="on"; 
rssfeed_item_source_icon="off"; 
rssfeed_item_date="off"; 
rssfeed_item_description="on"; 
rssfeed_item_description_length="120"; 
rssfeed_item_description_color="#666"; 
rssfeed_item_description_link_color="#333"; 
rssfeed_item_description_tag="off"; 
rssfeed_no_items="0"; 
rssfeed_cache = "7b7f84d29db2d080436e5d67b23ebe52"; 
//--> 
</script> 
<script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 
<!-- The link below helps keep this service FREE, and helps other people find the SW widget. Please be cool and keep it! Thanks. --> 
<!-- end sw-rss-feed code -->
                </div>

                <div class="col-sm-5 padding-right">
                    <div class="features_items"><!--features_items-->
                                <div class="col-sm-10">
                                <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo img-responsive">
                                        <img src="{{@asset('frontEnd/images/home/grains.jpg')}}" alt="" />
                                        <h2></h2>
                                        <p></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                         
                    </div><!--features_items-->

                </div>

               
            </div>
        </div>
    </section>
@endsection