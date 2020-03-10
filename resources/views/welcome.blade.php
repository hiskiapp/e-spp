@extends('layouts.app')
@section('content')
<div class="main-content">
 <!-- Header -->
 <div class="header bg-primary pt-5 pb-7">
   <div class="container">
     <div class="header-body">
       <div class="row align-items-center">
         <div class="col-lg-6">
           <div class="pr-5">
             <h1 class="display-2 text-white font-weight-bold mb-0">E-SPP Online</h1>
             <h2 class="display-4 text-white font-weight-light">SMK Wikrama 1 Jepara</h2>
             <p class="text-white mt-4">Pembayaran SPP Online Berbasis Web</p>
             <div class="mt-5">
               <a href="{{ url('contact')}}" class="btn btn-neutral my-2">E - mail</a>
               <a href="https://wa.me/6285155064115" class="btn btn-success my-2">Whatsapp</a>
             </div>
           </div>
         </div>
         <div class="col-lg-6">
           <div class="row pt-5">
             <div class="col-md-6">
               <div class="card">
                 <div class="card-body">
                   <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-4">
                     <i class="ni ni-active-40"></i>
                   </div>
                   <h5 class="h3">Mudah</h5>
                   <p>Pengelolaan Yang Mudah Dicerna</p>
                 </div>
               </div>
               <div class="card">
                 <div class="card-body">
                   <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow mb-4">
                     <i class="ni ni-active-40"></i>
                   </div>
                   <h5 class="h3">Cepat</h5>
                   <p>Melakukan Transaksi Tanpa Ribet</p>
                 </div>
               </div>
             </div>
             <div class="col-md-6 pt-lg-5 pt-4">
               <div class="card mb-4">
                 <div class="card-body">
                   <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow mb-4">
                     <i class="ni ni-active-40"></i>
                   </div>
                   <h5 class="h3">User Friendly</h5>
                   <p>Memudahkan Pengguna Dalam Setiap Aspek</p>
                 </div>
               </div>
               <div class="card mb-4">
                 <div class="card-body">
                   <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow mb-4">
                     <i class="ni ni-active-40"></i>
                   </div>
                   <h5 class="h3">Kaya Fitur</h5>
                   <p>Fitur Yang Disediakan Sangatlah Menarik.</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="separator separator-bottom separator-skew zindex-100">
     <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
       <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
     </svg>
   </div>
 </div>
 <section class="py-6 pb-9 bg-default">
   <div class="row justify-content-center text-center">
     <div class="col-md-6">
       <h2 class="display-3 text-white">Solusi Pengelolaan SPP Dengan Mudah</h3>
         <p class="lead text-white">
           E-SPP Adalah Sebuah Web Aplikasi Yang Digunakan Untuk Mengelola Pembayaran SPP Sekolah. Dengan Fitur Yang Disediakan, Sangat Mudah Untuk Mengelola Pembayaran SPP.
         </p>
       </div>
     </div>
   </section>
   <section class="section section-lg pt-lg-0 mt--7">
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-lg-12">
           <div class="row">
             <div class="col-lg-4">
               <div class="card card-lift--hover shadow border-0">
                 <div class="card-body py-5">
                   <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                     <i class="ni ni-check-bold"></i>
                   </div>
                   <h4 class="h3 text-primary text-uppercase">Responsive</h4>
                   <p class="description mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                 </div>
               </div>
             </div>
             <div class="col-lg-4">
               <div class="card card-lift--hover shadow border-0">
                 <div class="card-body py-5">
                   <div class="icon icon-shape bg-gradient-success text-white rounded-circle mb-4">
                     <i class="ni ni-istanbul"></i>
                   </div>
                   <h4 class="h3 text-success text-uppercase">Pengelolaan Mudah</h4>
                   <p class="description mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                 </div>
               </div>
             </div>
             <div class="col-lg-4">
               <div class="card card-lift--hover shadow border-0">
                 <div class="card-body py-5">
                   <div class="icon icon-shape bg-gradient-warning text-white rounded-circle mb-4">
                     <i class="ni ni-planet"></i>
                   </div>
                   <h4 class="h3 text-warning text-uppercase">Pembayaran 1x Klik</h4>
                   <p class="description mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section class="py-6">
     <div class="container">
       <div class="row row-grid align-items-center">
         <div class="col-md-6 order-md-2">
           <img src="./assets/img/theme/landing-1.png" class="img-fluid">
         </div>
         <div class="col-md-6 order-md-1">
           <div class="pr-md-5">
             <h1 class="text-white">Payment Gateway</h1>
             <p class="text-white">Melakukan Pembayaran Semakin Mudah! Tingal Transfer, Langsung Tervalidasi! Support:</p>
             <ul class="list-unstyled mt-3">
               <li class="py-2">
                 <div class="d-flex align-items-center">
                   <div>
                     <div class="badge badge-circle badge-success mr-3">
                       <i class="ni ni-settings-gear-65"></i>
                     </div>
                   </div>
                   <div>
                     <h4 class="mb-0 text-white">OVO</h4>
                   </div>
                 </div>
               </li>
               <li class="py-2">
                 <div class="d-flex align-items-center">
                   <div>
                     <div class="badge badge-circle badge-success mr-3">
                       <i class="ni ni-html5"></i>
                     </div>
                   </div>
                   <div>
                     <h4 class="mb-0 text-white">BRI</h4>
                   </div>
                 </div>
               </li>
               <li class="py-2">
                 <div class="d-flex align-items-center">
                   <div>
                     <div class="badge badge-circle badge-success mr-3">
                       <i class="ni ni-satisfied"></i>
                     </div>
                   </div>
                   <div>
                     <h4 class="mb-0 text-white">BCA</h4>
                   </div>
                 </div>
               </li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section class="py-6">
     <div class="container">
       <div class="row row-grid align-items-center">
         <div class="col-md-6">
           <img src="./assets/img/theme/landing-2.png" class="img-fluid">
         </div>
         <div class="col-md-6">
           <div class="pr-md-5">
             <h1 class="text-white">Tampilan Dashboard</h1>
             <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi quis dolore odit nesciunt aliquam cupiditate possimus accusamus cumque officia ut debitis ipsam, vel quae vero ab voluptatibus, atque fuga cum.</p>
             <a href="./pages/examples/profile.html" class="font-weight-bold text-warning mt-5">Explore pages</a>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section class="py-6">
     <div class="container">
       <div class="row row-grid align-items-center">
         <div class="col-md-6 order-md-2">
           <img src="./assets/img/theme/landing-3.png" class="img-fluid">
         </div>
         <div class="col-md-6 order-md-1">
           <div class="pr-md-5">
             <h1 class="text-white">Pengelolaan Yang Mudah</h1>
             <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit non expedita distinctio perspiciatis rerum quos, assumenda adipisci saepe vel consectetur beatae facilis sed porro. Placeat magni maxime, quisquam voluptates facilis?</p>
             <a href="./pages/widgets.html" class="font-weight-bold text-info mt-5">Explore widgets</a>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section class="py-7 section-nucleo-icons bg-white overflow-hidden">
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-lg-8 text-center">
           <h2 class="display-3">E-SPP</h2>
           <p class="lead">
             Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nemo illo ipsam accusamus. Odit dolores temporibus, enim architecto. Incidunt quod placeat hic necessitatibus fugit repellendus ea laborum voluptatum eligendi id.
           </p>
         </div>
       </div>
     </div>
   </section>
   <section class="py-7">
     <div class="container">
       <div class="row row-grid justify-content-center">
         <div class="col-lg-8 text-center">
           <h2 class="display-3 text-white">E-SPP <span class="text-success">SMK Wikrama 1 Jepara</span></h2>
           <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ducimus tenetur vitae, facere praesentium error, dolorum deleniti reiciendis quidem quis eveniet non possimus soluta officiis neque perspiciatis, mollitia! Aliquam, assumenda.</p>
           <div class="text-center">
             <h4 class="display-4 mb-5 mt-5 text-white">Tersedia Berbagai Macam Jalur Pembayaran</h4>
             <div class="row justify-content-center">
               <div class="w-10 mx-2 mb-2">
                 <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank" data-toggle="tooltip" data-original-title="Bootstrap 4 - Most popular front-end component library">
                   <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/bootstrap.jpg" class="img-fluid rounded-circle shadow shadow-lg--hover">
                 </a>
               </div>
               <div class="w-10 mx-2 mb-2">
                 <a href=" https://www.creative-tim.com/product/vue-argon-dashboard" target="_blank" data-toggle="tooltip" data-original-title="Vue.js - The progressive javascript framework">
                   <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/vue.jpg" class="img-fluid rounded-circle">
                 </a>
               </div>
               <div class="w-10 mx-2 mb-2">
                 <a href=" https://www.creative-tim.com/product/argon-dashboard" target="_blank" data-toggle="tooltip" data-original-title="Sketch - Digital design toolkit">
                   <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/sketch.jpg" class="img-fluid rounded-circle">
                 </a>
               </div>
               <div class="w-10 mx-2 mb-2">
                 <a href=" https://www.creative-tim.com/product/argon-dashboard-angular" target="_blank" data-toggle="tooltip" data-original-title="Angular - One framework. Mobile &amp; desktop">
                   <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/angular.jpg" class="img-fluid rounded-circle">
                 </a>
               </div>
               <div class="w-10 mx-2 mb-2">
                 <a href=" https://www.creative-tim.com/product/argon-dashboard-react" target="_blank" data-toggle="tooltip" data-original-title="React - A JavaScript library for building user interfaces">
                   <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/react.jpg" class="img-fluid rounded-circle">
                 </a>
               </div>
               <div class="w-10 mx-2 mb-2">
                 <a href=" https://www.creative-tim.com/product/argon-dashboard-laravel" target="_blank" data-toggle="tooltip" data-original-title="Laravel - The PHP Framework For Web Artisans">
                   <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/laravel_logo.png" class="img-fluid rounded-circle">
                 </a>
               </div>
               <div class="w-10 mx-2 mb-2">
                 <a href=" https://www.creative-tim.com/product/argon-dashboard-nodejs" target="_blank" data-toggle="tooltip" data-original-title="Node.js - a JavaScript runtime built on Chrome's V8 JavaScript engine">
                   <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/nodejs-logo.jpg" class="img-fluid rounded-circle">
                 </a>
               </div>
               <div class="w-10 mx-2 mb-2">
                 <a href=" https://www.adobe.com/products/photoshop.html" target="_blank" data-toggle="tooltip" data-original-title="[Coming Soon] Adobe Photoshop - Software for digital images manipulation">
                   <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/ps.jpg" class="img-fluid rounded-circle opacity-3">
                 </a>
               </div>
             </div>
             <div class="spinner-border" role="status">
               <span class="sr-only">Loading...</span>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
 </div>
 @endsection