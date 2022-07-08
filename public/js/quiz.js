/*
  red = 1
  blue = 2
  vert = 3
  jeune = 4
  */
var j=0;
var alea = [0,1,2,3,4];
alea = alea.sort(function(){
    return .5 - Math.random();
})

var dateList = [];
dateList = [{
    "question_number": 1,
    "title": "Quelle destination vous inspire pour votre prochain voyage ?",
    "option": ["La Montagne", "La Mer", "La Ville", "La Forêt"],
    "value" : [4,2,1,3],
},
 {
  "question_number": 2,
  "title": "Quel est votre animal favori parmi la liste suivante ?",
  "option": ["Un Ours", "Un Chien", "Un Alpaga", "Une Loutre"],
  "value" : [3,1,4,2],
},
{
"question_number": 3,
"title": "Parmi ces sens, quel est le plus important pour vous ?",
"option": ["L’odorat", "Le goût", "Le toucher","La vue"],
"value" : [2,4,1,3],
},
{
"question_number": 4,
"title": "Quel plat est le plus inspirant ?",
"option": ["Un brunch", "Un barbecue en famille", "Un bon plateau de fruits de mer","Une raclette"],
"value" : [1,3,2,4],
},
{
"question_number": 5,
"title": "Quel est le légume que vous aimez le moins ? ",
"option": ["Le céleri", "Le navet", "Les asperges","Les épinards"],
"value" : [3,1,2,4],
}

];

var reponsesFinales =[{
  "title" : "Eleveur d’abeilles sur rooftop Parisien",
  "image" : "Eleveur_abeilles",
},{
  "title" : "Conchyliculteur en Bretagne",
  "image" : "Conchyliculteur",
},{
  "title" : "Horticulteur en Nouvelle Aquitaine",
  "image" : "horticulteur",
},{
  "title" : "Producteur de fromage en Auvergne",
  "image" : "producteurdefromage",
}
];



var h=[];
var reponseList =[];


inputQuiz(0);
changerClass();

function next(){
  var radio = document.getElementsByName("option");
  var check = 0;

  
  for(let i=0; i<4; i++){

    if(radio[i].checked){
        
        reponseList[j] = radio[i].value;
        check = 1;
       
    }
  }

  if(check == 1){
    j++;
    inputQuiz(j);
    console.log("j=",j);
    document.getElementById("last").style= "display:block";

  }

  if( j == 4){
    document.getElementById("finir").style= "display : block";
    document.getElementById("next").style= "display : none";
  }
}

function finir(){

  var radio = document.getElementsByName("option");
  var check = 0;
  var res = 0,num=1,resN=1;
  
  for(let i=0; i<4; i++){
    if(radio[i].checked){
      //console.log("yes");
      //console.log(radio[i].value);
      //reponseList.push(radio[i].value);
      reponseList[j] = radio[i].value;
      check = 1;
      //console.log( reponseList);
    }
  }

  if(check == 1){

    document.querySelector('#question').style= "display : none";
    document.querySelector("#resultat").style= "display : block"

    document.getElementById("finir").style= "display : none";
    document.getElementById("next").style= "display : none";

    reponseList = reponseList.sort(
      function(x,y){
        if(x < y)
          return -1
        if(x >y)
          return 1
        return 0
    });
    //console.log(reponseList);

    for(let i=0;i<4;i++){
      //console.log("for i=",i);
      if(reponseList[i] == reponseList[i+1]){
        num++;
        //console.log("i=",reponseList[i],"i+1=",reponseList[i+1]);

        if(num == resN  && num == 2){
          let a = Math.round(Math.random());
          let b = Math.round(Math.random());
          //console.log("a=",a,"b=",b);
          if(a>b)
             res = reponseList[i];
             inputResulta(res-1);
             //document.querySelector('#resultat p').innerHTML = `${reponsesFinales[res-1].title}`;
          return;
        }
        if(num > resN){
          resN = num;
          res = reponseList[i];
        }
        if(num == 3){
           res = reponseList[i];
           inputResulta(res-1);
           //document.querySelector('#resultat p').innerHTML = `${reponsesFinales[res-1].title}`;
           return;
        }
      }
      else{
        num = 1;
      }
    }
    inputResulta(res-1);
  //document.querySelector('#resultat p').innerHTML = `${reponsesFinales[res-1].title}`;

  }

}
function inputResulta(num){

  var option = document.getElementById("option").getElementsByTagName("div")
  console.log("num=",option.length)

for(let i=0; i<option.length;i++){
  option[i].addEventListener('click',function(){
    console.log("option=",i);
    console.log("option=",option[i]);
    //this.style = "background-color: #093929;"

    for(let k=0; k<option.length; k++){
      option[k].removeAttribute("class");
    }
    
    this.setAttribute("class","checked");


  })
}

  document.querySelector('#resultat p').innerHTML = `${reponsesFinales[num].title}`;
  document.querySelector('#resultat img').src= `/image/${reponsesFinales[num].image}.svg`;
  document.querySelector('#resultat img').alt= `${reponsesFinales[num].image}`;

  document.querySelector('.lien p #pinterest').href =`https://pinterest.com/pin/create/button/?url=https://suricate.vercel.app/&media=https://suricate.vercel.app/asset/image/${reponsesFinales[num].image}.png`;

  document.querySelector('.lien p #email').href = `mailto:info@example.com?&subject=Quiz - Quels métiers pour moi &cc=&bcc=&body=${reponsesFinales[num].title}%0Atrouver votre métiers sur le site https://suricate.vercel.app/`;
}

