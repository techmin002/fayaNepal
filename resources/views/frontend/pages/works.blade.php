@extends('frontend.layouts.master')
 <style>
  .main-div-tabs{
    background:#cce9d9;
    position: relative;
  }
  .main-top-tab{
    display:flex;
    background: #01923f;
    border: 1px solid #cccccc;
    border-radius: 8px;
    width: 100%;
    margin-top: 0px;
    position: sticky;
    top: 82  px;
    z-index: 9898888;

  }
  .main-top-tab p{
    margin-bottom:0px !important;
  }
  .main-top-tab a{
    background-color: #004aad;
    font-weight: bold;
    color: #ffff;
    border: 1px solid #cccccc;
    border-radius: 8px;
    padding: 10px;
    margin: 5px 0 5px 5px;
    height: 30px;
    cursor: pointer;
    display: inline-flex;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    transition: transform 0.2s, opacity 0.2s ease;
    padding:20px
  }
  .main-top-tab a:hover{
    background-color: #01923f;
    color: #ffff;
  }
  .main-top-tab a:active{
    background-color: #01923f;
    color: #ffff;
  }
  
 </style>

@section('content')

        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>Our Work</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">our work</li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->
        <!-- body -->

<div  class='main-div-tabs'>
<div class='container main-head-div'>
<div class='main-top-tab'>
<p ><a href="#C4">About</a></p>
<p ><a href="#C10">Projects</a></p>
<p ><a href="#C4">Resourcees </a></p>
<p ><a href="#C10">Stories</a></p>
<p ><a href="#C10">News</a></p>
</div>
 <br>
 <br>
<div>


<h2>Chapter 1</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 2</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 3</h2>
<p>This chapter explains ba bla bla</p>

<h2 id="C4">Chapter 4</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 5</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 6</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 7</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 8</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 9</h2>
<p>This chapter explains ba bla bla</p>

<h2 id="C10">Chapter 10</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 11</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 12</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 13</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 14</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 15</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 16</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 17</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 18</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 19</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 20</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 21</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 22</h2>
<p>This chapter explains ba bla bla</p>

<h2>Chapter 23</h2>
<p>This chapter explains ba bla bla</p>
</div>
</div>
</div>        
        


          
        @endsection