<div class="testimonials">
    <div class="container">
        <h3>Testimonials</h3>
        <div class="w3_testimonials_grids">
            <div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
                <div class="wmuSliderWrapper">
                    <?php $first = true; foreach($testimonials as $testimonial): ?>
                        <article style="position: absolute; width: 100%; opacity: 0;"> 
                            <div class="banner-wrap">

                                <div class="col-md-6 w3_testimonials_grid">
                                    <p><i class="fa fa-quote-right" aria-hidden="true"></i><?= $testimonial[0]['description'] ?></p>
                                    <h4><?= $testimonial[0]['name'] ?> <span><?= $testimonial[0]['position'] ?></span></h4>
                                </div>
                                
                                <div class="col-md-6 w3_testimonials_grid">
                                    <p><i class="fa fa-quote-right" aria-hidden="true"></i><?= $testimonial[1]['description'] ?></p>
                                    <h4><?= $testimonial[1]['name'] ?> <span><?= $testimonial[1]['position'] ?></span></h4>
                                </div>
                        
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
