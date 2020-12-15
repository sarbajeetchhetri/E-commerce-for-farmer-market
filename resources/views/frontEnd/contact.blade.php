@extends('frontEnd.layouts.master')
@section('title','Contact Page')
@section('content')
    <section>
        <div class="container contact">
            <div class="row">
                <div class="col-sm-5 align-center">
                  <iframe width="450" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=kathmandu&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>

                <div class="col-sm-7 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Contact Info</h2>
                                <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <p><ul class="contact_info">
                            <li><span class="fa fa-map-marker" aria-hidden="true"></span>  Kathmandu, Nepal.</li>
                            <li><span class="fa fa-envelope" aria-hidden="true"></span>  <a href="mailto:farmingassist@farm.com">farmingassist@farm.com</a></li>
                            <li><span class="fa fa-phone" aria-hidden="true"></span>  +977-9807400588</li>
                        </ul></p>
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