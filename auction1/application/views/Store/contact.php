<?php $this->load->view('includes/storeheader.php');?>
<head><title>Contact Us</title></head>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?php echo base_url();?>assets/h_assets/images/bg-04.jpg);">

  </section>


  <!-- Content page -->
  <section class="bg0 p-t-104 p-b-116">
    <div class="container">
      <div class="flex-w flex-tr">
        <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
          <form>
            <h4 class="mtext-105 cl2 txt-center p-b-30">
              Send Us A Message
            </h4>

            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
              <img class="how-pos4 pointer-none" src="<?php echo base_url();?>assets/h
_assets/images/icons/icon-email.png" alt="ICON">
            </div>

            <div class="bor8 m-b-30">
              <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
            </div>

            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
              Submit
            </button>
          </form>
        </div>

        <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
          <div class="flex-w w-full p-b-42">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-map-marker"></span>
            </span>
          <h3 class="mtext-111 cl2 p-b-16">
           Contact Us
         </h3>
            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Address
              </span>

              <p class="stext-115 cl6 size-213 p-t-18">
                University of Lahore, Chenab Campus, Gujrat
              </p>
            </div>
          </div>

          <div class="flex-w w-full p-b-42">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-phone-handset"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Lets Talk
              </span>

              <p class="stext-115 cl1 size-213 p-t-18">
                +923167228162<br>
                +923486278470
              </p>
            </div>
          </div>

          <div class="flex-w w-full">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-envelope"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Sale Support
              </span>

              <p class="stext-115 cl1 size-213 p-t-18">
                usmanamjad076@gmail.com<br>
                mati_786@icloud.com
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $this->load->view('includes/storefooter.php');?>
