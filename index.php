<!DOCTYPE html>
<html>
<head>
<title>Air travel throughout the Baltics</title>
<meta charset='utf-8' />
</head>
<body>


<div class ='search'>

    <div class = 'box1-input'>
        <input type='text' name='country' placeholder='your country'/> </p>


    </div>
    <div class = 'box2'>

        <input type='text' name='lastname'placeholder='Where' /></p>

    </div>
    <div class = 'box3'>

        <input type='text' name='parol'placeholder='Select departure date' /></p>

    </div>
    <div class = 'box4'>

        <input type='text' name='post' placeholder='Select return date' /></p>
    </div>
    <div class = 'box5'>

        <input type='text' name='parol'placeholder='number of passengers and class' /></p>
 
    </div>

    <!-- <div class = 'box6'>
        <button type='button'>Find tickets</button>
        <form action5='input.php' method='POST5'>
    </div> -->
</div>
<style>
.collapsible {
    background-color: #777;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 10%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active, .collapsible:hover {
    background-color: #555;
}

.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;

}

.search {
    display: flex;
    align-items: center;
    flex-direction: row;
    height: 800px;
    justify-content: center;
}
</style>
</head>
<body>

<button class="collapsible">Select departure date</button>
<div class="content">
<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
  padding: 70px 25px;
  width: 25%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
  word-spacing:33px;
  width: 25%
  
}

.weekdays li {
  display: inline-block;
  width: 6.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 1px 0;
  background: #eee;
  margin: 0;
  height: 120px;
  width: 25%;
  word-spacing:33px;

}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 6.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 6.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 6.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 5.2%;}
}
</style>
</head>
<body>
<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      August<br>
      <span style="font-size:18px">2021</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">  
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active">10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul></div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}
</script>

<!-- <textarea name='comment' maxlength='200'></textarea></p>
<input type='submit' value='Отправить'>
</form> -->
</body>
</html>

<?php

//⇒

// require 'helpers.php';

// $items = ['a' => 1,'b' => 2,'c' => 3,'d' => 4,'e' => 5];

// prettyPrintArray(array_chunk($items,2,true));

// $array1 =['a','b','c'];
// $array2 =[5,10,15];

// prettyPrintArray(array_combine($array1,$array2));

// $array = [1,2,3,4,5,6,7,8,9,10];

// $event = array_filter($array, fn($number) => $number % 2 == 0);

// prettyPrintArray($event);
//  ?>
