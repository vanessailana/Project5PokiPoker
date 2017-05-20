<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
 <title>Let's Play</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-5">
<a href="#" class="btn btn-danger btn-lg"> Logout</a>
</div>
<center>
  <h1>Let's Play Poker</h1>
  <p id="round2say"></p>
  </center>

<script src="/socket.io/socket.io.js"></script>

<script>

      $(document).ready(function(){
    $("#round2").css("background-color", "white").hide();
     $("#row2").hide();
      $("#row3").hide();
       $("#finalround").hide();

});
            
    var socket = io.connect('http://localhost:8080');
  
     socket.on('connectToRoom',function(data){
        var y= data;
          var output = document.getElementById("output1");
        output.innerHTML = data;
   

      });


socket.on('broadcast',function(data){
     var use= data.description;

       var output = document.getElementById("output0");
        output.innerHTML = use;

            
      

             console.log(data.description);
             

            

      });



  socket.on('message',function(message){
    console.log(message); 
  });
  socket.emit('message','Hello, I am the client');


socket.on('person', function(person){  

  //consider each card to be a greek letter
  //
   console.log(person[0],person[1],person[2],person[3],person[4]);

   var alpha=[person[0]];

   //first card
   var output= document.getElementById("alpha");

   output.innerHTML=alpha;

   //second card
    var beta=[person[1]];

  
   var output1= document.getElementById("beta");

   output1.innerHTML=beta;


   //third card
    var epsilon=[person[2]];

  
   var output2= document.getElementById("epsilon");

   output2.innerHTML=epsilon;


   //fourth card
   //
    var delta=[person[3]];

  
   var output3= document.getElementById("delta");

   output3.innerHTML=delta;


 //fifth card
     var iota=[person[4]];

  
   var output4= document.getElementById("iota");

   output4.innerHTML=iota;








   
});



socket.on('winner',function(winner){  


 var ugly=winner.value;

 var handname=winner.handName;


 //show we can print out the handname when we press draw.
 //
 
   var output5= document.getElementById("ugly");


    $(document).ready(function(){
    $(".button10").click(function(){
     alert(handname);
     alert('Round 1 is over, let us move on to round 2');
    output5.innerHTML=ugly;
    $("#round2say").append("<h1><kbd>This is round 2  </kbd> </h1>");
    $("#set1").css("background-color", "yellow").hide();
    $("#row1").hide();
    $(".button10").hide();
    $("#round2").show();
    $("#row2").show();


    });
});




});



$(document).ready(function(){
    $(".button5").click(function(){
        $("#iota").remove();
    });
});






$(document).ready(function(){
    $(".button1").click(function(){
        $("#alpha").remove();
    });
});


$(document).ready(function(){
    $(".button2").click(function(){
        $("#beta").remove();
    });
});

$(document).ready(function(){
    $(".button3").click(function(){
        $("#epsilon").remove();
    });
});


$(document).ready(function(){
    $(".button4").click(function(){
        $("#delta").remove();
    });
});


$(document).ready(function(){
    $(".button5").click(function(){
        $("#iota").remove();
    });
});



socket.on('person', function(person){ 
  var person1= [person[5]];

  console.log(person1);

  var output1a=document.getElementById("person1");

  output1a.innerHTML=person1;


  var person2= [person[6]];

  console.log(person2);

  var output1b=document.getElementById("person2");

  output1b.innerHTML=person2;



  var person3= [person[7]];


  var output1c=document.getElementById("person3");

  output1c.innerHTML=person3;




  var person4= [person[8]];

  console.log(person4);

  var output1d=document.getElementById("person4");

  output1d.innerHTML=person4;



  var person5= [person[9]];

  console.log(person5);

  var output1e=document.getElementById("person5");

  output1e.innerHTML=person5;

});



socket.on('winner1',function(winner1){  


 var ugly1=winner1.value;

 var handname1=winner1.handName;

 $(".button20").click(function(){

   

  var op=document.getElementById("ugly");

  op.innerHTML=ugly1;

  alert("You just finished round 2");
  alert(handname1);

  $("#round2say").replaceWith("<h1><kbd> This is the final round </kbd> </h1>");

  $("#round2").hide();
   
     $("#row2").hide();

     $("#row3").show();

      $("#finalround").show();
     

});



});



$(document).ready(function(){
    $(".button7").click(function(){
        $("#person1").remove();
    });
});


$(document).ready(function(){
    $(".button8").click(function(){
        $("#person2").remove();
    });
});

$(document).ready(function(){
    $(".button9").click(function(){
        $("#person3").remove();
    });
});


$(document).ready(function(){
    $(".button11").click(function(){
        $("#person4").remove();
    });
});


