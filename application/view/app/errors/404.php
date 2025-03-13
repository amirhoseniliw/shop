<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Not Found</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Arvo"
    />
    <!-- Start Custom Css -->
    <link rel="stylesheet" href="<?php $this->asset('Assets_404/CustomCssJs/Style.css')?>" />
    <!-- End Custom Css -->
  </head>

  <body>
    <section class="page_404">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-10 col-sm-offset-1 text-center">
              <div class="four_zero_four_bg">
                <h1 class="text-center">404</h1>
              </div>

              <div class="contant_box_404">
                <h3 class="h2">انگار گم شدی</h3>

                <p>صفحه مورد نظر شما در دسترس نیست!</p>

                <a href="<?php $this->url('/home/index') ?>" class="link_404">برگشت به خانه</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
