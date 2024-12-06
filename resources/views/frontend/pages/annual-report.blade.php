@extends('frontend.layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<style>
    @import url("https://fonts.googleapis.com/css?family=Lato:300,400,700");

*,
html {
    padding: 0;
    margin: 0;
    font-family: "Lato", sans-serif;
}

.shape-box {
    display: inline-block;
    position: relative;
    z-index: 1;
    max-width: 500px;
    height: 430px;
    margin: 30px 10px 30px;
    box-shadow: 0 6px 30px 0 rgba(0, 0, 0, .12);
    overflow: hidden;
    width: 23.333%;
}

.shape-box_half {
    overflow: hidden;
    text-align: left;
}

.shape-box_half:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    transform: skewY(45deg);
    transform-origin: top left;
    transition: \transform .4s;
    background: #cce9d9;
    z-index: 1;
}

.shape-box>img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
}

.bg-black {
    background-color: #000;
}

.shape-box_half figcaption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 0 30px 30px;
    transition: \transform .4s;
    transform: translateY(100%);
    z-index: 3;
}

.shape-box_half figcaption .show-cont {
    position: absolute;
    bottom: calc(100% + 30px);
    left: 30px;
    right: 30px;
    transition: bottom .4s;
}

.card-no {
    font-size: 20px;
    color: red;
    padding: 0;
    margin: 10px 0;
    padding-right: 5px;
    font-weight:900;
    font-family: fangsong;

}
.card-category{
    font-size: 20px;
    color: #004aad;
    padding: 0;
    margin: 10px 0;
    padding-right: 5px;
    font-weight:900;
    font-family: monospace;

}

.card-main-title {
    margin-top: 8px;
    font-weight: 700;
    font-size: 24px;
    text-transform: uppercase;
    color: #292b2c;
    font-family: auto;
}

.card-content {
    color: #0e0000;
    margin-top: 20px;
    line-height: 22px;
    font-size: 15px;
}

.read-more-btn {
    border: 2px solid #db3236;
    font-size: 14px;
    cursor: pointer;
    padding: 10px 20px;
    display: inline-block;
    text-transform: uppercase;
    letter-spacing: .08em;
    font-weight: 600;
    position: relative;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    background: #db3236;
    color: #fff;
    border-radius: 2px;
    margin-top: 25px;
    text-decoration: none;
}

.read-more-btn:hover {
    background: transparent;
    color: #db3236;

}

.shape-box_half>.after {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #fdd744;
    opacity: 0;
    transition: opacity .4s;
}

/*On hover*/
.shape-box_half:hover:before {
    transform: skewY(20deg);
}

.shape-box_half:hover figcaption {
    transform: translateY(0);
}

.shape-box_half:hover figcaption .show-cont {
    bottom: 100%;
}

.shape-box_half:hover>.after {
    opacity: 1;
}
.publication-div{
    position: absolute;
    background-color: #fff;
    padding: 4px 11px 4px 9px;
    top: -55px;
    left: -40px;
    border-radius: 0px 20px 20px 0px;

}
.publication-ul{
    border-left-width: 6px;
    --tw-border-opacity: 1;
    border-color: rgb(227 111 30 / var(--tw-border-opacity));
    padding-left: 1rem;
    font-weight: 700; 
    border-left:4px solid red;
}
.publication-li{
    list-style:none;
    display:flex;
}
.btn-class-name{
  text-align:center;
}
.btn-class-name-btn{
    background:#004aad !important;

}
.btn-class-name-btn:hover{
    background:#01923f !important;

}


</style>
<script>
<link rel="stylesheet" href="path/to/fontawesome/css/all.min.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">

</script>
@section('content')
        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>Annual Report</h2>
                    <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Annual Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->
        <!-- body -->
        <div class="box-wrapper">
        <figure class="shape-box shape-box_half">
            <img src="https://images.unsplash.com/photo-1534670007418-fbb7f6cf32c3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="">
            <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
            <figcaption>
                <div class="show-cont">
                    <div class='row'>
                    <div class='publication-div'>
                    <ul class='publication-ul'>
                      <li class='publication-li' data-category="publications"> <span class='card-no'>01</span>  <span class='card-category'>Annual Reports</span> </li>
                    </ul>
                    </div>
                </div>
                    <h4 class="card-main-title">NGO Ever Rule the World</h4>
                </div>
                <p class="card-content">Customer interactions, study and analysis of company branding through creative briefs. Creation of mock-up designs by using UI tools that simulate actions and pre-visualize the reactions.</p>
                  <div class="btn-class-name">
                  <button type="button" class="btn btn-primary btn-class-name-btn" ><i class="fa-solid fa-download"></i> Download</button>
                  </div>
            

            </figcaption>
            <span class="after"></span>
        </figure>
        <figure class="shape-box shape-box_half">
            <img src="https://images.unsplash.com/photo-1534670007418-fbb7f6cf32c3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="">
            <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
            <figcaption>
                <div class="show-cont">
                    <div class='row'>
                    <div class='publication-div'>
                    <ul class='publication-ul'>
                      <li class='publication-li' data-category="publications"> <span class='card-no'>02</span>  <span class='card-category'>Annual Reports </span> </li>
                    </ul>
                    </div>
                </div>
                    <h4 class="card-main-title">NGO Ever Rule the World</h4>
                </div>
                <p class="card-content">Customer interactions, study and analysis of company branding through creative briefs. Creation of mock-up designs by using UI tools that simulate actions and pre-visualize the reactions.</p>
                  <div class="btn-class-name">
                  <button type="button" class="btn btn-primary btn-class-name-btn" ><i class="fa-solid fa-download"></i> Download</button>
                  </div>
            

            </figcaption>
            <span class="after"></span>
        </figure>
    </div>
              <!-- star desig btn -->
         <div class='main-design-btn'>
          
         </div>  
        @endsection