$(document).ready(function(){
    $(".button12").click(function(){
        $("#person5").remove();
    });
});

 
socket.on('person', function(person){ 
  var card1= [person[10]];

  var card2=[person[11]];

  var card3=[person[12]];


  var card4=[person[13]];


  var card5=[person[12]];



var outputalpha=document.getElementById("card1");

  outputalpha.innerHTML=card1;


var outputbeta=document.getElementById("card2");

  outputbeta.innerHTML=card2;



var outputepsilon=document.getElementById("card3");

  outputepsilon.innerHTML=card3;



var outputphi=document.getElementById("card4");

  outputphi.innerHTML=card4;


var outputdelta=document.getElementById("card5");

  outputdelta.innerHTML=card5;





});

$(document).ready(function(){
    $(".button13").click(function(){
        $("#card1").remove();
    });
}); 



$(document).ready(function(){
    $(".button14").click(function(){
        $("#card2").remove();
    });
});


$(document).ready(function(){
    $(".button15").click(function(){
        $("#card3").remove();
    });
}); 


$(document).ready(function(){
    $(".button16").click(function(){
        $("#card4").remove();
    });
}); 

$(document).ready(function(){
    $(".button17").click(function(){
        $("#card5").remove();
    });
}); 


socket.on('winner3',function(winner3){  


 var ugly3=winner3.value;

 var handname3=winner3.handName;


 $(".button21").click(function(){



  var result=document.getElementById("ugly");

  result.innerHTML=ugly3;

  alert("Game Over, you are done");
  alert(handname3);
  $("#row3").hide();
  $("#finalround").hide();
  document.getElementById("#test1").innerHTML = "To Start Over Just Refresh the  Page";


});

}); 


        
</script>
<h1 id="test1">To Play A New Game Just Refresh the Page</h1>
<h1 id="round"></h1>
<div class="col">
<div class="jumbotron alert-success">
<h1> <kbd>Your score is  </kbd></h1>
<h1 id="ugly"> </h1>

</div>
</div>
<h1> <kbd> There are users connected </kbd></h1>
<h2 id="output0"></h2>  
<h1> <kbd>You are in  Room Number </kbd></h1> 
<h2 id="output1"></h2>

<h1><kbd> These are the cards you have </kbd> </h1>
<div id="set1">
<h2 id="alpha"></h2>
<h3 id="beta"></h3>
<h3 id="epsilon"></h3>
<h3 id="delta"></h3>
<h3 id="iota"></h3>

</div>


<p>
<div id="round2">
<h2 id="person1"></h2>
<h2 id="person2"></h2>
<h2 id="person3"></h2>
<h2 id="person4"></h2>
<h2 id="person5"></h2>
<center>
<button class="button20"><h1>Draw</h1></button>


</center>



</p>

</div>


<p>

<div id="finalround">
<h2 id="card1"></h2>
<h2 id="card2"></h2>
<h2 id="card3"></h2>
<h2 id="card4"></h2>
<h2 id="card5"></h2>
<center>
<button class="button21"><h1> Draw </h1></button>


</center>



</p>

</div>

<center>

<style>
.button1,.button2,.button3,.button4,.button5,.button10,.button15,
.button20{

    background-color: #4CAF50; 
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px; 
    font-style: "Comic Sans MS", cursive, sans-serif; 


}

.button7,.button8,.button9,.button11,.button12 {
  

    background-color: #4CAF50; 
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px; 
    font-style: "Comic Sans MS", cursive, sans-serif; 


}


.button13, .button14, .button15,.button16,.button17,.button21 {
  

    background-color: #4CAF50; 
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px; 
    font-style: "Comic Sans MS", cursive, sans-serif; 


}

</style>

</head>
<body>

  
<button class="button10"> <h1> Draw </h1></button>




<div id="row1">


   <button class="button1">Remove <kbd>1st</kbd>Card</button>

   <button class="button2">Remove <kbd>2nd</kbd>Card</button>

    <button class="button3">Remove <kbd>3rd</kbd>Card</button>

    <button class="button4">Remove <kbd>Fourth</kbd>Card</button>

     <button class="button5">Remove <kbd>Fifth</kbd>Card</button>
</div>


<div id="row2">
  
   <button class="button7">Remove <kbd>1st</kbd>Card</button>

   <button class="button8">Remove <kbd>2nd</kbd>Card</button>

    <button class="button9">Remove <kbd>3rd</kbd>Card</button>

    <button class="button11">Remove <kbd>Fourth</kbd>Card</button>

     <button class="button12">Remove <kbd>Fifth</kbd>Card</button>
</div>


<div id="row3">
  
   <button class="button13">Remove <kbd>1st</kbd>Card</button>

   <button class="button14">Remove <kbd>2nd</kbd>Card</button>

    <button class="button15">Remove <kbd>3rd</kbd>Card</button>

    <button class="button16">Remove <kbd>Fourth</kbd>Card</button>

     <button class="button17">Remove <kbd>Fifth</kbd>Card</button>
</div>

</center>



    </body>
</html>
