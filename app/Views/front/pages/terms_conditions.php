<!-- inner page banner start -->
<section class="inner_banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="inner_banner_info">
                    <h4> Terms & Conditions </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner page banner end -->

<!-- mission section start -->
<section class="returnpolicy_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>LEADSS - The future of smart living</h2>
                <h5>PROVE SUPERIOR & WIN</h5>
                <p>5,00,000 TECHNOLOGY & PERFORMANCE CHALLENGE</p>   
                <p>Prove technology and quality superior to the LEADSS CORE BLDC AI Kitchen Chimney and win 5,00,000 in cash.</p>
                <h5>LEADSS — WE DON'T JUST CLAIM, WE PROVE.</h5>
                <p>*Terms & Conditions Apply. Detailed Challenge Terms & Conditions available on <a href="https://leadsindia.net/" target="_blank" rel="noopener noreferrer">www.leadsindia.net</a></p>

                <h3 style="text-align: left; margin-top: 15px">Leads Official Terms & Conditions</h3>
                <h5><strong>1. CHALLENGE:</strong></h5>
                <p>LEADSS Overseas Pvt. Ltd. ("LEADSS") invites any individual or legal entity to establish, in accordance with these Terms & Conditions, that a Kitchen Chimney legally sold in India possesses demonstrably superior technology and overall product quality than the LEADSS CORE BLDC AI Kitchen Chimney. Upon successful verification of such claim, LEADSS shall award n5,00,000 (Rupees Five Lakh Only).</p>    

                <h5><strong>2. ELIGIBILITY:</strong></h5>  
                <p>Open to individuals, manufacturers, companies, dealers, distributors, engineers, technical experts and institutions. Applicable only to genuine commercial Kitchen Chimneys legally sold in India. Prototype, custom-built, modified or discontinued products are excluded.</p>

                <h5><strong>3. BURDEN OF PROOF:</strong></h5>
                <p>The entire burden of proof rests solely upon the claimant. The claimant must establish every element through objective, independent and verifiable technical evidence. Unsupported allegations or subjective opinions shall not constitute proof.</p>

                <h5><strong>4. DEFINITION OF "SUPERIOR TECHNOLOGY & QUALITY":</strong></h5>
                <p>Includes BLDC Motor Technology, Intelligent Self Automation (ISA), Motion Sensor Technology, Digital Touch Switch Panel, Air Suction Performance, Motor Efficiency, Energy Efficiency, Noise Performance, Material Specification, Build Quality, Manufacturing Quality, Durability, Reliability, Safety Features, Filter Technology, Ease of Maintenance, Innovation and Overall Technical Performance. No single feature shall determine superiority. Evaluation shall be based upon the combined engineering performance of all applicable parameters.</p>

                <h5><strong>5. ACCEPTABLE EVIDENCE:</strong></h5>
                <p>Claims must be supported by objective and independently verifiable technical evidence. The following shall NOT constitute proof: Advertisements, Marketing Materials, Brochures, Product Catalogues, YouTube Videos, Social Media Posts, Customer Reviews, Influencer Opinions, Dealer Statements, Sales Claims and Personal Opinion. LEADSS may require laboratory reports, engineering reports, certifications, technical specifications or any additional documentary evidence necessary for verification.</p>

                <h5><strong>6. VERIFICATION:</strong></h5>
                <p>LEADSS reserves the right to inspect, examine and test the competing product. Evaluation may be conducted by an independent technical expert and/or NABL-accredited laboratory or another recognized testing institution. The claimant shall fully cooperate.</p>

                <h5><strong>7. PRIZE:</strong></h5>
                <p>5,00,000. One prize only. Taxes as applicable.</p>

                <h5><strong>8. FALSE OR MISLEADING CLAIMS:</strong></h5>
                <p>False, manipulated, misleading or fabricated submissions shall be rejected. LEADSS reserves legal rights.</p>

                <h5><strong>9. INTERPRETATION:</strong></h5>
                <p>Governed by the laws of India.</p>

                <h5><strong>10. AMENDMENT:</strong></h5>
                <p>LEADSS may amend, suspend or withdraw the Challenge prospectively.</p>
                
                <h5><strong>11. GOVERNING LAW & JURISDICTION:</strong></h5>
                <p> Courts at Siliguri, West Bengal shall have exclusive jurisdiction.</p>
                
                <h5><strong>12. ACCEPTANCE:</strong></h5>
                <p>Participation constitutes unconditional acceptance.</p>
                
                <h5><strong>13. SCOPE OF CHALLENGE:</strong></h5>
                <p>Applies only to the LEADSS CORE BLDC AI Kitchen Chimney.</p>
                
                <p><strong>OFFICIAL DISCLAIMER:</strong> This Challenge is intended solely for evaluating technology and overall product quality of the LEADSS CORE BLDC AI Kitchen Chimney against eligible competing Kitchen
Chimneys in accordance with these Terms & Conditions. Every claim shall be assessed on objective, independently verifiable technical evidence.</p>
                <!-- <h5>Return Process:</h5>
                <ul>
                    <li>Contact our Customer Support at <a href="tel:1800-212-1200">1800-212-1200</a> or via email at <a href="mailto:sales@leadsindia.net">sales@leadsindia.net</a> to initiate your return.</li>
                    <li>Our team will provide detailed instructions on how to return or hand over the product.</li>
                    <li>Upon receipt and inspection of the product, we will process your refund promptly.</li>
                </ul>
                <p>We greatly value your business and remain committed to ensuring your complete satisfaction.</p>
                <p><strong>Leads Assurance Team</strong></p> -->
            </div>
        </div>
    </div>
</section>
<!-- mission section end -->

<!-- our clients start -->

<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->

<!-- home enquiry start -->

<!-- home enquiry end -->



<?= $this->section('scripts') ?>
<script>
    $(function() {
        $('.thumbnail').viewbox();
        $('.thumbnail-2').viewbox({
            fullscreenButton: true
        });

        (function() {
            var vb = $('.popup-link').viewbox();
            $('.popup-open-button').click(function() {
                vb.trigger('viewbox.open');
            });
            $('.close-button').click(function() {
                vb.trigger('viewbox.close');
            });
        })();

    });
</script>
<?= $this->endSection() ?>