function refaire(){

    document.querySelector('#question').style= "display : block";
    document.querySelector("#resultat").style= "display : none";

    document.getElementById("finir").style= "display : none";
    document.getElementById("next").style= "display : block";
    document.getElementById("last").style= "display : none";
    j = 0;
    alea = [0,1,2,3,4];
    alea = alea.sort(function(){
        return .5 - Math.random();
    })
    reponseList =[];
    inputQuiz(0);

}

function last(){
  if(j == 1){
    document.getElementById("last").style= "display : none";
  }
  j--;
  inputQuiz(j)
}


function inputQuiz(j){

  document.querySelector('#question p').innerHTML = dateList[alea[j]].title;
  document.querySelector('#progresscontainer #progress').style.width = (j+1)*20+"%";

  let h = []; 
  for(let i=0;i<4; i++)
  {
    if(dateList[alea[j]].value[i] == reponseList[j]){

      h+=`
      <label for="radio${i}">
      <div id="coca">
      <input type="radio" name="option" id="radio${i}" checked value="${dateList[alea[j]].value[i]}"> 
      <span>${dateList[alea[j]].option[i]}</span>
      </div>
      </label>
      `;
    }
    else{

      h+=`
      <label for="radio${i}">
      <div>
      <input type="radio" name="option" id="radio${i}" value="${dateList[alea[j]].value[i]}"> 
      <span>${dateList[alea[j]].option[i]}</span>
      </div>
      </label>
      `;



    }

  }
  document.getElementById("option").innerHTML = h;
  changerClass();

}

function partage(){
  document.getElementById("popup").style= "display : flex";
  document.getElementById("popup_partager").style= "display : flex";
  console.log()


}

function quiz_close(){

  document.getElementById("popup").style= "display : none";
  document.getElementById("popup_partager").style= "display : none";
  document.getElementById("popup_newsletter").style= "display : none";
  
}
function newsletter(){
  document.getElementById("popup").style= "display : flex";
  document.getElementById("popup_newsletter").style= "display : flex";

}
function copy(){

  var obj = document.getElementById("textAreas");

  obj.select();
  document.execCommand("copy");
}

function changerClass(){

  var option = document.getElementById("option").getElementsByTagName("div");


  for(let i=0; i<option.length;i++){
      if(dateList[alea[j]].value[i] == reponseList[j]){
        option[i].setAttribute("class","checked");
      }
    

      option[i].addEventListener('click',function(){

      for(let k=0; k<option.length; k++){
        option[k].removeAttribute("class");
      }

    
      this.setAttribute("class","checked");


  })
}


}